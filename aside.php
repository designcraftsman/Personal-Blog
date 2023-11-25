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
                    <p><?php echo($post['postDate']); ?></p>
                 </div>   
            </article>
            <?php $i+=1;
            if($i>=5){
                break;
            }
        } ?>
        </div>
        <div class="asideSection__categories">
            <h2 class="asideSection__categories__title">Browse Categories</h2>
            <div class="asideSection__categories__categorie">Sport <span class="asideSection__categories__categorie__number">(15)</span></div>
            
            <div class="asideSection__categories__categorie">Lifestyle <span class="asideSection__categories__categorie__number">(07)</span></div>
            
            <div class="asideSection__categories__categorie">Health <span class="asideSection__categories__categorie__number">(25)</span></div>
           
            <div class="asideSection__categories__categorie">Science <span class="asideSection__categories__categorie__number">(08)</span></div>
           
        </div>
    </aside>