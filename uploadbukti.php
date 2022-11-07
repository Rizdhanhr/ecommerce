<?php include "_partial/top.php" ?>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

* {
margin: 0;
padding: 0;
box-sizing: border-box;
font-family: "Poppins", sans-serif
}

#drag-image {
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
    background: #FC6E74
}

.drag-image {
    border: 1px dashed #fff;
    height: 300px;
    width: 350px;
    border-radius: 5px;
    font-weight: 400;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column
}

.drag-image.active {
    border: 2px solid #fff
}

.drag-image .icon {
    font-size: 30px;
    color: #fff
}

.drag-image h6 {
    font-size: 20px;
    font-weight: 300;
    color: #fff
}

.drag-image span {
    font-size: 14px;
    font-weight: 300;
    color: #fff;
    margin: 10px 0 15px 0
}

.drag-image button {
    padding: 10px 25px;
    font-size: 14px;
    font-weight: 300;
    border: none;
    outline: none;
    background: transparent;
    color: #fff;
    border: 1px solid #fff;
    border-radius: 5px;
    cursor: pointer;
    transition: all 0.5s
}

.drag-image button:hover {
    background-color: #fff;
    color: red
}

.drag-image img {
    height: 100%;
    width: 100%;
    object-fit: cover;
    border-radius: 5px
}
</style>

    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                        <span>Shop</span>
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
                <div class="col-lg-12 col-md-12">
                    <div class="row" style ="display: flex;
    align-items: center;
    justify-content: center;
    min-height: 75vh;
    background: #FC6E74" >
                        <div class="drag-image">
                            <div class="icon"><i class="fas fa-cloud-upload-alt"></i></div>
                            <h6>Choose File Here</h6>
                            <form role="form" action="insertpembayaran.php" method="post" enctype="multipart/form-data">
                                <input type="hidden" value="<?php echo $_GET['id_transaksi']; ?>" id="id_transaksi" name="id_transaksi">
                                <input type="file" id="gambar" name="gambar">
                                <button type='submit'>Upload File</button> 
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->

    <?php include "_partial/foot.php" ?>