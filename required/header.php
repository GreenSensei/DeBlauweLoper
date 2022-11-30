<nav class="navbar bg-light navbar-expand-md navbar-light">
    <div class="container">

    <?php if(isset($_SESSION["user"])) : ?>
        <div class="collapse navbar-collapse" id="navmenu">
            <ul class="nav nav-pills nav-fill ms-auto">
                <a href="<?= ROOT ?>/in-outlog/uitloggen" class="nav-link text-primary border border-succes border-1 rounded fs-5">Uitloggen</a>    
            </ul>
        </div>
    <?php else : ?> 
        <div class="collapse navbar-collapse" id="navmenu">
            <ul class="nav nav-pills nav-fill ms-auto">
                <a href="<?= ROOT ?>/in-outlog/login" class="nav-link text-primary border border-succes border-1 rounded fs-5">Login</a>    
            </ul>
        </div>
        <div class="collapse navbar-collapse" id="navmenu">
            <ul class="nav nav-pills nav-fill ms-auto">
                <a href="<?= ROOT ?>/leden" class="nav-link text-primary border border-succes border-1 rounded fs-5">Leden</a>    
            </ul>
        </div>
        <div class="collapse navbar-collapse" id="navmenu">
            <ul class="nav nav-pills nav-fill ms-auto">
                <a href="<?= ROOT ?>/contact" class="nav-link text-primary border border-succes border-1 rounded fs-5">Contact</a>    
            </ul>
        </div>
        <div class="collapse navbar-collapse" id="navmenu">
            <ul class="nav nav-pills nav-fill ms-auto">
                <a href="<?= ROOT ?>/informatie" class="nav-link text-primary border border-succes border-1 rounded fs-5">Informatie</a>    
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