<!DOCTYPE html>
<!-- Coding by CodingNepal | www.codingnepalweb.com-->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> Registrasi - UD Dewisuter </title>
    <link rel="stylesheet" href="/styles/auth.css">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="container">
        <div class="cover">
            <div class="front">

            </div>
        </div>
        <div class="forms">
            <div class="form-content">
                <div class="login-form">
                    <div class="title">Registrasi</div>
                    <form method="post" action="registrasi">
                        @csrf
                        <div class="input-boxes">
                            <div class="input-box">
                                <i class="fas fa-user"></i>
                                <input type="text" placeholder="Masukan Nama" name="name" required>
                            </div>
                            <div class="input-box">
                                <i class="fas fa-envelope"></i>
                                <input type="text" placeholder="Masukan Email" name="email" required>
                            </div>
                            <div class="input-box">
                                <i class="fas fa-lock"></i>
                                <input type="password" placeholder="Masukan Password" name="password" required>
                            </div>
                            <div class="text"><a href="">UD Dewisuter</a></div>
                            <div class="button input-box">
                               <button type="submit">Submit</button>
                            </div>
                            <div class="text sign-up-text">Sudah mempunyai akun? <a href="{{route('login')}}">Login Sekarang</a></div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    @include('sweetalert::alert')
</body>

</html>
