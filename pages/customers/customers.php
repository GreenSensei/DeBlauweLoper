<body>
    <section class="text-center mt-5">
        <h2>Leden</h2>
    </section>
<!-- table customers -->
    <section class="container mt-5">
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>Naam</td>
                    <td>Email</td>
                    <td>Telefoonnummer</td>
                    <td>Status</td>
                    <td>Beheren</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach (Customer::getAllCustomers() as $customer) : ?>
                    <tr>
                        <?php for ($i=0; $i <(count($customer)/2)-1 ; $i++) : ?>
                            <?php if($i == 0 || $i == 3) : ?>
                                <td class="align-middle"><?=ucwords($customer[$i])?></td>
                            <?php else : ?>
                                <td class="align-middle"><?=$customer[$i]?></td>
                            <?php endif; ?>
                        <?php endfor; ?>
                        <td style="width: 15%">
                            <a href="<?=ROOT?>/customers/editCustomers?id=<?=$customer["id"]?>">
                                <button type="button" class="btn btn-sm" style="width: 30%">
                                    <img style="width: 100%" src="<?=ROOT?>/images/edit.png">
                                </button>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>
</body>
