<body>
    <pre>
        <?php
            $customer = Customer::getCustomerById(2);
            $status = Status::getStatusById($customer->getStatusId());
            // print_r($customer = Customer::getCustomerById(2));
            // print_r($status = Status::getStatusById($customer->getStatusId()));
            // print_r(Status::getAllStatuses()); 
        ?>
    </pre>

    <form>
        <label>Naam:</label>
        <input type="text" name="name" value="<?=$customer->getName()?>">
        <label>Email:</label>
        <input type="text" name="email" value="<?=$customer->getEmail()?>">
        <label>Telefoonnummer:</label>
        <input type="text" name="phone" value="<?=$customer->getPhone()?>">
        <label>Status:</label>
        <input type="text" list="status" name="status" required>
        <datalist id="status">
            <?php foreach (Status::getAllStatuses() as $statuses) : ?>
                <option value="<?=$statuses["status"]?>"></option>
            <?php endforeach; ?>
        </datalist>
    </form>
</body>