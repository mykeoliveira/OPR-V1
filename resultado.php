<?php
error_reporting(0);

//include "conecta.php";
//include "seguranca.php";
session_start();
   $numero = $_SESSION['nome'];
   $id = $_SESSION["id"];
   $login = $_SESSION["login"];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
    
    <title>Cognitive Style</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        
      
        <link rel="stylesheet" type="text/css" href="styles.css" />
               
        <!--[if IE]>
        
        <style type="text/css">
        .clear {
          zoom: 1;
          display: block;
        }
        </style>

        
        <![endif]-->
        
    </head>
    
    <body>

    	<div class="section" id="page"> <!-- Defining the #page section with the section tag -->
    
            <div class="header"> <!-- Defining the header section of the page with the appropriate tag -->

            <h1>  OPR</h1>
                <h3>Open Programming Resource</h3> 
                
                
                <div class="nav clear"> <!-- The nav link semantically marks your main site navigation -->
                   <ul>
                        <li><a href="template.html">Home</a></li>
                        <li><a href="Login.php">Login</a></li>
                        <li><a href="ajuda.php">Help</a></li>
                        <li><a href="contato.php">Contact</a></li>
                    </ul>
                </div>
            
            </div>
            
            <div class="section" id="articles"> <!-- A new section with the articles -->

				<!-- Article 1 start -->

                <div class="line"></div>  <!-- Dividing line -->
                
                <div class="article" id="article1"> 
                

                <?php
$tipos = str_replace("_", " *********************** ", $_GET['tipos']);    




//echo  "O seu nível de conhecimento é $tipos.";
//echo "<a href=$tipos.html>; $tipos </a>"; 
?> <br><br> <?php
if($tipos=="HOLISTA")
{
	
    echo "<h3>O estilo cognitivo identificado é o <b>Holista</b>.</h3><br><br> Usuários holísticos são mais proeminentes no contexto global, desde o início de uma atividade, eles preferem examinar uma vasta quantidade de informações em busca de padrões e relacionamentos entre eles. Pessoas holísticas podem resolver problemas complexos com facilidade e quase sempre são bons sintetizadores. ";
    ?><br><br> Para continuar clique <a href="questionario_estilos/avancado/holista/holista_avancado_1.php"> aqui </a>.<?php
}
if($tipos=="SERIALISTA")
{
	
    echo "<h3>O estilo cognitivo identificado é o <b>Serialista</b>.</h3><br><br>Usuários serialistas dão mais ênfase a tópicos separados e a sequências lógicas, procurando padrões e relacionamentos no processo, para confirmar ou não suas suposições. Suas suposições são mais simples e têm uma abordagem lógico-linear (de uma suposição para a próxima etapa) passo a passo). Eles são competentes para resolver problemas e, geralmente, bons analistas. ";
    ?><br><br> Para continuar clique <a href="questionario_estilos/avancado/serialista/serialista_avancado_1.php"> aqui</a>.<?php
}
if($tipos=="DIVERGENTE")
{
	echo "<h3>O estilo cognitivo identificado é o <b>Divergente</b>.</h3><br><br>Usuários divergentes são mais criativos, com respostas criativas, originais e claras. Eles preferem problemas informais, que solicitam a disseminação de várias respostas igualmente concebíveis, nas quais são destacadas na quantidade, diversidade e singularidade das respostas. Eles estão mais dispostos a resolver problemas menos estruturados. Socialmente, eles são mais impulsivos e ameaçadores. ";
    ?><br><br> Para continuar clique <a href="questionario_estilos/avancado/divergente/divergente_avancado_1.php"> aqui</a>.<?php
}
if($tipos=="REFLEXIVO")
{
	echo "<h3>O estilo cognitivo identificado é o <b>Reflexivo</b>.</h3><br><br>Usuários reflexivos pensam antes de fazer qualquer coisa, como um curso, por exemplo. Eles têm os pensamentos mais organizados, sequenciados e fazem uma avaliação reflexiva antes de responder a uma resposta. ";
    ?><br><br> Para continuar clique <a href="questionario_estilos/avancado/reflexivo/reflexivo_avancado_1.php"> aqui</a>.<?php
}
if($tipos=="CONVERGENTE")
{
	echo "<h3>O estilo cognitivo identificado é o <b>Convergente</b>.</h3><br><br>O estilo convergente integra teoria e prática. Usuários convergentes usam abstração e bom senso na aplicação prática de idéias e teorias, sempre buscam a melhor solução para um problema prático e gostam de resolver problemas práticos. Eles são melhores com tarefas técnicas e resolução de problemas do que com eventos sociais e interpessoais. Materiais preferidos: Esquemas e artigos. ";
    ?><br><br> Para continuar clique <a href="questionario_estilos/avancado/convergente/convergente_avancado_1.php"> aqui</a>.<?php
}
if($tipos=="IMPULSIVO")
{
	echo "<h3>O estilo cognitivo identificado é o <b>Impulsivo</b>.</h3><br><br>Usuários impulsivos não organizam respostas anteriores, geralmente aceitam a primeira hipótese e oferecem soluções rápidas para os problemas. Materiais preferidos: diagramas e vídeos. ";
    ?><br><br> Para continuar clique <a href="questionario_estilos/avancado/impulsivo/impulsivo_avancado_1.php"> aqui</a>.<?php
}
?>
     
    </body>
</html>
