<h1> Ajouter une commande</h1>
<form action="<?= WEBROOT ?>" method="get">
    <div class="formc mt3">
        <h1> Client</h1>
        <div class="col-10">
            <label for="non">Telephone*</label>
            <input type="text" name="tel" value="<?php if (isset($tab)) echo $tab["tel"] ?>">
        </div>
        <input type="hidden" name="controller" value="commande">
        <div class="col-10">
            <button type="submit" name="page" value="ajoutcommande" class="bgreen"> ok </button>
        </div>
        </div>
</form>
        
        <?php if (isset($_POST["ajoutcommande"])):?>
            <form action="<?= WEBROOT ?>" method="post">
    <div class="formc mt3">
        <div class="col-10">
            <label for="non">Nom*</label>
            <input type="text" name="nom" value="<?php if (isset($tab)) echo $tab["nom"] ?>" >
        </div>
        <div class="col-10">
            <label for="non">Prenom*</label>
            <input type="text" name="prenom" value="<?php if (isset($tab)) echo $tab["prenom"] ?>" >
        </div>
        <?php endif ?>

        <input type="hidden" name="controller" value="commande">
        <label for="message" class="espaceTB"><?php if (isset($tab)) echo $tab["msg"] ?></label>
    </div>
</form>