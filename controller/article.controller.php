<?php
if (isset($_REQUEST["page"])) {
    if ($_REQUEST["page"] == "article") {
        
        $articles = isset($_REQUEST["key"])?findArticlesByCommandeId($_REQUEST["key"]):findAllArticles();
        loadview("article/allarticle.html.php",["articles"=>$articles]);
        
    }
    // else if ($_REQUEST["page"] == "listarticle") {
        
    //     $articles =findAllArticles();
    //     loadview("article/allarticle.html.php",["articles"=>$articles]);
        
    // }
}else{
     
    $articles =findAllArticles();
    loadview("article/allarticle.html.php",["articles"=>$articles]);
}
