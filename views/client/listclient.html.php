
<h1> Liste des clients </h1>
<div class="col-12 flex aic jcc">
    <div class="col-8 flex aiend">
        <button><a href="<?= path('client', 'ajoutclient') ?>">Ajouter</a></button>
    </div>
</div>
<table>
    <thead>
        <th>Prenom</th>
        <th>Nom</th>
        <th> Telephone</th>
        <th>Commandes</th>
    </thead>
    <tbody>
        <?php foreach ($clients as $key => $client) : ?>
            <tr>
                <td><?= $client["prenom"] ?></td>
                <td><?= $client["nom"] ?></td>
                <td><?= $client["telephone"] ?></td>
                <!-- <td> <a href="<?= WEBROOT ?>/?controller=commande&page=commande&key=<?= $client["id"] ?>"> Commandes</a> </td> -->
                <td> <a href=" <?= path('commande', 'commande', ['key' => $client["id"]]) ?>"> Commandes</a> </td>
            </tr>
        <?php endforeach ?>
    </tbody>

</table>
<div class="flex jcc aic col-12 espaceTB">
    <div class="pagination ">
        <?php if ($page > 1) : ?>
            <a href="<?= path('client', 'listclient', ['pos' => ($page-1)]) ?>" class="prev">&laquo; Précedente</a>
        <?php endif ?>

        <?php for ($i = 1; $i <= $nbr_page; $i++) : ?>
            <a href=" <?= path('client', 'listclient', ['pos' => $i]) ?>" class=<?=$page==$i?"active":""?>><?= $i ?> </a>
        <?php endfor ?>
        <?php if ($page < $nbr_page) : ?>
        <a href="<?= path('client', 'listclient', ['pos' => ($page+1)]) ?>" class="next">Suivant &raquo;</a>
        <?php endif ?>
    </div>
</div>

