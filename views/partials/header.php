<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $this->getTitle(); ?></title>
</head>

<body>

    <nav>
        <ul>
            <li><a href="<?php echo constant('URL') ?>home">Home</a></li>
            <li><a href="<?php echo constant('URL') ?>login">Login</a></li>
            <li><a href="<?php echo constant('URL') ?>register">Register</a></li>
        </ul>
    </nav>