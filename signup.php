<?php include 'includes/header.php'; ?>
<?php  if(!isset($_SESSION['username'])) {?>


<?php

 if(isset($_POST['btnSubmit'])){

	 $name = $_POST['txtName'];
	 $pwd = $_POST['txtPwd'];
	 $address = $_POST['txtAddress'];

   
    $stmt = $conn->prepare("SELECT * FROM users WHERE user_name = :user_name");
    $stmt->bindParam(':user_name', $name);
    $stmt->execute();


    $pic = null;


   if($stmt->rowCount() == 0){

     // image upload start
      if(isset($_FILES['userImage'])){
      $file_name = $_FILES['userImage']['name'];
      $file_tmp =$_FILES['userImage']['tmp_name'];

      $pic = $file_name;

      move_uploaded_file($file_tmp,"images/".$file_name);

      }
     // image upload end

     $sql = "INSERT INTO users (user_name , user_pwd , user_address ,user_pic) VALUES ('$name','$pwd','$address','$pic')";
    $conn->exec($sql);

    $id = $conn->lastInsertId();

    $_SESSION['userid'] = $id;
    $_SESSION['username'] = $name;
    header('Location:index.php');

   }else{

      $_SESSION['login_error'] = 'this account already Exist ....';
      header('Location:error.php');
	 
    }

  }

?>

  
 <div id="main-content">

 

 <div class="row">

  <div class="col-md-4">
  </div>

  <div class="col-md-4">
  <div class="well"><h3>User Sign Up</h3></div>
   <form role="form" action="signup.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="usr">Name</label>
      <input type="text" class="form-control" name="txtName">
    </div>
    <div class="form-group">
      <label for="pwd">Password</label>
      <input type="password" class="form-control" name="txtPwd">
    </div>
    <div class="form-group">
      <label for="pwd">Address</label>
      <input type="text" class="form-control" name="txtAddress">
    </div>
    <div class="form-group">
      <label for="pwd">Upload Image</label>
      <input type="file" class="form-control" name="userImage">
    </div>

    <button type="submit" class="btn btn-default" name="btnSubmit">Sign Up</button>

   </form>
   </div>


   <div class="col-md-4">
  </div>

 </div>

<?php } ?>

<?php include 'includes/footer.php'; ?>