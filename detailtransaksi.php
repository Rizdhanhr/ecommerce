<?php include "_partial/top.php"; ?>
    <!-- Header Section End -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

<style>
    .rating-header {
    margin-top: -10px;
    margin-bottom: 10px;
}
</style>
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./index.html"><i class="fa fa-home"></i>Transaksi</a>
                        <span>Beri Ulasan</span>
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
                        <table>
                            <thead>
                                <tr>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Gambar Barang</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                include 'admin/db/database.php';
                                $i = 0;
                                $sql = "select * from (
                                    SELECT ddt.*,db.images,dk.komen from db_detail_trans ddt
                                    join db_barang db on ddt.id_barang = db.id_barang
                                    left join db_komen dk on dk.id_barang = ddt.id_barang  and dk.id_transaksi = ddt.id_transaksi
                                    where ddt.id_transaksi= '".$_GET["id_transaksi"]."'
                                ) hasil where komen is null";
                                $result = $conn->query($sql);
                                $total=0;
                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {

                                        ?>
                                        <tr>
                                            <td class="cart__quantity">
                                                <div class="cart__product__item__title">
                                                    <h6><?php echo $row['id_barang'] ; ?></h6>
                                                </div>
                                            </td>
                                            <td class="cart__quantity">
                                                <!-- <div class="pro-qty"> -->
                                                    <?php echo $row['nama_barang'] ; ?>

                                                <!-- </div> -->
                                            </td>
                                            <td class="cart__quantity">
                                                <!-- <div class="pro-qty"> -->

                                                    <?php echo "<img src='./admin/images/produk/".$row['images']."' width='100px' height='100px'/>"; ?>
                                                <!-- </div> -->
                                            </td>

                                            <td class="cart__quantity">
                                                <!-- <div class="pro-qty"> -->
                                            <?php if(is_null($row['images']) ){
                                                echo "Anda memberi komen, '".$row['komen']."'"   ;
                                            }else{ ?>
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?php echo $row['id_barang'] ; ?>">
                                                Beri Ulasan
                                                </button>
                                            <?php } ?>
                                                <!-- </div> -->
                                            </td>

                                        </tr>
                                <?php    }
                                }else{
                                    echo "0 results";
                                }
                                ?>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- Shop Cart Section End -->

    <?php
                                include 'admin/db/database.php';
                                $i = 0;
                                $sql = "select * from (
                                    SELECT ddt.*,db.images,dk.komen from db_detail_trans ddt
                                    join db_barang db on ddt.id_barang = db.id_barang
                                    left join db_komen dk on dk.id_barang = ddt.id_barang  and dk.id_transaksi = ddt.id_transaksi
                                    where ddt.id_transaksi= '".$_GET["id_transaksi"]."' 
                                ) hasil where komen is null";
                              //  echo $sql;
                                $result = $conn->query($sql);
                                $total=0;
                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {

                                        ?>
                                        <div class="modal fade" id="exampleModal<?php echo $row['id_barang'] ; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Beri Ulasan Barang <?php echo $row['nama_barang'] ; ?></h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                <form role="form" action="insertkomenrating.php" method="post" enctype="multipart/form-data">
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                        <label for="kategori">Rating</label>
                                                        <div class="form-group" id="rating-ability-wrapper">
                                                            <label class="control-label" for="rating">

                                                            <span class="field-label-info"></span>
                                                            <input type="hidden" id="selected_rating" name="selected_rating" value="" required="required">
                                                            </label>
                                                            <!-- <h2 class="bold rating-header" style="">
                                                            <span class="selected-rating">0</span><small> / 5</small>
                                                            </h2> -->
                                                            <input type="hidden" id="nilairating" name="nilairating" value=0 min=0 />
                                                            <input type="hidden" id="id_barang" name="id_barang" value="<?php echo $row['id_barang'] ; ?>" />
                                                            <input type="hidden" id="id_transaksi" name="id_transaksi" value="<?php echo $row['id_transaksi'] ; ?>" />
                                                            <button type="button" class="btnrating btn btn-default btn-lg" data-attr="1" id="rating-star-1">
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                            </button>
                                                            <button type="button" class="btnrating btn btn-default btn-lg" data-attr="2" id="rating-star-2">
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                            </button>
                                                            <button type="button" class="btnrating btn btn-default btn-lg" data-attr="3" id="rating-star-3">
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                            </button>
                                                            <button type="button" class="btnrating btn btn-default btn-lg" data-attr="4" id="rating-star-4">
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                            </button>
                                                            <button type="button" class="btnrating btn btn-default btn-lg" data-attr="5" id="rating-star-5">
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                            </button>
                                                        </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="kategori">Komentar</label>
                                                            <textarea id="komen" name="komen" rows="4" cols="50">
                                                            </textarea>
                                                        </div>

                                                    </div>
                                                    <!-- /.card-body -->

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>

                                                </form>
                                                </div>
                                            </div>
                                        </div>
                                <?php    }
                                }else{
                                    echo "0 results";
                                }
                                ?>

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

    <script>
        	jQuery(document).ready(function($){

        $(".btnrating").on('click',(function(e) {

        var previous_value = $("#selected_rating").val();

        var selected_value = $(this).attr("data-attr");
        $("#selected_rating").val(selected_value);

        $(".selected-rating").empty();
        $(".selected-rating").html(selected_value);
        $("#nilairating").val(selected_value);

        for (i = 1; i <= selected_value; ++i) {
        $("#rating-star-"+i).toggleClass('btn-warning');
        $("#rating-star-"+i).toggleClass('btn-default');
        }

        for (ix = 1; ix <= previous_value; ++ix) {
        $("#rating-star-"+ix).toggleClass('btn-warning');
        $("#rating-star-"+ix).toggleClass('btn-default');
        }

        }));


    });

    </script>
</body>

</html>