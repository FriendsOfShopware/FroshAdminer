<?php

function adminer_object() {
    include_once "./plugin.php";

    foreach (glob("plugins/*.php") as $filename) {
        include_once "./$filename";
    }

    return new AdminerPlugin([
        new AdminerFrames(true)
    ]);
}

include './Adminer.php';