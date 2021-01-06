<?php
    include('config/db_connect.php');
    
    // Initialise empty variables
    $email = $title = $author = '';

    // Initalise empty errors array
    $errors = array('email' => '', 'title' => '', 'author' => '');

    // Form validation
    if(isset($_POST['submit'])){
        // Check email
        if(empty($_POST['email'])){
            $errors['email'] = 'An email is required <br/>';
        } else {
            $email = $_POST['email'];
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $errors['email'] = 'Must be a valid email address';
            }
        }
        // Check title
        if(empty($_POST['title'])){
            $errors['title'] = 'A title is required <br/>';
        } else {
            $title = $_POST['title'];
            if(!preg_match('/^[a-zA-Z\s]+$/', $title)){
                $errors['title'] = 'Title must be letters and spaces only';
            }
        }
        // Check author
        if(empty($_POST['author'])){
            $errors['author'] = 'An author is required <br/>';
        } else {
            $author = $_POST['author'];
            if(!preg_match('/^[a-zA-Z\s]+$/', $author)){
                $errors['author'] = 'Author name must be letters and spaces only';
            }
        }
        // Check for errors
        if(array_filter($errors)){
            // echo 'Errors in form';
        } else {
            $email = mysqli_real_escape_string($connect, $_POST['email']);
            $title = mysqli_real_escape_string($connect, $_POST['title']);
            $author = mysqli_real_escape_string($connect, $_POST['author']);

            // Add data
            $sql = "INSERT INTO books(title,author,email) VALUES('$title', '$author', '$email')";

            // Save to database and check
            if(mysqli_query($connect, $sql)){
                // Success - redirect home
                header('Location: index.php');
            } else {
                // Error - output
                echo 'Query error: '. mysqli_error($connect);
            }
        }

    } 
    
?>

<!DOCTYPE html>
<html lang="en">
    <?php include('templates/header.php'); ?>

    <section class="container grey-text">
        <h4 class="center">Add a Book</h4>
        <form action="add.php" method="POST" class="white">
            <label for="">Email</label>
            <input type="text" name="email" value='<?php echo htmlspecialchars($email); ?>'>
            
            <div class="red-text">
                <?php echo $errors['email']; ?>
            </div>

            <label for="">Title</label>
            <input type="text" name="title" value='<?php echo htmlspecialchars($title); ?>'>

            <div class="red-text">
                <?php echo $errors['title']; ?>
            </div>
            
            <label for="">Author</label>
            <input type="text" name="author" value='<?php echo htmlspecialchars($author); ?>'>

            <div class="red-text">
                <?php echo $errors['author']; ?>
            </div>

            <div class="center">
                <input type="submit" name="submit" value="submit" class="btn brand z-depth=0">
            </div>
        </form>
    </section>

    <?php include('templates/footer.php'); ?>
</html>