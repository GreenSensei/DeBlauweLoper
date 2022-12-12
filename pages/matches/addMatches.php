<!-- information functions -->
<body>
    <?php
        $customer = Customer::getAllCustomers();
        
        if(!empty($_POST))
        { 
            //insert function
            $scores = "0-0";
            Matches::insertMatch($scores ,$_POST['player_1'], $_POST['player_2'], $_POST['start_time'], $_POST["end_time"]);

            header("Location: ". ROOT . "/matches/matches");
        }
    ?>
    <section class="text-center mt-5">
        <h2>Wedstrijden <span class="text-primary">toevoegen</span></h2>
    </section>
    <!-- from add match -->
    <div class="d-flex justify-content-center mt-5 ">
        <form class="form-horizontal bg-light p-5 rounded" method="post">
            <div class="mb-3">
                <label class="form-label">Speler 1:</label>
                <select class="form-control fs-4 form-select" name="player_1" id="id">
                    <?php for ($i=0; $i < count($customer) ; $i++) : ?>
                        <option value="<?=$customer[$i]["id"]?>"><?=ucwords($customer[$i]["name"])?></option>
                    <?php endfor ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Speler 2:</label>
                <select class="form-control fs-4 form-select" name="player_2" id="id">
                    <?php for ($i=0; $i < count($customer) ; $i++) : ?>
                        <option value="<?=$customer[$i]["id"]?>"><?=ucwords($customer[$i]["name"])?></option>
                    <?php endfor ?>
                </select>
            </div>
            <div class="mb-3">
                    <label class="form-label">Start tijd</label>
                    <input type="datetime-local" min="<?=date("Y-m-d H:i:s:a")?>" 
                    class="form-control fs-4" name="start_time" required>
            </div>
            <div class="mb-3">
                    <label class="form-label">Verwachte eind tijd</label>
                    <input type="datetime-local" min="<?=date("Y-m-d H:i:s:a")?>" 
                    class="form-control fs-4" name="end_time" required>
            </div>
            <div class="d-flex justify-content-center">
                <input class="btn btn-primary btn-lg me-3"type="submit" value="Toevoegen">
            </div>
        </form>
    </div>
</body>