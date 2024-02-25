<h1> Liste des clients </h1>
 <table  >
    <thead>
        <th>Prenom</th>
        <th>Nom</th>
        <th> Telephone</th>
        <th>Commandes</th>
    </thead>
    <tbody>
    <?php foreach ($clients as $key => $client) : ?>
        <tr>
            <td><?=  $client["prenom"] ?></td>
            <td><?=  $client["nom"] ?></td>
            <td><?=  $client["telephone"] ?></td>
            <td> <a href="<?= WEBROOT?>/?controller=commande&page=commande&key=<?=$client["id"]?>"> Commandes</a> </td>

        </tr>
        <?php endforeach?>
    </tbody>

 </table>

 