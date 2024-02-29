<?php
if (isset($_SESSION["errors"])) {
    $errors=$_SESSION["errors"];
    unset($_SESSION["errors"]);
}
if (isset($_SESSION["tab"])) {
    $tab=$_SESSION["tab"];
    unset($_SESSION["tab"]);
}
?>

<form action="<?= WEBROOT ?>" method="post">
    <div class="formc mt3">
    <h1> Ajouter un client</h1>
        <div class="col-10">
            <label for="non">Nom*</label>
            <br><span class="redcol"><?php if (isset($errors["nom"] )) echo $errors["nom"] ?></span>
            <input type="text" name="nom" value="<?php if (isset($tab)) echo $tab["nom"] ?>" >
            
        </div>
        <div class="col-10 mt1">
            <label for="non">Prenom*</label>
            <br><span class="redcol"><?php if (isset($errors["prenom"])) echo $errors["prenom"] ?></span>
            <input type="text" name="prenom" value="<?php if (isset($tab)) echo $tab["prenom"] ?>">
            
        </div>
        <div class="col-10 mt1">
            <label for="non">Telephone*</label>
            <br><span class="redcol"><?php if (isset($errors["tel"])) echo $errors["tel"] ?></span>
            <input type="text" name="tel" value="<?php if (isset($tab)) echo $tab["tel"] ?>" >
            
        </div>
        <input type="hidden" name="controller" value="client">
        <!-- <label for="message" class="espaceTB"><?php if (isset($tab)) echo $tab["msg"] ?></label> -->
        <div class="col-10 mt1">
            <button type="reset" name="page" value="reset" class="espaceLR bred"> Annuler </button>
            <button type="submit" name="page" value="addclient" class="bgreen"> Enregister </button>
        </div>
    </div>
</form>