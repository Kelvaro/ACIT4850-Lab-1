<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $game = new Game("-");
$game->display();
if ($game->winner('x')) {
    echo 'You win';
} else if ($game->winner('o')) {
    echo 'I win.';
} else {
    echo 'No Winnner yet';
}
        // put your code here
        ?>
    </body>
</html>

<?php
class Game {

    var $position; //var to display the position
    var $board; //var to display board

    function __construct($squares) {
        
        $this->position = $_GET['board'];
        $$this->position = str_split($squares);
       
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
                } else if (($this->position[2] == $token) &&
                        ($this->position[4] == $token) &&
                        ($this->position[6] == $token)) { //checks diagonal top right to bottom left
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
                    if ($this->position[3 * $row + $col] != $token) {
                        $result = false;
                    } else if (($position[0] == $token) && ($position[4] == $token) && ($position[8] == $token)) {//checks diagonal
                        $result = true;
                    }
                }
            }
        }
        return $result;
    }
    
    function display() {
        echo '<table cols="3" style ="font-size:large; font-weight:bold">';// style of the board
        echo '<tr>';//open the first row
        for ($pos=0; $pos<9; $pos++){
            echo $this->show_cell($pos);
            if ($pos % 3 == 2) {
                echo'</tr><tr>';
            }//start a new row for the next square
        }
        echo '</tr>'; //close the last row
        echo '</table>';
        

    }
        function show_cell($which){
        $token = $this->position[$which];
        //deal with the easy case
        if($token <> '-'){
            return '<td>'.$token.'</td>';
            //now the hard case
            $this->newposition = $this->position;//copy the original
            $this->newposition[$which] = 'o'; //this would be their move
            $move = implode($this->newposition);// make a string from the board array
            
            $link = '/?board='.$move;//this is what we want the link to be
            //so return a cell containing an anchor and showing a hyphen
            return '<td><a=href="'.$link.'">-</a></td>';
        }
    }
 
}
        // put your code here
        ?>