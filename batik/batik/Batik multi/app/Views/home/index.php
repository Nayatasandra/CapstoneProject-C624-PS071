<?= $this->extend('layout/template1'); ?>
<?= $this->section('content'); ?>

<?php
$conn = mysqli_connect('localhost', 'root', '', 'rotiqu_db') or die('connection failed');
if (isset($_POST['tambahcart'])) {

    $id_produk = $_POST['id_produk'];
    $nama_produk = $_POST['nama_produk'];
    $harga_produk = $_POST['harga_produk'];
    $picture = $_POST['picture'];
    $product_quantity = 1;

    $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE id_produk = '$id_produk'");

    if (mysqli_num_rows($select_cart) > 0) {
        $message[] = 'product already added to cart';
    } else {
        $insert_product = mysqli_query($conn, "INSERT INTO `cart`(id_produk, nama_produk, harga_produk, picture, quantity) VALUES('$id_produk', '$nama_produk', '$harga_produk', '$picture', '$product_quantity')");
        $message[] = 'product added to cart succesfully';
    }
}
?>

<nav class="navbar navbar-expand-lg " id="navbar">


    <a class="navbar-brand" href="#" id="logo"> <img src="/img/logo.png" alt="" width="50px"> BatikSoul</a>

    <!-- Toggler/collapsibe Button -->

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span><img src="/img/produk/menu.png" alt="" width="30px"></span>
    </button>

    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
            <li class="nav-item ">
                <a class="nav-link active" aria-current="page" href="#about">Beranda</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link active" aria-current="page" href="#galeri">Produk</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link active" aria-current="page" href="/login">Fitur</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link active" aria-current="page" href="#footer">Kontak</a>
            </li>
        </ul>
        <div class="icons">

            <ul class="navbar-nav">
                <?php
                $jml_cart = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
                $jml_item = mysqli_num_rows($jml_cart);
                ?>
                <li class="nav-item">
                    <!-- <a class="nav-link" href="/online/detail"><img src="/img/produk/user.png" alt="" width="20px"></a> -->
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/online/cart">
                        <img src="/img/keranjang.png" alt="" width="24px">
                        <span class="badge badge-danger navbar-badge"><?= $jml_item; ?></span>
                    </a>
                </li>
        </div>

    </div>
    </div>
</nav>
<!-- Header-->
<div class="home">
    <div class="content" data-aos="zoom-out-right">
        <!-- <h3>Batik Soul
        </h3>
        <h2>Category <span class="changecontent"></span></h2> -->
        <h2> Membantu Temukan
            <br>Batik impian.
        </h2>
        <p>Yuk, lestarikan batik Indonesia! Kalau bukan kita, siapa lagi?</p>
        <a id="btn" class="btn btn-warning  px-4 me-sm-3 mt-3" href="#product-cards">Temukan Batik</a>
    </div>
    <div class="img" data-aos="zoom-out-left">
        <img src="/img/home.png" alt="">
    </div>
</div>

<!-- Sample store section-->
<!-- top cards -->
<div class="container" id="box" data-aos="fade-up" data-aos-duration="1500">
    <h1>Layanan Kami</h1>
    <p> BatikSoul hadir menjadi solusi bagi kamu </p>
    <div class="row">
        <div class="col-md-4 py-3 py-md-0">
            <div class="card">
                <img src="/img/produk/background.png" alt="">
                <h3>Batik Tulis</h3>
                <p>Batik di buat secara langsung oleh
                    <br>pengrajin lokal. Dan dibuat secara profesional
                </p>
            </div>
        </div>
        <div class="col-md-4 py-3 py-md-0">
            <div class="card">
                <img src="/img/quality.png" alt="">
                <h3>Quality Control </h3>
                <p>Batik yang kami jual sudah melalui tahap quality control
                    <br>sesuai dengan standar quality control nasional
                </p>
            </div>
        </div>
        <div class="col-md-4 py-3 py-md-0">
            <div class="card">
                <img src="/img/delivery.png" alt="">
                <h3>Layanan Delivery</h3>
                <p>Batik Soul siap mengirim batik impian kamu
                    <br>ke rumah cukup kamu pesan dari rumah
                </p>
            </div>
        </div>
    </div>
