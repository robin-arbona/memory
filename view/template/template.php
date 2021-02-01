<?php
if (isset($_POST['disconnect'])) {
    session_destroy();
    header('Location: index.php?view=login');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="public/style.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com"> 
    <link href="https://fonts.googleapis.com/css2?family=Fraunces&display=swap" rel="stylesheet"> 
    <title>Memory</title>
</head>

<body class="d-flex flex-column min-vh-100">
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">Menu</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <?php if(isset($_SESSION['login'])){?>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php?view=game">Game</a>
                        </li>
                        <?php }?>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php?view=signup">Sign Up</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php?view=login">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php?view=wall_of_fame">Wall Of Fame</a>
                        </li>
                    </ul>
                    <form class="d-flex" method="post">
                        <button name="disconnect" class="btn btn-outline-success" type="submit">Disconnect</button>
                    </form>

                </div>
            </div>
        </nav>
    </header>

    <main>
        <?= $content; ?>
    </main>

    <footer class="bg-light text-center text-lg-start mt-auto">
        <div class="text-center py-3" >
            © 2021 Copyright:
            <a class="text-dark" href="https://github.com/robin-arbona">Arbona Robin</a>
            <a class="text-dark" href="https://github.com/robin-papazian">Papazian Robin</a>
            <a class="text-dark" href="https://github.com/pierre-malardier">Malardier Pierre</a>
        </div>
        <!-- Copyright -->
    </footer>
</body>

</html>