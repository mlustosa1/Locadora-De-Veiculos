<?php
 
class Clientes extends Conexao {
    function __construc(){
        parent::__construct();
    }
/*
* listagem de produtos
*/
    function GetClientes(){
        $query = "select * from clientes";
        $this->ExecuteSQL($query);
    }

     /**
     * 
     * @param type $id
     * @param type $cpf
     * @param type $nome
     * @param type $endereco
     * 
     * faz a inserção de novo produto
     */
    function Inserir ($id,$cpf,$nome,$endereco){
        $query = "insert into clientes (cli_id,cli_cpf,cli_nome,cli_endereco)";
        $query.="values";
        $query.="({$id},{$cpf},'{$nome}','{$endereco}')";

        echo $query;
        if($this->ExecuteSQL($query)):
            return true;
        endif;
    }

    function GetCLientesID($id){
        
        $query = "select * from clientes where cli_id = '{$id}'";
        $this->ExecuteSQL($query);
        
        
    }
    function Deletar($id){
        
        $query = "DELETE FROM clientes WHERE cli_id = {$id}";
       
        if($this->ExecuteSQL($query)):
            return true;
        endif;
       
       
   }

   function Update($id, $cpf, $nome, $endereco){
        
    $query = "UPDATE clientes SET cli_cpf='{$cpf}', cli_nome='{$nome}',cli_endereco='{$endereco}'";
    $query .=" WHERE cli_id = {$id}";
          
    //echo $query;
    
    if($this->ExecuteSQL($query)):
        return true;
    endif;
    
      
      
  }
  
}