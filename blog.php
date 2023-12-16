<?php include('head.php'); ?>
<body>
  <?php
    include('navbar.php');
    include('connection.php');
    


    if(isset($_GET['searchInput'])){
      $search = $_GET['searchInput'];
      $sqlQuery = 'SELECT * FROM posts WHERE postTitle LIKE "%' . $search . '%" OR postContent LIKE "%' . $search . '%"';
    }
    else{
      $sqlQuery = 'SELECT * FROM posts';
    }
    $postsStatement = $db->prepare($sqlQuery);
    $postsStatement->execute();
    $allPosts = $postsStatement->fetchAll();

    $selectedCategory = isset($_GET['categorie']) ? $_GET['categorie'] : null;
    
    if ($selectedCategory) {
        $filteredPosts = array_filter($allPosts, function ($post) use ($selectedCategory) {
            return $post['categorie'] === $selectedCategory;
        });
        $totalPosts = count($filteredPosts);
    }else {
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
            $category = $selectedCategory;
    } else {
            $displayPosts = array_slice($allPosts, $startIndex, $postsPerPage);
            $category = 'All';
    }
  ?>


  <div class="postsContainer">
    <main class="postsContainer__posts">
    <div class="postsContainer__posts__categorieContainer">
        <div class="postsContainer__posts__categorieContainer__categorieLabel" for="categorie">Category > <?php echo($category); ?></div>
        <div lcass="postsContainer__posts__categorieContainer__search">
          <input class="postsContainer__posts__categorieContainer__search__input" placeholder="Search stories, people or places..." type="text"></input>
          <button class="postsContainer__posts__categorieContainer__search__btn"><i class="fa-solid fa-magnifying-glass fa navContainer__navbar__search__icon"></i> Search</button>
        </div>
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
