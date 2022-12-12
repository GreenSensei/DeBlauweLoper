<?php

declare(strict_types=1);

const ROOT = "/DeBlauweLoper";

// classes
require_once("classes/Pages.php");
require_once("classes/DBConn.php");
require_once("classes/Login.php");
require_once("classes/Customer.php");
require_once("classes/Status.php");
require_once("classes/Register.php");
require_once("classes/Profile.php");
require_once("classes/Matches.php");

session_start();

?>
<!-- html / pagina oproepen -->
<!DOCTYPE html>
<html lang="en">

    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <!-- icon -->
        <?php $page = Pages::getHeader(); ?>
        <?php if ($page == "home" || $page == "informatie" || $page == "contact" || $page == "") : ?>
            <link rel="icon" href="images/bishop.png">
        <?php else : ?>
            <link rel="icon" href="../images/bishop.png">
        <?php endif; ?>
        
        <title>DeBlauweLoper</title>
    </head>

    <body>
        <?php
        $page = Pages::getHeader();
        require_once("required/header.php");

        if ($page == "Login" ) {
            require_once("pages/in-outlog/" . $page . ".php");
        } else {
            $page = empty($page) ? "Home" : $page;

            require_once("pages/" . $page . ".php");
        }

        require_once("required/footer.php");
        ?>
    </body>

</html>