<!-- information functions -->
<body>
    <?php
        $matches = Matches::getMatchById($_GET["id"]);
        $player_1 = Customer::getCustomerById($matches->getPlayer_1());
        $player_2 = Customer::getCustomerById($matches->getPlayer_2());
        $customer = Customer::getAllCustomers();
            
        if(!empty($_POST))
        { 
            //delete function
            
            $matches->deleteMatch();
            header("Location: ". ROOT . "/matches/matches");
        }
    ?>
    <section class="text-center mt-5">
        <h2>Wedstrijden <span class="text-primary">verwijderen</span></h2>
    </section>
    <!-- from delete match -->
    <div class="d-flex justify-content-center mt-5 ">
        <form class="form-horizontal bg-light p-5 rounded" method="post">
            <div class="mb-3">
                <label class="form-label">Speler 1:</label>
                <input type="text" name="player_1" class="form-control fs-4" value="<?=ucwords(Customer::getCustomerById($matches->getPlayer_1())->getName()) ?>" disabled>
            </div>
            <div class="mb-3">
                <label class="form-label">Speler 2:</label>
                <input type="text" name="player_2" class="form-control fs-4" value="<?=ucwords(Customer::getCustomerById($matches->getPlayer_2())->getName()) ?>" disabled>
            </div>
            <div class="mb-3">
                <label class="form-label">Uitslag:</label>
                <input class="form-control fs-4" type="text" pattern="[0-9]-[0-9]"  placeholder="00-00" name="scores" value="<?=$matches->getScores()?>" disabled>
            </div>
            <div class="mb-3">
                    <label class="form-label">Start tijd</label>
                    <input type="datetime-local" min="<?=date("Y-m-d H:i:s:a")?>" 
                    class="form-control fs-4" name="start_time" 
                    value="<?=$matches->getStart_time()?>" disabled>
            </div>
            <div class="mb-3">
                    <label class="form-label">Eind tijd</label>
                    <input type="datetime-local" min="<?=date("Y-m-d H:i:s:a")?>" 
                    class="form-control fs-4" name="end_time" 
                    value="<?=$matches->getEnd_time()?>" disabled>
            </div>
            <div class="d-flex justify-content-center">
                <input class="btn btn-primary btn-lg me-3" type="submit" name="delete" value="Verwijderen">
            </div>
        </form>
    </div>
</body>