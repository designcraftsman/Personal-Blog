<?php include('head.php'); ?>
<body>
  <?php include('navbar.php');
    include('connection.php');?>
   <div class="postsContainer">
        <main class="postsContainer__posts">
          <div class="postsContainer__posts__categorieContainer">
          <label class="postsContainer__posts__categorieContainer__categorieLabel" for="categorie">Categorie :</label>
          <select class="postsContainer__posts__categorieContainer__categorie" value="all" name="categorie" id="categorie" onchange="filterCategorie(this.value)">
            <option value="all">All</option>
            <option value="lifestyle" >lifestyle</option>
            <option value="sport" >sport</option>
            <option value="health" >health</option>
            <option value="science" >science</option>
          </select>
          <?php 
             if(isset($_GET['categorie'])){
              $categorie = $_GET['categorie'];
                  switch ($categorie){
                   case "lifestyle":
                   case "sport":
                   case "health":
                   case "science": 
                    $sqlQuery = "SELECT * FROM posts where categorie = '$categorie' ";
                    $postsStatement = $db->prepare($sqlQuery);
                    $postsStatement->execute();
                    $posts = $postsStatement->fetchAll();
                    $totalPosts = count($posts);
                    $postsPerPage = 4;
                    $totalPages = ceil($totalPosts/$postsPerPage);
                   break;
                  }
             } else{
                   $sqlQuery = "SELECT * FROM posts  ";
                   $postsStatement = $db->prepare($sqlQuery);
                   $postsStatement->execute();
                   $posts = $postsStatement->fetchAll();
                   $totalPosts = count($posts);
                   $postsPerPage = 4;
                   $totalPages = ceil($totalPosts/$postsPerPage);
             }
          ?>
          </div>
            <?php  
            $currentPage = isset($_GET['page'])?$_GET['page']:1;
            $startIndex = ($currentPage - 1) * $postsPerPage;
            $displayPosts = array_slice($posts, $startIndex, $postsPerPage);              
            foreach ($displayPosts as $post) {
           ?>
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