</div>

<!-- about -->
<div class="container" data-aos="fade-up" data-aos-duration="1500" id="about">
    <h1>ABOUT US</h1>
    <div class="row">
        <div class="col-md-5 py-2 py-md-0">
            <div class="card">
                <img src="/img/logo.png" alt="">
            </div>
        </div>
        <div class="col-md-5 py-2 py-md-0">
            <p>
                Asal Mula Batik di Pekalongan
                Pada abad ke-19, Pekalongan mulai dikenal sebagai salah satu pusat pembuatan batik di Indonesia. Keahlian membatik dibawa oleh para pedagang dan pendatang yang datang dari berbagai wilayah,
                termasuk dari Jawa Tengah dan Jawa Timur. Para perajin batik awalnya membuat batik untuk keperluan pribadi dan sebagai barang dagangan yang diperdagangkan di pasar-pasar lokal.
                Di sinilah kreativitas orang Pekalongan mulai kelihatan. Mereka gak cuma niru motif-motif lama, tapi juga bikin motif-motif baru yang lebih colorful dan variatif.
                Misalnya, ada motif jlamprang yang penuh warna cerah dan motif buketan yang elegan
                Lambat laun, batik Pekalongan makin hits dan banyak diminat. Jadilah Pekalongan terkenal sebagai kota batik, dan sampai sekarang,
                batik masih jadi salah satu ikon budaya yang paling berharga di sana. Jadi, kalo main ke Pekalongan, jangan lupa buat mampir ke sentra batik dan bawa pulang batik kece buat oleh-oleh!
            </p>

            <!-- Belum kepanggil -->


        </div>
    </div>
</div>

<!-- Cakes -->
<section id="product-cards" data-aos="fade-up" data-aos-duration="1500">
    <div class="container">
        <h1 id="galeri">COLLECTIONS</h1>
        <div class="row justify-content-center" style="margin-top:50px;">
            <?php

            function rupiah($angka)
            {
                $hasil = 'Rp ' . number_format($angka, 2, ",", ".");
                return $hasil;
            }
            $select_product = mysqli_query($conn, "SELECT * FROM `produk`");
            if (mysqli_num_rows($select_product) > 0) {
                while ($fetch_product = mysqli_fetch_assoc($select_product)) { ?>
                    <div class="col-md-4 py-3 py-md-4">
                        <div class="card">
                            <div class="overlay">
                                <button type="button" class="btn btn-secondary" title="Quick View"><i><img src="/img/produk/views.png" alt="" width="30px"></i></button>

                            </div>
                            <img src="/img/produk/<?= $fetch_product['gambar']; ?>" height="300px" alt="<?= $fetch_product['nama']; ?>">
                            <div class="card-body">
                                <h3><?= $fetch_product['nama']; ?></h3>
                                <h6><?= rupiah($fetch_product['hargaJual']); ?> </h6>

                                <form action="" method="post">
                                    <input type="hidden" name="id_produk" value="<?php echo $fetch_product['kode']; ?>">
                                    <input type="hidden" name="nama_produk" value="<?php echo $fetch_product['nama']; ?>">
                                    <input type="hidden" name="harga_produk" value="<?php echo $fetch_product['hargaJual']; ?>">
                                    <input type="hidden" name="picture" value="<?php echo $fetch_product['gambar']; ?>">
                                    <input type="submit" value="Add Cart" id="tombolcart" name="tambahcart" style="color: white;">
                                </form>
                            </div>
                        </div>
                    </div>
            <?php };
            }; ?>

        </div>
    </div>
</section>

