<?php include 'includes/header.php'; ?>

<?php

 if(isset($_POST['btnSubmit'])){

	 $title = $_POST['txtTitle'];
	 $description = $_POST['txtDescription'];
   $userid = $_SESSION['userid'];
	 
   $sql = "INSERT INTO posts (post_title , post_description , user_id) VALUES ('$title','$description','$userid')";
    $conn->exec($sql);

    header('Location:index.php');


  }

?>

  
 <div id="main-content">

 

 <div class="row">

  <div class="col-md-4">
  </div>

  <div class="col-md-4">
  <div class="well"><h3>New Post</h3></div>
   <form role="form" action="new_post.php" method="post">
    <div class="form-group">
      <label for="usr">title</label>
      <input type="text" class="form-control" name="txtTitle">
    </div>
   
    <div class="form-group">
      <label for="pwd">Description</label></div>
      <div class="form-group">
      <textarea name="txtDescription"></textarea>
    </div>
 

    <button type="submit" class="btn btn-default" name="btnSubmit">Post</button>

   </form>
   </div>


   <div class="col-md-4">
  </div>

 </div>



<?php include 'includes/footer.php'; ?>