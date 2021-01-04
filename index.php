<?php
    // Connect to database
    $connect = mysqli_connect('localhost', 'can', 'Rainbow57', 'book_tracker');

    // Check connection
    if(!$connect){
        echo 'Connection error: '.mysqli_connect_error();
    }
?>

<!DOCTYPE html>
<html lang="en">
    <?php include('templates/header.php'); ?>
    <?php include('templates/footer.php'); ?>
</html>