<!-- gallary -->
<section data-aos="fade-up" data-aos-duration="1500">
    <div class="container" id="box">
        <h1 class="text-danger">NEW PRODUCT</h1>
        <div class="row" style="margin-top: 30px;">
            <div class="col-md-4 py-3 py-md-0">
                <div class="card">
                    <div class="">
                        <h4 class="text-center">Kain Batik Tulis </br>
                            Motif Megamendung</h4>
                    </div>
                    <img src="/img/1.jpg" alt="">
                    <div class="bg-danger rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>
                </div>
            </div>
            <div class="col-md-4 py-3 py-md-0">
                <div class="card">
                    <div class="">
                        <h4 class="text-center">Kain Batik Tulis </br>
                            Motif SekarJagad</h4>
                    </div>
                    <img src="/img/2.jpg" alt="">
                    <div class="bg-danger rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>
                </div>
            </div>
            <div class="col-md-4 py-3 py-md-0">
                <div class="card">
                    <div class="">
                        <h4 class="text-center">Kain Batik Tulis </br>
                            Motif Megamendung</h4>
                    </div>
                    <img src="/img/3.jpg" alt="">
                    <div class="bg-danger rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>
                </div>
            </div>
        </div>


        <div class="row" style="margin-top: 30px;" data-aos="fade-up" data-aos-duration="1500">
            <div class="col-md-4 py-3 py-md-0">
                <div class="card">
                    <div class="">
                        <h4 class="text-center">Kain Batik Tulis </br>
                            Motif Truntum</h4>
                    </div>
                    <img src="/img/4.jpeg" alt="">
                    <div class="bg-danger rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>
                </div>
            </div>
            <div class="col-md-4 py-3 py-md-0">
                <div class="card">
                    <div class="">
                        <h4 class="text-center">Kain Batik Cap </br>
                            Motif Prada</h4>
                    </div>
                    <img src="/img/5.jpeg" alt="">
                    <div class="bg-danger rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>
                </div>
            </div>
            <div class="col-md-4 py-3 py-md-0">
                <div class="card">
                    <div class="">
                        <h4 class="text-center">Kain Batik Cap </br>
                            Motif Jepara</h4>
                    </div>
                    <img src="/img/6.jpg" alt="" height="250px">
                    <div class="bg-danger rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>
                </div>
            </div>
        </div>

        <section class="py-5" data-aos="fade-up" data-aos-duration="1500">
            <div class=" container px-1 my-1" id="benefit">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="text-center">
                            <h2 class="text-black">Benefit Berbelanja BatikSoul</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <div class="card h-100 shadow border-0">
                            <img class="card-img-top" src="<?php echo base_url('img/benefit/1.jpg'); ?>" alt="..." width="200px" height="200px" />
                            <div class="card-body p-5">
                                <h5 class="card-title"> Dukungan Pelanggan 24/7</h5>
                                <p class="card-text">Tim dukungan pelanggan kami siap membantu Anda kapan saja
                                    untuk memastikan pengalaman berbelanja yang menyenangkan.</p>
                            </div>
                            <div class="card-footer p-4 pt-0 border-top-0">
                                <div class="d-flex align-items-end justify-content-between">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <div class="card h-100 shadow border-0">
                            <img class="card-img-top" src="<?php echo base_url('img/benefit/2.jpg'); ?>" alt="..." width="200px" height="200px" />
                            <div class="card-body p-5">
                                <h5 class="card-title"> Motif Unik dan Trendy
                                </h5>
                                <p class="card-text">Kami menawarkan motif batik yang unik dan sesuai dengan tren terbaru, membuat Anda tampil stylish dan berbeda.</p>
                            </div>
                            <div class="card-footer p-4 pt-0 border-top-0">
                                <div class="d-flex align-items-end justify-content-between">
                                    <div class="d-flex align-items-center">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <div class="card h-100 shadow border-0">
                            <img class="card-img-top" src="<?php echo base_url('img/benefit/3.jpeg'); ?>" alt="..." width="200px" height="200px" />
                            <div class="card-body p-5">
                                <h5 class="card-title">Tidak perlu mengantri</h5>
                                <p class="card-text">Nikmati layanan pengiriman cepat yang menjamin
                                    pesanan Anda tiba dalam waktu singkat, sehingga Anda bisa segera menikmati produk batik pilihan Anda.</p>
                            </div>
                            <div class="card-footer p-4 pt-0 border-top-0">
                                <div class="d-flex align-items-end justify-content-between">
                                    <div class="d-flex align-items-center">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


    <!-- Testimonial Start -->
    <div class="container-fluid bg-icon py-6">
        <div class="container">
            <div class="section-header text-center mx-auto mb-20 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h1 class="display-5 mb-3 text-red">Customer Review</h1>

            </div>
            <div class="section-header text-center mx-auto mb-15 wow fadeInUp" data-wow-delay="1500s" style="max-width: 500px;">

            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                <div class="testimonial-item position-relative bg-white p-5 mt-4">
                    <i class="fa fa-quote-left fa-3x text-primary position-absolute top-0 start-0 mt-n4 ms-5"></i>
                    <p class="mb-4">Sangat puas dengan pembelian saya di sini! Motif batiknya sangat unik dan modern, persis seperti yang saya cari.
                        Proses pemesanan sangat mudah dan barang sampai dengan cepat. Pasti akan membeli lagi di sini!</p>
                    <div class="d-flex align-items-center">
                        <img class="flex-shrink-0 rounded-circle" src="img/testimonial-1.jpg" alt="">
                        <div class="ms-3">
                            <h5 class="mb-1">Siti</h5>
                            <span>Swasta</span>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item position-relative bg-white p-5 mt-4">
                    <i class="fa fa-quote-left fa-3x text-primary position-absolute top-0 start-0 mt-n4 ms-5"></i>
                    <p class="mb-4">Pengalaman berbelanja yang luar biasa. Batiknya berkualitas tinggi dan harga yang ditawarkan sangat terjangkau.
                        Saya juga sangat menghargai kemasan ramah lingkungan yang digunakan. Terima kasih! </p>
                    <div class="d-flex align-items-center">
                        <img class="flex-shrink-0 rounded-circle" src="img/testimonial-2.jpg" alt="">
                        <div class="ms-3">
                            <h5 class="mb-1">Anugerah </h5>
                            <span>mahasiswa</span>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item position-relative bg-white p-5 mt-4">
                    <i class="fa fa-quote-left fa-3x text-primary position-absolute top-0 start-0 mt-n4 ms-5"></i>
                    <p class="mb-4">Layanan pelanggan yang sangat responsif dan membantu. Saya sempat ragu dengan ukuran, tapi mereka dengan sabar menjawab semua pertanyaan saya.
                        Pengiriman juga cepat, hanya dalam dua hari batik saya sudah sampai. Sempurna!</p>
                    <div class="d-flex align-items-center">
                        <img class="flex-shrink-0 rounded-circle" src="img/testimonial-3.jpg" alt="">
                        <div class="ms-3">
                            <h5 class="mb-1">Irvan hakim</h5>
                            <span>Artis</span>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item position-relative bg-white p-5 mt-4">
                    <i class="fa fa-quote-left fa-3x text-primary position-absolute top-0 start-0 mt-n4 ms-5"></i>
                    <p class="mb-4">"Motif batik di sini sangat trendy dan cocok untuk anak muda. Saya mendapatkan banyak pujian saat mengenakannya.
                        Selain itu, sistem pembayaran yang mudah membuat pengalaman belanja saya semakin menyenangkan.</p>
                    <div class="d-flex align-items-center">
                        <img class="flex-shrink-0 rounded-circle" src="img/testimonial-4.jpg" alt="">
                        <div class="ms-3">
                            <h5 class="mb-1">Sutiyem</h5>
                            <span>Ibu rumah tangga</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Testimonial End -->

<!-- gallary -->


<!-- footer -->
<!-- Footer Start -->
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

</div>
<!-- Footer End -->
<!-- footer -->

<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-warning btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>

<!-- Contact Sesion -->
<?= $this->endSection(); ?>