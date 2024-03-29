<?php require "../config/config.php"; ?>
<?php require "../libs/App.php"; ?>
<?php require "../includes/header.php"; ?>
<?php
$app = new App;

if (isset($_POST['submit'])) {
    $userName = $_POST['userName'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $query = "INSERT INTO users(userName, email,password) VALUES(:userName, :email, :password)";
    $arr = [
        ":userName" => $userName,
        ":email" => $email,
        ":password" => $password,
    ];
    $path = "login.php";

    $app->register($query, $arr, $path);
}


?>

<div class="container-xxl py-5 bg-dark hero-header mb-5">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Registeration</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center text-uppercase">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Register</a></li>
            </ol>
        </nav>
    </div>
</div>
</div>
<!-- Navbar & Hero End -->


<!-- Service Start -->
<div class="container">

    <div class="col-md-12 bg-dark">
        <div class="p-5 wow fadeInUp" data-wow-delay="0.2s">
            <h5 class="section-title ff-secondary text-start text-primary fw-normal">Register</h5>
            <h1 class="text-white mb-4">Register for a new user</h1>
            <form class="col-md-12" method="POST" action="register.php">
                <div class="row g-3">
                    <div class="">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="userName" id="name" placeholder="Your Name">
                            <label for="name">Username</label>
                        </div>
                    </div>
                    <div class="">
                        <div class="form-floating">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email">
                            <label for="email">Your Email</label>
                        </div>
                    </div>
                    <div class="">
                        <div class="form-floating">
                            <input type="password" class="form-control" name="password" id="email" placeholder="Your Email">
                            <label for="password">Password</label>
                        </div>
                    </div>



                    <div class="col-md-12">
                        <button class="btn btn-primary w-100 py-3" name="submit" type="submit">Register</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Service End -->


<!-- Footer Start -->
<?php require "../includes/footer.php"; ?>