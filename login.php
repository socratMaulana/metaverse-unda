<?php 

require_once("config.php");

if(isset($_POST['login'])){

    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    $sql = "SELECT * FROM users WHERE username=:username OR email=:email";
    $stmt = $db->prepare($sql);
    
    // bind parameter ke query
    $params = array(
        ":username" => $username,
        ":email" => $username
    );

    $stmt->execute($params);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // jika user terdaftar
    if($user){
        // verifikasi password
        if(password_verify($password, $user["password"])){
            // buat Session
            session_start();
            $_SESSION["user"] = $user;
            // login sukses, alihkan ke halaman timeline
            header("Location: timeline.php");
        }
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="login_style.css">
    <link rel="stylesheet" type="text/css" href="fontawesome-free/css/all.min.css">
    <link rel='icon' href='img/rocket.png' type='image/x-icon' sizes="16x16" />
    <title>Login</title>

  </head>
<body>

  <div class="container-fluid ps-md-0">
  <div class="row g-0">

    <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>

    <div class="col-md-8 col-lg-6">
      <div class="login d-flex align-items-center py-5">
        <div class="container">
          <div class="row">
            <div class=" mx-auto ">

              <nav id="Nav" class=" navbar navbar-expand-lg navbar-light">

        <div class="collapse navbar-collapse fw-normal" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mr-1" class="fontberanda">
            <li class="nav-item active">
              <a  class="nav-link" href="index.html"  style="margin-right: 50px; color: white; ">Beranda</a>
            </li>
                    
              <li class="nav-item ">
                <a  class="nav-link " style="margin-right: 50px; color: white;" href="hubungi.html" >Hubungi</a>
                  </li>
                 <li class="nav-item">
                  <a  class="nav-link" href="profil.html" style="margin-right: 50px; color: white;">Profil</a>
                  </li>
                  <li class="nav-item">
                  <a  class="nav-link" href="bantuan.html" style="color: white;" >Bantuan</a>
                  </li>
                </li>                 
            
          </ul>
        </div>
      </div>
    </nav>
  </div>
              <div class="col-md-9 col-lg-8 mx-auto ">
              <h3 class="login-heading mb-4" style="color:white;font-family:Poppins-SemiBold;">Welcome to Metada!</h3>

              <!-- Sign In Form -->
             <form action="" method="POST">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" name="username" id="floatingInput" placeholder="name@example.com">
                  <label for="username">Email address</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
                  <label for="password">Password</label>
                </div>

                <div class="form-check mb-3">
                  <input class="form-check-input" type="checkbox" value="" id="rememberPasswordCheck">
                  <label class="form-check-label" for="rememberPasswordCheck" style="color:white;">
                    Remember password
                  </label>
                </div>

                <div class="d-grid">
                  <button name="login" value="Masuk" class="btn btn-lg btn-primary btn-login text-uppercase fw-bold mb-2" type="submit">Sign in</button>
                  <div class="text-center">
                    <a id="f" class="small" href="#" style="text-decoration: none;">Forgot password?</a> 
                    <a class="small"  href="register.php" style="text-decoration: none;">Create Account</a>
                  </div>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    -->
</body>
</html>
