<?php
if (isset($_REQUEST["page"])) {
    if ($_REQUEST["page"] == "article") {
        extract(countElement("article"));
        $page=isset($_GET["pos"])?$_GET["pos"]:1;
        $nbr_page=ceil($total/5);
        $debut= ($page - 1)*5;
        $articles = isset($_REQUEST["key"])?findArticlesByCommandeId($_REQUEST["key"],$debut):findAllArticles($debut);
        loadview("article/allarticle.html.php",["articles"=>$articles,"nbr_page"=> $nbr_page,"page"=>$page]);  
    }
}else{
    redirectToRoute("article","article");
}
