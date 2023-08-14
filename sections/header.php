<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Franco Eramo - Spotify</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/1029091.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet"
        type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <?php if(isset($includeStylesheets) == false):?>
        <link href="/css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="/css/mystyle.css">
    <?php endif?>
</head>

<body id="page-top">
<!-- Navigation-->
<nav id="mainNav" class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top">
    <div class="container">
    <div class="header">
        <a  class="navbar-brand" href="/index.php">Spotify family</a> <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"> </button>
    </div>
    <div id="navbarResponsive" class="collapse navbar-collapse">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="/index.php">Home</a></li>
            <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="/index.php#login">Sign In</a></li>
            <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="/index.php#calendar">Calendario annuale</a></li>
            <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="/index.php#description">Descrizione</a></li>
            <?php if (isset($_SESSION['id'])): ?>
                <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="/dashboard.php">Dashboard</a></li>
            <?php endif?>
        </ul>
    </div>
    </div>
</nav><!-- Masthead-->