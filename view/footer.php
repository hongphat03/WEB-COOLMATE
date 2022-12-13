<footer class="footer">
    <div class="container">
            <div class="footerrow row footerHide">
                <h5>Khám Phá COOLMATE</h5>
                <a href="">Áo Polo</a>
                <a href="">Áo T-shirt</a>
                <a href="">Áo Sơ mi</a>
                <a href="">Quần</a>
                <a href="">Quần lót</a>
                <a href="">Tất(vớ)</a>
                <a href="">Mũ(nón)</a>
                <a href="">Phụ kiện khác</a>
            </div>
            <div class="footerrow footerHide">
                <div class="row">
                    <h5>Dịch vụ khách hàng</h5>
                    <a href="">Hỏi đáp - FAQs</a>
                    <a href="">Chính sách đổi trả 60 ngày</a>
                    <a href="">Liên hệ</a>
                    <a href="">Thành viên Coolclub</a>
                    <a href="">Khách hàng hài lòng 100%</a>
                    <a href="">Chính sách khuyến mãi</a>
                    <a href="">Chính sách giao hàng</a>
                </div>
                <div class=" row">
                    <h5>Kiến thức mặc đẹp</h5>
                    <a href="">Hướng dẫn chọn size</a>
                    <a href="">Blog</a>
                    <a href="">Group mặc đẹp sống chất</a>
                </div>
            </div>
            <div class="footerrow footerHide">
                <div class="row">
                    <h5>Tài liệu - Tuyển dụng</h5>
                    <a href="">Tuyển dụng</a>
                    <a href="">Đăng ký bản quyền</a>
                </div>
                <div class="row">
                    <h5>Về COOLMATE</h5>
                    <a href="">Câu chuyện về Coolmate</a>
                    <a href="">Nhà máy</a>
                    <a href="">CoolClub</a>
                    <a href="">Care & Share</a>
                </div>

            </div>
            <div class="footerrow">
                <h5>Địa chỉ liên hệ</h5>
                <?php
                
                $sql = "select * from infor";
                $result = executeResult($sql);
                foreach($result as $row){
                ?>
                <p><?php if ($row['address']) echo $row['address'];} ?> </p>
            </div>
            <div class="footerrow row">
                <h5>COOLMATE lắng nghe bạn!</h5>
               
                <p style="padding-top: 20px;" > <i class="ti-mobile"></i> Hotline : <br>
                    <?php
                    foreach ($result as $row) {
                        if ($row['phone'])
                            echo $row['phone'];
                    }
                    ?>
                </p>
                <p > <i class="ti-email"></i> Email : <br>
                    <?php
                        foreach ($result as $row) {
                            if ($row['email'])
                                echo $row['email'];
                        }
                    ?>
                </p>
                <div class="link_footer footerHide">

                    <a href="<?php  foreach ($result as $row) { if($row['youtube']) echo $row['youtube']; }?>" class=""><i class="ti-youtube"></i></a>
                    <a href="<?php  foreach ($result as $row) { if($row['facebook']) echo $row['facebook'];}?>" class=""> <i class="ti-facebook"></i></a>
                </div>
            </div>
        </div>
</footer>