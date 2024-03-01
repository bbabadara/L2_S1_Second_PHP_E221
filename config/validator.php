<?php
function obligatoire(string $key, string $value, array &$errors, string $sms = "champ obligatoire")
{
    if (empty($value)) {
        $errors[$key] = $sms;
    }
}
 

function validate( array $errors):bool
{
   return count($errors)==0;
}