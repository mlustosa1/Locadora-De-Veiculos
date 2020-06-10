<?php
 
class Locacao extends Conexao {
    function __construc(){
        parent::__construct();
    }
/*
* listagem de produtos
*/
    function GetLocacao(){
        $query = "select * from locacao";
        $this->ExecuteSQL($query);
    }

     /**
     * @param type $codigo
     * @param type $cpf_cli
     * @param type $placa_veiculo
     * @param type $data_inicio
     * @param type $data_termino
     * @param type $status_locacao
     * faz a inserção de novo produto
     */
    function Inserir ($codigo,$cpf_cli,$placa_veiculo,$data_inicio,$data_termino,$status_locacao){
        $query = "insert into locacao (loc_codigo,loc_cpf_cli,loc_placa_veiculo,loc_data_inicio,loc_data_termino,loc_status_locacao)";
        $query.="values";
        $query.="('{$codigo}','{$cpf_cli}','{$placa_veiculo}','{$data_inicio}','{$data_termino}','{$status_locacao}')";

        echo $query;
        if($this->ExecuteSQL($query)):
            return true;
        endif;
    }

    function GetLocacaoCod($codigo){
        
        $query = "select * from locacao where loc_codigo = '{$codigo}'";
        $this->ExecuteSQL($query);
        
        
    }
    function Deletar($codigo){
        
        $query = "DELETE FROM locacao WHERE loc_codigo = '{$codigo}'";
       
        if($this->ExecuteSQL($query)):
            return true;
        endif;
       
       
   }

   function Update($codigo,$cpf_cli,$placa_veiculo,$data_inicio,$data_termino,$status_locacao){
        
    $query = "UPDATE locacao SET loc_codigo='{$codigo}', loc_cpf_cli='{$cpf_cli}',loc_placa_veiculo='{$placa_veiculo}',loc_data_inicio='{$data_inicio}',loc_data_termino='{$data_termino}',loc_status_locacao='{$status_locacao}'";
    $query .=" WHERE loc_codigo = '{$codigo}'";
          
    //echo $query;
    
    if($this->ExecuteSQL($query)):
        return true;
    endif;
    
      
      
  }
  
}