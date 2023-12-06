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
    <a class="articleContent__categorie" href="#"><?php echo($post['categorie']); ?></a>
    <p class="articleContent__p"><?php echo($post['postContent']);?></p>

    <div class="articleContent__comments">
        <h2 class="articleContent__comments__title">Comments</h2>
        <div class="articleContent__comments__comment">
            <img src="https://images.pexels.com/photos/220453/pexels-photo-220453.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="">
            <div class="articleContent__comments__comment__content">
                <p class="articleContent__comments__comment__content__p">Sed ac lorem felis. Ut in odio lorem. Quisque magna dui, maximus ut commodo sed, vestibulum ac nibh. Aenean a tortor in sem tempus auctor</p>
                <div class="articleContent__comments__comment__content__info">
                    <div class="articleContent__comments__comment__content__info__about">
                        <h3 class="articleContent__comments__comment__content__info__about__user">Steven</h3>
                        <p class="articleContent__comments__comment__content__info__about__date">25 july 2021 at 3:12 pm</p>
                    </div>
                    <div class="articleContent__comments__comment__content__info__reply">
                        <a class="articleContent__comments__comment__content__info__reply__btn" href="#">Reply</a>
                    </div>  
                </div>
            </div>
        </div>
        <h2 class="articleContent__comments__title">Leave a Reply</h2>
        <form class="articleContent__comments__replyForm" method="POST">
                <textarea class="articleContent__comments__replyForm__input" rows="5" cols="60" name="text" placeholder="Write your comment here..."></textarea>
                <input class="articleContent__comments__replyForm__input" type="text" name="fullName" placeholder="Your full name">
                <input class="articleContent__comments__replyForm__input" type="text" name="email" placeholder="E-mail adress">
                <button class="articleContent__comments__replyForm__btn" type="submit">Post Comment</button>
        </form>
</div>
</main>    
<?php
 include('aside.php');   ?>
 </div>
 <?php   include('footer.php'); ?>
 <script src="js/script.js"></script>
</body>
</html>

