<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300&family=Rum+Raisin&display=swap"
      rel="stylesheet"
    />
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Pacifico&display=swap" rel="stylesheet">
    
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Pacifico&family=Signika+Negative&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="css/log.css" />
    
    <title>Register</title>
</head>
<body>
    <section>
        <div class="form-box">
            <div class="form-value">
                <form action="signupPost.php" method="post">
                    <h2>Sign<span>up</span></h2>
                    <div class="inputbox">
                        <ion-icon name="person-outline"></ion-icon>
                        <input type="text" name="name_user" id="" required>
                        <label for="">name</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="email" name="email_user" id="" required>
                        <label for="">email</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name="password_user" id="" required>
                        <label for="">password</label>
                    </div>
                    <div class="forget">
                        <label for=""><input type="checkbox">Ingatkan Saya</label><a href="#">  lupa password?</a>
                    </div>
                    <button>sign up</button>
                    <div class="register">
                        <p>Sudah punya akun? <a href="login.html">Login</a></p> 
                        
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>