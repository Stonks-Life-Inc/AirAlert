<?php
class GestionConnexion {
   
    private static $_instance = null;
        private static $laConnexion;
    private  function __construct() {    
        self::$laConnexion= new PDO('mysql:host=localhost;dbname=bibliotheque','root','root');
        self::$laConnexion->query("SET CHARACTER SET utf8");
    }
    public static function getConnexion() 
    {    if (is_null(self::$_instance))
            self::$_instance=new GestionConnexion();
                         
        return (self::$laConnexion);
    }
    public static function liberer() {
            self::$_instance= null;
                        self::$laConnexion= null;
    }
}