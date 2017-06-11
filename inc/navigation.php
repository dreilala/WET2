<?php
if (isset($_COOKIE["userid"])) {
    $_SESSION["userid"] = $_COOKIE["userid"];
}

?>


<!-- Navigation -->
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!--<a class="navbar-brand" href="index.php">Home</a>-->
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <?php
                if (isset($_SESSION["userid"])) {
                    if ($_SESSION["userid"] == 1) {
                        $myxml = simplexml_load_file("config/navigation.xml");
                        foreach ($myxml->admin as $zeile) {
                            echo "<li>";
                            echo "<a href='index.php'>$zeile->home</a>";
                            echo "</li>";
                            echo "<li>";
                            echo "<a href='index.php?page=customerinfo'>$zeile->kunden</a>";
                            echo "</li>";
                            echo "<li>";
                            echo "<a href='index.php?page=ListProducts'>$zeile->produkt</a>";
                            echo "</li>";
                            echo "<li>";
                            echo "<a href='index.php?page=voucher'>$zeile->gutschein</a>";
                            echo "</li>";
                            echo "<li>";
                            echo "<a href='index.php?page=logout'>$zeile->logout</a>";
                            echo "</li>";
                        }
                    } else {
                        $myxml = simplexml_load_file("config/navigation.xml");
                        foreach ($myxml->logon as $zeile) {
                            echo "<li>";
                            echo "<a href='index.php'>$zeile->home</a>";
                            echo "</li>";
                            echo "<li>";
                            echo "<a href='index.php?page=products'>$zeile->produkt</a>";
                            echo "</li>";
                            echo "<li>";
                        echo "<a id='warenkorb' href='index.php?page=warenkorb'>$zeile->warenkorb: ";
                        if(isset($_SESSION["cartsum"])){ echo $_SESSION["cartsum"]; } else { echo 0;} "</a>";
                            echo "</li>";
                            echo "<li>";
                            echo "<a href='index.php?page=showOwnData'>$zeile->konto</a>";
                            echo "</li>";
                            echo "<li>";
                            echo "<a href='index.php?page=logout'>$zeile->logout</a>";
                            echo "</li>";
                        }
                    }
                } else {
                    $myxml = simplexml_load_file("config/navigation.xml");
                    foreach ($myxml->normal as $zeile) {
                        echo "<li>";
                        echo "<a href='index.php'>$zeile->home</a>";
                        echo "</li>";
                        echo "<li>";
                        echo "<a href='index.php?page=products'>$zeile->produkt</a>";
                        echo "</li>";
                        echo "<li>";
                        echo "<a id='warenkorb' href='index.php?page=warenkorb'>$zeile->warenkorb: ";
                        if(isset($_SESSION["cartsum"])){ echo $_SESSION["cartsum"]; } else { echo 0;} "</a>";
                        echo "</li>";
                        echo "<li>";
                        echo "<a href='index.php?page=register'>$zeile->register</a>";
                        echo "</li>";
                        echo "<li>";
                        echo "<a href='index.php?page=login'>$zeile->login</a>";
                        echo "</li>";
                    }
                }
                ?>
                <li><a id="warenkorb" href="#">Warenkorb: <?php if(isset($_SESSION["cartsum"])){ echo $_SESSION["cartsum"]; } else { echo 0;}?></a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php
                if (isset($_SESSION["userid"])) {
                    echo "<p class='navbar-text'>Sie sind eingeloggt!<p>";
                }
                ?>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
