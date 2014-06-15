<?php
class bdd{
private static $_inst = NULL;

public static function getInstance(){
if(self::$_inst == NULL){ // on vérifie que nous ne sommes déjà pas connectés ...
try{
$host = 'timixiphpexa.mysql.db';
$port = 3306;
$dbname = 'xxxx';
$user = 'xxxxx';
$password = 'xxxxx';
self::$_inst = new PDO ('mysql:host=' . $host . ';port=' . $port . ';dbname=' . $dbname . '','' . $user . '','' . $password . '', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'));
self::$_inst -> exec("SET lc_time_names = 'fr_FR'");
}catch (Exception $e){
die('Erreur : ' . $e->getMessage()); 
}
}
return self::$_inst;
}
}
?>
