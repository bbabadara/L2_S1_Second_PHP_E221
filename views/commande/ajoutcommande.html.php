<h1> Ajouter une commande</h1>
<div class="col-12 flex aic jcsa">
    <form action="<?= WEBROOT ?>" method="post" class="col-5">
        <div class="formc mt3 col-12">
            <h2> Client</h2>
            <div class="col-10"> 
                <label for="non">Telephone*</label>
                <input type="text" name="tel" value="<?= isset($_SESSION["client-c"]["telephone"]) ? $_SESSION["client-c"]["telephone"] : "" ?>" required>
            </div>
            <input type="hidden" name="controller" value="commande">
            <label for="message" class="mt1"><?php if (isset($tab["msg"])) echo $tab["msg"] ?></label>
            <div class="col-10">
                <button type="submit" name="page" value="ajoutcommande" class="bgreen"> ok </button>
            </div>
        </div>

    </form>

    <?php if (!empty($_SESSION["client-c"])) : ?>
        <div class="col-5 flex aic jcc">
            <div class="formc mt1 col-12">
                <div class="col-10">
                    <label for="non">Nom</label>
                    <input type="text" name="nom" value="<?= $_SESSION["client-c"]["nom"] ?>" readonly>
                </div>
                <div class="col-10">
                    <label for="non">Prenom</label>
                    <input type="text" name="prenom" value="<?= $_SESSION["client-c"]["prenom"] ?>" readonly>
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
                <input type="text" name="ref" value="<?= isset($_SESSION["article"]["libelle"]) ? $_SESSION["article"]["libelle"]: "" ?> <?= isset($tab["ref"]) ? $tab["ref"]: "" ?>" required>
            </div>
            <!-- <input type="hidden" name="verif" value="ajoutartc"> -->
            <input type="hidden" name="controller" value="commande">
            <label for="message" class="mt1"><?php if (isset($tab["msg2"])) echo $tab["msg2"] ?></label>
            <div class="col-10">
                <button type="submit" name="page" value="ajoutcommande" class="bgreen"> ok </button>
            </div>
        </div>

    </form>


    <?php if (!empty($_SESSION["article"])) : ?>
        <div class="col-5 flex aic jcc">
            <div class="formc mt1 col-12">
                <div class="col-10">
                    <label for="non">Libelle</label>
                    <input type="text" name="nom" value="<?= $_SESSION["article"]["libelle"] ?>" readonly>
                </div>
                <div class="col-10">
                    <label for="non">Prix unitaire</label>
                    <input type="text" name="prenom" value="<?= $_SESSION["article"]["prixunitaire"] ?>" readonly>
                </div>
                <div class="col-10">
                    <label for="non">Quantite en stock</label>
                    <input type="text" name="prenom" value="<?= $_SESSION["article"]["qtestock"] ?>" readonly>
                </div>
            </div>
        </div>

</div>

<form action="<?= WEBROOT ?>" method="post" class="col-12 flex aic jcsa"">
        <div class="formc mt3 col-6">
            <h2> Quantite a commander</h2>
            <div class="col-10">
                
                <label for="non">Qantite*</label>
                <input type="number" name="qte"  required>
            </div>
            
            <input type="hidden" name="controller" value="commande">
            <label for="message" class="mt1"><?php if (isset($tab["msg2"])) echo $tab["msg2"] ?></label>
            <div class="col-10">
                <button type="submit" name="page" value="ajoutcommande" class="bgreen"> Ajouter </button>
            </div>
        </div>

    </form>
    <table>
    <thead>
        <th>Libelle</th>
        <th>Prix unitaire</th>
        <th> Quantite</th>
        <th>Montant</th>
    </thead>
    <tbody>
        <?php //foreach ($clients as $key => $client) : ?>
            <tr>
                <!-- <td><?= $client["prenom"] ?></td>
                <td><?= $client["nom"] ?></td>
                <td><?= $client["telephone"] ?></td>
                <td><?= $client["telephone"] ?></td> -->
                <td>qwerty</td>
                <td>qwerty</td>
                <td>qwerty</td>
                <td>qwerty</td>
            </tr>
            <tr>
                <td colspan="4">Total: </td>
            </tr>
        <?php //endforeach ?>
    </tbody>

</table>

<?php endif ?>

<?php endif ?>