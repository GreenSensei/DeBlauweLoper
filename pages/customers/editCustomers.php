<!-- update functions -->
<body>
    <?php
        $customer = Customer::getCustomerById($_GET["id"]);

        // vv onnodig??
        // $status = Status::getStatusById($customer->getStatusId());
        $statusus = Status::getAllStatuses();
        if(!empty($_POST))
        { 
            //update function Status::getStatusByVarchar($_POST["status"])->getId()
            (new Customer($customer->getId(), $customer->getName(), $customer->getEmail(), $customer->getPhone(), $_POST["status"]))->updateCustomer();

            $msg ="Uw status is gewijzigd naar: ".$_POST["status"].".\rUw inlog mail:" .$customer->getEmail()."\rBezoek de website: http://localhost/DeBlauweLoper/home";
            mail($customer->getEmail(), "Wijziging status",$msg, "From:info@deblauweloper.nl"); 

            header("Location: ". ROOT . "/customers/customers");
            
        }
    ?>
    <section class="text-center mt-5">
        <h2>Leden <span class="text-primary">aanpassen</span></h2>
    </section>
    <!-- from edit customers -->
    <div class="d-flex justify-content-center mt-5 ">
        <form class="form-horizontal bg-light p-5 rounded" method="post">
            <div class="mb-3">
                <label class="form-label">Naam:</label>
                <input class="form-control fs-4" type="text" name="name" value="<?=ucwords($customer->getName())?>" disabled>
            </div>
            <div class="mb-3">
                <label class="form-label">Email:</label>
                <input class="form-control fs-4" type="email" name="email" value="<?=$customer->getEmail()?>" disabled>
            </div>
            <div class="mb-3">
                <label class="form-label">Telefoonnummer:</label>
                <input class="form-control fs-4" type="text" name="phone" value="<?=$customer->getPhone()?>" disabled>
            </div>
            <div class="mb-3">           
                <label class="form-label">Status</label>               
                <select class="form-control fs-4 form-select" name="status" id="id">
                    <?php for ($i=0; $i < count($statusus) ; $i++) : ?>
                        <option value='<?=$statusus[$i]["id"]?>' <?php if(Status::getStatusById($customer->getStatusId())->getStatus() == $statusus[$i]['status']) {echo "selected";} ?>><?=ucwords($statusus[$i]["status"])?></option>
                    <?php endfor ?>
                </select>
            </div>
            <div class="d-flex justify-content-center">
                <input class="btn btn-primary btn-lg me-3"type="submit" value="Veranderen">
            </div>
        </form>
    </div>
</body>