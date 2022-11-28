<nav class="navbar bg-light navbar-expand-md navbar-light">
    <div class="container">
        <a href="<?= ROOT ?>" class="text-decoration-none">
            <h2 class="text-dark p-2">De <span class="text-danger">Blauwe</span><span class="text-success">Loper</span></h2>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navmenu">
            <ul class="nav nav-pills nav-fill ms-auto">
                <?php foreach (Pages::getPagesFileNames() as $value) : ?>
                    <?php $page = empty($page) ? "Home" : $page; ?>
                    <?php if ($page == $value) : ?>
                        <li class="nav-item p-1">
                            <a href="<?= ROOT . $value ?>" class="nav-link bg-success text-light fs-5"><?= $value ?></a>
                        </li>
                    <?php else : ?>
                        <li class="nav-item p-1">
                            <a href="<?= ROOT . $value ?>" class="nav-link text-success border border-succes border-1 rounded fs-5"><?= $value ?></a>
                        </li>
                    <?php endif ?>
                <?php endforeach; ?>
                <?php if (isset($_SESSION['user'])) : ?>
                    <?php $value = "Beheer-Account" ?>
                    <?php if ($page == $value) : ?>
                        <li class="nav-item p-1">
                            <a href="<?= ROOT . $value ?>" class="nav-link bg-success text-light fs-5"><?= $value ?></a>
                        </li>
                    <?php else : ?>
                        <li class="nav-item p-1">
                            <a href="<?= ROOT . $value ?>" class="nav-link text-success border border-succes border-1 rounded fs-5"><?= $value ?></a>
                        </li>
                    <?php endif ?>
                    <?php $value = "Uitloggen" ?>
                    <?php if ($page == $value) : ?>
                        <li class="nav-item p-1">
                            <a href="<?= ROOT . $value ?>" class="nav-link bg-success text-light fs-5"><?= $value ?></a>
                        </li>
                    <?php else : ?>
                        <li class="nav-item p-1">
                            <a href="<?= ROOT . $value ?>" class="nav-link text-success border border-succes border-1 rounded fs-5"><?= $value ?></a>
                        </li>
                    <?php endif ?>
                <?php else : ?>
                    <?php $value = "Login-Registreer" ?>
                    <?php if ($page == $value) : ?>
                        <li class="nav-item p-1">
                            <a href="<?= ROOT . $value ?>" class="nav-link bg-success text-light fs-5"><?= $value ?></a>
                        </li>
                    <?php else : ?>
                        <li class="nav-item p-1">
                            <a href="<?= ROOT . $value ?>" class="nav-link text-success border border-succes border-1 rounded fs-5"><?= $value ?></a>
                        </li>
                    <?php endif ?>
                <?php endif ?>
            </ul>
        </div>
    </div>
</nav>