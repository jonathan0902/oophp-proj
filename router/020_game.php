<?php
/**
 * Create routes using $app programming style.
 */
//var_dump(array_keys(get_defined_vars()));



/**
 * Showing message Hello World, not using the standard page layout.
 */

include(__DIR__ . '/../htdocs/gissa/autoload_namespace.php');

$app->router->any(["GET", "POST"], "game/game", function () use ($app) {
    $title = "Dice game";

    if (empty($app->session->get('tta')) || isset($_POST['Reset'])) {
        $app->session->set("chand", 0);
        $app->session->set("phand", 0);
        $app->session->set("Player", 0);
        $app->session->set("Computer", 0);
        $app->session->set("Turn", true);
        $app->session->set("tta", 0);
        $app->session->set("Rand", 0);
        $app->session->set("stateOfGame", [true, ""]);
        $app->session->set("one", false);
        $app->session->set("historyC", []);
        $app->session->set("historyP", []);
        $app->session->set("snittC", 0);
        $app->session->set("snittP", 0);
        $app->session->set("Ccounter", 0);
        $app->session->set("Pcounter", 0);
    }

    $app->session->set("tta", $app->session->get("tta") + 1);

    if (isset($_POST['nRound']) || $app->session->get("one")) {
        $app->session->set("one", false);
        $app->session->set("tempCHand", $app->session->get("chand"));
        $app->session->set("tempPHand", $app->session->get("phand"));
        $app->session->set("chand", 0);
        $app->session->set("phand", 0);
        if ($app->session->get("Turn")) {
            $app->session->set("Turn", false);
            $app->session->set("Player", $_POST['phand'] ?? $app->session->get("Player"));
            $app->session->set("Rand", rand(1, 4));
            $app->session->set("TempRand", $app->session->get("Rand"));
        } else {
            $app->session->set("Turn", true);
            $app->session->set("Computer", $_POST['chand'] ?? $app->session->get("Computer"));
        }
    }

    $dice = new \Jonathan\Dice\DiceHistogram2();
    $game = new \Jonathan\Dice\Dice($app->session->get("Turn"));
    $player = new \Jonathan\Dice\Player($app->session->get("phand"), $app->session->get("Player"));
    $computer = new \Jonathan\Dice\Player($app->session->get("chand"), $app->session->get("Computer"));

    if (isset($_POST['nRound'])) {
        if ($app->session->get("Turn")) {
            $player->sumOfStore($app->session->get("tempPHand"));
        } else {
            $computer->sumOfStore($app->session->get("tempCHand"));
        }
    }

    $histogram = new \Jonathan\Dice\Histogram();

    if ($game->getBase()) {
        $dice->setHistogramMax($app->session->get("historyC"));
        $res = $game->checkDice($dice->roll());
        $app->session->set("historyC", $dice->getHistogramMax());
        $histogram->injectData($dice);
        $player->sumOfHand($res[0]);
        $app->session->set("Pcounter", $app->session->get("Pcounter") + 1);

        $app->session->set("snittP", $player->getHand() / $app->session->get("Pcounter"));

        $TurnBased = "Player";
        $app->session->set("phand", $player->getHand());
        $stored = $player->getHand();
        $app->session->set("stateOfGame", $game->checkHand($app->session->get("phand") + $player->getStoredHand(), $TurnBased));
    } else {
        $dice->setHistogramMax($app->session->get("historyP"));
        $res = $game->checkDice($dice->roll());
        $app->session->set("historyP", $dice->getHistogramMax());
        $histogram->injectData($dice);

        $computer->sumOfHand($res[0]);
        $app->session->set("Ccounter", $app->session->get("Ccounter") + 1);

        $app->session->set("snittC", $computer->getHand() / $app->session->get("Ccounter"));

        if (($player->getStoredHand() + 20) < $computer->getStoredHand()) {
            $_SESSION["Rand"] = 0;
        }

        $TurnBased = "Computer";
        $app->session->set("chand", $computer->getHand());
        $stored = $computer->getHand();
        $app->session->set("stateOfGame", $game->checkHand($app->session->get("chand") + $computer->getStoredHand(), $TurnBased));
    }

    if ($app->session->get("stateOfGame")[0]) {
        if ($res[1]) {
            header("Refresh:0");
            $app->session->set("one", true);
        }

        if (!isset($_POST['nRound'])) {
            $app->session->set("Player", $player->getStoredHand());
            $app->session->set("Computer", $computer->getStoredHand());
        }

        if ($_SESSION["Rand"] > 0 && !$game->getBase()) {
            $app->session->set("Rand", $app->session->get("Rand") - 1);
            $app->session->get("Rand") == $app->session->get("TempRand") ? sleep(1) : sleep(0);
            header("Refresh:0");
        } elseif (!$game->getBase()) {
            $app->session->set("one", true);
            $app->session->set("Computer", $app->session->get("Computer") + $stored);
            sleep(1);
            header("Refresh:0");
        }
    }

    $app->page->add("game/game", [
        "title" => $title,
        "game" => $game,
        "res" => $res,
        "pdata" => $app->session->get("phand"),
        "cdata" => $app->session->get("chand"),
        "data" => $stored,
        "phand" => $player->getStoredHand(),
        "chand" => $computer->getStoredHand(),
        "TurnBased" => $TurnBased,
        "notgame" => $app->session->get("stateOfGame"),
        "historyP" => $histogram->getAsText($app->session->get("historyP")),
        "historyC" => $histogram->getAsText($app->session->get("historyC")),
        "historySC" => $app->session->get("snittC"),
        "historySP" => $app->session->get("snittP")
    ]);
    return $app->page->render([
        "title" => $title,
    ]);
});
