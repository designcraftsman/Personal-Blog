<?php include('connection.php');
    $sqlQuery = "SELECT * FROM posts ";
    $postsStatement = $db->prepare($sqlQuery);
    $postsStatement->execute();
    $posts = $postsStatement->fetchAll();
    $i = 0;
?>
<aside class="asideSection">
    <h2 class="asideSection__title">Recent Posts</h2>        
    <div class="asideSection__recentPosts">
            <?php foreach($posts as $post){?>
            <article class="asideSection__recentPosts__post" onclick="postPage(<?php echo($post['idPost']); ?> ) ">
                <div class="asideSection__recentPosts__post__img">
                    <img src="<?php echo($post['postImg']); ?>" alt="">
                </div>
                <div class="asideSection__recentPosts__post__content">
                    <a href="#"><?php echo($post['categorie']); ?></a>
                    <h3><?php echo($post['postTitle']); ?></h3>
                    <p><?php $dateFormat = new DateTimeImmutable($post['postDate']); echo($dateFormat->format('M d,Y')); ?></p>
                 </div>   
            </article>
            <?php $i+=1;
            if($i>=5){
                break;
            }
        } ?>
        </div>
        <h2 class="asideSection__title">Browse Categories</h2>
        <div class="asideSection__categories">
            <div class="asideSection__categories__categorie">
                <a href="blog.php?categorie=food">
                    <div class="asideSection__categories__categorie__title">
                        <h3 class="asideSection__categories__categorie__title__name">Food</h3>   
                        <p class="asideSection__categories__categorie__title__number">453</p>
                    </div>
                    <img src="https://images.pexels.com/photos/1199957/pexels-photo-1199957.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="">
                </a>
            </div>
            <div class="asideSection__categories__categorie">
                <a href="blog.php?categorie=lifestyle">
                    <div class="asideSection__categories__categorie__title">
                        <h3 class="asideSection__categories__categorie__title__name">Lifestyle</h3>
                        <p class="asideSection__categories__categorie__title__number">54</p>
                    </div>
                    <img src="https://images.pexels.com/photos/1153369/pexels-photo-1153369.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="">
                </a>
            </div>     
            <div class="asideSection__categories__categorie">
                <a href="blog.php?categorie=health">
                    <div class="asideSection__categories__categorie__title">
                        <h3 class="asideSection__categories__categorie__title__name">Health</h3>
                        <p class="asideSection__categories__categorie__title__number">33</p>
                    </div>
                    <img src="https://images.pexels.com/photos/40751/running-runner-long-distance-fitness-40751.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="">
                </a>
            </div>    
            <div class="asideSection__categories__categorie">
                <a href="blog.php?categorie=science">
                    <div class="asideSection__categories__categorie__title">
                        <h3 class="asideSection__categories__categorie__title__name">Science</h3>
                        <p class="asideSection__categories__categorie__title__number">17</p>
                    </div>
                    <img src="https://images.pexels.com/photos/256262/pexels-photo-256262.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="">
                </a>
            </div>
        </div>
    </aside>