<?php

//echo 'Página de clientes';

$metodo = $_SERVER['REQUEST_METHOD'];

//echo $metodo;

$clientes = new Clientes();

switch($metodo):

    case 'GET':
        if(isset(Rotas::$pag[1]) && Rotas::$pag[1]!=NULL ):
            
            $id = (int)Rotas::$pag[1];
            $clientes->GetCLientesID($id);
            
        else:		   
        
		  
        $clientes->GetClientes();
        endif;
        
        $dados = json_encode($clientes->ListarDados());

        echo $dados;
        
    break;

    case 'POST':        
         
        $dados = json_decode(file_get_contents('php://input'));
        var_dump($dados);

        $id  =     $dados->cli_id;
        $cpf  =   $dados->cli_cpf;
        $nome  =   $dados->cli_nome;
        $endereco =   $dados->cli_endereco;

        
        
        if($clientes->Inserir($id, $cpf, $nome, $endereco)):
            echo 'Dados gravados com sucesso';
        else:
            echo 'Erro ao gravar dados';
        endif; 
        
        
    break; 

    case 'DELETE':      
       
        if(isset(Rotas::$pag[1]) && Rotas::$pag[1]!=NULL ):
            
            $id = (int)Rotas::$pag[1];
         
            if($clientes->Deletar($id)):
                
                    if($clientes->Total() > 0):

                        echo 'Produto apagado com sucesso';
                    else:
                        echo "Nada foi apagado, produto id ({$id}) não existe";
                    endif;
               
                
            endif;
            
        else:
          echo 'Erro ao deletar, informação do produto incorreta';   
        endif;       
        
    break; 

    case 'PUT':        
         
      
        $dados = json_decode(file_get_contents('php://input'));
        var_dump($dados);
        
        $id  =     $dados->cli_id;
        $cpf  =   $dados->cli_cpf;
        $nome  =   $dados->cli_nome;
        $endereco =   $dados->cli_endereco;
       
        
        if($clientes->Update($id, $cpf, $nome, $endereco)):
            echo 'Dados atualizados com sucesso';
        else:
            echo 'Erro ao atualizar dados';
        endif; 
       
       
   break; 
    
    
        
    break; 
    

endswitch;


