<?php

function adminer_object() {
    include_once "./plugin.php";

    foreach (glob("plugins/*.php") as $filename) {
        include_once "./$filename";
    }

    return new AdminerPlugin([
        new AdminerFrames(true),
        new AdminerTablesFilter()
    ]);
}

error_reporting(0);
@ini_set('display_errors', 0);

include './Adminer.php';