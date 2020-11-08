<?php
// require_once "page-template.html";

$page = file_get_contents("page-template.html");
$page = str_replace('{page_title}', 'welcome', $page);
if(date('H') >= 12){
    $page = str_replace('{color}', 'blue', $page);
}else{
    $page = str_replace('{color}', 'green', $page);
}
echo $page;

// fileへの書き込み処理
file_put_contents("page-template.html", $page);

?>