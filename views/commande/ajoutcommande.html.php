<?php
if (isset($_SESSION["tab"])) {
    $tab = $_SESSION["tab"];
    unset($_SESSION["tab"]);
}
?>

<h1> Ajouter une commande</h1>
<div class="col-12 flex aic jcsa">
    <form action="<?= WEBROOT ?>" method="post" class="col-5">
        <div class="formc mt3 col-12">
            <h2> Client</h2>
            <div class="col-10">
                <label for="non">Telephone*</label>
                <input type="text" name="tel" value="<?= isset($_SESSION["client-c"]["telephone"]) ? $_SESSION["client-c"]["telephone"] : "" ?>">
            </div>
            <input type="hidden" name="controller" value="commande">
            <label for="message" class="mt1"><?php if (isset($tab["tel"])) echo $tab["tel"] ?></label>
            <div class="col-10">
                <button type="submit" name="page" value="ajoutcommande" class="bgreen"> ok </button>
            </div>
        </div>

    </form>


    <div class="col-5 flex aic jcc">
        <div class="formc mt1 col-12">
            <div class="col-10">
                <label for="non">Nom</label>
                <input type="text" name="nom" value="<?= $_SESSION["client-c"]["nom"] ?? "" ?>" readonly>
            </div>
            <div class="col-10">
                <label for="non">Prenom</label>
                <input type="text" name="prenom" value="<?= $_SESSION["client-c"]["prenom"] ?? "" ?>" readonly>
            </div>
        </div>
    </div>

</div>

<!-- second -->

<div class="col-12 flex aic jcsa">
    <form action="<?= WEBROOT ?>" method="post" class="col-5">
        <div class="formc mt3 col-12">
            <h2> Article</h2>
            <div class="col-10">

                <label for="non">Reference*</label>
                <input type="text" name="ref" value="<?= isset($_SESSION["article"]["libelle"]) ? $_SESSION["article"]["libelle"] : "" ?> " <?= !empty($_SESSION["client-c"]) ? "" : "readonly" ?>>
            </div>
            <!-- <input type="hidden" name="verif" value="ajoutartc"> -->
            <input type="hidden" name="controller" value="commande">
            <label for="message" class="mt1"><?= isset($tab["ref"]) ? $tab["ref"] : "" ?></label>
            <?= !empty($_SESSION["client-c"]) ? "" : "Choisissez un client d'abord" ?>
            <div class="col-10">
                <?php if (!empty($_SESSION["client-c"])):?>
                <button type="submit" name="page" value="ajoutcommande" class="bgreen"> ok </button>
                <?php endif; ?>
            </div>
        </div>

    </form>



    <div class="col-5 flex aic jcc">
        <div class="formc mt1 col-12">
            <div class="col-10">
                <label for="non">Libelle</label>
                <input type="text" name="nom" value="<?= $_SESSION["article"]["libelle"] ?? "" ?>" readonly>
            </div>
            <div class="col-10">
                <label for="non">Prix unitaire</label>
                <input type="text" name="prenom" value="<?= $_SESSION["article"]["prixunitaire"] ?? "" ?>" readonly>
            </div>
            <div class="col-10">
                <label for="non">Quantite en stock</label>
                <input type="text" name="prenom" value="<?= $_SESSION["article"]["qtestock"] ?? "" ?>" readonly>
            </div>
        </div>
    </div>

</div>

<form action="<?= WEBROOT ?>" method="post" class="col-12 flex aic jcsa"">
        <div class=" formc mt3 col-6">
    <h2> Quantite a commander</h2>
    <div class="col-10">

        <label for="non">Qantite*</label>
        <input type="texte" name="qte" value="<?= isset($_SESSION["qte"]) ? $_SESSION["qte"] : "" ?>" <?= !empty($_SESSION["article"]) ? "" : "readonly" ?>>
    </div>

    <input type="hidden" name="controller" value="commande">
    <label for="message" class="mt1"><?php if (isset($tab["qte"])) echo $tab["qte"] ?></label>
    <?= !empty($_SESSION["article"]) ? "" : "Choisissez un article d'abord" ?>
    <div class="col-10">
    <?php if (!empty($_SESSION["article"])):?>
        <button type="submit" name="page" value="ajoutcommande" class="bgreen"> Ajouter </button>
        <?php endif; ?>
    </div>
    </div>

</form>

<table>
    <thead>
        <th>Libelle</th>
        <th>Prix unitaire (fcfa)</th>
        <th> Quantite</th>
        <th>Montant (fcfa)</th>
    </thead>
    <tbody>
        <?php if (!empty($_SESSION["ncom"])) : ?>
            <?php $som = 0;
            foreach ($_SESSION["ncom"] as $key => $nart) : $som = $som + ($nart["prix"] * $nart["qte"]); ?>
                <tr>
                    <td><?= $nart["libelle"] ?></td>
                    <td><?= $nart["prix"] ?> </td>
                    <td><?= $nart["qte"] ?></td>
                    <td><?= $nart["prix"] * $nart["qte"] ?> </td>
                </tr>
            <?php endforeach ?>
            <tr>
                <td colspan="4">Total: <?= $som ?> fcfa</td>
                <?php $_SESSION["som"]=$som;?>
            </tr>

    </tbody>

</table>
<div class="col-12 flex aic jcc espaceTB">
    <form action="<?= WEBROOT ?>" method="post">
    <input type="hidden" name="Acommander" value="">
    <input type="hidden" name="controller" value="commande">
        <button type="submit" name="page" value="ajoutcommande" class="bgreen"> Commander </button>

    </form>
</div>
<?php endif ?>