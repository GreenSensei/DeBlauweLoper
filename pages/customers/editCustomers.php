<!-- update functions -->
<body>
    <?php
        $customer = Customer::getCustomerById($_GET["id"]);
        $status = Status::getStatusById($customer->getStatusId());
        if(!empty($_POST))
        { 
            //update functie 
            (new Customer($customer->getId(), $_POST["name"], $_POST["email"], $_POST["phone"], Status::getStatusByVarchar($_POST["status"])->getId()))->updateCustomer();
            header("Location: ". ROOT . "/customers/customers");
            
        }
    ?>
<!-- from leden aanpassen -->
    <form method="post">
        <label>Naam:</label>
        <input type="text" name="name" value="<?=$customer->getName()?>" readonly>
        <label>Email:</label>
        <input type="email" name="email" value="<?=$customer->getEmail()?>" readonly>
        <label>Telefoonnummer:</label>
        <input type="text" name="phone" value="<?=$customer->getPhone()?>" readonly>
        <label>Status:</label>
        <input type="text" list="status" name="status" required>
        <datalist id="status">
            <?php foreach (Status::getAllStatuses() as $statuses) : ?>
                <option value="<?=$statuses["status"]?>"></option>
            <?php endforeach; ?>
        </datalist>
        <input type="submit" value="Veranderen">
    </form>
</body>