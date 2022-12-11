<?php
require_once('../database/dbhelper.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="../assets/styleheader.css">
    <link rel="stylesheet" href="../assets/stylefooter.css">
    <link rel="stylesheet" href="../assets/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="../assets/stylemain.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <?php
    $sql1 = "SELECT DISTINCT material FROM products";
    $all_products = executeResult($sql1);
    $sql2 = "SELECT DISTINCT type FROM products";
    $all_products2 = executeResult($sql2);
    $sql3 = "SELECT *  FROM products";
    $all_products3 = executeResult($sql3);
    $ProductId = $_GET['id'];
    if (isset($_POST['add'])) {
        if (empty($_SESSION['email'])) {
            header('Location: ../user/login.php');
        } else {
            $email = $_SESSION['email'];
            $sql = "select id from members where email='$email'";
            $result = execute($sql);
            $UserId;

            $size = $_POST['size'];
            $quantity = $_POST['quantity'];
            foreach ($result as $row) {
                $UserId = $row['id'];
            }
            $sql = "insert into products_in_cart (productId,size,quantity) values ('$ProductId','$size','$quantity')";
            execute($sql);
        }

    }
    ?>
    <div class="marquee">
        <div>
            <span> Nhập CMSHI50K Giảm 50k cho đơn hàng từ 449k</span>
            <span>Nhập CMADTHU2 Tặng Áo Recycle Active V1 169k cho đơn hàng từ 549k </span>
            <span> Nhập CMDKS20K Giảm 20k cho đơn hàng từ 249k </span>
        </div>
    </div>
    <div class=" main">
        <div class="header">
            <div class="col-third">
                <a href="../">
                    <img src="https://www.coolmate.me/images/logo-coolmate-white.svg" width="95px" height="76px"
                        alt="Logo_coolmate">
                </a>
            </div>
            <div class="col-third">
                <a href="products.php"> Sản phẩm</a>
                <a href="" class="">Về Coolmate</a>
                <a href="" class="">Chọn Size</a>
            </div>
            <div class="pdr col-third">
                <a class="" href="../user/login.php"> <i class="ti-user"></i> Đăng nhập</a>
            </div>
        </div>

        <div class="menu">
            <nav class="navbar navbar-expand-lg bg-white">
                <div class="container-fluid">
                    <p class="navbar-brand" href="#">Sản Phẩm</p>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse " id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <form method="post" action="">
                                    <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0 text-white ">
                                        <li class="nav-link px-2 link-white">
                                            <select name="Type" class="form-select selection"
                                                aria-label="Default select example">
                                                <option value="">Tất cả</option>
                                                <?php foreach ($all_products2 as $single_product2) { ?>
                                                <option value="<?php echo $single_product2["type"] ?>">
                                                    <?php echo $single_product2["type"] ?>
                                                </option>
                                                <?php } ?>
                                            </select>
                                        </li>
                                        <li class="nav-link px-2 link-white">
                                            <select name="material" id="" class="form-select"
                                                aria-label="Default select example"
                                                value="<?php echo $single_product["material"] ?>">
                                                <option value="">Tất cả</option>
                                                <?php foreach ($all_products as $single_product) { ?>
                                                <option value="<?php echo $single_product["material"] ?>">
                                                    <?php echo $single_product["material"] ?>
                                                </option>
                                                <?php } ?>
                                            </select>
                                        </li>
                                        <li class="nav-link px-2 link-white ">
                                            <button class="btn btn-success"><a href="products.php"
                                                    class="button">Tìm</a></button>
                                        </li>
                                    </ul>
                                </form>
                            </li>
                        </ul>
                        <?php
                        $spp = 0;
                        $product = "";
                        if (isset($_POST['deleteProductInCart'])) {
                            $idProduct = $_POST['deleteProductInCart'];
                            $sql = "delete from products_in_cart where productId = '$idProduct' LIMIT 1";
                            execute($sql);
                        }
                        $sql = "select * from products_in_cart";
                        $result = executeResult($sql);
                        ?>
                        <div class="col-md-3 text-end header_cart">
                            <div class="header_cart-swap">
                                <span class="header_cart-notice">
                                    <?php echo count($result) ?>
                                </span>
                                <a href="../user/product_in_cart.php"><img
                                        src="https://lzd-img-global.slatic.net/g/tps/tfs/TB1xEeTdBGw3KVjSZFDXXXWEpXa-75-66.png"
                                        class="btn btn-primary me-5" style="height:30px ;width=30px"></a>
                                <!-- No cart:header_cart-list--no-cart  <div class="header_cart-list header_cart-list--no-cart header_cart-list--yes-cart">-->
                                <div
                                    class="header_cart-list <?php echo (count($result) == 0) ? ' header_cart-list--no-cart' : 'header_cart-list--yes-cart' ?>">
                                    <img src="https://deo.shopeemobile.com/shopee/shopee-pcmall-live-sg/productdetailspage/4122b759f91bd8dce310f1bc691e78ad.png"
                                        alt="" class="header_cart-no-cart-img">
                                    <span class="header_cart-list-no-cart-msg">Chưa có sản phẩm</span>
                                    <h4 class="header_cart-heading">Sản phẩm đã thêm</h4>
                                    <ul class="header_cart-list-item">
                                        <?php
                                        if (count($result) > 0) {

                                            foreach ($result as $row) {
                                                $idProduct = $row['productId'];
                                                $sql2 = "select * from products where id = '$idProduct'";
                                                $result2 = executeResult($sql2);
                                                foreach ($result2 as $row2) { ?>
                                        <li class="header_cart-item">
                                            <img src="<?php echo $row2['image'] ?>" alt="" class="header_cart-img">
                                            <div class="header_cart-item-info">
                                                <div class="header_cart-item-head">
                                                    <h5 class="header_cart-item-name">
                                                        <?php echo $row2['name'] ?>
                                                    </h5>
                                                    <div class="header_cart-item-price-swap">
                                                        <span class="header_cart-item-price">
                                                            <?php echo $row2['price'] ?>đ
                                                        </span>
                                                        <span class="header_cart-item-mul">x</span>
                                                        <span class="header_cart-item-qnt">
                                                            <?php echo $row['quantity'] ?>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="header_cart-item-body">
                                                    <span class="header_cart-item-type">
                                                        <span class="header_cart-item-type-1">
                                                            <?php echo $row2['type'] ?>
                                                        </span>
                                                        <span class="header_cart-item-type-2"> /
                                                            <?php echo $row['size'] ?>
                                                        </span>
                                                    </span>
                                                    <form action="" method="post">
                                                        <button name="deleteProductInCart"
                                                            class="header_cart-item-remove"
                                                            value="<?php echo $idProduct ?>">Xóa</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </li>
                                        <?php
                                                    $product .= "$idProduct ";
                                        ?>
                                        <?php }
                                            }
                                        } ?>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>

        <div class="content">
            <div class="row ">
                <div class=" col-sm-6  product-singer2 ">
                    <div class="product-singer">
                        <?php foreach ($all_products3 as $row4):
                            if ($row4['id'] == $ProductId) { ?>
                        <div>
                            <img src="<?php echo $row4["image"] ?>" class="data-mdb-attribute img-thumbnail ">

                        </div>
                        <?php }endforeach ?>

                    </div>
                </div>
                <div class=" col-sm-6  product-singer2">
                    <div class="row ">
                        <?php foreach ($all_products3 as $row1):
                            if ($row1['id'] == $ProductId) { ?>
                        <div>
                            <span style="color: black ;text-decoration: non-underline;font-size: 0.5rem;">
                                <h1>
                                    <?php echo $row1["name"] ?>
                                </h1>
                            </span>
                            <br>
                            <span style="color: red;margin-left: 10px;">
                                <?php echo ceil($row1["price"] / 1000) ?>.000đ
                            </span>
                            <span style="color: #c4c4c4;margin-left: 10px;"><del>
                                    <?php echo ceil($row1["price"] * 100 / 90000) ?>.000đ
                                </del></span>
                            <span style="color: red;margin-left: 10px;">-10%</span>
                        </div>
                        <br>
                        <?php }endforeach ?>

                        <div>
                            <h5 style="margin-top: 10px;"> Kích thước Áo: <span class="example">Chưa chọn size</span> </h5>
                            <form method="post" action="">
                                <input type="hidden" name="ProductId" value="<?php echo $ProductId ?>">
                                <input value="S" onclick="updateSize(id)" type="radio" class="btn-check "
                                    name="size" id="0" autocomplete="off">
                                <label class="btn btn-secondary btn-outline-dark me-2 button btn-lg"
                                    for="0">S</label>
                                <input value="M" onclick="updateSize(id)" type="radio" class="btn-check" name="size"
                                    id="1" autocomplete="off">
                                <label class="btn btn-secondary btn-outline-dark me-2 button btn-lg"
                                    for="1">M</label>
                                <input value="L" onclick="updateSize(id)" type="radio" class="btn-check" name="size"
                                    id="2" autocomplete="off">
                                <label class="btn btn-secondary btn-outline-dark me-2 button btn-lg"
                                    for="2">L</label>
                                <input value="XL" onclick="updateSize(id)" type="radio" class="btn-check"
                                    name="size" id="3" autocomplete="off">
                                <label class="btn btn-secondary btn-outline-dark me-2 button btn-lg"
                                    for="3">XL</label>
                                <input value="XXL" onclick="updateSize(id)" type="radio" class="btn-check"
                                    name="size" id="4" autocomplete="off">
                                <label class="btn btn-secondary btn-outline-dark me-2 button  btn-lg"
                                    for="4">XXL</label>
                                <br>
                                <br>
                                <label for="quantity" class="col-sm-2 col-form-label">
                                    <h5> Số Lượng:</h5>
                                </label>
                                <input type="number" value="1" max="99" min="1" name="quantity">
                                <button class="btn btn-success" name="add">Thêm vào giỏ hàng</button>

                            </form>
                            <script scr="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js">
                                function updateSize(id) {
                                    let elements = document.getElementsByName("size");
                                    const collection = document.getElementsByClassName("example");
                                    if (id == "0") {
                                        collection[0].innerHTML = elements[0].value;
                                    } else if (id == "1") {
                                        collection[0].innerHTML = elements[1].value;
                                    } else if (id == "2") {
                                        collection[0].innerHTML = elements[2].value;
                                    } else if (id == "3") {
                                        collection[0].innerHTML = elements[3].value;
                                    } else if (id == "4") { collection[0].innerHTML = elements[4].value; }
                                }

                            </script>
                        </div>
                    </div>
                    <hr>
                    <div class="container-fluid">
                        <div class="row ">
                            <!-- Gallery Item 1 -->
                            <div class="col-4">
                                <div class="d-flex flex-column text-center height100">
                                    <div>
                                        <img src="https://www.coolmate.me/images/icons/icon3.svg" />
                                    </div>
                                    <p>Đổi trả cực dễ <br>chỉ cần số điện thoại</p>
                                </div>
                            </div>
                            <!-- Gallery Item 2 -->
                            <div class="col-4">
                                <div class="d-flex flex-column text-center height100">
                                    <div>
                                        <img src="https://www.coolmate.me/images/icons/icon4.svg" />
                                    </div>
                                    <p>Miễn phí vận chuyển <br>cho đơn hàng trên 200k</p>
                                </div>
                            </div>
                            <!-- Gallery Item 3 -->
                            <div class="col-4">
                                <div class="d-flex flex-column text-center height100">
                                    <div>
                                        <img src="https://www.coolmate.me/images/icons/icon5.svg" />
                                    </div>
                                    <p>60 ngày đổi trả <br>vì bất kỳ lý do gì</p>
                                </div>
                            </div>
                            <!-- Gallery Item 4 -->
                            <div class="col-4">
                                <div class="d-flex flex-column text-center height100">
                                    <div>
                                        <img src="https://www.coolmate.me/images/icons/icon2.svg" />
                                    </div>
                                    <p>Hotline 1900.27.27.37<br> hỗ trợ từ 8h30 - 22h mỗi ngày</p>
                                </div>
                            </div>
                            <!-- Gallery Item 5 -->
                            <div class="col-4">
                                <div class="d-flex flex-column text-center height100">
                                    <div>
                                        <img src="https://www.coolmate.me/images/icons/icon1.svg" />
                                    </div>
                                    <p>Đến tận nơi nhận hàng trả,<br> hoàn tiền trong 24h</p>
                                </div>
                            </div>
                            <!-- Gallery Item 6 -->
                            <div class="col-4">
                                <div class="d-flex flex-column text-center height100">
                                    <div>
                                        <img src="https://www.coolmate.me/images/icons/icon6.svg" />
                                    </div>
                                    <p>Giao hàng nhanh toàn quốc</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <h5> Đặc điểm nổi bật :</h5>
                    
                    <div class="row">
                        <div >
                            <?php foreach ($all_products3 as $row1):
                            if ($row1['id'] == $ProductId) { ?>
                            <br>
                            <div style="font-size: 20px;line-height: 1.5em;line-height: 1.9em;padding-left: 15px;">
                                <p>
                                    <?php                                   
                                    $search = ['<br />', 'Chất'];
                                    $replace = ['<br /> -', '- Chất']; 
                                    echo str_replace($search,$replace, nl2br($row1["description"])); ?>
                                    
                                </p>
                            </div>
                            <?php }endforeach ?>
                        </div>
                    </div>

                </div>
            </div>
            
        </div>

    </div>
    <div>
        <br>
        <?php include '../footer.php' ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></scrip >

            </body >

</html >