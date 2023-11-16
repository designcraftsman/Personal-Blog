<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal-Blog</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>  
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
   <div class="postsContainer">
        <main class="postsContainer__posts">
        <?php  foreach($posts as $post){ ?>
          <div class="postsContainer__posts__post">
             <div class="postsContainer__posts__post__img">
                <img src="<?php echo($post['postImg']); ?>" alt="">
              </div>
              <div class="postsContainer__posts__post__content">
                <a href="#"><?php echo($post['categorie']); ?></a>
                <h3><?php echo($post['postTitle']); ?></h3>
                <p><?php echo($post['postContent']); ?></p>
              </div>
           </div>
         <?php } ?>
        </main>
        <?php include('aside.php'); ?>
   </div>
   <?php include('footer.php'); ?>
</body>
</html>