<?php

class Conexao {

    private $host = "localhost",
            $user = "root",
            $senha= "",
            $banco= "locadora_veiculos";
    protected $obj;

    function __construct(){
        try
        {
          
          if($this->Conectar()==NULL):
                $this->Conectar();
            
         endif;
            
        } catch (Exception $e)
        {
         echo ' Erro de conexÃ£o ' . $e->getMessage() ;  
         exit();   
        }
 
    }

    function Conectar(){
        
        $options = array
                  ( PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING 
                  );
        
          $link =  new PDO("mysql:host={$this->host};dbname={$this->banco}",
                $this->user, $this->senha, $options);
          
          return $link;

    }

    function ExecuteSQL($query,array $params=NULL){
        
        $this->obj = $this->Conectar()->prepare($query);
        
        return $this->obj->execute();
        
    }

    function ListarDados(){
        
        return $this->obj->fetchAll(PDO::FETCH_OBJ); 
        
    }
    function Total(){
        
        return $this->obj->rowCount();
    }
}