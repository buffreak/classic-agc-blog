<?php
header('Content-type: application/xml');
require_once __DIR__.'/function.php';
$domainName = $_SERVER['HTTP_HOST'];
$contents = readDirRecursive();
echo '<?xml version="1.0" encoding="UTF-8"?>'."\n";
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">'."\n";

foreach($contents as $content){
  $slug = basename($content[0], ".html");
  echo "<url>";
  echo "<loc>".$domainName."/".$slug."</loc>";
  echo "</url>";
}
echo "</urlset>";

?>