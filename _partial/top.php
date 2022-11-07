<?php
    session_start();
    ob_start();
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ashion Template">
    <meta name="keywords" content="Ashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FIB Collection</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">


    <style>
        .act-btn{
      /*background:green;*/
      display: block;
      width: 100px;
      height: 210px;
      line-height: 50px;
      text-align: center;
      color: white;
      font-size: 30px;
      font-weight: bold;
      border-radius: 50%;
      -webkit-border-radius: 50%;
      text-decoration: none;
      transition: ease all 0.3s;
      position: fixed;
      right: 30px;
      bottom:30px;
    }
/*.act-btn:hover{background: blue}*/
    </style>
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__close">+</div>
        <ul class="offcanvas__widget">
            <li><span class="icon_search search-switch"></span></li>
            <li><a href="#"><span class="icon_heart_alt"></span>
                <div class="tip">2</div>
            </a></li>
            <li><a href="#"><span class="icon_bag_alt"></span>
                <div class="tip">2</div>
            </a></li>
        </ul>
        <div class="offcanvas__logo">
            <a href="./index.php"><img src="admin/dist/img/logo.png" alt="" ></a>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__auth">
            <a href="#">Login</a>
            <a href="#">Register</a>
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-2 col-lg-2">
                    <div class="header__logo">
                        <a href="./index.html"><img src="admin/dist/img/logo.png" width="100" height="50" alt=""></a>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-7">
                    <nav class="header__menu">
                        <ul>


                            <li class=""><a href="./index.php">Home</a></li>
                            <!-- <li><a href="#">Women’s</a></li>
                            <li><a href="#">Men’s</a></li> -->
                            <li><a href="./shop.php">Shop</a></li>
                            <?php if(isset($_SESSION["userss"])){ ?>
                            <li><a href="#">Transaksi</a>
                                <ul class="dropdown">
                                    <!-- <li><a href="redeem.php">Redeem Voucher</a></li> -->
                                    <li><a href="transaksi.php">Detail Transaksi</a></li>
                                    <li><a href="pembayaran.php">Detail Pembayaran</a></li>
                                </ul>
                            </li>
                            <?php }else { ?>   
                            <?php } ?>
                            <!-- <li><a href="leaderboard.php">Leader Board</a></li> -->
                            <?php if(isset($_SESSION["userss"])){ ?>
                                <li><a href="#"><?php echo "Welcome,". $_SESSION["userss"]; ?></a>
                                    <ul class="dropdown">
                                        <li><a href="./profile.php">Profile</a></li>
                                        <li><a href="logout.php">Logout</a></li>
                                    </ul>
                                </li>
                            <?php }else { ?>

                              
                            <?php } ?>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-2">
                    <div class="header__right">

                        <?php if(isset($_SESSION["userss"])){ ?>
                                

                        <?php }else { ?>
                           <div class="header__right__auth">
                                    <a href="login.php">Login</a>
                                    <a href="register.php">Register</a>
                                </div>

                        <?php } ?>



                        <ul class="header__right__widget">
                            <li><span class="icon_search search-switch"></span></li>
                            <!-- <li><a href="#"><span class="icon_heart_alt"></span>
                                <div class="tip">2</div>
                            </a></li> -->
                            <?php if(isset($_SESSION["userss"])){ ?>
                            <li><a href="./shop-cart.php"><span class="icon_bag_alt"></span>
                            </a></li>
                            <?php }else { ?>   
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="canvas__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>

    <!-- Header Section End -->
