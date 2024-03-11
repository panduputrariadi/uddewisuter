<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>UD dewisuter</title>
    <link rel="icon" href="img/logo-fix.png" type="image/png">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Saira:wght@500;600;700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="/styles/user.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

</head>

<body>

    @include('navbar.usernavbar')
    @include('content.order')
    @include('footer.userfooter')

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>


    <script>
        window.addEventListener('scroll', function() {
            var navbar = document.querySelector('.navbar');
            if (window.scrollY > 1) {
                navbar.classList.add('navbar-scrolled');
            } else {
                navbar.classList.remove('navbar-scrolled');
            }
        });

        function showFullDescription() {
            var fullDescription = document.getElementById("full-description");
            var showMoreButton = document.getElementById("show-more");

            if (fullDescription.style.display === "none") {
                // Menampilkan deskripsi penuh
                fullDescription.style.display = "inline";
                showMoreButton.textContent = "Lihat lebih sedikit";

                // Animasi scroll ke deskripsi penuh
                var scrollOptions = {
                    top: fullDescription.offsetTop,
                    behavior: "smooth",
                };
                window.scrollTo(scrollOptions);
            } else {
                // Menyembunyikan deskripsi penuh
                fullDescription.style.display = "none";
                showMoreButton.textContent = "Lihat lebih banyak";

                // Animasi scroll ke bagian atas halaman
                var scrollOptions = {
                    top: 0,
                    behavior: "smooth",
                };
                window.scrollTo(scrollOptions);
            }
        }


        AOS.init();
    </script>
</body>

</html>
