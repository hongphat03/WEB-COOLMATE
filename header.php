<div class="marquee">
        <div>
            <span> Nhập CMSHI50K Giảm 50k cho đơn hàng từ 449k</span>
            <span>Nhập CMADTHU2 Tặng Áo Recycle Active V1 169k cho đơn hàng từ 549k </span>
            <span> Nhập CMDKS20K Giảm 20k cho đơn hàng từ 249k </span>
        </div>
    </div> 
<div class="header">
        <div class="col-third">    
            <a href="">
            <img src="https://www.coolmate.me/images/logo-coolmate-white.svg" width="95px" height="76px" alt="Logo_coolmate">
            </a></div>
        <div class="col-third">
        <a href="http://localhost/COOLMATE/product/products.php"> Sản phẩm</a>
        <a href="http://localhost/COOLMATE/aboutcoolmate.php">Về Coolmate</a>
        <a href="" class="">Chọn Size</a>
        </div>
        <div class="pdr col-third">
            
        <?php 
        session_start();
        if(isset($_SESSION['email'])){ ?>
        <a class="" href="http://localhost/COOLMATE/user/account/info.php"> <i class="ti-user"></i></a>
        <?php } else{ ?>
        <a class="" href="http://localhost/COOLMATE/user/account/login.php"> <i class="ti-user"></i> Đăng nhập</a>
        <?php } ?>
        <a href="http://localhost/COOLMATE/user/product_in_cart.php"> <i class="ti-shopping-cart"></i> Giỏ hàng</a>
        </div>
</div>