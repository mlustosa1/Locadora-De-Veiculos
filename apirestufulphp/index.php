<?php 

header("Content-Type: application/json; charset=UTF-8");

require_once './vendor/autoload.php';

$banco = new Conexao();

//carregando a pagina solicitada
Rotas::getPagina();