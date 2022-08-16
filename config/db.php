<?php
class Database{
    public static function connect($dbname){
        date_default_timezone_set('America/Lima');
        $db = new mysqli('localhost','sigefac_userglobal','mHIqeh24A2A9',"sigefac_soporteycobranza_$dbname");
        $db->set_charset("utf8");
        return $db;
    }
}
?>