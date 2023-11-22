<?php include('head.php'); ?>
<body>
  <?php include('navbar.php');
    include('connection.php');?>
   <div class="postsContainer">
        <main class="postsContainer__posts">
          <div class="postsContainer__posts__categorieContainer">
          <label class="postsContainer__posts__categorieContainer__categorieLabel" for="categorie">Categorie :</label>
          <select class="postsContainer__posts__categorieContainer__categorie"  name="categorie" id="categorie" onchange="filterCategorie(this.value)">
            <option >All</option>
            <option value="lifestyle" >lifestyle</option>
            <option value="food" >food</option>
            <option value="health" >health</option>
            <option value="science" >science</option>
          </select>
          <?php 
             $sqlQuery = 'SELECT * FROM posts';
             $postsStatement = $db->prepare($sqlQuery);
             $postsStatement->execute();
             $allPosts = $postsStatement->fetchAll();
             
             if (isset($_GET['categorie']) ) {
                 $selectedCategory = $_GET['categorie'];
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
             
             if (isset($_GET['categorie'])) {
                 $selectedCategory = $_GET['categorie'];
             
                 $displayPosts = isset($filteredPosts) ?
                     array_slice($filteredPosts, $startIndex, $postsPerPage) :
                     array_slice($allPosts, $startIndex, $postsPerPage);
             } else {
                 $displayPosts = array_slice($allPosts, $startIndex, $postsPerPage);
             }
          ?>
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
   <script src="js/script.js"></script>
</body>
</html>