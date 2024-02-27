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
                <td> <a href="<?= WEBROOT ?>/?controller=commande&page=commande&key=<?= $client["id"] ?>"> Commandes</a> </td>

            </tr>
        <?php endforeach ?>
    </tbody>

</table>
<div class="flex jcc aic col-12 espaceTB">
    <div class="pagination ">
        <a href="#" class="prev">&laquo; Previous</a>
        <a href="#" class="active">1</a>
        <a href="#">2</a>
        <a href="#">3</a>
        <a href="#">4</a>
        <a href="#">5</a>
        <a href="#" class="next">Next &raquo;</a>
    </div>
</div>

<!-- <div class="container espaceTB">

            <ul class="pagination ">
            <?php if($page>1) :?>
                <li> <a class="" href="<?= $url ?>/?page=alldemande&pos=<?= $page ?>&act=pre&filtre=<?=$bfil ?>"> Precedent </a></li>
                <?php endif ?>
                <?php for ($i = 1; $i <= $nbr_page; $i++) : ?>
                    <li>
                        <a class="" href="<?= $url ?>/?page=alldemande&pos=<?= $i ?>&filtre=<?=$bfil ?>"> <?= $i ?> </a>
                    </li>
                <?php endfor ?>
                <?php if($page<$nbr_page) :?>
                <li> <a class="" href="<?= $url ?>/?page=alldemande&pos=<?= $page ?>&act=suiv&filtre=<?=$bfil ?>"> Suivant </a></li>
                <?php endif ?>
            </ul>
        </div> -->
