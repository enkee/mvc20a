<?php

class Hash
{
    //consigue una cadena de encriptación de un password usando un key y el tipo de algoritmo.
    public static function getHash($algoritmo, $data, $key)
    {
        $hash = hash_init($algoritmo, HASH_HMAC, $key);
        hash_update($hash, $data);
        
        return hash_final($hash);
    }
}

?>
