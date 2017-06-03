<?php

if (isset($_SESSION["userid"]) || isset($_COOKIE["userid"])) {
    
   
    if ($_SESSION["userid"] == 1 || $_COOKIE["userid"] == 1) {
        $myxml = simplexml_load_file("config/navigation.xml");
        foreach ($myxml->admin as $zeile) {
            echo "<a href='index.php'>$zeile->home</a>";
            echo "<br />";
            echo "<a href='produktadd.php'>$zeile->produkt</a>";
            echo "<br />";
            echo "<a href='customerinfo.php'>$zeile->kunden</a>";
            echo "<br />";
            echo "<a href='voucher.php'>$zeile->gutschein</a>";
            echo "<br />";
            echo "<a href='logout.php'>$zeile->logout</a>";
            echo "<h1>Willkommen!</h1><br>";
            echo "Sie sind eingeloggt ... ";
        }
    } else {
        $myxml = simplexml_load_file("config/navigation.xml");
        foreach ($myxml->logon as $zeile) {
            echo "<a href='index.php'>$zeile->home</a>";
            echo "<br />";
            echo "<a href='produkt.php'>$zeile->produkt</a>";
            echo "<br />";
            echo "<a href='showOwnData.php'>$zeile->konto</a>";
            echo "<br />";
            echo "<a href='warenkorb.php'>$zeile->warenkorb</a>";
            echo "<br />";
            echo "<a href='logout.php'>$zeile->logout</a>";
        }
        echo "<h1>Willkommen!</h1><br>";
        echo "Sie sind eingeloggt ... ";
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
        echo "<a href='register.php'>Registrierung</a>";
        echo "<br />";
        echo "<a href='login.php'>Login</a>";
    }
}
?>