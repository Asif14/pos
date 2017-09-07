<?php include 'includes/header.php'; ?>

<?php  if(!isset($_SESSION['username'])) {?>


<?php

 if(isset($_POST['btnSubmit'])){

	
      $name = $_POST['txtName'];
      $pwd = $_POST['txtPwd'];


    $stmt = $conn->prepare("SELECT * FROM users WHERE user_name = :user_name");
    $stmt->bindParam(':user_name', $name);
    $stmt->execute();


    if($stmt->rowCount() > 0){
      
       $stmt->setFetchMode(PDO::FETCH_ASSOC);
       $info =  $stmt->fetch();

       if($pwd == $info['user_pwd']){
           $_SESSION['userid'] = $info['user_id'];
           $_SESSION['username'] = $name;
           header('Location:index.php');
       }else{

         $_SESSION['login_error'] = 'Password is incorrect ....';
         header('Location:error.php');
       }
    }else{

      $_SESSION['login_error'] = 'this account does not exixt ....';
      header('Location:error.php');
    }

	  
	  
  }

?>

  
 <div id="main-content">

 

 <div class="row">

  <div class="col-md-4">
  </div>

  <div class="col-md-4">
  <div class="well"><h3>User Login</h3></div>
   <form role="form" action="login.php" method="post">
    <div class="form-group">
      <label for="usr">Name</label>
      <input type="text" class="form-control" name="txtName">
    </div>
    <div class="form-group">
      <label for="pwd">Password</label>
      <input type="password" class="form-control" name="txtPwd">
    </div>
    

    <button type="submit" class="btn btn-default" name="btnSubmit">Login</button>

   </form>
   </div>


   <div class="col-md-4">
  </div>

 </div>


<?php } ?>

<?php include 'includes/footer.php'; ?>

