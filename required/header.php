<!-- controle wat een user wel en niet mag zien -->
<nav class="navbar bg-light navbar-expand-md navbar-light">
    <div class="container">
    <div class="collapse navbar-collapse" id="navmenu">
            <ul class="nav nav-pills nav-fill ms-auto">
                <a href="<?= ROOT ?>/home" class="nav-link text-primary border border-succes border-1 rounded fs-5">Home</a>    
            </ul>
        </div>  
        <div class="collapse navbar-collapse" id="navmenu">
            <ul class="nav nav-pills nav-fill ms-auto">
                <a href="<?= ROOT ?>/informatie" class="nav-link text-primary border border-succes border-1 rounded fs-5">Informatie</a>    
            </ul>
        </div>
        <div class="collapse navbar-collapse" id="navmenu">
            <ul class="nav nav-pills nav-fill ms-auto">
                <a href="<?= ROOT ?>/contact" class="nav-link text-primary border border-succes border-1 rounded fs-5">Contact</a>    
            </ul>
        </div>
    <?php if(isset($_SESSION["user"])) : ?>
        <div class="collapse navbar-collapse" id="navmenu">
            <ul class="nav nav-pills nav-fill ms-auto">
                <a href="<?= ROOT ?>/profile/profile" class="nav-link text-primary border border-succes border-1 rounded fs-5">Profiel</a>    
            </ul>
        </div>
        <div class="collapse navbar-collapse" id="navmenu">
                <ul class="nav nav-pills nav-fill ms-auto">
                    <a href="<?= ROOT ?>/matches/matches" class="nav-link text-primary border border-succes border-1 rounded fs-5">Wedstrijden</a>    
                </ul>
            </div>
        <?php if($_SESSION["user"]->getStatusId() == "3" || $_SESSION["user"]->getStatusId() == "4") : ?>
            <div class="collapse navbar-collapse" id="navmenu">
                <ul class="nav nav-pills nav-fill ms-auto">
                    <a href="<?= ROOT ?>/customers/customers" class="nav-link text-primary border border-succes border-1 rounded fs-5">Leden</a>    
                </ul>
            </div>
        <?php endif ?>  
        <div class="collapse navbar-collapse" id="navmenu">
            <ul class="nav nav-pills nav-fill ms-auto">
                <a href="<?= ROOT ?>/in-outlog/logout" class="nav-link text-primary border border-succes border-1 rounded fs-5">Uitloggen</a>
            </ul>
        </div>
    <?php else : ?>
        <div class="collapse navbar-collapse" id="navmenu">
            <ul class="nav nav-pills nav-fill ms-auto">
                <a href="<?= ROOT ?>/in-outlog/login" class="nav-link text-primary border border-succes border-1 rounded fs-5">Login</a>    
            </ul>
        </div>
    <?php endif ;?>

            <a href="<?= ROOT ?>" class="text-decoration-none">
            <h2 class="text-dark p-2">De <span class="text-primary">Blauwe </span><span class="text-dark">Loper</span></h2>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>

<!-- kijken waar deze moet -->
<?php if($_SESSION["user"]->getStatusId() == "2" || $_SESSION["user"]->getStatusId() == "3") : ?>
        <div class="collapse navbar-collapse" id="navmenu">
            <ul class="nav nav-pills nav-fill ms-auto">
                <a href="<?= ROOT ?>/matches/editMatches" class="nav-link text-primary border border-succes border-1 rounded fs-5">Wedstrijden aanpassesn</a>    
            </ul>
        </div>
        <?php endif; ?>