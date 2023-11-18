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
    $totalPosts = count($posts);
    $postsPerPage = 4;
    $totalPages = ceil($totalPosts/$postsPerPage);
    $currentPage = isset($_GET['page'])?$_GET['page']:1;
    $startIndex = ($currentPage - 1) * $postsPerPage;
    $displayPosts = array_slice($posts, $startIndex, $postsPerPage);
?>
   <div class="postsContainer">
        <main class="postsContainer__posts">
          <div class="postsContainer__posts__categorieContainer">
          <label class="postsContainer__posts__categorieContainer__categorieLabel" for="categorie">Categorie :</label>
          <select class="postsContainer__posts__categorieContainer__categorie" name="categorie" id="categorie">
            <option value="All">All</option>
            <option value="lifestyle">lifestyle</option>
            <option value="sport">sport</option>
            <option value="health">health</option>
            <option value="science">science</option>
          </select>
          </div>
            <?php  foreach ($displayPosts as $post) {
           ?>
        <div class="postsContainer__posts__post">
          <div class="postsContainer__posts__post__img">
            <img src="<?php echo $post['postImg']; ?>" alt="">
        </div>
        <div class="postsContainer__posts__post__content">
            <a href="#"><?php echo $post['categorie']; ?></a>
            <h3><?php echo $post['postTitle']; ?></h3>
            <p><?php echo $post['postContent']; ?></p>
        </div>
      </div>
    <?php
  }
  ?>
        </main>
        <?php include('aside.php'); ?>
   </div>
   <div class="pagination">
      <?php
        for ($i = 1; $i <= $totalPages; $i++) {
            echo "<a href='?page=$i'" . ($i == $currentPage ? " class='active'" : "") . ">$i</a>";
        }
        ?>
    </div>
   <?php include('footer.php'); ?>
</body>
</html>