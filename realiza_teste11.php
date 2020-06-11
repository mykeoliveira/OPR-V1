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
    
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        
        <title>Cognitive Styles Quiz</title>
        
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
                <h3 align="center"><b>Intruções <BR><BR> <?php echo "Olá, ". $numero . ".  ";?> Por favor, para cada pergunta, marque entre uma das alternativas e não deixe nenhum item sem resposta. </b> </h3>
            <div align="center"></div></td>
        </tr>
        <tr> 
          <td colspan="3"><table width="50%" border="0" align="center" cellpadding="5" cellspacing="0">
              
              
             
            </table></td>



  
  
  <?php


extract($_POST);

if($_GET['acao']  == 'cadastrar') 

{ /*Cadastra os dados depois que o formulário for enviado */
  //Verifica os dados enviados
  
 
  if($um == '') {
   $erros++;
   $html_erros = $html_erros."<br>criativo";
  }
  if($dois == '') {
   $erros++;
   $html_erros = $html_erros."<br>criticar";
  }
  if($tres == '') {
   $erros++;
   $html_erros = $html_erros."<br>decisoes";
  }
  if($quatro == '') {
   $erros++;
   $html_erros = $html_erros."<br>elogiado";
  }
  
  if($cinco == '') {
   $erros++;
   $html_erros = $html_erros."<br>estruturas";
  } 
  
  
  if($seis == '') {
   $erros++;
   $html_erros = $html_erros."<br>geral";
  }
 
 if($sete == '') {
   $erros++;
   $html_erros = $html_erros."<br>partes";
  }
  
  if($oito == '') {
   $erros++;
   $html_erros = $html_erros."<br>todo";
  }
  if($nove == '') {
   $erros++;
   $html_erros = $html_erros."<br>resposta";
  }
  if($dez == '') {
   $erros++;
   $html_erros = $html_erros."<br>formular";
  }

if($onze == '') {
   $erros++;
   $html_erros = $html_erros."<br>frequentemente";
  }
  if($doze == '') {
   $erros++;
   $html_erros = $html_erros."<br>romper";
  }
  if($treze == '') {
   $erros++;
   $html_erros = $html_erros."<br>detalhes";
  }
  
  if($catorze == '') {
   $erros++;
   $html_erros = $html_erros."<br>realista";
  }
  if($quinze == '') {
   $erros++;
   $html_erros = $html_erros."<br>prefere";
  }
   if($dezesseis == '') {
   $erros++;
   $html_erros = $html_erros."<br>estabelecidas";
  }
  if($dezessete == '') {
   $erros++;
   $html_erros = $html_erros."<br>formas";
  }
  if($dezoito == '') {
   $erros++;
   $html_erros = $html_erros."<br>detalhes";
  }
  
  
if($erros == 0)
   {
   $array_tip['CONVERGENTE'] = $um + $tres + $sete;
   $array_tip['DIVERGENTE'] = $doze + $quinze + $dezoito;
   $array_tip['HOLISTA'] = $nove + $dez + $catorze;
   $array_tip['SERIALISTA'] = $seis + $oito + $dezessete;
   $array_tip['IMPULSIVO'] = $dois + $cinco + $onze;
   $array_tip['REFLEXIVO'] = $quatro + $treze + $dezesseis;
  


   $maior = max($array_tip);

   if($maior > 0)
      {
       foreach($array_tip as $indice => $valor)
          {
			  
          if($valor == $maior)
             $tipos = ucfirst($indice);
          }
      }


  $conexao = mysqli_connect("us-cdbr-east-05.cleardb.net","b5270006d6b693","5a57ec9b","heroku_7379346df1b396c") or die ('Não foi possível conectar');
  $sql_1 = "INSERT INTO `questoes`(`um`, `dois`, `tres`, `quatro`, `cinco`, `seis`, `sete`, `oito`, `nove`, `dez`, `onze`, `doze`, `treze`, `catorze`, `quinze`, `dezesseis`, `dezessete`, `dezoito`, `login`)
  VALUES('$um','$dois', '$tres', '$quatro', '$cinco','$seis','$sete','$oito','$nove','$dez','$onze','$doze','$treze','$catorze','$quinze','$dezesseis', '$dezessete', '$dezoito', $id)";
  $sql_2 = "UPDATE `usuario` set `avaliado` = 1, `tipo` = '$tipos' where login ='$login' ";
  
  mysqli_query($conexao, $sql_1);
  mysqli_query($conexao, $sql_2);
  //mysqli_query("INSERT INTO `questoes`(`um`, `dois`, `tres`, `quatro`, `cinco`, `seis`, `sete`, `oito`, `nove`, `dez`, `onze`, `doze`, `treze`, `catorze`, `quinze`, `dezesseis`, `dezessete`, `dezoito`, `login`)
   //VALUES('$um','$dois', '$tres', '$quatro', '$cinco','$seis','$sete','$oito','$nove','$dez','$onze','$doze','$treze','$catorze','$quinze','$dezesseis', '$dezessete', '$dezoito', $id)")
   //or die("Erro no comando SQL:".mysqli_error());
   
  //mysqli_query("UPDATE `usuario` set `avaliado` = 1, `tipo` = '$tipos' where login ='$login' ")
  // or die("Erro no comando SQL:".mysqli_error());
   
    echo "<script> window.open('resultado.php?tipos=$tipos', '_self'); </script>";
   
     
   } //fecha $erros == 0
else
   {
   echo "<div align=center><font face=Arial size=2><b>ATENÇÃO!</b><br><br>Você deixou uma questão em branco.<br> Por favor, clique em Voltar para refazer o teste. 
         
         <br><br><a href='javascript:history.go(-1)'><< Back</a></font></div><br><br>";
   }//fecha else
 } /*fecha acao= cadastrar*/ ?>


 <?php

