<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>PHP CRUD Operation</title>
</head>
<body>
    <!-- Form -->
    <?php
        require_once('server.php');
    ?>
    <!-- Notification area Starts -->
    <?php 
        if(isset($_SESSION['message'])): ?>
        <div class="alert alert-<?=$_SESSION['msg_type']?> text-center">
        <?php
        echo($_SESSION['message']);
        unset($_SESSION['message']);
        ?>
        </div>
        <?php endif; ?>
        <!-- Notification Area Ended -->
    <?php 
        $mysqli = new mysqli('localhost','root','','crud') or die(mysqli_error($mysqli));
        $result = $mysqli->query("SELECT * FROM data")
    ?>
    <!-- Inforamtion Fetching Area Start -->
        <div class="container">
        <div class="row justify-content-center">
        <table class="table">
            <thead>
            <tr>
            <th>Name</th>
            <th>Surname</th>
            <th colspan="2">Actions</th>
            </tr>
            </thead>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['name']?></td>
                <td><?php echo $row['surname']?></td>
                <td><a href="index.php?edit=<?php echo $row['id'] ?>"><div class="btn btn-primary">Edit</div></a>
                <a href="index.php?delete=<?php echo $row['id'] ?>"><div class="btn btn-danger">Delete</div></a></td>
            </tr>
            <?php endwhile; ?>
        </table>
        </div>
        </div>
        <!-- Information Fetching Area Ended -->

<hr>
<!-- Form Section -->
    <div class="container">
    <h1 class="h1">
    <?php 
       if($update == true):?><!-- When edit button clicked  then load Update Form-->
     <h1 class="h1">Update Record</h1>
       <?php else: ?><!-- If edit button does not clicked -->
        <h1 class="h1">Add a new Record</h1>
       <?php endif; ?>
    </h1>
    <hr>
    <form action="" method="post" class="form">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
       <div class="form-group">
       <label for="name">Name</label>
       <input type="text" name="name" id="name" class="form-control" value="<?php echo $name ?>">
       </div>
       <div class="form-group">
       <label for="surname">Surname</label>
       <input type="text" name="surname" id="surname" class="form-control" value="<?php echo $surname ?>">
       </div>
      
       <!-- Form Edit Section with Dynamic Selection -->
       <?php 
       if($update == true):?><!-- When edit button clicked  then load Update Form-->
       <button type="submit" name="update" class="btn btn-info">Update</button>
       <?php else: ?><!-- If edit button does not clicked -->
       <button type="submit" name="save" class="btn btn-success">Save</button>
       <?php endif; ?>
    </form>
    </div>
    <!-- Form Section Ends -->
    <!-- ***************************************** -->
    <!-- BOOTSTRAP CDN FOR JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>