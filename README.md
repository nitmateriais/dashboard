Pesquisa de mestrado de Vinícius Rafael Micali Soares (PPGCI/UFSCar) em 2019.

Tecnologias utilizadas:

1) Framework Bootstrap 5;
2) PHP;
3) D3.JS;
4) Google Charts;
5) jQuery.

Para rodar é necessário instalar: 1) Web server; 2) Interpretador do PHP. Uma opção é instalar o pacote XAMPP, que inclui o web server Apache juntamente com o PHP: https://www.apachefriends.org/pt_br/index.html . Após a instalação do Apache, faça o download do repositório "dashboard" (GitHub), descompacte (zip), renomeie a pasta para "dashboard" e mova para "C:\xampp\htdocs\" (caso esteja utilizando Windows). Abra um navegador e acesse o endereço "http://localhost/dashboard". Se o Dashboard não carregar, verifique se o servidor Apache está rodando.

#IMPORTANTE#

Os arquivos JSON (criados pelo Luís Gustavo Maschietto) estão no diretório "controller" ("coautoria_pesquisadores.json" e "publicacoes_article_conference.json") e são utilizados em: 1) "controller/monta_json.php"; 2) "graficos/grafo.php"; 3) "graficos/matriz.php". Futuramente esses arquivos JSON serão substituídos por chamadas para API's.
