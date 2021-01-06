<?php
    // Connect to database
    $connect = mysqli_connect('localhost', 'can', 'Rainbow57', 'book_tracker');

    // Check connection
    if(!$connect){
        echo 'Connection error: '.mysqli_connect_error();
    }
?>