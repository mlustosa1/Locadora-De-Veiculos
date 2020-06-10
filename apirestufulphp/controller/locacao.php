<?php

//echo 'Página de clientes';

$metodo = $_SERVER['REQUEST_METHOD'];

//echo $metodo;

$locacao = new Locacao();

switch($metodo):

    case 'GET':
        if(isset(Rotas::$pag[1]) && Rotas::$pag[1]!=NULL ):
            
            $loc_cod = (int)Rotas::$pag[1];
            $locacao->GetLocacaoCod($loc_cod);
            
        else:		   
        
		  
        $locacao->GetLocacao();
        endif;
        
        $dados = json_encode($locacao->ListarDados());

        echo $dados;
        
    break;

    case 'POST':        
         
        $dados = json_decode(file_get_contents('php://input'));
        var_dump($dados);

        $codigo  =     $dados->loc_codigo;
        $cpf_cli   =   $dados->loc_cpf_cli;
        $placa_veiculo  =   $dados->loc_placa_veiculo;
        $data_inicio =   $dados->loc_data_inicio;
        $data_termino =   $dados->loc_data_termino;
        $status_locacao =   $dados->loc_status_locacao;

        
        
        if($locacao->Inserir($codigo,$cpf_cli,$placa_veiculo,$data_inicio,$data_termino,$status_locacao)):
            echo 'Dados gravados com sucesso';
        else:
            echo 'Erro ao gravar dados';
        endif; 
        
        
    break; 

    case 'DELETE':      
       
        if(isset(Rotas::$pag[1]) && Rotas::$pag[1]!=NULL ):
            
            $codigo = (int)Rotas::$pag[1];
         
            if($locacao->Deletar($codigo)):
                
                    if($locacao->Total() > 0):

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
        
        $codigo  =     $dados->loc_codigo;
        $cpf_cli   =   $dados->loc_cpf_cli;
        $placa_veiculo  =   $dados->loc_placa_veiculo;
        $data_inicio =   $dados->loc_data_inicio;
        $data_termino =   $dados->loc_data_termino;
        $status_locacao =   $dados->loc_status_locacao;


        
        if($locacao->Update($codigo,$cpf_cli,$placa_veiculo,$data_inicio,$data_termino,$status_locacao)):
            echo 'Dados atualizados com sucesso';
        else:
            echo 'Erro ao atualizar dados';
        endif; 
       
       
   break; 
    
    
        
    break; 
    

endswitch;


