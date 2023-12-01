<?php include('head.php'); ?>
<body>
<?php include('navbar.php'); ?>
<h1 class="contact-h1">Contact Us</h1>
    <div class="contactContainer">
        <div class="contactContainer__img">
            <img src="https://images.pexels.com/photos/851213/pexels-photo-851213.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="">
        </div>
        <div class="contactContainer__container">
          <div class="contactContainer__container__contact">
            <form class="contactContainer__container__contact__form">
                <input type="text" name="fullName" placeholder="Full Name">
                <input type="text" name="email" placeholder="E-mail">
                 <input type="text" name="message" placeholder="Message">
             <button type="submit">Contact Us</button>
             </form>
             <div class="contactContainer__container__contact__info">
                 <p>fayz@blog.com</p>
                  <ul class="contactContainer__container__contact__info__socials">
                     <li ><a href="#"><i class="fa-brands fa-facebook fa" ></i></a></li>
                     <li ><a href="#"><i class="fa-brands fa-instagram fa"></i></a></li>
                     <li ><a href="#"><i class="fa-brands fa-linkedin fa" ></i></a></li>
                     <li ><a href="#"><i class="fa-brands fa-twitter fa" ></i></a></li>
                 </ul>
             </div>
         </div>
    </div>
</div>
<?php include('footer.php'); ?>
</body>
</html>