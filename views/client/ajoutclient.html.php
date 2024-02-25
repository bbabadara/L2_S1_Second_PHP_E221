<h1> Ajouter un client</h1>

<form action="<?=WEBROOT?>" method="post">
    <div class="formc ">
  
<div>
<label for="non">Nom</label>
<input type="text" name="nom" value="<?php if(isset($tab)) echo $tab["nom"]?>">
</div>
<div>
<label for="non">Prenom</label>
<input type="text" name="prenom" value="<?php if(isset($tab)) echo $tab["prenom"]?>">
</div>
<div>
<label for="non">Telephone</label>
<input type="text" name="tel" value="<?php if(isset($tab)) echo $tab["tel"]?>">
</div>
<input type="hidden" name="controller" value="client">
<label for="message"><?php if(isset($tab)) echo $tab["msg"]?></label>
<button type="reset" name="page" value="reset"> Annuler </button>
<button type="submit" name="page" value="addclient"> Enregister </button>

</div>
</form>