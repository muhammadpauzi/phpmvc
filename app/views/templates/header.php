<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/mystyle.css">
    <!-- $data['judul'] adalah data yang dikirimkan dari method view untuk title pada tiap halaman -->
    <title><?= $data['judul']; ?></title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="<?= BASEURL; ?>">MVC</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link" href="<?= BASEURL; ?>">Home <span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link" href="<?= BASEURL; ?>/user">User</a>
                    <a class="nav-item nav-link" href="<?= BASEURL; ?>/about">About</a>
                </div>
            </div>
        </div>
    </nav>