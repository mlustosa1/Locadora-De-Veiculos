<?php

//echo 'Página de clientes';

$metodo = $_SERVER['REQUEST_METHOD'];

//echo $metodo;

$veiculos = new Veiculos();

switch($metodo):

    case 'GET':
        if(isset(Rotas::$pag[1]) && Rotas::$pag[1]!=NULL ):
            
            $placa = Rotas::$pag[1];
            $veiculos->GetVeiculosPlaca($placa);
            
        else:		   
        
		  
        $veiculos->GetVeiculos();
        endif;
        
        $dados = json_encode($veiculos->ListarDados());

        echo $dados;
        
    break;

    case 'POST':        
         
        $dados = json_decode(file_get_contents('php://input'));
        var_dump($dados);

        $placa  =     $dados->veic_placa;
        $modelo   =   $dados->veic_modelo;
        $ano  =   $dados->veic_ano;
        $cor =   $dados->veic_cor;
        $preco_diaria =   $dados->veic_preco_diaria;
        $status_aluguel =   $dados->veic_status_aluguel;

        
        
        if($veiculos->Inserir($placa,$modelo,$ano,$cor,$preco_diaria,$status_aluguel)):
            echo 'Dados gravados com sucesso';
        else:
            echo 'Erro ao gravar dados';
        endif; 
        
        
    break; 

    case 'DELETE':      
       
        if(isset(Rotas::$pag[1]) && Rotas::$pag[1]!=NULL ):
            
            $placa = Rotas::$pag[1];
         
            if($veiculos->Deletar($placa)):
                
                    if($veiculos->Total() > 0):

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
        
        $placa  =     $dados->veic_placa;
        $modelo   =   $dados->veic_modelo;
        $ano  =   $dados->veic_ano;
        $cor =   $dados->veic_cor;
        $preco_diaria =   $dados->veic_preco_diaria;
        $status_aluguel =   $dados->veic_status_aluguel;

        
        if($veiculos->Update($placa,$modelo,$ano,$cor,$preco_diaria,$status_aluguel)):
            echo 'Dados atualizados com sucesso';
        else:
            echo 'Erro ao atualizar dados';
        endif; 
       
       
   break; 
    
    
        
    break; 
    

endswitch;


