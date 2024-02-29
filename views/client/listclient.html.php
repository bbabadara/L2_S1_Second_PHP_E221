<?php
// $nbre_el = $nombre["total"];
// $division = 7;
// $nbr_page = ceil($nbre_el / $division);
// if (!isset($_GET["pos"])) {
//     $page = 1;
//     // die($page);

//     if (isset($_GET["act"])) {
//         if ($_GET["act"] == "suiv") {
//             if ($page < $nbr_page) {
//                 $page = $page + 1;
//             }
//         } else if ($_GET["act"] == "pre") {
//             $page = 1;
//         }
//     }
// } else {
//     // die("ok");
//     $page = $_GET["pos"];
//     if (isset($_GET["act"])) {
//         if ($_GET["act"] == "suiv") {
//             if ($page < $nbr_page) {
//                 $page = $page + 1;
//             }
//         } else if ($_GET["act"] == "pre") {
//             if ($page > 1) {
//                 $page = $page - 1;
//             }
//         }
//     }
// }
// $demmarage = ($page - 1) * $division;
// $renv = array_reverse($listclass);
// $pagination = array_splice($renv, $demmarage, $division)

?>
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

