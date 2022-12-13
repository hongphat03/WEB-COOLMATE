<div class="marquee">
        <div>
            <span> Nhập CMSHI50K Giảm 50k cho đơn hàng từ 449k</span>
            <span>Nhập CMADTHU2 Tặng Áo Recycle Active V1 169k cho đơn hàng từ 549k </span>
            <span> Nhập CMDKS20K Giảm 20k cho đơn hàng từ 249k </span>
        </div>
    </div> 
<div class="header">
        <div class="col-third mgt28">    
            <a href="http://localhost/coolmate/">
            <img src="https://www.coolmate.me/images/logo-coolmate-white.svg" width="95px" height="50px" alt="Logo_coolmate">
            </a></div>
        <div class="col-third headerHide">
        <a href="http://localhost/coolmate/user/product/products.php"> Sản phẩm</a>
        <a href="http://localhost/coolmate/view/aboutcoolmate.php">Về Coolmate</a>
        <a href="" class="">Chọn Size</a>
        </div>
        <div class="pdr headerHide col-third " style="padding-top: 10px;">
            
        <?php 
        session_start();
        if(isset($_SESSION['email'])){ ?>
        <a class="" href="http://localhost/coolmate/user/account/info.php"> <i class="ti-user"></i></a>
        <?php } else{ ?>
        <a class="" href="http://localhost/coolmate/user/account/login.php"> <i class="ti-user"></i> Đăng nhập</a>
        <?php } ?>
        <a href="http://localhost/coolmate/user/product/product_in_cart.php"> <i class="ti-shopping-cart"></i> Giỏ hàng</a>
        </div>
        <div class="pdr headerAppear col-third " style="padding-top: 10px;"> 
        <?php 
        if(isset($_SESSION['email'])){ ?>
        <a class="" href="http://localhost/coolmate/user/account/info.php"> <i class="ti-user"></i></a>
        <?php } else{ ?>
        <a class="" href="http://localhost/coolmate/user/account/login.php"> <i class="ti-user"></i></a>
        <?php } ?>
        <a href="http://localhost/coolmate/user/product/product_in_cart.php"> <i class="ti-shopping-cart"></i></a>
        </div>

    </div>
