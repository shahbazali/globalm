<?php
    /**
     * Receving POST REQUEST
     *
     * Received Data from API as json (POST Request) & Decode it & return
     *
     * @category     Global{M} - TEST PROJECT 
     * @author       Shahbaz Ali <shahbaz.pucit@gmail.com>
     */
$boardingCardStack = json_decode($_REQUEST['trip_data'], true);
