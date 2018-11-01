<?php
require_once("config.php");
include(__DIR__ . '/autoload_namespace.php');


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
