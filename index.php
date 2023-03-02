<?php
require_once __DIR__.'/layout.php';
require_once __DIR__.'/function.php';
$contents = isset($_GET['q']) ? readDirRecursive("data", strtolower(str_replace(" ", "-", secureInput($_GET['q'])))) : readDirRecursive();
$contentsPerPage = 5;
$totalPage = ceil(count($contents) / $contentsPerPage);
$pageNow = isset($_GET['page']) && secureInput($_GET['page']) > 0 ? secureInput($_GET['page']) : 1;
if($pageNow < count($contents)){
  $homeContents = array_slice($contents, $pageNow * $contentsPerPage - $contentsPerPage, $contentsPerPage);
}
$popularPosts = [];
for($i = 0; $i < 5; $i++){
  $popularPosts[] = $contents[random_int(0, count($contents) - 1)];
}
echo TOP_HTML;
?>

<!-- Posts -->
<?php
if($pageNow < count($contents)){
  foreach($homeContents as $content){
    $rawContent = file_get_contents($content[0]);
    preg_match('/<div class="text-muted fst-italic mb-2">(.*?)<\/div>/', $rawContent, $postDate);
    preg_match('/<p.*?>(.*?)<\/p>/s', $rawContent, $metaDescription);
    $metaDescription[1] = implode(" ", array_slice(explode(" ", strip_tags($metaDescription[1])), 0, 20));
    $title = ucwords(str_replace("-", " ", basename($content[0], ".html")));
    $slug = basename($content[0], ".html");
?>

<div class="card mb-4">
<div class="card-body">
<div class="small text-muted">Posted by Admin</div>
<a href="<?=$slug?>" style="text-decoration: none"><h2 class="card-title"><?=$title?></h2></a>
<p class="card-text"><?=$metaDescription[1]?>...</p>
<a class="btn btn-primary" href="<?=$slug?>">Read more →</a>
</div>
</div>

<?php
}
}else{
?>
<h4>Empty Contents</h4>
<?php
}
?>

<!-- Pagination -->
<nav aria-label="Pagination">
<ul class="pagination justify-content-center my-4">
<li class="page-item <?php echo $pageNow < 2 ? 'disabled' : '' ?>"><a class="page-link" href="?page=<?=$pageNow - 1?><?php echo isset($_GET['q']) ? "&q=".secureInput($_GET['q']) : '' ?>" tabindex="-1" aria-disabled="true">Prev</a></li>
<li class="page-item active" aria-current="page"><a class="page-link" href="#!"><?=$pageNow?></a></li>
<li class="page-item"><a class="page-link" href="?page=<?=$pageNow + 1?><?php echo isset($_GET['q']) ? "&q=".secureInput($_GET['q']) : '' ?>">Next</a></li>
</ul>
</nav>
</div>

<?=SIDEBAR_WIDGET?>

<?php
foreach($popularPosts as $content){
  $rawContent = file_get_contents($content[0]);
  preg_match('/<div class="text-muted fst-italic mb-2">(.*?)<\/div>/', $rawContent, $postDate);
  preg_match('/<p style="text-align: justify; text-justify: inter-word;">(.*?)<\/p>/s', $rawContent, $metaDescription);
  $metaDescription[1] = implode(" ", array_slice(explode(" ", strip_tags($metaDescription[1])), 0, 20));
  $title = ucwords(str_replace("-", " ", basename($content[0], ".html")));
  $slug = basename($content[0], ".html");
?>
<a class="list-group-item" href="<?=$slug?>"> <h4 class="list-group-item-heading"><?=$title?></h4> <p class="list-group-item-text"><?=$metaDescription[1]?>...</p> </a>
<?php
}
?>

<?=FOOTER?>