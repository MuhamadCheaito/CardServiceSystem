<?php
    function Connect(){
        $con = mysqli_connect('localhost','root','','cardsystem');
        if(!$con){
            echo "<h1>Connection Failed</h1><br>";
        }
        return $con;
    }
    ?>
