<?php

if (isset($_SESSION["id"])) {
    if ($_SESSION["id"] == 1) {
        $myxml = simplexml_load_file("config/navigation.xml");
        foreach ($myxml->admin as $zeile) {
            echo "<a href='index.php'>$zeile->home</a>";
            echo "<br />";
            echo "<a href='produktadd.php'>$zeile->produkt</a>";
            echo "<br />";
            echo "<a href='konto.php'>$zeile->konto</a>";
            echo "<br />";
            echo "<a href='warenkorb.php'>$zeile->warenkorb</a>";
            echo "<br />";
        }
    } else {
        $myxml = simplexml_load_file("config/navigation.xml");
        foreach ($myxml->logon as $zeile) {
            echo "<a href='index.php'>$zeile->home</a>";
            echo "<br />";
            echo "<a href='produkt.php'>$zeile->produkt</a>";
            echo "<br />";
            echo "<a href='warenkorb.php'>$zeile->warenkorb</a>";
            echo "<br />";
            echo "<a href='warenkorb.php'>$zeile->konto</a>";
        }
    }
} else {
    $myxml = simplexml_load_file("config/navigation.xml");
    foreach ($myxml->normal as $zeile) {
        echo "<a href='index.php'>$zeile->home</a>";
        echo "<br />";
        echo "<a href='produkt.php'>$zeile->produkt</a>";
        echo "<br />";
        echo "<a href='warenkorb.php'>$zeile->warenkorb</a>";
        echo "<br />";
        echo "<a href='login.php'>Login</a>";
        echo "<br />";
        echo "<a href='register.php'>Registrierung</a>";

    }
}
?>