<?php
?>
<body>
    <section class="text-center mt-5">
        <h2>Wedstrijd <span class="text-primary">overzicht<span></h2>
    </section>
    
    <?php if($_SESSION["user"]->getStatusId() == "2") :?>
        <section class="text-center mt-5">
            <a href="<?=ROOT?>/matches/addMatches">
                <button type="button" class="btn btn-lg bg-primary text-light">
                    Toevoegen
                </button>
            </a>
        </section>
    <?php endif;?>

    <!-- match table -->
    <div class="container mt-5">
        <table class="table table-hover">
            <thead>
                <tr>
                    <td>Speler 1</td>
                    <td></td>
                    <td>Speler 2</td>
                    <td></td>
                    <td>Uitslag</td>
                    <td>Start tijd</td>
                    <td>Eind tijd</td>
                    <?php if($_SESSION["user"]->getStatusId() == "2") :?>
                        <td>Beheren</td>
                    <?php endif; ?>
                </tr>
            </thead>
            </tbody>
                <?php foreach(Matches::getAllMatches() as $matches) : ?>
                    <tr>
                        <?php for ($i=0; $i <count($matches)/2 ; $i++) : ?>
                            <?php if($i == 0 || $i == 1) : ?>
                                <td><?= Customer::getCustomerById($matches[$i])->getName()?><td>             
                            <?php elseif($i == 3 || $i == 4) : ?>
                                <td>
                                    <?= date("H:i:s", strtotime($matches[$i])) ?>
                                    --
                                    <?= date("d-m-Y", strtotime($matches[$i])) ?>
                                </td>
                            <?php else : ?>
                                <td><?=$matches[$i]?></td>
                            <?php endif; ?>              
                        <?php endfor; ?>
                        <?php if($_SESSION["user"]->getStatusId() == "2") : ?>
                            <td style="width: 15%">
                                <a href="<?=ROOT?>/matches/editMatches?id=<?=$matches["id"]?>">
                                    <button type="button" class="btn btn-sm" style="width: 30%">
                                        <img style="width: 100%" src="<?=ROOT?>/images/edit.png">
                                    </button>
                                </a>
                                <a href="<?=ROOT?>/matches/deleteMatches?id=<?=$matches["id"]?>">
                                    <button type="button" class="btn btn-sm" style="width: 30%">
                                        <img style="width: 100%" src="<?=ROOT?>/images/remove.png">
                                    </button>
                                </a>
                            </td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
