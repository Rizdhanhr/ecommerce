<?php include "_partial/top.php" ?>

    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./index.html"><i class="fa fa-home"></i> Shop</a>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="shop__sidebar">
                        <div class="sidebar__categories">
                            <div class="section-title">
                                <h4>Categories</h4>
                            </div>
                            <div class="categories__accordion">
                                 <div class="accordion" id="accordionExample">
                                            <div class="card">
                                                <div class="card-heading">
                                                    <a href="shop.php">ALL</a>
                                                </div>
                                            </div>
                                        </div>
                            <?php
                                include 'admin/db/database.php';
                                $i = 0;
                                $sql = "SELECT * FROM db_kategori";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {
                                        ?>

                                        <div class="accordion" id="accordionExample">
                                            <div class="card">
                                                <div class="card-heading">
                                                    <a href="shop.php?id=<?php echo $row['id_kategori'] ?>"><?php echo $row['nama_kategori'] ?></a>
                                                </div>
                                            </div>
                                        </div>

                                <?php    }
                                }else{
                                    echo "0 results";
                                }
                            ?>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9">
                    <div class="row">
                    <?php
                        include 'admin/db/database.php';
                        
                        if(isset($_GET["search"])){
                            $id = mysqli_real_escape_string($conn,$_GET["search"]);
                            $i = 0;
                            $sql = "SELECT db.*,dk.nama_kategori FROM db_barang db 
                                    join db_kategori dk on db.id_kategori = dk.id_kategori
                                    where db.nama_barang like '%$id%'";
                        }else{
                            if(isset($_GET["id"])){
                                $id = mysqli_real_escape_string($conn,$_GET["id"]);
                            }else{
                                    $id = mysqli_real_escape_string($conn, "%"); 
                            }
                            $i = 0;
                            $sql = "SELECT db.*,dk.nama_kategori FROM db_barang db 
                                    join db_kategori dk on db.id_kategori = dk.id_kategori
                                    where dk.id_kategori like '$id'";
                        }
                        
                       
                        //echo $_GET["id"];
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {

                        ?>

                        <div class="col-lg-4 col-md-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="admin/images/produk/<?php echo $row['images'] ?>">
                                    
                                    <!-- <div class="label new">New</div> -->
                                   <?php if(!empty($row['flash'])){
                                        if($row['flash'] >= date("Y-m-d H:i:s")){
                                            echo '<div class="label sale"> Flash Sale</div>';
                                        }else{
                                            echo '<div class="label new">NEW</div>';
                                        }
                                    }else{
                                        echo '<div class="label new">NEW</div>';
                                    }?>
                                    
                                
                                    <ul class="product__hover">
                                        <li><a href="admin/images/produk/<?php echo $row['images'] ?>" class="image-popup"><span class="arrow_expand"></span></a></li>
                                        <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="product-details.php?id=<?php echo $row['id_barang']?>"><?php echo $row['nama_barang'] ?></a></h6>
                                    <div class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <?php if(!empty($row['flash'])){
                                        if($row['flash'] >= date("Y-m-d H:i:s")){
                                            echo '    <div class="product__details__price"><s>Rp '. number_format($row['harga_barang'],0) . '</s> <h5 style="color:red;"> Rp '. number_format($row['harga_barang']-($row['harga_barang']*$row['diskon']/100),0) . '</h5></div>';
                                        }else{
                                            echo '<div class="product__details__price">Rp '.number_format($row['harga_barang']).'</div>';
                                        }
                                    }else{
                                        echo ' <div class="product__details__price">Rp '.number_format($row['harga_barang']).'</div>';
                                    }?>
                                    <!-- <div class="product__price">Rp <?php echo number_format($row['harga_barang'],0) ?></div> -->
                                </div>
                            </div>
                        </div>
                        <?php    }
                        } else {
                            echo "0 results";
                        }

                    ?>


                        <!-- <div class="col-lg-12 text-center">
                            <div class="pagination__option">
                                <a href="#">1</a>
                                <a href="#">2</a>
                                <a href="#">3</a>
                                <a href="#"><i class="fa fa-angle-right"></i></a>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->

    <!-- Instagram Begin -->
    <!-- <div class="instagram">
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
    </div> -->
    <!-- Instagram End -->

    <?php include "_partial/foot.php" ?>