<?php
 
class Veiculos extends Conexao {
    function __construc(){
        parent::__construct();
    }
/*
* listagem de produtos
*/
    function GetVeiculos(){
        $query = "select * from veiculos";
        $this->ExecuteSQL($query);
    }

     /**
     * 
     *
     * faz a inserção de novo produto
     */
    function Inserir ($placa,$modelo,$ano,$cor,$preco_diaria,$status_aluguel){
        $query = "insert into veiculos (veic_placa,veic_modelo,veic_ano,veic_cor,veic_preco_diaria,veic_status_aluguel)";
        $query.="values";
        $query.="('{$placa}','{$modelo}','{$ano}','{$cor}','{$preco_diaria}','{$status_aluguel}')";

        echo $query;
        if($this->ExecuteSQL($query)):
            return true;
        endif;
    }

    function GetVeiculosPlaca($placa){
        
        $query = "select * from veiculos where veic_placa = '{$placa}'";
        $this->ExecuteSQL($query);
        
        
    }
    function Deletar($placa){
        
        $query = "DELETE FROM veiculos WHERE veic_placa = '{$placa}'";
       
        if($this->ExecuteSQL($query)):
            return true;
        endif;
       
       
   }

   function Update($placa,$modelo,$ano,$cor,$preco_diaria,$status_aluguel){
        
    $query = "UPDATE veiculos SET veic_placa='{$placa}', veic_modelo='{$modelo}',veic_ano='{$ano}',veic_cor='{$cor}',veic_preco_diaria='{$preco_diaria}',veic_status_aluguel='{$status_aluguel}'";
    $query .=" WHERE veic_placa = '{$placa}'";
          
    //echo $query;
    
    if($this->ExecuteSQL($query)):
        return true;
    endif;
    
      
      
  }
  
}