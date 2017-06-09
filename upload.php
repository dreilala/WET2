<?php

$dateiname = $_FILES['mypicture']['name'];


if (!$_FILES['mypicture']['error']) {
    move_uploaded_file($_FILES['mypicture']['tmp_name'], "images/$dateiname");
}