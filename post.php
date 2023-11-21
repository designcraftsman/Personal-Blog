<?php include('head.php'); ?>
<body>
<?php include('connection.php');
    $id = $_GET['id']; 
    $sqlQuery = "SELECT * FROM posts WHERE idPost = :id";
    $postStatement = $db->prepare($sqlQuery);
    $postStatement->bindParam('id', $id, PDO::PARAM_INT); 
    $postStatement->execute();
    $post = $postStatement->fetch(PDO::FETCH_ASSOC);
    ?>
<?php include("navbar.php"); ?>
<h1 class="postTitle"><?php echo($post['postTitle']); ?></h1>
<div class="postPage">
<main class="articleContent">
    <div class="articleContent__img">
        <img src="<?php echo($post['postImg']); ?>" alt="">
    </div>
    <a href="#"><?php echo($post['categorie']); ?></a>
    <p><?php echo($post['postContent']);?></p>
</main>    
<?php
 include('aside.php');   ?>
 </div>
 <?php   include('footer.php'); ?>
</body>
</html>

