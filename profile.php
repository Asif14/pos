<?php include 'includes/header.php'; ?>

  
  <?php

     $stmt = $conn->prepare("SELECT * FROM users WHERE user_id = :user_id");
     $stmt->bindParam(':user_id',$_SESSION['userid']);
     $stmt->execute();
     $stmt->setFetchMode(PDO::FETCH_ASSOC);
     $profile = $stmt->fetch();
  ?>

  
  <h1><?= $_SESSION['username'] ?>'s Profile</h1>

  <?php  
    if($profile['user_pic']==''){ ?>

     <img src="images/dummypic.png" alt="user" width="100" height="120">

  <?php
   }else{
  ?>
    
    <img src="images/<?= $profile['user_pic'] ?>" alt="user" width="100" height="120">

  <?php
    }
  ?>

  <table>
    <tr>
    	<th>Name</th><td><?= $profile['user_name'] ?></td>
    </tr>
    <tr>
    	<th>Password</th><td><?= $profile['user_pwd'] ?></td>
    </tr>
    <tr>
    	<th>Address</th><td><?= $profile['user_address'] ?></td>
    </tr>
  	
  </table>


<?php include 'includes/footer.php'; ?>