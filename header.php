<div class="header">
        <div class="col-third">    
            <a href="">
            <img src="https://www.coolmate.me/images/logo-coolmate-white.svg" width="95px" height="76px" alt="Logo_coolmate">
            </a></div>
        <div class="col-third">
        <a href="./product/products.php"> Sản phẩm</a>
        <a href="" class="">Về Coolmate</a>
        <a href="" class="">Chọn Size</a>
        </div>
        <div class="pdr col-third">
            
        <?php 
        session_start();
        if(isset($_SESSION['email'])){ ?>
        <a class="" href="user/account/info.php"> <i class="ti-user"></i></a>
        <?php } else{ ?>
        <a class="" href="user/account/login.php"> <i class="ti-user"></i> Đăng nhập</a>
        <?php } ?>
        <a href="user/product_in_cart.php"> <i class="ti-shopping-cart"></i> Giỏ hàng</a>
        </div>
</div>