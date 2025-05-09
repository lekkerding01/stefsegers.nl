<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uw bestelling</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .besteld {
    display: flex;
    flex-direction: column;
    justify-content: middle;
    background-color: #ffcf60;
    border-radius: 10px;
    margin-top: 20px;
  }
  
.besteld > div {
    background-color: #ffbf38;
    border: 3px, solid #b36300;
    border-radius: 30px;
    margin: 10px;
    text-align: center;
    flex-direction: row;
    display: flex;
    justify-content: center;
  }

  .besteld > div > div {
    background-color: #ffbf38;
    border: 3px, solid #b36300;
    border-radius: 30px;
    margin: 10px;
    width: 400px;
  }

  
  .besteld > div > div > p {
    font-family: fantasy;
    font-size: 27px;
    text-align: middle;
    font-weight: bold;
  }

  .besteld > div > div > a {
    font-family: fantasy;
    font-size: 20px;
    text-decoration: none;
    text-align: left;

  }



  .besteld > div > h1 {
    font-family: fantasy;
    font-size: 20px;
    text-align: center;
  }
  .besteld > div > h2 {
    font-family: fantasy;
    font-size: 30px;
    font-weight: lighter;
    text-align: center;
    padding-left: 80px;
    padding-right: 80px;
  }
    </style>
</head>
<body>
<div class="header">
<img class="logo" src="../PO/logotekst.png"/>
<a href="overons.php">Over ons</a>
<a href="contact.php">Contact</a>
<a href="bestellen.php">Bestellen</a>
<a href="home.php">Home</a>
</div>
<?php
// p_ = Prijs 

?>
<div class="besteld">
<div>
<?php

    if (isset($_GET['basisgerecht'])) {
        $basisprijs = floatval($_GET['basisgerecht']);
        echo "Gekozen basisgerecht: €" . number_format($basisprijs, 2, ',', '') . "<br>";
    } else {
        $basisprijs = 0;
        echo "Geen basisgerecht gekozen.<br>";
    }

    $totaaltoevoegingen = 0;
    $prijs_per_toevoeging = 0.75;

    if (isset($_GET['toevoegingen'])) {
        $toevoegingen = $_GET['toevoegingen'];
        echo "Gekozen toevoegingen:<br>";

        foreach ($toevoegingen as $toevoeging) {
            echo "- " . htmlspecialchars($toevoeging) . "<br>";
            $totaaltoevoegingen += $prijs_per_toevoeging;
        }
    } else {
        echo "Geen toevoegingen gekozen.<br>";
    }

    // Totaalprijs berekenen
    $totaalprijs = $totaaltoevoegingen + $basisprijs; // +basisprijs

    echo "<p>Totaalprijs: €" . $totaalprijs . ",-</p>";
?>
</div>
</body>
