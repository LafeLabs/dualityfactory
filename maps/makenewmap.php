<?php

$filename = $_REQUEST["filename"];//get url

mkdir($filename);

copy("../php/replicator.txt",$filename."/replicator.php");

?>