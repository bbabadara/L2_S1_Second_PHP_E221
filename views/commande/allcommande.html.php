<h1> Tous les commandes</h1>

<form action="<?=WEBROOT?>" method="post">
    <div class="formc flex">
    <div class="col-10">
<select name="etat" id="">
    <option value="tous">Tous</option>
    <option value="1"> Disponible </option>
    <option value="0"> En rupture </option>
</select>
<input type="hidden" name="controller" value="commande">
<button type="submit" name="page" value="demande"> OK </button>
</div>
</div>
</form>
 <table  >
    <thead>
        <th>Date</th>
        <th>Montant</th>
        <th>Etat</th>
        <th> Action</th>
    </thead>
    <tbody>   
       
    <?php foreach ($commandes as $key => $commande) : ?>
        <tr>
            <td><?=  $commande["datec"] ?></td>
            <td><?=  $commande["montant"] ?></td>
            <td><?=  $commande["etat"] ?></td>
            <td> <a href="<?= WEBROOT?>/?controller=article&page=article&key=<?=  $commande["idc"] ?>"> Articles</a> </td>
        </tr>
        <?php endforeach?>
      
    </tbody>
 </table>