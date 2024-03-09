<h1> Tous les commandes</h1>
<div class="col-12 flex aic jcc">
    <div class="col-8 flex aiend">
        <button><a href="<?= path('commande', 'ajoutcommande') ?>">Ajouter</a></button>
    </div>
    </div>

<form action="<?= WEBROOT ?>" method="get">
    <div class="formc flex aic jcc col-2">
        <div class="col-10 flex jc-se aic">
            <select name="etat" id="" class="col-10">
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
        <th>commande</th>
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
                <!-- <td> <a href="<?= WEBROOT ?>/?controller=article&page=article&key=<?=$commande["idc"]?>"> Articles</a> </td> -->
                <td> <a href="<?= path('article','article',['key'=>$commande['idc']])?>"> Articles</a> </td>
            </tr>
        <?php endforeach ?>

    </tbody>
</table>
<div class="flex jcc aic col-12 espaceTB">
    <div class="pagination ">
        <?php if ($page > 1) : ?>
            <a href="<?= path('commande', 'commande', ['pos' => ($page-1),"etat"=>$_SESSION["filtre"]]) ?>" class="prev">&laquo; Précedente</a>
        <?php endif ?>

        <?php for ($i = 1; $i <= $nbr_page; $i++) : ?>
            <a href=" <?= path('commande', 'commande', ['pos' => $i,"etat"=>$_SESSION["filtre"]]) ?>" class=<?=$page==$i?"active":""?>><?= $i ?> </a>
        <?php endfor ?>
        <?php if ($page < $nbr_page) : ?>
        <a href="<?= path('commande', 'commande', ['pos' => ($page+1),"etat"=>$_SESSION["filtre"]]) ?>" class="next">Suivant &raquo;</a>
        <?php endif ?>
    </div>
</div>