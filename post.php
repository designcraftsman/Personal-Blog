<?php 
    include('connection.php');
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
<?php   
        if ($_SERVER["REQUEST_METHOD"] == "POST") {    
            if(!isset($_POST['commentMessage']) || !isset($_POST['memberName']) || !isset($_POST['memberEmail'])){
                echo('Error.Please fill in all the fields ! ');
            }else{
                $commentMessage = $_POST['commentMessage'];
                $memberName = $_POST['memberName'];
                $memberEmail = $_POST['memberEmail'];
                $sqlQuery = 'INSERT INTO comments(commentMessage, postId, memberEmail,memberName) VALUES (:commentMessage, :postId ,:memberEmail, :memberName)';
                $insertComment = $db->prepare($sqlQuery);
                $insertComment->execute([
                    'commentMessage' => $commentMessage,
                    'postId' => $id,
                    'memberEmail' => $memberEmail,
                    'memberName' => $memberName, 
                ]);
                header("Location: post.php?id=" . $id);
                exit();
            }
        }
?>
<?php include('head.php'); ?>
<body>
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
        <?php   
            $commentQuery = "SELECT * FROM comments where postId = :id";
            $commentsStatement = $db->prepare($commentQuery); 
            $commentsStatement->bindParam(':id', $id, PDO::PARAM_INT);
            $commentsStatement->execute();
            $comments = $commentsStatement->fetchAll();     
        ?>
        <h2 class="articleContent__comments__title">Comments</h2>
        <?php foreach($comments as $comment){?>
        <div class="articleContent__comments__comment">
            <img src="https://images.pexels.com/photos/220453/pexels-photo-220453.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="">
            <div class="articleContent__comments__comment__content">
                <p class="articleContent__comments__comment__content__p"><?php echo($comment['commentMessage']); ?></p>
                <div class="articleContent__comments__comment__content__info">
                    <div class="articleContent__comments__comment__content__info__about">
                        <h3 class="articleContent__comments__comment__content__info__about__user"><?php echo($comment['memberName']); ?></h3>
                        <p class="articleContent__comments__comment__content__info__about__date"><?php echo($comment['commentDate']); ?></p>
                    </div>
                    <div class="articleContent__comments__comment__content__info__reply">
                        <a class="articleContent__comments__comment__content__info__reply__btn" href="#">Reply</a>
                    </div>  
                </div>
            </div>
        </div>
        <?php }?>
        <h2 class="articleContent__comments__title">Leave a Reply</h2>
        <form class="articleContent__comments__replyForm"  method="POST">
                <textarea class="articleContent__comments__replyForm__input" rows="5" cols="60" name="commentMessage" placeholder="Write your comment here..."></textarea>
                <input class="articleContent__comments__replyForm__input" type="text" name="memberName" placeholder="Your full name">
                <input class="articleContent__comments__replyForm__input" type="text" name="memberEmail" placeholder="E-mail adress">
                <button class="articleContent__comments__replyForm__btn" id="commentSubmitBtn" type="submit">Post Comment</button>
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

