<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css
">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo constant('URL') ?>assets/css/styles.css">
    <title><?php echo $this->getTitle(); ?></title>
</head>

<body>
    <header class="header">
        <nav class="menu">
            <ul class="menu__list">
                <li class="menu__item"><a href="<?php echo constant('URL') ?>home" class="menu__link">Home</a></li>
                <?php
if (!$this->getSession()) {
    ?>
                <li class="menu__item"><a href="<?php echo constant('URL') ?>login" class="menu__link">Login</a></li>
                <li class="menu__item"><a href="<?php echo constant('URL') ?>register" class="menu__link">Register</a>
                    <?php
} else {
    ?>
                <li class="menu__item"><a href="<?php echo constant('URL') ?>dashboard" class="menu__link">Dashboard</a>
                </li>
                <?php
}
?>
                </li>
            </ul>
        </nav>
        <?php
if ($this->getSession()) {
    ?>

        <div class="disconnected">
            <a href="<?php echo constant('URL'); ?>login/logout" class="btn">Desconectarse</a>
        </div>

        <?php
}
?>
    </header>