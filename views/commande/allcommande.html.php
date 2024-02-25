<h1> Tous les commandes</h1>

<form action="<?= WEBROOT ?>" method="post">
    <div class="formc flex aic jcc col-5">
        <div class="col-10 flex jc-se aic">
            <select name="etat" id="" class="col-5">
                <option value="0">Tout</option>
                <?php foreach ($etats as $etat) : ?>
                    <option value="<?= $etat["idetat"] ?>" <?php if ($etat["idetat"] == $_SESSION["filtre"]) echo "selected" ?>> <?= $etat["nometat"] ?> </option>
                <?php endforeach ?>
            </select>
            <input type="hidden" name="controller" value="commande">
            <button type="submit" name="page" value="commande" class="butfiltre bgreen"> OK </button>
        </div>
    </div>
</form>
<table>
    <thead>
        <th>Client</th>
        <th>Date</th>
        <th>Montant</th>
        <th>Etat</th>
        <th> Action</th>
    </thead>
    <tbody>

        <?php foreach ($commandes as $key => $commande) : ?>
            <tr>
                <td><?= $commande["prenom"] . " " . $commande["nom"] ?></td>
                <td><?= $commande["datec"] ?></td>
                <td><?= $commande["montant"] ?></td>
                <td><?= $commande["nometat"] ?></td>
                <td> <a href="<?= WEBROOT ?>/?controller=article&page=article&key=<?=$commande["idc"]?>"> Articles</a> </td>
            </tr>
        <?php endforeach ?>

    </tbody>
</table>