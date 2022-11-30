<section class="text-center">
    <h2>Leden</h2>
</section>

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
                <td><?=$customer[$i]?></td>
            <?php endfor; ?>
            <td><a href="" >Aanpassen</a></td>
        <?php endforeach; ?>
    </tbody>
</table>