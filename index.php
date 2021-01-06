<?php
    include('config/db_connect.php');

    // Query data
    $sql = 'SELECT title, author, id FROM books ORDER BY created_at';

    // Store data
    $result = mysqli_query($connect, $sql);

    // Fetch data as an array
    $books = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // Free the result from memory
    mysqli_free_result($result);

    // Close connection
    mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">
    <?php include('templates/header.php'); ?>
    <h4 class="center grey-text">Books</h4>
    <div class="container">
        <div class="row">

            <!-- Cycle through Books array and output each -->
            <?php foreach($books as $book): ?>
                <div class="col s6 md3">
                    <div class="card z-depth-0">
                        <div class="card-content center">
                            <h6> <?php echo htmlspecialchars($book['title']); ?> </h6>
                            <div> <?php echo htmlspecialchars($book['author']); ?> </div>
                        </div>
                        <div class='card-action right-align'>
                            <a href="" class='brand-text'>More Info</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
    <?php include('templates/footer.php'); ?>
</html>