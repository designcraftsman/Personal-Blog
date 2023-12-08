<?php include('head.php'); ?>
<body>
  <?php
    include('navbar.php');
    include('connection.php');
    
    $sqlQuery = 'SELECT * FROM posts';
    $postsStatement = $db->prepare($sqlQuery);
    $postsStatement->execute();
    $allPosts = $postsStatement->fetchAll();

    $selectedCategory = isset($_GET['categorie']) ? $_GET['categorie'] : null;
    
    if ($selectedCategory) {
        $filteredPosts = array_filter($allPosts, function ($post) use ($selectedCategory) {
            return $post['categorie'] === $selectedCategory;
        });
        $totalPosts = count($filteredPosts);
    } else {
        $totalPosts = count($allPosts);
    }
    
    $postsPerPage = 5;
    $totalPages = ceil($totalPosts / $postsPerPage);
    $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
    $startIndex = ($currentPage - 1) * $postsPerPage;

    if ($selectedCategory && $selectedCategory !== 'all') {
            $displayPosts = isset($filteredPosts) ?
            array_slice($filteredPosts, $startIndex, $postsPerPage) :
            array_slice($allPosts, $startIndex, $postsPerPage);
    } else {
            $displayPosts = array_slice($allPosts, $startIndex, $postsPerPage);
    }
  ?>

  <div class="postsContainer">
    <main class="postsContainer__posts">
      <div class="postsContainer__posts__categorieContainer">
        <label class="postsContainer__posts__categorieContainer__categorieLabel" for="categorie">Categorie :</label>
        <select class="postsContainer__posts__categorieContainer__categorie" name="categorie" id="categorie" onchange="filterCategorie(this.value)">
          <option value="all" <?php echo (!$selectedCategory || $selectedCategory === 'all') ? 'selected' : ''; ?>>All</option>
          <option value="lifestyle" <?php echo ($selectedCategory === 'lifestyle') ? 'selected' : ''; ?>>lifestyle</option>
          <option value="food" <?php echo ($selectedCategory === 'food') ? 'selected' : ''; ?>>food</option>
          <option value="health" <?php echo ($selectedCategory === 'health') ? 'selected' : ''; ?>>health</option>
          <option value="science" <?php echo ($selectedCategory === 'science') ? 'selected' : ''; ?>>science</option>
        </select>
      </div>
      
      <?php foreach ($displayPosts as $post) {?>
        <article class="postsContainer__posts__post" onclick="postPage(<?php echo($post['idPost']);?>)">
          <div class="postsContainer__posts__post__img">
            <img src="<?php echo $post['postImg']; ?>" alt="">
          </div>
          <div class="postsContainer__posts__post__content">
            <a href="#"><?php echo $post['categorie']; ?></a>
            <h3><?php echo $post['postTitle']; ?></h3>
            <p><?php echo $post['postContent']; ?></p>
          </div>
        </article>
      <?php } if($totalPosts > 5){?>
      <div class="pagination">
        <?php
            for ($i = 1; $i <= $totalPages; $i++) {
             echo "<a href='?page=$i&categorie=$selectedCategory'" . ($i == $currentPage ? " class='active'" : "") . ">$i</a>";
            }
            ?>
      </div>
      <?php }?>
    </main>
    <?php include('aside.php'); ?>
  </div>
  <?php include('footer.php'); ?>
  <script src="js/script.js"></script>
</body>
</html>
