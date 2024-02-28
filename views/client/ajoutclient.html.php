

<form action="<?= WEBROOT ?>" method="post">
    <div class="formc mt3">
    <h1> Ajouter un client</h1>
        <div class="col-10">
            <label for="non">Nom*</label>
            <input type="text" name="nom" value="<?php if (isset($tab)) echo $tab["nom"] ?>" >
            
        </div>
        <div class="col-10">
            <label for="non">Prenom*</label>
            <input type="text" name="prenom" value="<?php if (isset($tab)) echo $tab["prenom"] ?>">
        </div>
        <div class="col-10">
            <label for="non">Telephone*</label>
            <input type="text" name="tel" value="<?php if (isset($tab)) echo $tab["tel"] ?>" >
        </div>
        <input type="hidden" name="controller" value="client">
        <label for="message" class="espaceTB"><?php if (isset($tab)) echo $tab["msg"] ?></label>
        <div class="col-10">
            <button type="reset" name="page" value="reset" class="espaceLR bred"> Annuler </button>
            <button type="submit" name="page" value="addclient" class="bgreen"> Enregister </button>
        </div>
    </div>
</form>