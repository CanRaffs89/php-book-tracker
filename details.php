<?php

include('config/db_connect.php');

if(isset($_POST['delete'])){
    $id_to_delete = mysqli_real_escape_string($connect, $_POST['id_to_delete']);

    $sql = "DELETE FROM books WHERE id = $id_to_delete";

    if(mysqli_query($connect, $sql)){
        header('Location: index.php');
    } {
        echo 'Query error: ' . mysqli_error($connect);
    }
}

// Check GET request id
if(isset($_GET['id'])){
    $id = mysqli_real_escape_string($connect, $_GET['id']);
    // Make SQL
    $sql = "SELECT * FROM books WHERE id = $id";
    // Get query result
    $result = mysqli_query($connect, $sql);
    // Fetch result in array format
    $book = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    mysqli_close($connect);
}

?>

<!DOCTYPE html>
<html lang="en">

<?php include('templates/header.php') ?>
<div class="container center">
    <?php if($book): ?>
        <h4><?php echo htmlspecialchars($book['title']); ?></h4>
        <h5><?php echo htmlspecialchars($book['author']); ?></h5>
        <p>Created by: <?php echo htmlspecialchars($book['email']); ?></p>
        <p>Created on: <?php echo date($book['created_at']); ?></p>

        <!-- Delete -->
        <form action="details.php" method="POST">
            <input type="hidden" name="id_to_delete" value="<?php echo $book['id']; ?>">
            <input type="submit" name="delete" value="Delete" class="btn brand z-depth-0">
        </form>
    <?php else: ?>
        <h5>No such book exists!</h5>
    <?php endif; ?>
</div>
<?php include('templates/footer.php') ?>

</html>