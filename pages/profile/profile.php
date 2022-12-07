<?php

    $customer = $_SESSION["user"];
    $curPasswordErr = false;
    $deletePassCheck = $_SESSION["passError"] ?? false;

    if (!empty($_POST)) {
        $custCheck = Customer::CheckPassEmail($customer->getEmail(), $_POST["currentPassword"]);

        if (isset($custCheck)) {
            (new Customer($customer->getId(), $_POST["name"], $_POST["email"], $_POST["phone"], $customer->getPassword()))->updateCustomer();
            $_SESSION["user"] = Customer::getCutomerById($customer->getId());
            header("Location: " . ROOT . $page);
        } else {
            $curPasswordErr = true;
        }
    }
?>

<!-- Form van gegevens -->
<section style="background-color: #fff;">

    <div class="d-flex justify-content-center mt-4">
        <h2>Profiel <snap class="text-primary">Wijzigen</snap>
        </h2>
    </div>

    <div class="d-flex justify-content-center mt-4">
        <form method="POST" action="" onsubmit="return checkNewPass()" class="form-horizontal bg-light p-5 rounded">
            <div class="mb-3">
                <label class="form-label">Naam</label>
                <input class="form-control fs-4" name="name" type="text" value="<?= $customer->getName() ?>" disabled>
            </div>
            <div class="mb-3">
                <label class="form-label">E-mail</label>
                <input class="form-control fs-4" name="email" type="email" value="<?= $customer->getEmail() ?>" disabled>
            </div>
            <div class="mb-3">
                <label class="form-label">Telefoonnummer</label>
                <input class="form-control fs-4" name="phone" type="text" value="<?= $customer->getPhone() ?>" disabled>
            </div>
            <div class="mb-3">
                <label class="form-label">Wachtwoord</label>
                <input class="form-control fs-4" name="password" type="password" value="<?= $customer->getPassword() ?>" disabled><br>
            </div>

            <div class="d-flex justify-content-center">
                <button type="button" id="changeBtn" class="btn btn-primary btn-lg me-3" onclick="disableInput()">Verander</button>
                <button type="button" id="submitBtn" class="btn btn-primary btn-lg me-3" enabled>Toepassen</button>
                <button type="button" id="deleteBtn" data-bs-target="#deleteModal" data-bs-toggle="modal" class="btn btn-danger btn-lg" enabled>Verwijderen</button>
            </div>
        </form>
    </div>
</section>

<?php unset($_SESSION["passError"]); ?>