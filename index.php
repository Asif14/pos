<?php include 'includes/header.php'; ?>


            <?php

                $sql = "SELECT * FROM users , posts WHERE posts.user_id = users.user_id";
		        $posts = $conn->query($sql);
		     

			foreach($posts as $post){ ?><div class="well">
			<img src="images/<?=$post['user_pic']?>" alt="user" width="50" height="60">
             
			    <h3><?= $post['post_title'] ?></h3>
			    <h5><?= $post['post_description'] ?></h5>
			    </div>
<br>
            <?php
             }
            ?>
           

<?php include 'includes/footer.php'; ?>