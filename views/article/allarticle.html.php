<h1> Tous les articles <?= isset($_GET["key"])? "de la commande" :"" ?></h1>
 <table  >
    <thead>
        <th>Libelle</th>
        <th>Prix</th>
        <th> Quantité en stock</th>
    </thead>
    <tbody>
    <?php foreach ($articles as $key => $article) : ?>
        <tr>
            <td><?=  $article["libelle"] ?></td>
            <td><?=  $article["prixunitaire"] ?></td>
            <td><?=  $article["qtestock"] ?></td>
        </tr>
        <?php endforeach?>
    </tbody>

 </table>

 <div class="flex jcc aic col-12 espaceTB">
    <div class="pagination ">
        <?php if ($page > 1) : ?>
            <a href="<?= path('article', 'article', ['pos' => ($page-1)]) ?>" class="prev">&laquo; Précedente</a>
        <?php endif ?>

        <?php for ($i = 1; $i <= $nbr_page; $i++) : ?>
            <a href=" <?= path('article', 'article', ['pos' => $i]) ?>" class=<?=$page==$i?"active":""?>><?= $i ?> </a>
        <?php endfor ?>
        <?php if ($page < $nbr_page) : ?>
        <a href="<?= path('article', 'article', ['pos' => ($page+1)]) ?>" class="next">Suivant &raquo;</a>
        <?php endif ?>
    </div>
</div>
