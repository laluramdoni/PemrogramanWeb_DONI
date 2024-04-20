<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300&family=Rum+Raisin&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Pacifico&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Pacifico&family=Signika+Negative&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="../asset/css/bootstrap.css" />
    <link rel="stylesheet" href="../asset/css/log.css" />

    <title>login</title>
</head>

<body>
    <section>
        <div class="form-box">
            <div class="form-value">
                <?php if (isset($error)) { ?>
                    <p style="color: red;"><?php echo $error; ?></p>
                <?php } ?>

                <?php if (isset($success)) { ?>
                    <p style="color: green;"><?php echo $success; ?></p>
                <?php } ?>

                 <form action="loginPost.php" method="POST">
                    <h2>Log<span>in</span></h2>
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="email" name="email_user" id="" required>
                        <label for="">email</label>
                        <i></i>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name="password_user" id="" required>
                        <label for="">password</label>
                        <i></i>
                    </div>
                    <div class="forget">
                        <label for=""><input type="checkbox">Ingatkan Saya</label><a href="#"> lupa password?</a>
                    </div>
                    <button type="submit" class="btn btn-primary">Log in</button>
                    <div class="register">
                        <p>Belum punya akun? <a href="signup.php">Signup</a></p>

                    </div>
                    <div class="col-12">
                        <div class="row text-center">
                            <a href="../admin/login.php" class="btn btn-primary">Login Admin</a>
                            <a href="../penjual/login.php" class="btn btn-primary ">Login Penjual</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>