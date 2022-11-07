<?php include "_partial/top.php"; ?>

    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                        <span>Shopping cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- <h6 class="coupon__link"><span class="icon_tag_alt"></span> <a href="#">Have a coupon?</a> Click
                    here to enter your code.</h6> -->
                </div>
            </div>
            <!-- <form action="#" class="checkout__form"> -->
                <div class="row">
                    <div class="col-lg-8">
                        <h5>Invoice Pembayaran No. <?php echo $_GET['idtransaksi']; ?></h5>
                       
                        <div>
                        <span class="text" style="font-size: 13px; border-radius: 3px; font-weight: 700; color: rgb(255, 255, 255); background-color: rgb(255, 152, 0); padding: 2px 8px;">Belum Dibayar</span>
                        </div>
                        <div class="row">
                        <?php
                                include 'admin/db/database.php';
                                $i = 0;
                                $sql = "select * from db_user where email='".$_SESSION["userss"]."'";
                                //echo $sql;
                                $result = $conn->query($sql);
                                $total=0;
                                $poin=0;
                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {

                                        $poin = $row['poin'];
                                ?>

                                <?php    }
                                }else{
                                    echo "0 results";
                                }
                                ?>

                            <div class="col-lg-12">
                                <div class="checkout__form__checkbox">
                                    <label for="acc">
                                        <!-- Create an acount?
                                        <input type="checkbox" id="acc">
                                        <span class="checkmark"></span> -->
                                    </label>
                                    <!-- <p>Create am acount by entering the information below. If you are a returing
                                        customer login at the <br />top of the page</p> -->
                                    </div>
                                    <div class="checkout__form__input">
                                        <!-- <p>Account Password <span>*</span></p>
                                        <input type="text" > -->
                                    </div>
                                    <div class="checkout__form__checkbox">
                                        <!-- <label for="note">
                                            Note about your order, e.g, special noe for delivery
                                            <input type="checkbox" id="note">
                                            <span class="checkmark"></span>
                                        </label> -->
                                    </div>
                                    <div class="checkout__form__input">
                                        <!-- <p>Oder notes <span>*</span></p>
                                        <input type="text"
                                        placeholder="Note about your order, e.g, special noe for delivery"> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="checkout__order">
                                <h5>Your order</h5>
                                <div class="checkout__order__product">
                                    <ul>
                                        <li>
                                            <span class="top__text">Product</span>
                                            <span class="top__text__right">Total</span>
                                        </li>
                                        <?php
                                            include 'admin/db/database.php';
                                            $i = 0;
                                            $sql = "select ddt.*,db.images from db_transaksi dt
                                            join db_detail_trans ddt on ddt.id_transaksi = dt.id_transaksi
                                            join db_barang db on db.id_barang = ddt.id_barang
                                            where dt.email='".$_SESSION["userss"]."' and dt.status = 1 and dt.id_transaksi = '".$_GET['idtransaksi']."'";
                                            //echo $sql;
                                            $result = $conn->query($sql);
                                            $total=0;
                                            if ($result->num_rows > 0) {
                                                // output data of each row
                                                while($row = $result->fetch_assoc()) {

                                                    $total = $total + $row['sub_total'];
                                                    $idtransaksi = $row['id_transaksi'];
                                                    ?>

                                                    <li><?php echo $row['nama_barang'] ; ?> <span>Rp <?php echo number_format($row['sub_total']) ; ?></span></li>
                                            <?php    }
                                            }else{
                                                echo "0 results";
                                            }
                                            ?>

                                    </ul>
                                </div>

                                
                                <div class="checkout__order__total">
                                    <ul>
                                        
                                        <li>Subtotal <span>Rp <?php echo number_format($total) ; ?></span></li>
                                    </ul>
                                </div>
                                <div class="checkout__order__widget">
                                    <td>
                                    <a href="uploadbukti.php?id_transaksi=<?php echo $_GET['idtransaksi']; ?>"><button type="button"  class="btn  btn-primary">Konfirmasi Pembayaran</button></a>
                                    </td>
                                    <td>
                                <a href="index.php"><button type="button" class="btn btn-danger">Nanti</button></a>
                                    </td>
                                
                                </form>
                                
                                <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                                            &nbsp;
                  <p class="text">Pembayaran dapat dilakukan di rekening :</p>
                  <img src="images/bca.png" alt="bca">
                 
                  <td>
                   <h3>BCA</h3>
                   </td>   
                  <td>
                   431-1581-021
                   </td>
                   <td>
                   A/N FIB COLLECTION
                   </td>                         
                
                </div>
                <!-- /.col -->         

                            </div>
                        </div>
                    </div>
                <!-- </form> -->
            </div>
           
        </section>
        <!-- Checkout Section End -->

        <!-- Instagram Begin -->
        <div class="instagram">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                        <div class="instagram__item set-bg" data-setbg="img/instagram/insta-1.jpg">
                            <div class="instagram__text">
                                <i class="fa fa-instagram"></i>
                                <a href="#">@ ashion_shop</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                        <div class="instagram__item set-bg" data-setbg="img/instagram/insta-2.jpg">
                            <div class="instagram__text">
                                <i class="fa fa-instagram"></i>
                                <a href="#">@ ashion_shop</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                        <div class="instagram__item set-bg" data-setbg="img/instagram/insta-3.jpg">
                            <div class="instagram__text">
                                <i class="fa fa-instagram"></i>
                                <a href="#">@ ashion_shop</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                        <div class="instagram__item set-bg" data-setbg="img/instagram/insta-4.jpg">
                            <div class="instagram__text">
                                <i class="fa fa-instagram"></i>
                                <a href="#">@ ashion_shop</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                        <div class="instagram__item set-bg" data-setbg="img/instagram/insta-5.jpg">
                            <div class="instagram__text">
                                <i class="fa fa-instagram"></i>
                                <a href="#">@ ashion_shop</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                        <div class="instagram__item set-bg" data-setbg="img/instagram/insta-6.jpg">
                            <div class="instagram__text">
                                <i class="fa fa-instagram"></i>
                                <a href="#">@ ashion_shop</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Instagram End -->

        <!-- Footer Section Begin -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-7">
                        <div class="footer__about">
                            <div class="footer__logo">
                                <a href="./index.html"><img src="img/logo.png" alt=""></a>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                            cilisis.</p>
                            <div class="footer__payment">
                                <a href="#"><img src="img/payment/payment-1.png" alt=""></a>
                                <a href="#"><img src="img/payment/payment-2.png" alt=""></a>
                                <a href="#"><img src="img/payment/payment-3.png" alt=""></a>
                                <a href="#"><img src="img/payment/payment-4.png" alt=""></a>
                                <a href="#"><img src="img/payment/payment-5.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-5">
                        <div class="footer__widget">
                            <h6>Quick links</h6>
                            <ul>
                                <li><a href="#">About</a></li>
                                <li><a href="#">Blogs</a></li>
                                <li><a href="#">Contact</a></li>
                                <li><a href="#">FAQ</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-4">
                        <div class="footer__widget">
                            <h6>Account</h6>
                            <ul>
                                <li><a href="#">My Account</a></li>
                                <li><a href="#">Orders Tracking</a></li>
                                <li><a href="#">Checkout</a></li>
                                <li><a href="#">Wishlist</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-8 col-sm-8">
                        <div class="footer__newslatter">
                            <h6>NEWSLETTER</h6>
                            <form action="#">
                                <input type="text" placeholder="Email">
                                <button type="submit" class="site-btn">Subscribe</button>
                            </form>
                            <div class="footer__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-youtube-play"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        <div class="footer__copyright__text">
                            <p>Copyright &copy; <script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a></p>
                        </div>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer Section End -->

        <!-- Search Begin -->
        <div class="search-model">
            <div class="h-100 d-flex align-items-center justify-content-center">
                <div class="search-close-switch">+</div>
                <form class="search-model-form">
                     <input type="text" id="search-input" placeholder="Search here....." >
                    <input onclick="search()" type="submit" value="Go">
                </form>
            </div>
        </div>
        <!-- Search End -->
        <script>
            function voucher($voucher){
                //window.location = "http://localhost/rizdhan1/;
                window.location.href = "checkout.php?voucher="+$voucher;
            }
            function search(){
                //alert($isi);
               window.location = "shop.php?search="+document.getElementById("search-input").value;
            }
            function points(){
                if (document.getElementById('poin').checked) 
                {
                    window.location.href = "checkout.php?poin="+document.getElementById('poin').value;
                } else {
                    window.location.href = "checkout.php?poin=0";
                }
                // window.location.href = "checkout.php?voucher=";
            }
        </script>
        <!-- Js Plugins -->
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/jquery-ui.min.js"></script>
        <script src="js/mixitup.min.js"></script>
        <script src="js/jquery.countdown.min.js"></script>
        <script src="js/jquery.slicknav.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/jquery.nicescroll.min.js"></script>
        <script src="js/main.js"></script>
    </body>

    </html>