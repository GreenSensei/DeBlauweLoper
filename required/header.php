<!-- user check and navbar button check-->
<nav class="navbar bg-light navbar-expand-md navbar-light">
    <div class="container">
        <div class="collapse navbar-collapse" id="navmenu">
            <ul class="nav nav-pills nav-fill ms-auto">
                <?php if($page == "home" || $page == "") : ?>
                    <li>
                        <a href="<?= ROOT ?>/home" class="nav-link bg-primary text-light fs-5">Home</a>
                    </li>
                <?php else : ?>
                    <li>
                        <a href="<?= ROOT ?>/home" class="nav-link text-primary border border-primary border-1 rounded fs-5">Home</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>  
        <div class="collapse navbar-collapse" id="navmenu">
            <ul class="nav nav-pills nav-fill ms-auto">
                <?php if($page == "informatie") : ?>
                    <li>
                        <a href="<?= ROOT ?>/informatie" class="nav-link bg-primary text-light fs-5">Informatie</a>    
                    </li>
                <?php else : ?>
                    <li>
                        <a href="<?= ROOT ?>/informatie" class="nav-link text-primary border border-primary border-1 rounded fs-5">Informatie</a>
                    </li>
                <?php endif; ?>            
            </ul>
        </div>
        <div class="collapse navbar-collapse" id="navmenu">
            <ul class="nav nav-pills nav-fill ms-auto">
                <?php if($page == "contact") : ?>
                    <li>
                        <a href="<?= ROOT ?>/contact" class="nav-link bg-primary text-light fs-5">Contact</a> 
                    </li>
                <?php else : ?>
                    <li>
                        <a href="<?= ROOT ?>/contact" class="nav-link text-primary border border-primary border-1 rounded fs-5 ">Contact</a> 
                    </li>
                <?php endif; ?>
            </ul>
        </div>
        <?php if(isset($_SESSION["user"])) : ?>
            <div class="collapse navbar-collapse" id="navmenu">
                <ul class="nav nav-pills nav-fill ms-auto">
                    <?php if($page == "profile/profile") : ?>
                        <li>
                            <a href="<?= ROOT ?>/profile/profile" class="nav-link bg-primary text-light fs-5">Profiel</a> 
                        </li>
                    <?php else : ?>
                        <li>
                            <a href="<?= ROOT ?>/profile/profile" class="nav-link text-primary border border-primary border-1 rounded fs-5">Profiel</a> 
                        </li>
                    <?php endif; ?>   
                </ul>
            </div>
            <div class="collapse navbar-collapse" id="navmenu">
                <ul class="nav nav-pills nav-fill ms-auto">
                    <?php if($page == "matches/matches") : ?>
                        <li>
                            <a href="<?= ROOT ?>/matches/matches" class="nav-link bg-primary text-light fs-5">Wedstrijden</a>    
                        </li>        
                    <?php else : ?>
                        <li>
                            <a href="<?= ROOT ?>/matches/matches" class="nav-link text-primary border border-primary border-1 rounded fs-5">Wedstrijden</a>    
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
            <?php if($_SESSION["user"]->getStatusId() == "3" || $_SESSION["user"]->getStatusId() == "4") : ?>
                <div class="collapse navbar-collapse" id="navmenu">
                    <ul class="nav nav-pills nav-fill ms-auto">
                        <?php if($page == "customers/customers") : ?>
                            <li>
                                <a href="<?= ROOT ?>/customers/customers" class="nav-link bg-primary text-light fs-5">Leden</a>    
                            </li>
                        <?php else : ?>
                            <li>
                                <a href="<?= ROOT ?>/customers/customers" class="nav-link text-primary border border-primary border-1 rounded fs-5">Leden</a>    
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            <?php endif ?>  
            <div class="collapse navbar-collapse" id="navmenu">
                <ul class="nav nav-pills nav-fill ms-auto">
                    <a href="<?= ROOT ?>/in-outlog/logout" class="nav-link text-primary border border-primary border-1 rounded fs-5">Uitloggen</a>
                </ul>
            </div>
        <?php else : ?>
            <div class="collapse navbar-collapse" id="navmenu">
                <ul class="nav nav-pills nav-fill ms-auto">
                    <?php if($page == "in-outlog/login") : ?>    
                        <li>
                            <a href="<?= ROOT ?>/in-outlog/login" class="nav-link bg-primary text-light fs-5">Inloggen</a>    
                        </li>
                    <?php else : ?>
                        <li>
                            <a href="<?= ROOT ?>/in-outlog/login" class="nav-link text-primary border border-primary border-1 rounded fs-5">Inloggen</a>    
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        <?php endif ;?>

        <?php if ($page == "home" || $page == "informatie" || $page == "contact" || $page == "") : ?>
            <img style="height:auto; width:5%;" src="images/bishop.png">
        <?php else : ?>
            <img style="height:auto; width:5%;" src="../images/bishop.png">
        <?php endif; ?> 
        <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
            <span class="navbar-toggler-icon"></span>
        </button> -->
    </div>
</nav>