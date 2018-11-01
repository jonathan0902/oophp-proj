<?php if ($notgame[0]) : ?>
<h2 style="background: <?= $TurnBased == "Computer" ? "#1166ff" : "#f2a71f" ?>;"><?= $TurnBased; ?> turn </h2>
<h2>Current Dice Roll: <?= $res[0]; ?></h2>
<h2>Your Hand: <?= $data; ?></h2>
<span>Your Total Hand: <?= $phand; ?></span>
<span>Computer Total Hand: <?= $chand; ?></span>
<form method="POST">
    <input type="submit" <?= $TurnBased == "Computer" ? "disabled" : "" ?> name="" value="Roll Dice" />
    <input type="submit" <?= $TurnBased == "Computer" ? "disabled" : "" ?> name="nRound" value="Next Round" />
    <input type="submit" name="Reset" value="Reset Game">
    <input type="text" name="phand" hidden value="<?= $pdata + $phand ?>">
    <input type="text" name="chand" hidden value="<?= $cdata + $chand ?>">
</form>
<h2>Player Histogram</h2>
<h3> <?= $historyP; ?></h3>
<p>SnittVärde <?= $historySC; ?> </p>

<h2>Computer Histogram</h2>
<h3> <?= $historyC; ?></h3>
<p>SnittVärde <?= $historySP; ?> </p>
<?php else : ?>
    <h1><?= $notgame[1] ?> won the game!</h1>
    <form method="POST">
        <input type="submit" name="Reset" value="Reset Game">
    </form>
<?php endif; ?>
