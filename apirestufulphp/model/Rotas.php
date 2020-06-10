<?php

class Rotas {

    public static $pag;
    private static $controller = 'controller';

    public static function getPagina(){

        if(isset($_GET['pag'])):
        
            self::$pag =explode('/',$_GET['pag']);
            
            switch(self::$pag[0]):

                case 'clientes':
                    include self::$controller . '/clientes.php';
                break;

                case 'veiculos':
                    include self::$controller . '/veiculos.php';
                break;

                case 'locacao':
                    include self::$controller . '/locacao.php';
                break;
            
            endswitch;
            
        else:

        echo '<h2>Pagina Home</h2>';
        
        endif;
    }
}