<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Login on Blog</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link href="<?php echo $view['urlbaseaddr'] ?>css/bootstrap.css" rel="stylesheet" crossorigin="anonymous">


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="<?php echo $view['urlbaseaddr'] ?>css/signin.css" rel="stylesheet">
</head>
<body class="text-center">
<form class="form-signin" method="post">
    <h1 class="h3 mb-3 font-weight-normal"><?php echo $view['error_message']; ?></h1>
    <img src="https://img.icons8.com/nolan/40/000000/gender-neutral-user.png">
    <br>
    <input name="username" type="text" id="inputUsername" class="form-control" placeholder="Username" required autofocus>
    <br>
    <img src="https://img.icons8.com/nolan/48/000000/key-security.png">
    <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
    <br>
    <button name="submit" value="1" class="btn btn-lg btn-primary btn-block" type="submit">Log In</button>
</form>
</body>
</html>