<?php include('head.php'); ?>  
<body>
<?php include('navbar.php');
    try
    {
        $db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root');
    }
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }
    $sqlQuery = 'SELECT postTitle, postImg ,categorie, postContent FROM posts';
    $postsStatement = $db->prepare($sqlQuery);
    $postsStatement->execute();
    $posts = $postsStatement->fetchAll();
?>
<section id="home">
    <div class="container">
        <div class="container__left">
            <a href="#">Lifestyle</a>
            <img src="https://images.pexels.com/photos/1661179/pexels-photo-1661179.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="">
            <h2 class="container__left__title">Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.</h2>
        </div>
        <div class="container__rightTop">
            <a href="#">Lifestyle</a>
            <img src="https://images.pexels.com/photos/1851164/pexels-photo-1851164.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="">
            <h2 class="container__rightTop__title">Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.</h2>
        </div>
        <div class="container__rightBottom">
            <a href="#">Lifestyle</a>
            <img src="https://images.pexels.com/photos/106686/pexels-photo-106686.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="">
            <h2 class="container__rightBottom__title">Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.</h2>
        </div>
    </div>
</section>



<section id="posts">
    <h2>Trending Posts</h2>
    <div id="trendingPosts">
    <div class="trendingPosts">
        <div class="trendingPosts__Posts">
            <?php foreach($posts as $post){ ?>
                <div class="trendingPosts__Posts__post">
                <img src="<?php echo($post['postImg']); ?>" alt="">
                <a href="#"><?php echo($post['categorie']); ?></a>    
                <h3><?php echo($post['postTitle']); ?></h3>
                <p><?php echo($post['postContent']); ?></p>    
            </div>
            <?php } ?>
        </div>
    </div>
    <?php include('aside.php'); ?>
    </div>
</section>

<section id="newsLetter">
    <div class="newsLetter">
        <h2 class="newsLetter__text1"><span><i class="fa-solid fa-paper-plane fa-bounce fa newsLetter__icon"></i></span>  Join Our Newsletter</h2>
        <h3 class="newsLetter__text2">Dive into Alice for Your Weekly Dose of Creativity !</h3>
        <form class="newsLetter__form" action="">
            <input type="email" name="emailInput" class="newsLetter__form__input" placeholder="Email Here">
            <button class="newsLetter__form__btn">Sign Me Up</button>
        </form> 
    </div>
</section>
<?php include('footer.php'); ?>
</body>
</html>