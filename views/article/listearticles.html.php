<h1> Les articles de la commande</h1>
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

 