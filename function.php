<?php
function secureInput($raw) {
  return htmlspecialchars($raw);
}

function readDirRecursive($path = "data", $search = "", $fileOnly = true){
  $container = [];
  $walks = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path, FilesystemIterator::SKIP_DOTS | FilesystemIterator::KEY_AS_PATHNAME | FilesystemIterator::CURRENT_AS_FILEINFO | FilesystemIterator::UNIX_PATHS));
  foreach($walks as $key => $walk){
    if(@strpos($walk->getPathname(), $search) !== false || empty($search)){
      if($fileOnly && $walk->isFile()){
        $container[] = [$walk->getPathname(), $walk->getMTime()];
      }else if (!$fileOnly && ($walk->isDir() || $walk->isFile())){
        $container[] = [$walk->getPathname(), $walk->getMTime()];
      }
    }
  }
  arsort($container);
  return $container;
}
?>