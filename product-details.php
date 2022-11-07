<?php include "_partial/top.php"; ?>
    <!-- Header Section End -->

    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                        <?php
                            include 'admin/db/database.php';
                            $i = 0;
                            $sql = "SELECT db.*,dk.nama_kategori FROM db_barang db join db_kategori dk on db.id_kategori = dk.id_kategori where db.id_barang = '".$_GET['id']."'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                // output data of each row
                                while($row = $result->fetch_assoc()) {
                                   echo '<a href="insert">'.$row['nama_kategori'].'</a>
                                    <span>'.$row['nama_barang'].'</span>';
                                }
                            }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
            <?php
            include 'admin/db/database.php';
            $i = 0;
            $sql = "SELECT db.*,dk.nama_kategori FROM db_barang db join db_kategori dk on db.id_kategori = dk.id_kategori where db.id_barang = '".$_GET['id']."'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {?>
                <div class="col-lg-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__left product__thumb nice-scroll">
                            <a class="pt active" href="#product-1">
                                <img src="admin/images/produk/<?php echo $row['images'];?>" alt="">
                            </a>
                        </div>
                        <div class="product__details__slider__content">
                            <div class="product__details__pic__slider owl-carousel">
                                <img data-hash="product-1" class="product__big__img" src="admin/images/produk/<?php echo $row['images'];?>" alt="">
                             </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product__details__text">

                        <?php
                                    $id = $row['id_kategori'];
                                    echo '<h3>'.$row['nama_barang'].'</span></h3>
                                    <div class="rating">';
                                    $totalreview = 0;
                                    $sql2 = "SELECT sum(rating)/count(rating) as total, count(rating) as totalreview FROM `db_rating` where id_barang = '".$row['id_barang']."' group by id_barang";
                                    $result2 = $conn->query($sql2);
                                    if ($result2->num_rows > 0) {
                                        // output data of each row
                                        while($row2 = $result2->fetch_assoc()) {
                                            $totalreview = $row2['totalreview'];
                                            if($row2['total'] == 5){
                                                echo '
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                ';
                                            }else if($row2['total'] == 4){
                                                echo '
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                ';
                                            }else if($row2['total'] == 3){
                                                echo '
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                ';
                                            }else if($row2['total'] == 2){
                                                echo '
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                ';
                                            }else if($row2['total'] == 1){
                                                echo '
                                                <i class="fa fa-star"></i>
                                                ';
                                            }
                                            echo '<span>('. $row2['totalreview'].' reviews )</span>';
                                        }
                                    }
                                    
                                   echo '</div>';
                                    
                                   
                                   
                                   if(!empty($row['flash'])){
                                        if($row['flash'] >= date("Y-m-d H:i:s")){
                                            echo '    <div class="product__details__price"><s>Rp '. number_format($row['harga_barang'],0) . '</s> <h5 style="color:red;"> Rp '. number_format($row['harga_barang']-($row['harga_barang']*$row['diskon']/100),0) . '</h5></div>';
                                        }else{
                                            echo '<div class="product__details__price">Rp '.number_format($row['harga_barang']).'</div>';
                                        }
                                    }else{
                                        echo ' <div class="product__details__price">Rp '.number_format($row['harga_barang']).'</div>';
                                    }
                                   
                                   
                                   
                                    if(isset($_SESSION["userss"])){ 
                                    echo ' <p>'.$row['deskripsi'].'</p>
                                        <form role="form" action="inserttransaksi.php" method="post" enctype="multipart/form-data">
                                        
                                        <input type="hidden" id="email" name="email" value="'.$_SESSION["userss"].'">
                                                        <input type="hidden" id="id_barang" name="id_barang" value="'.$row['id_barang'].'">
                                            <div class="product__details__button">
                                                <div class="quantity">
                                                    <span>Quantity:</span>
                                                    <div class="pro-qty">
                                                        <input type="text" id="qty" name="qty" value="1">

                                                    </div>
                                                </div>
                                            ';
                                            
                                            if(!$_SESSION["userss"]){

                                            }else{
                                                echo'    <button type="submit" class="cart-btn"><span class="icon_bag_alt"></span> Add to cart</button>';
                                            }

                                    echo '</form>';
                                        }else{
                                            echo ' <p>'.$row['deskripsi'].'</p>
                                            <form role="form" action="inserttransaksi.php" method="post" enctype="multipart/form-data">
                                            
                                                            <input type="hidden" id="id_barang" name="id_barang" value="'.$row['id_barang'].'">
                                                <div class="product__details__button">
                                                    <div class="quantity">
                                                        <span>Quantity:</span>
                                                        <div class="pro-qty">
                                                            <input type="text" id="qty" name="qty" value="1">
    
                                                        </div>
                                                    </div>
                                                ';
                                        }


                                    echo '<ul>
                                            <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                            <li><a href="#"><span class="icon_adjust-horiz"></span></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__details__widget">
                                        <ul>
                                            <li>
                                                <span>Availability:</span>
                                                <div class="stock__checkbox">
                                                    <label for="stockin">
                                                    '.$row['stok_barang'].' In Stock

                                                    </label>
                                                </div>
                                            </li>
                                            <!-- <li>
                                                <span>Available color:</span>
                                                <div class="color__checkbox">
                                                    <label for="red">
                                                        <input type="radio" name="color__radio" id="red" checked>
                                                        <span class="checkmark"></span>
                                                    </label>
                                                    <label for="black">
                                                        <input type="radio" name="color__radio" id="black">
                                                        <span class="checkmark black-bg"></span>
                                                    </label>
                                                    <label for="grey">
                                                        <input type="radio" name="color__radio" id="grey">
                                                        <span class="checkmark grey-bg"></span>
                                                    </label>
                                                </div>
                                            </li> -->
                                            <!-- <li>
                                                <span>Available size:</span>
                                                <div class="size__btn">
                                                    <label for="xs-btn" class="active">
                                                        <input type="radio" id="xs-btn">
                                                        xs
                                                    </label>
                                                    <label for="s-btn">
                                                        <input type="radio" id="s-btn">
                                                        s
                                                    </label>
                                                    <label for="m-btn">
                                                        <input type="radio" id="m-btn">
                                                        m
                                                    </label>
                                                    <label for="l-btn">
                                                        <input type="radio" id="l-btn">
                                                        l
                                                    </label>
                                                </div>
                                            </li> -->
                                            <li>
                                                <span>Promotions:</span>
                                                <p>Free shipping</p>
                                            </li>
                                        </ul>
                                    </div>';
                                }
                            }
                        ?>


                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <!-- <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Specification</a>
                            </li> -->
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">Reviews ( <?php echo $totalreview;?> )</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <!-- <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <h6>Description</h6>
                                <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut loret fugit, sed
                                    quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt loret.
                                    Neque porro lorem quisquam est, qui dolorem ipsum quia dolor si. Nemo enim ipsam
                                    voluptatem quia voluptas sit aspernatur aut odit aut loret fugit, sed quia ipsu
                                    consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Nulla
                                consequat massa quis enim.</p>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget
                                    dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes,
                                    nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium
                                quis, sem.</p>
                            </div>
                            <div class="tab-pane" id="tabs-2" role="tabpanel">
                                <h6>Specification</h6>
                                <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut loret fugit, sed
                                    quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt loret.
                                    Neque porro lorem quisquam est, qui dolorem ipsum quia dolor si. Nemo enim ipsam
                                    voluptatem quia voluptas sit aspernatur aut odit aut loret fugit, sed quia ipsu
                                    consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Nulla
                                consequat massa quis enim.</p>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget
                                    dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes,
                                    nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium
                                quis, sem.</p>
                            </div> -->
                            <div class="tab-pane active" id="tabs-3" role="tabpanel">
                                <h6>Reviews ( <?php echo $totalreview;?> )</h6>
                                <div class="panel-body">
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                            <div class="row">
                                            <?php

                                                $totalreview = 0;
                                                $sql2 = "select du.nama,dk.komen,dr.rating,dk.created_at from db_komen dk
                                                join db_rating dr on dk.email = dr.email and dk.id_barang = dr.id_barang
                                                join db_user du on du.email = dk.email where dk.id_barang = '".$_GET['id']."' group by du.nama,dk.komen,dr.rating,dk.created_at";
                                                //echo $sql2;
                                                $result2 = $conn->query($sql2);
                                                if ($result2->num_rows > 0) {
                                                    // output data of each row
                                                    while($row2 = $result2->fetch_assoc()) {
                                                        // $totalreview = $row2['totalreview'];
                                                        echo '<div class="col-xs-10 col-md-11">
                                                        <div>
                                                        <p>';
                                                        if($row2['rating'] == 5){
                                                            echo '
                                                            <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                                            <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                                            <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                                            <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                                            <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                                            ';
                                                        }else if($row2['rating'] == 4){
                                                            echo '
                                                            <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                                            <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                                            <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                                            ';
                                                        }else if($row2['rating'] == 3){
                                                            echo '
                                                            <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                                            <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                                            <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                                            ';
                                                        }else if($row2['rating'] == 2){
                                                            echo '
                                                            <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                                            <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                                            ';
                                                        }else if($row2['rating'] == 1){
                                                            echo '
                                                            <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                                            ';
                                                        }
                                                        echo '</p>
                                                                <div class="mic-info">
                                                                    By: <a>'.$row2['nama'].'</a> on '.$row2['created_at'].'
                                                                </div>
                                                            </div>
                                                            <div class="comment-text">
                                                                '.$row2['komen'].'
                                                            </div>
                                                            <div class="action">

                                                            </div>
                                                        </div>';
                                                    }
                                                }
                                             ?>






                                            </div>
                                        </li>
                                    </ul>
                                    <!-- <a href="#" class="btn btn-primary btn-sm btn-block" role="button"><span class="glyphicon glyphicon-refresh"></span> More</a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="related__title">
                        <h5>RELATED PRODUCTS</h5>
                    </div>
                </div>
                <?php
                            include 'admin/db/database.php';
                            $i = 0;
                            $sql = "SELECT * FROM db_barang where id_kategori = '".$id."'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                // output data of each row
                                while($row = $result->fetch_assoc()) {?>
                                    <div class="col-lg-3 col-md-4 col-sm-6">
                                        <div class="product__item">
                                            <div class="product__item__pic set-bg" data-setbg="admin/images/produk/<?php echo $row['images'];?>">
                                                <ul class="product__hover">
                                                    <li><a href="admin/images/produk/<?php echo $row['images'];?>" class="image-popup"><span class="icon_bag_alt"></span></a></li>
                                                </ul>
                                            </div>
                                            <div class="product__item__text">
                                                <h6><a href="product-details.php?id='<?php echo $row['id_barang']; ?>"><?php echo $row['nama_barang'];?></a></h6>

                                                <div class="product__price">Rp <?php echo number_format($row['harga_barang'],0); ?></div>
                                            </div>
                                        </div>
                                    </div>

                        <?php   }
                            }
                        ?>


            </div>
        </div>
    </section>
    <!-- Product Details Section End -->

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