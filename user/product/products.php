<?php
  require_once('../../database/dbhelper.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Coolmate - Giải pháp mua sắm cả tủ đồ cho nam giới - Coolmate</title>
  <link rel="stylesheet" href="../../view/css/stylefooter.css">
  <link rel="stylesheet" href="../../view/css/styleheader.css">
  <link rel="stylesheet" href="../../view/css/themify-icons/themify-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
  <link rel="stylesheet" href="style.css">
</head>

<body>
<?php
    $sql1="SELECT DISTINCT material FROM products";
    $all_products = executeResult($sql1);
    $sql2="SELECT DISTINCT type FROM products";
    $all_products2 = executeResult($sql2);
    include("../../view/header.php");
  ?>
  <div class=" main">
    <div class="menu">
      <nav class="navbar navbar-expand-lg bg-white">
        <div class="container-fluid">
        <div style="padding-top: 0px;" class="left_main">
              <i class="ti-menu"></i>
              <div class="nav_left_main">
                  <ul>
                      <li><a href="http://localhost/COOLMATE/">Trang chủ</a>
                          </li>
                      <li><a href="http://localhost/COOLMATE/aboutcoolmate.php">Về Coolmate</a>
                          </li>
                      <li><a href="" class="">Chọn Size</a></li>
                  </ul>
              </div>
          <!-- </div> -->
          </div>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <form method="post" action="">
                  <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0 text-white ">
                    <li class="nav-link px-2 link-white" >
                  <select name="Type" class="form-select selection" aria-label="Default select example">
                    <option value="">Loại áo</option>
                    <<?php
                      foreach($all_products2 as $single_product2)
                      {?>
                        <option value="<?php echo $single_product2["type"]?>"><?php echo $single_product2["type"]?></option>
                        <?php
                      }
                    ?>                      
                  </select>
                  </li> 
                  <li class="nav-link px-2 link-white">
                  <select name="material" id="" class="form-select" aria-label="Default select example"value="<?php echo $single_product["material"]?>">
                    <option value="">Loại vải</option>
                    <?php
                      foreach($all_products as $single_product)
                      {
                        ?>
                        <option value="<?php echo $single_product["material"]?>"><?php echo $single_product["material"]?></option>
                        <?php
                      }
                    ?>      
                  </select>
                   </li>
                   <li class="nav-link px-2 link-white">
                  <button > <i class="ti-search"></i></button>
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
            <div class="header_cart-swap showCart">
              <span class="header_cart-notice"><?php echo count($result) ?></span>
               <a href="../user/product_in_cart.php"> <i style="color: black;" class="ti-shopping-cart"></i> </a>                    
              <div class="header_cart-list <?php echo (count($result)==0) ? ' header_cart-list--no-cart' : 'header_cart-list--yes-cart' ?>"> 
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
                                <h5 class="header_cart-item-name"><?php echo $row2['name'] ?></h5>
                                <div class="header_cart-item-price-swap">
                                <span class="header_cart-item-price"><?php echo $row2['price'] ?>đ</span>
                                <span class="header_cart-item-mul">x</span>
                                <span class="header_cart-item-qnt"><?php echo $row['quantity'] ?></span>
                                </div>
                            </div>
                            <div class="header_cart-item-body">
                                <span class="header_cart-item-type">
                                  <span class="header_cart-item-type-1"><?php echo $row2['type'] ?></span>
                                  <span class="header_cart-item-type-2"> / <?php echo $row['size'] ?></span>
                                </span>                               
                                <form action="" method="post">
                                <button name="deleteProductInCart" class="header_cart-item-remove" value="<?php echo $idProduct ?>">Xóa</button>
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
             <!--end test-->         
        </div>
      </nav>
    </div>
    
    <?php
      $sql = "select * from products";
      $result = executeResult($sql);     
      if (!empty($_POST['Type'])) 
      {
        $type = $_POST['Type'];
        $result2 = [];
        foreach ($result as $row) {
          if ($row['type'] == $type) {$result2[] = $row;}
        }
        $result = [];
        $result = $result2;
      }
      if (!empty($_POST['material'])) 
      {
        $material = $_POST['material'];
        $result2 = [];
        foreach ($result as $row) {
          if ($row['material'] == $material){$result2[] = $row;}
        }
        $result = [];
        $result = $result2;
      }
      ?>
      <?php if (count($result) > 0): ?>
        <div class="content">
          <div class="row">
            <?php foreach ($result as $row): ?>
            <div class="col-12 col-sm-6 col-md-3 ">
              <div class="product">
                <a href="detailProduct.php?id=<?php echo $row["id"] ?>"><img
                    src="<?php echo $row["image"] ?>" class="data-mdb-attribute img-thumbnail" style="border: 0px; border-radius: 20px;" ></a>
                    <ul>
                      <li><a href="">S</a></li>
                      <li><a href="">M</a></li>
                      <li><a href="">L</a></li>
                      <li><a href="">XL</a></li>
                      <li><a href="">2XL</a></li>
                      <li><a href="">3XL</a></li>
                    </ul>
                <span style="color: black ;text-decoration: non-underline; ">
                  <?php echo $row["name"] ?>
                </span>
                <br>
                <span style="color: red;margin-left: 10px;">
                <?php echo ceil($row["price"]/1000) ?>.000đ
                </span>
                <span style="color: #c4c4c4;margin-left: 10px;"><del>
                <?php echo ceil($row["price"] * 100/90000) ?>.000đ
                  </del></span>
                <span style="color: red;margin-left: 10px;">-10%</span>
              </div>
            </div>
            <?php endforeach ?>
          </div>
        </div>
      <?php endif ?> 
  </div>
<div>
  <br>
<?php include("../../view/footer.php") ?>
</div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>
</body>
</html>

                    