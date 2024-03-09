<div class="header col-12 flex">
        <div class="col-10 flex ndt">

        
        <div class="logo col-xs-6 col-sm-6 col-md-3 flex">
            <h1><a href="<?=WEBROOT?>">E221</a></h1>
        </div>
        <ul class=" menu flex col-md-6">
            <li><a href="<?= path('article','article')?>">Articles</a></li>
            <li><a href="<?= path('commande','commande')?>">Commandes</a></li> 
            <li><a href=" <?= path('client','listclient')?>">Clients</a></li>
            <li><a href="<?= path('payement','ajoutpayement')?>">Payment</a></li> 
            <!-- <li><a href="<?= path('client','ajoutclient')?>t">Ajout client</a></li> -->
            <!-- <li><a href="<?= path('commande','ajoutcommande')?>">Ajout commande</a></li>   -->
        </ul>
    </div>
</div>