<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



$position = $_GET['board'];
$squares = str_split($position);
if (!isset($_GET['board']));

$game = new Game($squares);
if ($game.winner('x')) {
    echo 'You win';
} else if ($game.winner('o')) {
    echo 'I win.';
} else {
    echo 'No Winnner yet';
}
    

class Game {

    var $position;

    function __construct($squaures) {
        $this->$position = str_split($squares);
    }

    function winner($token) {

        for ($row = 0; $row < 3; $row++) { //checks all rows
            $result = true;
            for ($col = 0; $col < 3; $col++) {//checks columns
                if ($this->position[3 * $row + $col] != $token) {
                    $result = false;
                } else if (($this->position[0] == $token) &&
                        ($this->position[4] == $token) &&
                        ($this->position[8] == $token)) { //checks diagonal top left to bottom right
                    $result = true;
                } else if (($position[2] == $token) &&
                        ($position[4] == $token) &&
                        ($position[6] == $token)) { //checks diagonal top right to bottom left
                    $result = true;
                }
            }
            if ($result)
                break;
        }
        if (!$result) {
            for ($col = 0; $col < 3; $col++) {//checks all columns
                $result = true;
                for ($row = 0; $row < 3; $row++) { //checks all rows
                    if ($position[3 * $row + $col] != $token) {
                        $result = false;
                    } else if (($position[0] == $token) && ($position[4] == $token) && ($position[8] == $token)) {//checks diagonal
                        $result = true;
                    }
                }
            }
        }
        return $result;
    }
 
}


?>
