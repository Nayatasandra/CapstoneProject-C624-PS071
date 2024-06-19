<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="/anfstudiologo.svg" type="image/x-icon">
    <title>BATIK SOUL</title>
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0-alpha1/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0-alpha1/css/bootstrap.min.css" integrity="sha512-72OVeAaPeV8n3BdZj7hOkaPSEk/uwpDkaGyP4W2jSzAC8tfiO4LMEDWoL3uFp5mcZu+8Eehb4GhZWFwvrss69Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/style.css'); ?>" media="all" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/style_front.css'); ?>" media="all" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="<?= base_url() ?>/lib/animate/animate.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>/css/style.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<body class="all-content">
    <!-- Navbar -->
    <?= $this->include('layout/navbar') ?>
    <!-- End Navbar -->

    <main role="main" class="">
        <!-- Content Section -->
        <?= $this->renderSection('content') ?>
        <!-- End Content Section -->
    </main>

    <!-- JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>/lib/wow/wow.min.js"></script>
    <script src="<?= base_url() ?>/lib/easing/easing.min.js"></script>
    <script src="<?= base_url() ?>/lib/waypoints/waypoints.min.js"></script>
    <script src="<?= base_url() ?>/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

    <!-- AOS -->
    <script>
        AOS.init();
    </script>
    <!-- Timestamp -->
    <script>
        var myDate = new Date();
        var hrs = myDate.getHours();
        var greet;

        if (hrs < 12)
            greet = 'Good Morning';
        else if (hrs >= 12 && hrs <= 17)
            greet = 'Good Afternoon';
        else if (hrs >= 17 && hrs <= 24)
            greet = 'Good Evening';
        document.getElementById('greetings').innerHTML = '<b>' + greet + '</b>';
    </script>

    <!-- Carousel -->
    <script>
        const config = {
            autoload: true,
            itemsToBeVisible: 3,
            speed: 5000
        };

        function start() {
            window.onload = function() {
                setSlidersStyle(config);

                const prevSlideButton = document.getElementById("prev-slide");
                const nextSlideButton = document.getElementById("next-slide");

                prevSlideButton.addEventListener("click", () => {
                    navigate("backward", config);
                });

                nextSlideButton.addEventListener("click", () => {
                    navigate("forward", config);
                });

                if (config.autoload) {
                    playCarousel(nextSlideButton, config);
                }
            };
        }

        function setSlidersStyle(config) {
            document.querySelector(
                "style"
            ).textContent += `@media screen and (min-width:1180px) { .carousel__slide{ min-width: ${100 / config.itemsToBeVisible}% } }`;
        }

        function navigate(position, config) {
            const carouselEl = document.getElementById("carousel");
            const slideContainerEl = carouselEl.querySelector(".carousel__container");
            const slideEl = carouselEl.querySelector(".carousel__slide");
            let slideWidth = slideEl.offsetWidth;
            slideContainerEl.scrollLeft = this.getNewScrollPosition(
                position,
                slideContainerEl,
                slideWidth,
                config
            );
        }

        function getNewScrollPosition(position, slideContainerEl, slideWidth, config) {
            const maxScrollLeft =
                slideContainerEl.scrollWidth - slideWidth * config.itemsToBeVisible;
            if (position === "forward") {
                const x = slideContainerEl.scrollLeft + slideWidth;
                return x <= maxScrollLeft ? x : 0;
            } else {
                const x = slideContainerEl.scrollLeft - slideWidth;
                return x >= 0 ? x : maxScrollLeft;
            }
        }

        function playCarousel(nextButton, config) {
            const play = () => {
                nextButton.click();
                setTimeout(play, config.speed);
            };
            play();
        }
        start();
    </script>

    <!-- JQuery getCity -->
    <?= $this->renderSection('script') ?>

</body>

</html>