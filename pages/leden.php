<body>
    <section class="text-center">
        <br><br>
        <h2>Leden</h2>
    </section>

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
                <?php foreach (Customer::GetAllCustomers() as $customer) : ?>
                    <tr>
                        <?php for ($i=0; $i <count($customer)/2 ; $i++) : ?>
                            <td class="align-middle"><?=$customer[$i]?></td>
                        <?php endfor; ?>
                        <td style="width: 15%">
                            <a href="<?=ROOT?>/customers/editCustomer">
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
