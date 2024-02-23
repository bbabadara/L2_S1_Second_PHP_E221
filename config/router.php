<?php
if (isset($_REQUEST["controller"])) {
  
    if ($_REQUEST["controller"]=="commande") {
        require_once("../controller/commande.controller.php");
    } else  if ($_REQUEST["controller"]=="article") {
        require_once("../controller/article.controller.php");
    }
}else {
    require_once("../controller/article.controller.php");
}