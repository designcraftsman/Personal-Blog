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
    $posts = array_slice($todayPosts, 0, 6)
?>
<section id="home">
    <div class="container">
        <article class="container__left" onclick="postPage(<?php echo($TodayPosts[0]['idPost']); ?> ) ">
            <img src="<?php echo($TodayPosts[0]['postImg']); ?>" alt="">
            <div class="container__left__info">
                <a href="#"><?php echo($TodayPosts[0]['categorie']); ?></a>
                <h2 class="container__left__info__title"><?php echo($TodayPosts[0]['postTitle']); ?></h2>
                <p class="container__left__info__additional"><?php echo($TodayPosts[0]['postDate']); ?></p>
            </div>
        </article>
        <article class="container__rightTop" onclick="postPage(<?php echo($TodayPosts[1]['idPost']); ?> ) ">
            <img src="<?php echo($TodayPosts[1]['postImg']); ?>" alt="">
            <div class="container__rightTop__info">
                <a href="#"><?php echo($TodayPosts[1]['categorie']); ?></a>
                <h2 class="container__rightTop__info__title"><?php echo($TodayPosts[1]['postTitle']); ?></h2>
                <p class="container__rightTop__info__additional"><?php echo($TodayPosts[1]['postDate']); ?></p>
            </div>    
        </article>
        <article class="container__rightBottom" onclick="postPage(<?php echo($TodayPosts[2]['idPost']); ?> ) ">
            <img src="<?php echo($TodayPosts[2]['postImg']); ?>" alt="">
            <div class="container__rightBottom__info">
                <a href="#"><?php echo($TodayPosts[2]['categorie']); ?></a>
                <h2 class="container__rightBottom__info__title"><?php echo($TodayPosts[2]['postTitle']); ?></h2>
                <p class="container__rightBottom__info__additional"><?php echo($TodayPosts[2]['postDate']); ?></p>
            </div>
        </article>
    </div>
</section>



<section id="posts">
    <h2 class="title">Trending Posts</h2>
    <div id="trendingPosts">
    <div class="trendingPosts">
        <div class="trendingPosts__Posts">
            <?php foreach($posts as $post){ ?>
                <article class="trendingPosts__Posts__post"  onclick="postPage(<?php echo($post['idPost']); ?> ) " > 
                    <h3><?php echo($post['postTitle']); ?></h3>
                    <img src="<?php echo($post['postImg']); ?>" alt="">   
                    <p class="trendingPosts__Posts__post__categorie"><a class="trendingPosts__Posts__post__categorie__select" href="blog.php?categorie=<?php echo urlencode($post['categorie']);?>"><?php echo($post['categorie']); ?></a> - Posted on <?php echo($post['postDate']); ?></p> 
                    <p class="trendingPosts__Posts__post__p"><?php echo($post['postContent']); ?></p>    
                    <a class="trendingPosts__Posts__post__readMore" onclick="postPage(<?php echo($post['idPost']); ?> ) ">Read More</a>
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