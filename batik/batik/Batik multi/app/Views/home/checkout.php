<?php

$conn = mysqli_connect('localhost', 'root', '', 'rotiqu_db') or die('connection failed');

if (isset($_POST['order_btn'])) {

    $nama = $_POST['nama'];
    $no_hp = $_POST['no_hp'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];

    $cart_query = mysqli_query($conn, "SELECT * FROM `cart`");
    $price_total = 0;
    if (mysqli_num_rows($cart_query) > 0) {
        while ($product_item = mysqli_fetch_assoc($cart_query)) {
            $product_name[] = $product_item['nama_produk'] . ' (' . $product_item['quantity'] . ') ';
            $product_price = $product_item['harga_produk'] * $product_item['quantity'];
            $price_total += $product_price;
        };
    };

    $jml_cart = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
    $jml_item = mysqli_num_rows($jml_cart);
    $total_product = $jml_item;
    $detail_produk = implode(', ', $product_name);
    $detail_query = mysqli_query($conn, "INSERT INTO `transaksi_pemesanan`(nama, no_hp, email, alamat, total_produk, total_harga) VALUES('$nama','$no_hp','$email','$alamat','$total_product','$price_total')") or die('query failed');

    if ($cart_query && $detail_query) {
        echo "
      <div class='order-message-container'>
      <div class='message-container'>
         <h3>terimakasih telah berbelanja disini!</h3>
         <div class='order-detail'>
            <span>" . $detail_produk . "</span>
            <span class='total'> total : Rp " . $price_total . "/-  </span>
         </div>
         <div class='customer-details'>
            <p> namamu : <span>" . $nama . "</span> </p>
            <p> no HP : <span>" . $no_hp . "</span> </p>
            <p> emailmu : <span>" . $email . "</span> </p>
            <p> alamatmu : <span>" . $alamat . "</span> </p>
            <p>(*Pembayaran dilakukan saat produk sampai dialamat anda*)</p>
         </div>
            <a href='/home/index' class='btn-checkout'>lanjutkan belanja</a>
         </div>
      </div>
      ";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purimas 3</title>
    <link rel="shortcut icon" type="image" href="/img/produk/logo.png">
    <link rel="stylesheet" href="/css/style_front.css">
    <link href="/css/style_keranjang.css" rel="stylesheet">
    <!-- bootstrap links -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- bootstrap links -->
    <!-- fonts links -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Uchen&display=swap" rel="stylesheet">
    <!-- fonts links -->
    <!-- icons links -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <!-- icons links -->
    <!-- animation links -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- animation links -->
</head>

<body>
    <div class="all-content">
        <!-- navbar -->
        <nav class="navbar navbar-expand-md" id="navbar">
            <!-- Brand -->
            <a class="navbar-brand" href="#" id="logo"><img src="/img/logo.png" alt="" width="50px"> BatikSoul</a>

            <!-- Toggler/collapsibe Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span><img src="/img/produk/menu.png" alt="" width="30px"></span>
            </button>

            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/home/index">Home</a>
                    </li>
                    <!-- dropdown -->
                    <!-- <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="navbardrop" data-toggle="dropdown">
                     Category
                    </a>
                    <div class="dropdown-menu">
                        <a href="#" class="dropdown-item">Birthday Cake</a>
                        <a href="#" class="dropdown-item">Chocolate Cake</a>
                        <a href="#" class="dropdown-item">Party Cake</a>
                        <a href="#" class="dropdown-item">Slice Cake</a>
                        <a href="#" class="dropdown-item">Cup Cake</a>
                    </div>
                </li> -->
                    <!-- dropdown -->
                    <!-- <li class="nav-item ">
                        <a class="nav-link active text-white" aria-current="page" href="#about">Tentang</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link active text-white" aria-current="page" href="#galeri">Galeri</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link active text-white" aria-current="page" href="/login">Khusus karyawan</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link active text-white" aria-current="page" href="#benefit">Benefit</a>
                    </li> -->
                </ul>
            </div>
            <div class="icons">

                <ul class="navbar-nav">
                    <?php
                    $jml_cart = mysqli_query($conn, "SELECT COUNT(*) FROM `cart`") or die('query failed');
                    $jml_item = mysqli_num_rows($jml_cart);
                    ?>
                    <li class="nav-item">
                        <!-- <a class="nav-link" href="#"><img src="/img/produk/user.png" alt="" width="20px"></a> -->
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="home/index">
                            <img src="/img/produk/add.png" alt="" width="24px">
                            <span class="badge badge-danger navbar-badge"><?= $jml_item; ?></span>
                        </a>
                    </li>



            </div>
        </nav>
        <!-- navbar end -->

        <div>
            <?php
            if (session()->getFlashdata('pesan')) {
                echo '<div class="alert alert-warning alert-dismissible" data-aos="fade-up" data-aos-duration="1500"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                echo session()->getFlashdata('pesan');
                echo '</div>';
            }
            ?>
        </div>


        <!-- Tampilan Checkout -->
        <section class="checkout-form">

            <h1 class="heading">complete your order</h1>

            <form action="" method="post">

                <div class="display-order">
                    <?php
                    $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
                    $total = 0;
                    $grand_total = 0;
                    if (mysqli_num_rows($select_cart) > 0) {
                        while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {
                            $total_price = $fetch_cart['harga_produk'] * $fetch_cart['quantity'];
                            $grand_total = $total += $total_price;
                    ?>
                            <span><?= $fetch_cart['nama_produk']; ?>(<?= $fetch_cart['quantity']; ?>)</span>
                    <?php
                        }
                    } else {
                        echo "<div class='display-order'><span>your cart is empty!</span></div>";
                    }
                    ?>
                    <span class="grand-total"> grand total : Rp <?= $grand_total; ?> </span>
                </div>

                <div class="flex">
                    <div class="inputBox">
                        <span>nama</span>
                        <input type="text" placeholder="masukkan namamu" name="nama" required>
                    </div>
                    <div class="inputBox">
                        <span>no. hp</span>
                        <input type="text" placeholder="masukkan no. hp" name="no_hp" required>
                    </div>
                    <div class="inputBox">
                        <span>email</span>
                        <input type="email" placeholder="masukkan emailmu" name="email" required>
                    </div>
                    <div class="inputBox">
                        <span>alamat</span>
                        <input type="text" placeholder="masukkan alamatmu" name="alamat" required>
                    </div>
                </div>
                <input type="submit" value="order now" name="order_btn" class="btn-checkout">
            </form>

        </section>
        <!-- Tutup Checkout -->


        <!-- footer -->
        <div class="container-fluid  footer pt-5 wow fadeIn" data-wow-delay="0.1s" id="footer">
            <div class="container d-flex flex-column justify-content-center align-items-center text-center py-5" style="min-height: 100vh;">
                <div class="row w-100">
                    <div class="col-lg-6 col-md-12 mb-2 shadow p-4" style="border-radius: 15px; box-shadow: 0 4px 8px rgba(0, 128, 0, 1);">
                        <h1 class="navbar-brand" id="logo">
                            <img src="/img/logo.png" alt="" width="50px"> BatikSoul
                        </h1>
                        <h1>Butuh Batik ..? <br>Silahkan kontak kami Kami Siap Membantu</h1>

                        <h4 class="text-warning mb-4">Address</h4>
                        <p><i class="fa fa-map-marker-alt me-3"></i>Pekalongan, Jawa Tengah</p>
                        <p><i class="fa fa-phone-alt me-3"></i>+089 501 632 769</p>
                        <p><i class="fa fa-envelope me-3"></i>Kikip6558@gmail.com</p>
                    </div>
                    <div class="col-lg-6 col-md-12 shadow p-4" style="border-radius: 15px;">
                        <iframe style="border-radius: 15px;" width="100%" height="100%" style="border:0" loading="lazy" allowfullscreen referrerpolicy="no-referrer-when-downgrade" src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d837.1801548448394!2d98.6937625043766!3d3.5127072284542322!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zM8KwMzAnNDcuMCJOIDk4wrA0MSczOS44IkU!5e0!3m2!1sid!2sid!4v1714210314667!5m2!1sid!2sid">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="container text-center">
                <div class="row">
                    <div class="col-md-12">
                        &copy; <a href="#">Capestone Projek 2024</a>, All Right Reserved.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer -->

    <a href="#" class="arrow"><i><img src="/img/produk/up-arrow.png" alt="" width="50px"></i></a>
    </div>





    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>