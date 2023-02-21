<?php
require_once __DIR__.'/function.php';

$getContent = readDirRecursive("data", strtolower(str_replace(" ", "-", secureInput($_GET['q']))));
if(count($getContent) > 0) {
  echo file_get_contents($getContent[0][0]);
}
?>