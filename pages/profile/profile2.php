<!-- update functions -->
<?php
        $customer = Customer::getCustomerById($_SESSION["user"]->getId());

        // vv onnodig??
        // $status = Status::getStatusById($customer->getStatusId());
        $statusus = Status::getAllStatuses();
        if(!empty($_POST))
        { 
            if( $_SESSION["user"]->getPassword() ==$_POST["password"])
            {
                (new Login($_SESSION["user"]->getId(), $_POST["name"], $_POST["email"], $_POST["phone"], $_SESSION["user"]->getPassword(), $_SESSION["user"]->getStatusId()))->updateCustomerById();
            }
            else{
                echo "hi";
            }
            //update function Status::getStatusByVarchar($_POST["status"])->getId()
           

        
            header("Location: ". ROOT . "/profile/profile2");
            
        }
    ?>
    <section class="text-center mt-5">
        <h2>Profiel <span class="text-primary">aanpassen</span></h2>
    </section>
    <!-- from edit customers -->
    <div class="d-flex justify-content-center mt-5 ">
        <form class="form-horizontal bg-light p-5 rounded" method="post">
            <div class="mb-3">
                <label class="form-label">Naam:</label>
                <input class="form-control fs-4" type="text" name="name" value="<?=ucwords($_SESSION["user"]->getName())?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email:</label>
                <input class="form-control fs-4" type="email" name="email" value="<?=$_SESSION["user"]->getEmail()?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Telefoonnummer:</label>
                <input class="form-control fs-4" type="text" name="phone" value="<?=$_SESSION["user"]->getPhone()?>" required>
            </div>
            <div class="mb-3">           
                <label class="form-label">Wachtwoord:</label>
                <input class="form-control fs-4" type="password" name="password" required>
            </div>
            <div class="d-flex justify-content-center">
                <a href="<?=ROOT?>/profile/deleteCustomer?id=<?=$_SESSION["user"]->getId()?>">
                    <button type="button" class="me-3 btn btn-lg btn-danger">
                        Verwijderen
                    </button>
                </a>    
                <input class="btn btn-primary btn-lg"type="submit" value="Veranderen"> 
            </div>
            
        </form>
    </div>