1) PREPARAR O AMBIENTE, INSTALANDO O XAMPP
2) ATIVAR O APACHE E O MYSQL, APÓS FICAR VERDE SEGUIR OS PRÓXIMOS PASSOS
3) IMPORTAR O MODELO locadora_veiculos.sql no PHPMYADMIN (Criando as tabelas e realizando as inserções de dados já carregadas, e também os relacionamentos)
4) DESCOMPACATAR A PASTA APIRESTFULPHP DENTRO DO DIRETÓRIO HTDOCS DA PASTA XAMP OU DO SERVIDOR LOCAL QUE ESTIVER UTILIZANDO
5) EFETUAR O DOWNLOAD DO POSTMAN EM https://www.postman.com/  VERSÃO FREE
6) APÓS O AMBIENTE ESTIVER FUNCIONANDO TESTAR A APLICAÇÃO VIA POSTMAN SEGUINDO AS INTRUÇÕES ABAIXO:
7A) INSERIR A URL COM O COMANDO GET: http://localhost/apirestufulphp/clientes/ deverá retornar uma lista de array json com todos os clientes cadastrados na base
4B) INSERIR A URL COM O COMANDO GET http://localhost/apirestufulphp/clientes/1 inserir após clientes, o id do cliente que deseja buscar
4C) INSERIR A URL COM O COMANDO DELETE http://localhost/apirestufulphp/clientes/1 inserir após clientes, o id do cliente que deseja DELETAR
4D) INSERIR A URL COM O COMANDO POST http://localhost/apirestufulphp/clientes/ antes buscar um cliente, copiar este array, e no body do POST, colar este array alterando 
as informações, dar enter, o novo cliente deverá ser gravado na base de dados
4E) INSERIR A URL COM O COMANDO PUT http://localhost/apirestufulphp/clientes/antes buscar um cliente, copiar este array, e no body do POST, colar este array alterando
as informações que não sejam o codigo, após enviar, as informações deverão ser atualizadas na base de dados

8) Repetir os passos, A, B, C, D, E, com os outros endpoints, que são as urls: http://localhost/apirestufulphp/veiculos/ e http://localhost/apirestufulphp/locacao/