<?php
/**
 * Create routes using $app programming style.
 */
//var_dump(array_keys(get_defined_vars()));



/**
 * Showing message Hello World, not using the standard page layout.
 */

include(__DIR__ . '/../htdocs/gissa/autoload_namespace.php');

$app->router->get("guess/get", function () use ($app) {
    $title = "Guess my number (GET)";

    $number = $_GET["number"] ?? -1;
    $tries  = $_GET["tries"] ?? 6;
    $guess  = $_GET["guess"] ?? null;
    $res = "";

    $game = new \Jonathan\Guess\Guess($number, $tries);

    if (isset($_GET["btnReset"]) || $game->number == -1) {
        $game->random();
    }

    $res = null;
    if (isset($_GET["btnGuess"])) {
        try {
            $res = $game->makeGuess($_GET["guess"]);
        } catch (GuessException $e) {
            echo "Message: " .$e->getMessage();
        }
    }

    $app->page->add("guess/get", [
        "title" => $title,
        "game" => $game,
        "res" => $res
    ]);
    return $app->page->render([
        "title" => $title,
    ]);
});

$app->router->any(["GET", "POST"], "guess/post", function () use ($app) {
    $title = "Guess my number (POST)";

    $number = $_POST["number"] ?? -1;
    $tries  = $_POST["tries"] ?? 6;
    $guess  = $_POST["guess"] ?? null;

    $game = new \Jonathan\Guess\Guess($number, $tries);

    if (isset($_POST["btnReset"]) || $game->number == -1) {
        $game->random();
    }

    $res = null;
    if (isset($_POST["btnGuess"])) {
        try {
            $res = $game->makeGuess($_POST["guess"]);
        } catch (GuessException $e) {
            echo "Message: " .$e->getMessage();
        }
    }

    $app->page->add("guess/post", [
        "title" => $title,
        "game" => $game,
        "res" => $res
    ]);
    return $app->page->render([
        "title" => $title,
    ]);
});


$app->router->any(["GET", "POST"], "guess/session", function () use ($app) {
    $title = "Guess my number (SESSION)";

//    session_name("guessgame");
//    session_start();

    $_SESSION["number"] = isset($_SESSION["number"]) ? $_SESSION["number"] : -1;
    $_SESSION["tries"]  = isset($_SESSION["tries"]) ? $_SESSION["tries"] : 6;
    $guess  = isset($_POST["guess"]) ? $_POST["guess"] : null;

    $game = new \Jonathan\Guess\Guess($_SESSION["number"], $_SESSION["tries"]);

    if (isset($_POST["btnReset"]) || $game->number == -1) {
        $game->random();
        $_SESSION["number"] = $game->number();
        $_SESSION["tries"] = $game->tries();
    }

    $res = null;
    if (isset($_POST["btnGuess"])) {
        try {
            $res = $game->makeGuess($_POST["guess"]);
            $_SESSION["tries"] = $game->tries();
        } catch (GuessException $e) {
            echo "Message: " .$e->getMessage();
        }
    }

    $app->page->add("guess/session", [
        "title" => $title,
        "game" => $game,
        "res" => $res
    ]);
    return $app->page->render([
        "title" => $title,
    ]);
});
