<section class="text-center mt-5">
        <h2>Beheerders</h2>
        Hier vind u ons secretariaart, bestuur en onze scheidsrechters.
    </section>
<!-- admin table -->

<body>
    <div class="container mt-5">
        <table class="table">
            <thead>
                <tr>
                    <td>Naam</td>
                    <td>Email</td>
                    <td>Telefoonnummer</td>
                    <td>Status</td>
                </tr>
            </thead>
            <tbody>
            <?php foreach (Customer::getAllAdmins() as $admin) : ?>
                    <tr>
                        <?php for ($i=0; $i <count($admin)/2 ; $i++) : ?>
                            <?php if($i == 0 || $i == 3) : ?>
                                <td class="align-middle"><?=ucwords($admin[$i])?></td>
                            <?php else : ?>
                                <td class="align-middle"><?=$admin[$i]?></td>
                            <?php endif; ?>
                        <?php endfor; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
