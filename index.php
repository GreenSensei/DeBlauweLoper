<?php

declare(strict_types=1);

const ROOT = "/DeBlauweLoper/";

require_once("classes/Pages.php");
require_once("classes/DBConn.php");

session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href=".css">
    <title>DeBlauweLoper</title>
</head>

<body>
    <?php

    $page = Pages::getHeader();
   // echo $page;
    require_once("required/header.php");

    if ($page == "Login" ) {
        require_once("pages/in-outlog/" . $page . ".php");
    // } else if ($page == "Beheer-Account" || $page == "Registreren") {
    //     require_once("pages/account/" . $page . ".php");|| $page == "Uitloggen"
    } else {
        $page = empty($page) ? "Home" : $page;

        require_once("pages/" . $page . ".php");
    }
    ?>
</body>

</html>