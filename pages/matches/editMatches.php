<!-- information functions -->
    <?php
        $matches = Matches::getMatchById($_GET["id"]);
        $player_1 = Customer::getCustomerById($matches->getPlayer_1());
        $player_2 = Customer::getCustomerById($matches->getPlayer_2());
        $customer = Customer::getAllCustomers();
        
        if(!empty($_POST))
        { 
            //update function 
            // probleem met player 2 met int en string
            (new Matches($matches->getId(), $_POST["player_1"], $_POST["player_2"], $_POST["scores"], $_POST["start_time"], $_POST["end_time"]))->updateMatch();

            header("Location: ". ROOT . "/matches/matches");
        }
    ?>
    <section class="text-center mt-5">
        <h2>Wedstrijden <span class="text-primary">aanpassen</span></h2>
    </section>
    <!-- from edit match -->
    <div class="d-flex justify-content-center mt-5 ">
        <form class="form-horizontal bg-light p-5 rounded" method="post">
            <div class="mb-3">
                <label class="form-label">Speler 1:</label>
                <select class="form-control fs-4 form-select" name="player_1" id="id">
                    <?php for ($i=0; $i < count($customer) ; $i++) : ?>
                        <option value="<?=$customer[$i]["id"]?>" <?php if(Customer::getCustomerById($matches->getPlayer_1())->getName() == $customer[$i]['name']) {echo "selected";} ?>><?=$customer[$i]["name"]?></option>
                    <?php endfor ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Speler 2:</label>
                <select class="form-control fs-4 form-select" name="player_2" id="id">
                    <?php for ($i=0; $i < count($customer) ; $i++) : ?>
                        <option value="<?=$customer[$i]["id"]?>" <?php if(Customer::getCustomerById($matches->getPlayer_2())->getName() == $customer[$i]['name']) {echo "selected";} ?>><?=$customer[$i]["name"]?></option>
                    <?php endfor ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Uitslag:</label>
                <input class="form-control fs-4" type="text" pattern="[0-9]-[0-9]"  placeholder="00-00" name="scores" value="<?=$matches->getScores()?>">
            </div>
            <div class="mb-3">
                    <label class="form-label">Start tijd</label>
                    <input type="datetime-local" min="<?=date("Y-m-d H:i:s:a")?>" 
                    class="form-control fs-4" name="start_time" 
                    value="<?=$matches->getStart_time()?>" required>
            </div>
            <div class="mb-3">
                    <label class="form-label">Eind tijd</label>
                    <input type="datetime-local" min="<?=date("Y-m-d H:i:s:a")?>" 
                    class="form-control fs-4" name="end_time" 
                    value="<?=$matches->getEnd_time()?>" required>
            </div>
            <div class="d-flex justify-content-center">
                <input class="btn btn-primary btn-lg me-3"type="submit" value="Veranderen">
            </div>
        </form>
    </div>