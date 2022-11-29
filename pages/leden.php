<section class="text-center">
    <h2>Leden</h2>
</section>

<section class="container">
    <table class="table">
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
            <?php foreach (Customer::GetAllCustomers() as $customer) : ?>
                <?php for ($i=0; $i <count($customer)/2 ; $i++) : ?>
                    <td class="align-middle"><?=$customer[$i]?></td>
                <?php endfor; ?>
                <td>
                    <a href="<?=ROOT?>/customers/addCustomer">
                        <button type="button" class="btn btn-sm" style="width: 10%">
                            <img style="width: 100%; heigtht: auto" src="<?=ROOT?>/images/edit.png">
                        </button>
                    </a>
                </td>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>