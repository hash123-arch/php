<?php


include 'include/header.php';



?>

<?php

$sql = 'SELECT * FROM feedback';

$result = mysqli_query($conn,$sql);

$feedback = mysqli_fetch_all($result,MYSQLI_ASSOC);




?>

<div class="container">
<h3 class="text-danger text-center display-5 mt-5">Past Feedback</h3>
<?php if(empty($feedback)) :?>
    <p class="lead mt-3">There is no feedback</p>
<?php endif;  ?>

<?php foreach($feedback as $item): ?>

<div class="card my-3 w-75 mx-auto">
    <div class="card-body text-center">
        <?php echo $item['body']; ?>
        <div class="text-secondary mt-2">
            By <?php echo $item['name']; ?> on <?php echo $item['date'];?>
        </div>
    </div>
</div>

<?php endforeach; ?>



</div>

<?php


include 'include/footer.php';



?>