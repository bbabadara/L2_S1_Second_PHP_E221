<?php
if (isset($_SESSION["tab"])) {
    $tab = $_SESSION["tab"];
    unset($_SESSION["tab"]);
    // dd($tab);
}
if (isset($_SESSION["line"])) {
    $line = $_SESSION["line"];
    unset($_SESSION["line"]);
}
if (isset($_SESSION["payement"])) {
    $pay = $_SESSION["payement"];
 }else {
    $pay=[
        "commandes"=>[],
        "versement"=>[],
    ];
 }
// dd($pay);
?>

<h1> Faire un payement</h1>
<div class="col-12 flex aic jcc"><label for="message" class="mt1 greencol"><?php if (isset($tab["success"])) echo $tab["success"] ?></label></div>
<div class="col-12 flex aic jcsa">
    <form action="<?= WEBROOT ?>" method="post" class="col-5">
        <div class="formc mt3 col-12">
            <h2> Client</h2>
            <div class="flex aic jcsa col-12">
                <div class="col-9">
                    <label for="non">Telephone*</label>
                    <input type="text" name="tel" value="<?= isset($pay["client"]["telephone"]) ? $pay["client"]["telephone"] : "" ?>">
                </div>
                <div class="col-3">
                    <button type="submit" name="page" value="findClientPaye" class="bgreen"> ok </button>
                </div>
            </div>
            <label for="message" class="mt1 redcol"><?php if (isset($tab["tel"])) echo $tab["tel"] ?></label>
            <?php if(isset($pay["client"])):?>
            <div class="flex aic jcsa col-12">
                <input type="text" class="col-5" value="<?= isset($pay["client"]["nom"]) ? $pay["client"]["nom"] : "" ?>" placeholder="Nom" readonly>
                <input type="text" class="col-5" value="<?= isset($pay["client"]["prenom"]) ? $pay["client"]["prenom"] : "" ?>" placeholder="Prenom" readonly>
            </div>
            <?php endif?>
            <input type="hidden" name="controller" value="payement">
          
        </div>

    </form>
</div>

<div class="flex aic jcsa col-12 espaceTB">
    <div class="adpay col-5">
        <table class="col-12">
            <thead>
                <th>Date</th>
                <th>Montant</th>
                <th> Montant verse</th>
                <th>Montant restant</th>
                <th>Payement</th>
            </thead>
            <tbody>
           <?php foreach ($pay["commandes"] as $key => $value): ?>
                <tr>
                    <td><?=$value["datec"] ?></td>
                    <td><?=$value["montant"] ?></td>
                    <td><?=$value["verser"] ?></td>
                    <td><?=$value["restant"] ?></td>
                    <td> <a href="<?= path('payement', 'addToVersement', ['line' =>$key ]) ?>" class="whitecol"><button class="bgreen padbut">+</button></a> <br> <?php if (isset($tab["ajoutv"])&& $key==$line) echo $tab["ajoutv"] ?>  </td>
                </tr>
                <?php endforeach ?>

            </tbody>

        </table>
    </div>



    <div class="adpay col-6">
        <form action="<?= WEBROOT ?>" method="post" style="display: block;">
        <div class="flex">
            <label for="">Date payement: </label>
            <input  type="date" name="datep" class="col-5" value="<?=isset($pay["versement"][0]["datep"])?$pay["versement"][0]["datep"]:"date('Y-m-d')"?>" >
            <label for="message" class="mt1 redcol"><?php if (isset($tab["datep"])) echo $tab["datep"] ?></label>
        </div>
        <input type="hidden" name="controller" value="payement">
        <div class="flex aiend">
            <button class="bgreen mb1" type="submit" value="addVersement" name="page" >Valider</button>
        </div>
        <table class="col-12 tabpay">
            <thead>
                <th>Date commande</th>
                <th>Montant restant</th>
                <th> Versement</th>
                <th>Monde de payement</th>
                <th>Reference</th>  
                <th>Action</th>
            </thead>
            <tbody>
                <?php foreach ($pay["versement"] as $key => $value) :?>
                <tr>
                    <td><input type="text" value="<?=$value['datec']?>" class="col-12" readonly></td>
                    <td><input type="text" value="<?=$value['restant']?>" class="col-12" readonly></td>
                    <td><input type="number"  name="<?='verse'.$key?>" class="col-12" placeholder="Entrer la somme" value="<?php if (isset($value["verse"])) echo $value["verse"] ?>"> 
                    <br>  <label for="message" class="mt1 redcol"><?php if (isset($tab["verse".$key])) echo $tab["verse".$key] ?></label>
                </td>

                    <td>
                        <select name="<?='mode'.$key?>" id="" class="col-12">
                    <?php foreach ($modes as $mode) :?>
                        <option value="<?=$mode["idmod"]?>" <?php if(isset($value["mode1"]))if ($mode["idmod"]== $value["mode"] ) echo "selected" ?>><?=$mode["nom_mod"]?></option>
                        <?php endforeach ?>
                    </select>
                     </td>
                    <td> <input type="text"  name="<?='refmode'.$key?>" class="col-12" placeholder="Entrer la reference" value="<?php if (isset($value["refmode"])) echo $value["refmode"] ?>">
                    <br>  <label for="message" class="mt1 redcol"><?php if (isset($tab["refmode".$key])) echo $tab["refmode".$key] ?></label>
                </td>
                    <td> <button class="bred padbut"> <a href="<?= path('payement','removeToVersement', ['remove' => $key]) ?>" class="whitecol">-</a></button>  </td>
                </tr>
                <?php endforeach ?>
            </tbody>

        </table>
        </form>
        <?php if (isset($pay["versement"][0]["verse"])):?>
        <a href="<?= path('payement', 'saveVersement') ?>" class="whitecol mt3"><button class="bgreen  mt2">Enregistrer</button></a>
        <?php endif ?>
    </div>




</div>