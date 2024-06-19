<?php
$conn = mysqli_connect('localhost', 'root', '', 'rotiqu_db') or die('connection failed');

if (isset($_POST['tombolupdate'])) {
    $update_value = $_POST['update_quantity'];
    $update_id = $_POST['update_id'];
    $update_quantity_query = mysqli_query($conn, "UPDATE `cart` SET quantity = '$update_value' WHERE id_cart = '$update_id'");
};

if (isset($_GET['remove'])) {
    $remove_id = $_GET['remove'];
    mysqli_query($conn, "DELETE FROM `cart` WHERE id_cart = '$remove_id'");
};

if (isset($_GET['delete_all'])) {
    mysqli_query($conn, "DELETE FROM `cart`");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BatikSoul</title>
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
            <a class="navbar-brand" href="#" id="logo"><img src="/img/logo.png" alt="" width="50px"> BatikSoul </a>

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
                    $jml_cart = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
                    $jml_item = mysqli_num_rows($jml_cart);
                    ?>
                    <li class="nav-item">
                        <!-- <a class="nav-link" href="#"><img src="/img/produk/user.png" alt="" width="20px"></a> -->
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">
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


        <!-- Tampilan Keranjang -->
        <section class="shopping-cart">

            <h1 class="heading">shopping cart</h1>

            <table>

                <thead>
                    <th>image</th>
                    <th>name</th>
                    <th>price</th>
                    <th>quantity</th>
                    <th>total price</th>
                    <th>action</th>
                </thead>

                <tbody>

                    <?php

                    $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
                    $grand_total = 0;
                    if (mysqli_num_rows($select_cart) > 0) {
                        while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {
                    ?>

                            <tr>
                                <td><img src="/img/produk/<?php echo $fetch_cart['picture']; ?>" height="100" alt=""></td>
                                <td><?php echo $fetch_cart['nama_produk']; ?></td>
                                <td>Rp <?php echo number_format($fetch_cart['harga_produk']); ?>/-</td>
                                <td>
                                    <form action="" method="post">
                                        <input type="hidden" name="update_id" value="<?php echo $fetch_cart['id_cart']; ?>">
                                        <input type="number" name="update_quantity" min="1" value="<?php echo $fetch_cart['quantity']; ?>">
                                        <input type="submit" value="update" name="tombolupdate">
                                    </form>
                                </td>
                                <td>Rp <?php echo $sub_total = $fetch_cart['harga_produk'] * $fetch_cart['quantity']; ?>/-</td>
                                <td><a href="/online/cart?remove=<?php echo $fetch_cart['id_cart']; ?>" onclick="return confirm('remove item from cart?')" class="delete-btn"> <i class="fas fa-trash"></i> remove</a></td>
                            </tr>
                    <?php
                            $grand_total += $sub_total;
                        };
                    };
                    ?>
                    <tr class="table-bottom">
                        <td><a href="/home/index" class="option-btn" style="margin-top: 0;">lanjutkan belanja</a></td>
                        <td colspan="3">grand total</td>
                        <td>Rp <?php echo $grand_total; ?>/-</td>
                        <td><a href="/online/cart?delete_all" onclick="return confirm('are you sure you want to delete all?');" class="delete-btn"> <i class="fas fa-trash"></i> delete all </a></td>
                    </tr>

                </tbody>

            </table>

            <div class="checkout-btn">
                <a href="/online/checkout" class="btn-checkout <?= ($grand_total >= 1) ? '' : 'disabled'; ?>">checkout sekarang</a>
            </div>

        </section>
        <!-- Tutup Keranjang -->


        <!-- footer -->
        <div class="container-fluid  footer pt-0 wow fadeIn" data-wow-delay="0.1s" id="footer">
            <div class="container d-flex flex-column justify-content-center align-items-center text-center py-5" style="min-height: 30vh;">
                <div class="row w-100">
                    <div class="col-lg-6 col-md-12 mb-2 shadow p-4" style="border-radius: 15px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0);">
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



    <a href="#" class="arrow"><i><img src="/img/produk/up-arrow.png" alt="" width="50px"></i></a>
    </div>





    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>