<?php

/**
 * Main First Index File
 *
 * Checking Input & Output methords
 *
 * @category     Global{M} - TEST PROJECT 
 * @author       Shahbaz Ali <shahbaz.pucit@gmail.com>
 */
class Transportation {

    /**
     * Array of Boarding Cards as Input
     *
     * @var array
     */
    private $boardingCardStack = array();

    /**
     * Array of Boarding Cards output Sorted
     *
     * @var array
     */
    private $processedArray = array();

    /**
     * setting up input array to class object
     *
     * @param array $boardingCardStack list of unsorted array
     */
    public function __construct(array $boardingCardStack) {
        $this->boardingCardStack = $boardingCardStack;
    }

    /**
     * This function will sort first(Source) & last(destination) first & then use normal sort for inner routes. It takes an array as input & returns sorted array.
     *
     * @return array
     */
    public function processCards() {
        if (sizeof($this->boardingCardStack) > 2) {
            for ($i = 0; $i < sizeof($this->boardingCardStack); $i++) {
                $previousCard = false;
                $lastCard = true;
                foreach ($this->boardingCardStack as $oneTrip) {
                    if (strtolower($oneTrip['arrival']) == strtolower($this->boardingCardStack[$i]['departure'])) { // if arrival has departure 
                        $previousCard = true;
                    } else if (strtolower($oneTrip['departure']) == strtolower($this->boardingCardStack[$i]['arrival'])) { // if departure not found
                        $lastCard = false;
                    }
                }
                if (!$previousCard) { // if this index doesn't have any previous card
                    array_unshift($this->boardingCardStack, $this->boardingCardStack[$i]); // to add first card to the start of the array
                    unset($this->boardingCardStack[$i]); // remove same from existing array
                } elseif ($lastCard) { // if this index is the last card
                    array_push($this->boardingCardStack, $this->boardingCardStack[$i]); // to add last card to the end of the array
                    unset($this->boardingCardStack[$i]); // remove same from existing array
                }
            }
        }
        $this->boardingCardStack = array_merge($this->boardingCardStack); // used to reset array indexes becasue we removed some elements & added in start / end 
        for ($i = 0; $i < sizeof($this->boardingCardStack); $i++) {
            foreach ($this->boardingCardStack as $index => $trip) {
                if (strtolower($trip['departure']) == strtolower($this->boardingCardStack[$i]['arrival'])) { // if departure & next cards arrival is same
                    $nextIndex = $i + 1;
                    // Code to swap both values (Sorting)
                    $tempRow = $this->boardingCardStack[$nextIndex];
                    $this->boardingCardStack[$nextIndex] = $trip;
                    $this->boardingCardStack[$index] = $tempRow;
                    break;
                }
            }
        }
        return $this->boardingCardStack;
    }

    /**
     * Just printing Sorted array elements
     *
     * @return array or False
     */
    public function showMessage() {
        if (isset($this->boardingCardStack) && sizeof($this->boardingCardStack) > 0) {
            foreach ($this->boardingCardStack as $oneTranport) {
                $sortedTrip = '';
                $sortedTrip .= "Take " . $oneTranport['transportation'];
                $sortedTrip .= " From " . $oneTranport['departure'];
                $sortedTrip .= " To " . $oneTranport['arrival'];
                if (isset($oneTranport['transportation_number'])) {
                    $sortedTrip .= "  " . $oneTranport['transportation_number'];
                }
                if (isset($oneTranport['seat']) && $oneTranport['seat'] != 'Any Seat') {
                    $sortedTrip .= " Seat # " . $oneTranport['seat'];
                }
                if (isset($oneTranport['gate']) && $oneTranport['gate'] != 'Any Gate') {
                    $sortedTrip .= " at Gate# " . $oneTranport['gate'];
                }
                $this->processedArray[] = $sortedTrip;
            }
            return $this->processedArray;
        }
        return false;
    }

}
