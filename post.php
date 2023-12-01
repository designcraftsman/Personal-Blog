<?php include('head.php'); ?>
<body>
<?php include('connection.php');
    $id = $_GET['id']; 
    $cookie= 'viewedPost'.$id;
    $sqlQuery = "SELECT * FROM posts WHERE idPost = :id;";
    $postStatement = $db->prepare($sqlQuery);
    $postStatement->bindParam('id', $id, PDO::PARAM_INT); 
    $postStatement->execute();
    $post = $postStatement->fetch(PDO::FETCH_ASSOC);
    if(!isset($_COOKIE[$cookie])){
        $Views = $post['postViews'] + 1;
        $insertQuery = "UPDATE posts SET postViews = :postViews WHERE idPost = :postId";
        $insertView = $db->prepare($insertQuery);
        $insertView ->execute([
            'postId'=>$id,
            'postViews'=>$Views,
        ]);
        setcookie($cookie,1,time()+3600*24*30);
    }
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
 <script src="js/script.js"></script>
</body>
</html>

