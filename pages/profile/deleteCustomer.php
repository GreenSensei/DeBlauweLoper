<!-- information functions -->
<?php
    $error = "";
    $customer = Customer::getCustomerById($_SESSION["user"]->getId());
            
        if(!empty($_POST))
        { 
            //delete function
            $login = Login::CheckPassEmail($_SESSION["user"]->getEmail(),$_POST["password"]);
            if($login)
            {
                $customer->deleteCustomerById();
                header("Location: ". ROOT . "/home");
            }
            else 
            {
                $error = "het wachtwoord is onjuist";    
            }
           
        }
    ?>
    <section class="text-center mt-5">
        <h2>Profiel <span class="text-primary">verwijderen</span></h2>
    </section>
    <!-- from delete match -->
    <div class="d-flex justify-content-center mt-5 ">
        <form class="form-horizontal bg-light p-5 rounded" method="post">
            <div class="mb-3">
                <label class="form-label">Voer uw wachtwoord in:</label>
                <input type="text" name="password" class="form-control fs-4">
            </div>
            <div class="d-flex justify-content-center">
                <a href="<?=ROOT?>/profile/profile2?id=<?=$_SESSION["user"]->getId()?>">
                        <button type="button" class="me-3 btn btn-lg btn-primary">
                            Terug
                        </button>
                </a>
                <input class="btn btn-danger btn-lg" type="submit" name="delete" value="Verwijderen">
            </div>
        </form>
        <?php if(!empty($error)) {echo $error;}?>
    </div>