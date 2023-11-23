<?php include('head.php'); ?>  
<body>
<?php include('navbar.php');
    include('connection.php');   
    $sqlQuery = 'SELECT * FROM posts';
    $postsStatement = $db->prepare($sqlQuery);
    $postsStatement->execute();
    $posts = $postsStatement->fetchAll();
    $date = date('y-m-d');
    $currentDate = new DateTime($date);
    $todayPosts = array_filter($posts,function($post)use($currentDate){
            $postDate = new DateTime($post['postDate']);
            $dateGap = $currentDate->diff($postDate);
            $minutesGap = $dateGap->format('%i');
            return $minutesGap <= 20160 ;
    }); 
    $TodayPosts = array_slice($todayPosts, 0, 3);
?>
<section id="home">
    <div class="container">
        <article class="container__left">
            <a href="#"><?php echo($TodayPosts[0]['categorie']); ?></a>
            <img src="<?php echo($TodayPosts[0]['postImg']); ?>" alt="">
            <h2 class="container__left__title"><?php echo($TodayPosts[0]['postTitle']); ?></h2>
        </article>
        <article class="container__rightTop">
            <a href="#"><?php echo($TodayPosts[1]['categorie']); ?></a>
            <img src="<?php echo($TodayPosts[1]['postImg']); ?>" alt="">
            <h2 class="container__rightTop__title"><?php echo($TodayPosts[1]['postTitle']); ?></h2>
        </article>
        <article class="container__rightBottom">
            <a href="#"><?php echo($TodayPosts[2]['categorie']); ?></a>
            <img src="<?php echo($TodayPosts[2]['postImg']); ?>" alt="">
            <h2 class="container__rightBottom__title"><?php echo($TodayPosts[2]['postTitle']); ?></h2>
        </article>
    </div>
</section>



<section id="posts">
    <h2>Trending Posts</h2>
    <div id="trendingPosts">
    <div class="trendingPosts">
        <div class="trendingPosts__Posts">
            <?php foreach($posts as $post){ ?>
                <article class="trendingPosts__Posts__post"  onclick="postPage(<?php echo($post['idPost']); ?> ) " > 
                <img src="<?php echo($post['postImg']); ?>" alt="">
                <a href="#"><?php echo($post['categorie']); ?></a>    
                <h3><?php echo($post['postTitle']); ?></h3>
                <p><?php echo($post['postContent']); ?></p>    
                </article>
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
<script src="js/script.js"></script>
</body>
</html>