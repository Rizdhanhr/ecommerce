<?php include "_partial/top.php"; ?>
    <!-- Header Section End -->
    <style type="text/css">
    #counter{
            width: 410px;
            background: #ff190b;
            box-shadow: 0px 2px 9px 0px black;
        }
#mask {
  position: absolute;
  left: 0;
  top: 0;
  z-index: 9000;
  background-color: #000;
  display: none;
}

#boxes .window {
  position: absolute;
  left: 0;
  top: 0;
  width: 440px;
  height: 200px;
  display: none;
  z-index: 9999;
  padding: 20px;
  border-radius: 15px;
  text-align: center;
}

#boxes #dialog {
  width: 525px;
  height: 300px;
  padding: 10px;
  background-color: #ffffff;
  font-family: 'Segoe UI Light', sans-serif;
  font-size: 15pt;
  background-image: url("img/banner-game.png");
  background-size: 525px;
}

#popupfoot {
  font-size: 16pt;
  position: absolute;
  bottom: 0px;
  width: 250px;
  left: 250px;
}
</style>
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./index.html"><i class="fa fa-home"></i> Transaksi</a>
                        <span>Redeem Voucher</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shop Cart Section Begin -->
    <section class="shop-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shop__cart__table">
                        <table class="table table-head-fixed text-nowrap">
                            <thead>
                                <tr>
                                    <th>Voucher</th>
                                    <th>Time</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                  
                                  include 'admin/db/database.php';
                                    $i = 0;
                                    $poin = mysqli_query($conn, "SELECT tipe_member,poin FROM db_user where email = '".$_SESSION["userss"]."'");
                                    while ($poincount = mysqli_fetch_array($poin)) {
                                        $query = mysqli_query($conn, 'SELECT * FROM db_voucher where (now() between tgl_start and tgl_end) and poin <= '. $poincount['poin'].' and status_member in ("all","'.$poincount['tipe_member'].'")' );
                                        //  echo 'SELECT * FROM db_voucher where poin <= '. $poincount['poin'].' and status_member in ("all","'.$poincount['tipe_member'].'")';
                                        while ($data = mysqli_fetch_array($query)) {
                                       
                            ?>
                                    <tr>              
                                    <td style="text-align: left;"><img src="admin/images/<?php echo $data['gambar']; ?>" style="width: 350px;"></td>
                                    <td><p  style="color:red;" id="counter<?php echo $data['kode_voucher']?>"></p> </td>
                                  <?php if( $data['poin'] <= $poincount['poin']){ ?>
                                    <td><a href="insertredeem.php?kodevoucher=<?php echo $data['kode_voucher']?>" class="btn btn-success">Redeem Voucher</a></td>
                                   <?php }else{?>
                                    <td><p class="btn btn-warning">Poin anda tidak cukup</p></td>
                                   <?php } ?>
                                </tr>
                            <?php }
                            } ?>
                                    
                                    
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- Shop Cart Section End -->

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
    <?php
                    include 'admin/db/database.php';
                    $i = 0;
                    $poin = mysqli_query($conn, "SELECT tipe_member,poin FROM db_user where email = '".$_SESSION["userss"]."'");
                    while ($poincount = mysqli_fetch_array($poin)) {
                        $query = mysqli_query($conn, 'SELECT * FROM db_voucher where (now() between tgl_start and tgl_end) and poin <= '. $poincount['poin'].' and status_member in ("all","'.$poincount['tipe_member'].'")' );
                        //  echo 'SELECT * FROM db_voucher where poin <= '. $poincount['poin'].' and status_member in ("all","'.$poincount['tipe_member'].'")';
                        while ($data = mysqli_fetch_array($query)) {
                            // $enddate = $row['flash'];
                                if(!empty($data['kode_voucher'])){
                                    ?>
                                    <script>
                                    // Set the date we're counting down to
                                    var countDownDate = new Date("<?php echo $data['tgl_end']; ?>").getTime();

                                    // Update the count down every 1 second
                                    var x = setInterval(function() {

                                    // Get today's date and time
                                    var now = new Date().getTime();

                                    // Find the distance between now and the count down date
                                    var distance = countDownDate - now;

                                    // Time calculations for days, hours, minutes and seconds
                                    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                                    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                                    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                                    // Display the result in the element with id="demo"
                                    document.getElementById("counter<?php echo  $data['kode_voucher']?>").innerHTML = days + "d " + hours + "h "
                                    + minutes + "m " + seconds + "s ";

                                    // If the count down is finished, write some text
                                    if (distance < 0) {
                                        clearInterval(x);
                                        document.getElementById("counter<?php echo $data['kode_voucher']?>").innerHTML = "EXPIRED";
                                    }
                                    }, 1000);
                                    </script>
                     <?php      
                                }
                        }

                    }

                ?>
    <script>
            function voucher($voucher){
                //window.location = "http://localhost/rizdhan1/;
                window.location.href = "checkout.php?voucher="+$voucher;
            }
            function search(){
               // alert($isi);
               window.location.href = "shop.php?search="+document.getElementById("search-input").value;
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