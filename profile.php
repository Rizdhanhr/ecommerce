<?php include "_partial/top.php" ?>
<style>
    body{
    background: -webkit-linear-gradient(left, #3931af, #00c6ff);
}
.emp-profile{
    padding: 3%;
    margin-top: 3%;
    margin-bottom: 3%;
    border-radius: 0.5rem;
    background: #fff;
}
.profile-img{
    text-align: center;
}
.profile-img img{
    width: 70%;
    height: 100%;
}
.profile-img .file {
    position: relative;
    overflow: hidden;
    margin-top: -20%;
    width: 70%;
    border: none;
    border-radius: 0;
    font-size: 15px;
    background: #212529b8;
}
.profile-img .file input {
    position: absolute;
    opacity: 0;
    right: 0;
    top: 0;
}
.profile-head h5{
    color: #333;
}
.profile-head h6{
    color: #0062cc;
}
.profile-edit-btn{
    border: none;
    border-radius: 1.5rem;
    width: 70%;
    padding: 2%;
    font-weight: 600;
    color: #6c757d;
    cursor: pointer;
}
.proile-rating{
    font-size: 12px;
    color: #818182;
    margin-top: 5%;
}
.proile-rating span{
    color: #495057;
    font-size: 15px;
    font-weight: 600;
}
.profile-head .nav-tabs{
    margin-bottom:5%;
}
.profile-head .nav-tabs .nav-link{
    font-weight:600;
    border: none;
}
.profile-head .nav-tabs .nav-link.active{
    border: none;
    border-bottom:2px solid #0062cc;
}
.profile-work{
    padding: 14%;
    margin-top: -15%;
}
.profile-work p{
    font-size: 12px;
    color: #818182;
    font-weight: 600;
    margin-top: 10%;
}
.profile-work a{
    text-decoration: none;
    color: #495057;
    font-weight: 600;
    font-size: 14px;
}
.profile-work ul{
    list-style: none;
}
.profile-tab label{
    font-weight: 600;
}
.profile-tab p{
    font-weight: 600;
    color: #0062cc;
}
</style>
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                        <span>Profile</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="container">
                <div class="container emp-profile">
                    <form method="post">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="profile-img">
                                    <img src="https://media.istockphoto.com/photos/millennial-male-team-leader-organize-virtual-workshop-with-employees-picture-id1300972574?b=1&k=20&m=1300972574&s=170667a&w=0&h=2nBGC7tr0kWIU8zRQ3dMg-C5JLo9H2sNUuDjQ5mlYfo=" alt=""/>
                                   <!--  <div class="file btn btn-lg btn-primary">
                                        Change Photo
                                        <input type="file" name="file"/>
                                    </div> -->
                                </div>
                            </div>

                             <?php

                                include 'admin/db/database.php';
                                $i = 0;
                                $totaltrx=0;
                                $sql = "SELECT * FROM db_user where email='".$_SESSION["userss"]."'";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {
                                        $email = $row['email'];
                                        $nama = $row['nama'];
                                        $alamat = $row['alamat'];
                                        $telpon = $row['no_hp'];
                                        $poin = $row['poin'];
                                    }
                                }else{
                                    // echo "0 results";
                                }
                                $sql = "SELECT count(id_transaksi) as total FROM db_transaksi 
                                        where email='".$_SESSION["userss"]."' group by email";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {
                                        $totaltrx = $row['total'];
                                        
                                    }
                                }else{
                                    // echo "0 results";
                                }
                                ?>
                            <div class="col-md-6">
                                <div class="profile-head">
                                            <h5>
                                                <?php echo $nama; ?>
                                            </h5>
                                            <!-- </br>
                                            <p>Transaksi 25x Lagi</p>
                                            <div class="progress">
                                            </h1>
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 25%;" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100">25%</div>
                                            </div>
                                            </br>
                                            <div class="row">
                                            <div class="col-sm-6">
                                                <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title">Eksklusif Silver</h5>
                                                    <p class="card-text">Bebas Ongkir 1x Perminggu</p>
                                                    <a href="#" class="btn btn-primary">Selengkapnya</a>
                                                </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title">Voucher Spesial</h5>
                                                    <p class="card-text">Cek Voucher</p>
                                                    <a href="voucheruser.php" class="btn btn-primary">Cek Voucher</a>
                                                </div>
                                                </div>
                                            </div>
                                            </div> -->
            
                                            <p class="proile-rating">Poin : <span><?php echo $poin; ?> Poin</span></p>
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Alamat Pengiriman</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="member-tab" data-toggle="tab" href="#member" role="tab" aria-controls="member" aria-selected="false">Member</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <?php
                                $sql = "SELECT * FROM db_user where email='".$_SESSION["userss"]."'";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                  // output data of each row
                                  while($row = $result->fetch_assoc()) { 
                                // echo '<input type="submit" class="profile-edit-btn" name="btnAddMore" value="Edit Profile"/>';
                                echo '<a class="profile-edit-btn" href="editprofil.php?id='.$row["email"].'")">Edit Profile</a>';
                            }
                        }
                                ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">

                            </div>
                            <div class="col-md-8">
                                <div class="tab-content profile-tab" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>User Id</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p><?php echo $email; ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Name</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p><?php echo $nama; ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Email</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p><?php echo $email; ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Phone</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p><?php echo $telpon; ?></p>
                                                    </div>
                                                </div>
                                                <!-- <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Profession</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p>Web Developer and Designer</p>
                                                    </div>
                                                </div> -->
                                    </div>
                                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Alamat</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p><?php echo $alamat; ?></p>
                                                    </div>
                                                </div>
                                       <!--  <div class="row">
                                            <div class="col-md-12">
                                                <label>Your Bio</label><br/>
                                                <p>Your detail description</p>
                                            </div>
                                        </div> -->
                                    </div>
                                    <div class="tab-pane fade" id="member" role="tabpanel" aria-labelledby="member-tab">
                                                <div class="row">


                                                    <div class="col-md-6">
                                                        <label>Status Badges</label>
                                                    </br>
                                                    <?php if($totaltrx >= 0 && $totaltrx <= 10) {
                                                        echo '<img src="img/badges/epic.png" style="width: 300px;"></img>
                                                                <div class="progress">
                                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%;" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100">Kurang '.(11-$totaltrx).'X transaksi untuk menuju legend </div>
                                                                </div>';
                                                    }else if($totaltrx >= 11 && $totaltrx <= 30){
                                                            
                                                        echo '<img src="img/legend.png" style="width: 300px;"></img>
                                                        <div class="progress">
                                                            <div class="progress-bar bg-success" role="progressbar" style="width: 100%;" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100">Kurang '.(31-$totaltrx).'X transaksi untuk menuju Mythic </div>
                                                        </div>';
                                                    }else if($totaltrx >= 31){

                                                        echo '<img src="img/mythic.png" style="width: 300px;"></img> 
                                                        <div class="progress">
                                                            <div class="progress-bar bg-success" role="progressbar" style="width: 100%;" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100">Selamat anda sudah di puncak member </div>
                                                        </div>';
                                                    } ?>
                                                    

                                                    </div>
                                                    <div class="col-md-6">
                                                    <a href="redeem.php"><button type="button" class="btn btn-primary">Klaim Reward</button></a>
                                                    <a href="voucheruser.php"><button type="button" class="btn btn-success">Daftar Reward</button></a>
                                                    <!-- endmodal -->
                                                    </div>
                                                </div>
                                       <!--  <div class="row">
                                            <div class="col-md-12">
                                                <label>Your Bio</label><br/>
                                                <p>Your detail description</p>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
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