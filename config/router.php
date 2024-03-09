<?php
if (isset($_REQUEST["controller"])) {
  
    if ($_REQUEST["controller"]=="commande") {
        require_once(ROOT."/controller/commande.controller.php");
    } else  if ($_REQUEST["controller"]=="article") {
        require_once(ROOT."/controller/article.controller.php");
    } else  if ($_REQUEST["controller"]=="client") {
        require_once(ROOT."/controller/client.controller.php");
    }else  if ($_REQUEST["controller"]=="payement") {
        require_once(ROOT."/controller/payement.controller.php");
    }
}else {
    require_once(ROOT."/controller/article.controller.php");
}