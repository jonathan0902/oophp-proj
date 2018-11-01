        <h1><?= $title ?></h1>
        <h3>Guess a number between 1 and 100, you have <?= $game->tries(); ?> tries left.</h3>
        <form method="get">
            <input name="number" type="hidden" value="<?= $game->number(); ?>" />
            <input name="tries" type="hidden" value="<?= $game->tries(); ?>" />
            <input type="number" name="guess" value="" />
            <input type="submit" name="btnGuess" value="Make a Guess" />
            <input type="submit" name="btnReset" value="Reset game" />
            <input type="submit" name="btnCheat" value="Cheat" />
        </form>
        <?php
        echo "<h4>" . $res . "</h4>";
        if (isset($_GET['btnCheat'])) {
            echo "The secret number is: " . $game->number();
        }
