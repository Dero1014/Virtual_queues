<?php
// File worker.inc.php is a file that gets users login data //
// and checks if the user exists or not by comparing the    //
// random generated password with the company it's ment for //
header('Content-type: text/plain');
include 'autoloader.inc.php';
include 'worker.inf.php';

if (!isset($_POST["login"])) {
    header("Location: ../sites/worker.site.php?login=invalidAccess");
    exit();
}

$inspector = new Inspector();
$worker = new Worker(0, 0, 0, 0);

// GET VALUES //
$wComp = $_POST['wComp'];
$wPass = $_POST['wPass'];
$cn = $_SESSION["cn"];
$p = $_SESSION["p"];
    
$inspector->workerLoginReady($wComp, $wPass, $cn, $p);

// Give access
$worker->logIn($wComp, $wPass, $cn, $p);
exit();