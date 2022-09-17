<?php


include 'include/header.php';



?>

<?php

    $name = $email = $body = '';

    $nameErr = $emailErr = $bodyErr = '';

    # form submit

    if(isset($_POST['submit'])){

        # validate name

        if(empty($_POST['name'])){

            $nameErr = 'name is required';
        }else{
            $name = filter_input(INPUT_POST,'name',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        }

        # validate email

        if(empty($_POST['email'])){

            $emailErr = 'email is required';
        }else{
            $email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);
        }

        # validate body

        if(empty($_POST['body'])){

            $bodyErr = 'feedback is required';
        }else{
            $body = filter_input(INPUT_POST,'body',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        }

        if(empty($nameErr) && empty($emailErr) && empty($bodyErr)){

            # add to db

            $sql = "INSERT INTO feedback (name,email,body) VALUES ('$name', '$email','$body')";

            if(mysqli_query($conn,$sql)){
                #success
                header('Location: feedback.php');

            }else{

                echo 'Error'. mysqli_error($conn);

            }

        }

    }



?>



<div class="container mt-5">
    <center><img src="image/feed.png" alt=""></center>
    <h3 class="text-warning text-center display-5">Feedback</h3>
    <p class="text-center text-mute">Leave Feedback for Hash's media</p>

    <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
    <div class="mb-3">
    <label  class="form-label">Name</label>
    <input type="text" name="name" class="form-control <?php echo $nameErr ? 'is-invalid':null?>" placeholder="Enter Your Name">
        <div class="invalid-feedback">
            <?php echo $nameErr;?>
        </div>
    </div>
    <div class="mb-3">
    <label class="form-label">Email</label>
    <input type="email" name="email" class="form-control <?php echo $emailErr ? 'is-invalid':null?>" placeholder="Enter Your Email">
    <div class="invalid-feedback">
            <?php echo $emailErr;?>
    </div>
    </div>
    <div class="mb-3">
    <label  class="form-label">Feedback</label>
    <textarea name="body" class="form-control <?php echo $bodyErr ? 'is-invalid':null?>" rows="5" placeholder="Enter Your Feedback"></textarea>
    <div class="invalid-feedback">
            <?php echo $bodyErr;?>
    </div>

    </div>
    <div class="d-grid gap-2">
    <input type="submit" name="submit" value="Send" class="btn btn-success">
    </div>
    </form>

</div>








<?php


include 'include/footer.php';



?>