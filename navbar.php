 <div class="navContainer">
    <div class="navContainer__navbar">
        <h1  class="navContainer__navbar__logo"><span class="navContainer__navbar__logo__style">VAUl</span>TIQ</h1>
        <form class="navContainer__navbar__search" action="blog.php" methode="GET">
            <i class="fa-brands fa-facebook-f fa-lg navContainer__navbar__search__icon" ></i>
            <i class="fa-brands fa-instagram fa-lg navContainer__navbar__search__icon" ></i>
            <i  class="fa-brands fa-twitter fa-lg navContainer__navbar__search__icon"></i>
            <input type="text" placeholder="Search" name="searchInput" class="navContainer__navbar__search__input">
            <button class="navContainer__navbar__search__btn" type="submit"><i class="fa-solid fa-magnifying-glass  navContainer__navbar__search__icon fa-lg"></i></button>
        </form>
        <div class="navContainer__navbar__navIcon">
            <i class="fa-solid fa-bars fa-xl" style="color: #ffffff;"></i>
        </div>
    </div>

    <nav class="navContainer__nav">
        <ul>
            <li class="navContainer__nav__link"><a class="navContainer__nav__link__a" href="index.php"><i class="fa-solid fa-house"></i> HOME</a></li>
            <li class="navContainer__nav__link"><a class="navContainer__nav__link__a"  href="blog.php"><i class="fa-solid fa-newspaper"></i> BLOG</a></li>
            <li id="categorieNav" class="navContainer__nav__link"><a class="navContainer__nav__link__a"  href=""><i class="fa-solid fa-layer-group"></i>  CATEGORY  <i class="fa-solid fa-chevron-down"></i> </a>
                 <ul class="navContainer__nav__link__list">
                    <li class="navContainer__nav__link__list__categorie"><a  class="navContainer__nav__link__list__categorie__a" href="blog.php?categorie=lifestyle">Lifestyle</a></li>
                    <li class="navContainer__nav__link__list__categorie"><a class="navContainer__nav__link__list__categorie__a" href="blog.php?categorie=health">Health</a></li>
                    <li class="navContainer__nav__link__list__categorie"><a class="navContainer__nav__link__list__categorie__a" href="blog.php?categorie=food">Food</a></li>
                    <li class="navContainer__nav__link__list__categorie"><a class="navContainer__nav__link__list__categorie__a" href="blog.php?categorie=science">Science</a></li>
                 </ul>
            </li>
            <li class="navContainer__nav__link"><a class="navContainer__nav__link__a"  href="contact.php"><i class="fa-solid fa-address-book"></i>  CONTACT</a></li>
            <li class="navContainer__nav__link special"><a class="navContainer__nav__link__a"  href="about.php"><i class="fa-solid fa-circle-info"></i>  ABOUT</a></li>
        </ul>
        <hr>
    </nav>
</div>