$_GET['acao'] = "entrar";
if($_GET['acao']  == 'entrar') 

{ 
  
?>
  <form name="frm_user" method="post" action="<?= $_SERVER['../../../Users/Usuário/Documents/Meus arquivos recebidos/PHP_SELF']?>?acao=cadastrar">
 

     
	    
        <tr> 
                <td colspan="3"> <div align="center">
                <h3 align="center"><b>Ap&oacute;s responder a todas 
                      as quest&otilde;es, clique no bot&atilde;o Confirmar.</b></h3>
                    <p><font size="2" face="Arial">---------------------------------------------------------------------------------------------------------------------------------</font></p>
                  </div></td>
        </tr>
       
        <tr> 
          <td colspan="3"> <div align="center"> 
              <table width="560" border="0" cellspacing="0" cellpadding="5">
                    <tr> 
                      <td width="98%" height="25"><p><font face="Times" size="3">1 - Eu considero difícil criar algo original. </font>
                        <p> <font face="Times" size="3"> 
                          <input type="radio" name="um" value="0.51">
                          Discordo Totalmente 
                          <input type="radio" name="um" value="2.2541">
                          Discordo 
                           
                          <input type="radio" name="um" value="3.3121">
                          Concordo 
                          <input type="radio" name="um" value="4.4211">
                          Concordo Totalmente</font></p>
                        <p><font size="2" face="Arial">---------------------------------------------------------------------------------------------------------------------------------</font></p></td>
                    </tr>
                    <tr> 
                      <td height="25"><p align="justify"><font face="Times" size="3">2 - Em muitas situações, eu não sou uma pessoa atenta, porque sou apressado. </font></p>
                        <p> <font face="Times" size="3"> 
                         <input type="radio" name="dois" value="0.5917">
                          Discordo Totalmente 
                          <input type="radio" name="dois" value="2.254927">
                          Discordo 
                           
                          <input type="radio" name="dois" value="3.312937">
                          Concordo 
                          <input type="radio" name="dois" value="4.421947">
                          Concordo Totalmente</font></p>
						
						
						
						
						
                        <p>-------------------------------------------------------------------------------------------------------------------------------<font face="Times" size="3"> 
                          </font></p></td>
                    </tr>
                    <tr> 
                      <td height="25"><p align="justify"><font face="Times" size="3">3 - Comumente, eu sigo as orientações dadas sem questionar. </font></p>
                        
						<p> <font face="Times" size="3"> 
                          <input type="radio" name="tres" value="0.52">
                          Discordo Totalmente 
                          <input type="radio" name="tres" value="2.2542">
                          Discordo 
                          
                          <input type="radio" name="tres" value="3.3122">
                          Concordo 
                          <input type="radio" name="tres" value="4.4212">
                          Concordo Totalmente</font></p>
						
						
						
						
						
						
                        <p><font size="2" face="Arial">---------------------------------------------------------------------------------------------------------------------------------</font></p  
						  
						  ></td>
                    </tr>
                    <tr> 
                      <td height="25"><div align="justify"><font face="Times" size="3">4 - Eu sou uma pessoa muito atenta e organizada. </font> </p> 
                        </div>
                        <p> <font face="Times" size="3"> 
                          <input type="radio" name="quatro" value="0.5915">
                          Discordo Totalmente 
                          <input type="radio" name="quatro" value="2.254925">
                          Discordo 
                          
                          <input type="radio" name="quatro" value="3.312935">
                          Concordo 
                          <input type="radio" name="quatro" value="4.421945">
                          Concordo Totalmente</font></p> 
						
						
						
						
						
                        <p><font size="2" face="Arial">---------------------------------------------------------------------------------------------------------------------------------</font></p  
						  
						  ></td>
                    </tr>
                    <tr> 
                      <td height="25"><font face="Times" size="3">5 - Em geral, eu não costumo pensar muito para distribuir o meu tempo. </font> 
                        <p> <font face="Times" size="3"> 
                          <input type="radio" name="cinco" value="0.598">
                          Discordo Totalmente 
                          <input type="radio" name="cinco" value="2.254928">
                          Discordo 
                          
                          <input type="radio" name="cinco" value="3.312938">
                          Concordo 
                          <input type="radio" name="cinco" value="4.421948">
                          Concordo Totalmente</font></p> 
						
						
						
						
						
                        <p><font size="2" face="Arial">---------------------------------------------------------------------------------------------------------------------------------</font></p  
						  
						  ></td>
						
                    </tr>
                    <tr> 
                      <td height="25"><div align="justify"><font face="Times" size="3"> 6 - Ao realizar uma tarefa, prefiro usar um processo passo-a-passo, trabalhando com pequenas quantidades de dados de cada vez. </font> </p> </div>
                        <p> <font face="Times" size="3"> 
                         <input type="radio" name="seis" value="0.59">
                          Discordo Totalmente 
                          <input type="radio" name="seis" value="2.2549">
                          Discordo 
                         
                          <input type="radio" name="seis" value="3.3129">
                          Concordo 
                          <input type="radio" name="seis" value="4.4219">
                          Concordo Totalmente</font></p>   
						
						
						
                        <p><font size="2" face="Arial">---------------------------------------------------------------------------------------------------------------------------------</font></p></td>
                   
                    </tr>

<tr> 
                      <td height="25"><div align="justify"><font face="Times" size="3">7 - Em geral, eu aceito as regras estabelecidas. </font> </p> </div>
                        <p> <font face="Times" size="3"> 
                          <input type="radio" name="sete" value="0.53">
                          Discordo Totalmente 
                          <input type="radio" name="sete" value="2.2543">
                          Discordo 
                         
                          <input type="radio" name="sete" value="3.3123">
                          Concordo 
                          <input type="radio" name="sete" value="4.4213">
                          Concordo Totalmente</font></p> 
						
						
						
                        <p><font size="2" face="Arial">---------------------------------------------------------------------------------------------------------------------------------</font></p></td>
                   
                    </tr>

<tr> 
                      <td height="25"><div align="justify"><font face="Times" size="3">8 - Eu dou mais atenção aos pequenos elementos informativos de um material de estudo ou de trabalho. </font> </p> </div>
                        <p> <font face="Times" size="3"> 
                          <input type="radio" name="oito" value="0.591">
                          Discordo Totalmente 
                          <input type="radio" name="oito" value="2.25492">
                          Discordo 
                         
                          <input type="radio" name="oito" value="3.31293">
                          Concordo 
                          <input type="radio" name="oito" value="4.42194">
                          Concordo Totalmente</font></p> 
						
						
						
                        <p><font size="2" face="Arial">---------------------------------------------------------------------------------------------------------------------------------</font></p></td>
                   
                    </tr>

<tr> 
                      <td height="25"><div align="justify"><font face="Times" size="3">9 - Costumo enfatizar o contexto global e não os aspectos específicos das tarefas que realizo. </font> </p> </div>
                        <p> <font face="Times" size="3"> 
                          <input type="radio" name="nove" value="0.56">
                          Discordo Totalmente 
                          <input type="radio" name="nove" value="2.2546">
                          Discordo 
                         
                          <input type="radio" name="nove" value="3.3126">
                          Concordo 
                          <input type="radio" name="nove" value="4.4216">
                          Concordo Totalmente</font></p>  
						
						
						
                        <p><font size="2" face="Arial">---------------------------------------------------------------------------------------------------------------------------------</font></p></td>
                   
                    </tr>

<tr> 
                      <td height="25"><div align="justify"><font face="Times" size="3">10 - O contexto global de uma situação é o elemento mais relevante para a tomada de decisões. </font> </p> </div>
                        <p> <font face="Times" size="3"> 
                          <input type="radio" name="dez" value="0.57">
                          Discordo Totalmente 
                          <input type="radio" name="dez" value="2.257">
                          Discordo 
                         
                          <input type="radio" name="dez" value="3.3127">
                          Concordo 
                          <input type="radio" name="dez" value="4.4217">
                          Concordo Totalmente</font></p>  
						
						
						
                        <p><font size="2" face="Arial">---------------------------------------------------------------------------------------------------------------------------------</font></p></td>
                   
                    </tr>

<tr> 
                      <td height="25"><div align="justify"><font face="Times" size="3">11 - Em muitas situações, eu dou respostas sem ponderar muito sobre elas.  </font> </p> </div>
                        <p> <font face="Times" size="3"> 
                          <input type="radio" name="onze" value="0.599">
                          Discordo Totalmente 
                          <input type="radio" name="onze" value="2.254929">
                          Discordo 
                         
                          <input type="radio" name="onze" value="3.312939">
                          Concordo 
                          <input type="radio" name="onze" value="4.421949">
                          Concordo Totalmente</font></p>   
						
						
						
                        <p><font size="2" face="Arial">---------------------------------------------------------------------------------------------------------------------------------</font></p></td>
                   
                    </tr>

<tr> 
                      <td height="25"><div align="justify"><font face="Times" size="3">12 - Eu aprecio experenciar situações novas. </font> </p> </div>
                        <p> <font face="Times" size="3"> 
                         <input type="radio" name="doze" value="0.54">
                          Discordo Totalmente 
                          <input type="radio" name="doze" value="2.2544">
                          Discordo 
                         
                          <input type="radio" name="doze" value="3.3124">
                          Concordo 
                          <input type="radio" name="doze" value="4.4214">
                          Concordo Totalmente</font></p>  
						
						
						
                        <p><font size="2" face="Arial">---------------------------------------------------------------------------------------------------------------------------------</font></p></td>
                   
                    </tr>
           
    <tr> 
                      <td height="25"><div align="justify"><font face="Times" size="3">13 - Costumo pensar bastante antes de tomar decisões.      </font> </p> </div>
                        <p> <font face="Times" size="3"> 
                         <input type="radio" name="treze" value="0.5917">
                          Discordo Totalmente 
                          <input type="radio" name="treze" value="2.254927">
                          Discordo 
                         
                          <input type="radio" name="treze" value="3.312937">
                          Concordo 
                          <input type="radio" name="treze" value="4.421947">
                          Concordo Totalmente</font></p>  
						
						
						
                        <p><font size="2" face="Arial">---------------------------------------------------------------------------------------------------------------------------------</font></p></td>
                   
                    </tr>
                    
                    <tr> 
                      <td height="25"><div align="justify"><font face="Times" size="3">14 - Ao ler um texto, eu presto mais atenção na idéia geral do que nos detalhes informativos do mesmo.</font> </p> </div>
                        <p> <font face="Times" size="3"> 
                          <input type="radio" name="catorze" value="0.58">
                          Discordo Totalmente 
                          <input type="radio" name="catorze" value="2.2548">
                          Discordo 
                         
                          <input type="radio" name="catorze" value="3.3128">
                          Concordo 
                          <input type="radio" name="catorze" value="4.4218">
                          Concordo Totalmente</font></p>  
						
						
						
                        <p><font size="2" face="Arial">---------------------------------------------------------------------------------------------------------------------------------</font></p></td>
                   
                    </tr>
                    
                     <tr> 
                      <td height="25"><div align="justify"><font face="Times" size="3"> 15 - Eu sou capaz de formular respostas originais e criativas, com frequência.   </font> </p> </div>
                        <p> <font face="Times" size="3"> 
                          <input type="radio" name="quinze" value="0.55">
                          Discordo Totalmente 
                          <input type="radio" name="quinze" value="2.2545">
                          Discordo 
                         
                          <input type="radio" name="quinze" value="3.3125">
                          Concordo 
                          <input type="radio" name="quinze" value="4.4215">
                          Concordo Totalmente</font></p>  
						
						
						
                        <p><font size="2" face="Arial">---------------------------------------------------------------------------------------------------------------------------------</font></p></td>
                   
                    </tr>
                    
                    <tr> 
                      <td height="25"><div align="justify"><font face="Times" size="3">16 - Eu costumo pensar bem antes de dar uma resposta.   </font> </p> </div>
                        <p> <font face="Times" size="3"> 
                          <input type="radio" name="dezesseis" value="0.5918">
                          Discordo Totalmente 
                          <input type="radio" name="dezesseis" value="2.254928">
                          Discordo 
                         
                          <input type="radio" name="dezesseis" value="3.312938">
                          Concordo 
                          <input type="radio" name="dezesseis" value="4.421948">
                          Concordo Totalmente</font></p>  
						
						
						
                        <p><font size="2" face="Arial">---------------------------------------------------------------------------------------------------------------------------------</font></p></td>
                   
                    </tr>

<tr> 
                      <td height="25"><div align="justify"><font face="Times" size="3">17 - Diante de um material escrito, eu dou ênfase a cada tópico separadamente e 
somente depois busco relações entre as partes.</font> </p> </div>
                        <p> <font face="Times" size="3"> 
                          <input type="radio" name="dezessete" value="0.5995">
                          Discordo Totalmente 
                          <input type="radio" name="dezessete" value="2.254926">
                          Discordo 
                         
                          <input type="radio" name="dezessete" value="3.312936">
                          Concordo 
                          <input type="radio" name="dezessete" value="4.421946">
                          Concordo Totalmente</font></p>  
						
						
						
                        <p><font size="2" face="Arial">---------------------------------------------------------------------------------------------------------------------------------</font></p></td>
                   
                    </tr>

<tr> 
                      <td height="25"><div align="justify"><font face="Times" size="3">18 - Eu aprecio ousar e tentar criar algo diferente.
     </font> </p> </div>
                        <p> <font face="Times" size="3"> 
                          <input type="radio" name="dezoito" value="0.55">
                          Discordo Totalmente 
                          <input type="radio" name="dezoito" value="2.2545">
                          Discordo 
                         
                          <input type="radio" name="dezoito" value="3.3125">
                          Concordo 
                          <input type="radio" name="dezoito" value="4.4215">
                          Concordo Totalmente</font></p>   
						
						
						
                        <p><font size="2" face="Arial">---------------------------------------------------------------------------------------------------------------------------------</font></p  
						  
						  ></td>
                    </tr>













	   
                    <td height="25" colspan="2"> <div align="center"> 
                        <input type="submit" name="cadastrar" value="Confirmar">
                        <input type="reset" value="Limpar" name="B2">
                      </div></td>
                  </table>
  </form>           
   
   

 
       
          
        
        
    </body>
</html>
<?php } /*fecha acao=entrar */?>
