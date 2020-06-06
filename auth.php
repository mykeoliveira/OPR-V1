<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php

//Recebemos os dados digitados pelo usuário
$login = $_POST['login'];
$senha = $_POST['senha'];
       
//Estabelecemos uma conexão com o banco de dados
//mysql_connect("Nome ou IP do servidor", "Usuario", "Senha");
//include ("conecta.php");

$conexao = mysqli_connect("localhost","myke1","","REA") or die ('Não foi possível conectar');

//caso a conexão seja estabelecida corretamente seleciona o banco de dados a ser usado

if($conexao)
  	 {
      mysqli_select_db($conexao, "REA");
      }  
      //Criamos o comando que efetua a busca do banco
      $sql = "SELECT  id_usuario, nome, avaliado FROM usuario WHERE login = '$login' AND senha = '$senha'";
	 
      //Executamos o comando
	  
      $rs = mysqli_query($conexao, $sql);
      //$rs = mysqli_query($id, "SELECT  id_usuario, nome, login, avaliado FROM usuario WHERE login = '$login' AND senha = '$senha'");
	  
	 //Retornamos o numero de linhas afetadas
      $num = mysqli_num_rows($rs);
     //Verificam se alguma linha foi afetada, caso sim retornamos suas informações
	  
      if($num > 0)
      {
		  
      //Retorna os dados do banco
      $rst = mysqli_fetch_array($rs);
      $id = $rst["id_usuario"];
  	  //$login1 = $rst["login"];	 
      $nome = $rst["nome"];
      //Inicia a sessão
      session_start();
      //Registra os dados do usuário na sessão
      $_SESSION["id"] = $id;
      $_SESSION["nome"] = $nome;
      $_SESSION["login"] = $login;
	  //$numero = $login;
      //Encerra a conexão com o banco
	  
	  $verifica = $rst["avaliado"];
     // mysql_close($conn);
     //Redireciona para o index
	 
	 if($verifica == 0){
	 //echo "<javascript> alert('Entrou no 0'); </javascript>";
	// echo $_SESSION['nome'], "&nbsp;Seja bem vindo!";
	// echo "<meta http-equiv='refresh' content='3;URL=realiza_teste11.php'>";
			header("location: realiza_teste11.php");
	 }
	 elseif($verifica == 1){
	 
		$tiresul =  mysqli_query($conexao,"SELECT tipo FROM usuario WHERE id_usuario = '$id'");
		// while($linha = mysql_fetch_array($busca_resul)){

		while($result = mysqli_fetch_array($tiresul)){
      		$tipo1 = $result["tipo"];
	  		//$nivel1 = $result["nivel"];
	 		print "$login $tipo1";
		}
		 
		if($tipo1 == 'SERIALISTA')
		{
			?>
    
    		<script language="javascript" type="text/javascript">
			location.href="questionario_estilos/avancado/serialista/serialista_avancado_1.php"
			</script>	
		
    		<?php
		}
		elseif($tipo1 == 'HOLISTA')
		{
			?>
    
    		<script language="javascript" type="text/javascript">
			location.href="questionario_estilos/avancado/holista/holista_avancado_1.php"
			</script>	
		
    		<?php
		}
		elseif($tipo1 == 'CONVERGENTE')
		{
			?>
    
    		<script language="javascript" type="text/javascript">
			location.href="questionario_estilos/avancado/convergente/convergente_avancado_1.php"
			</script>	
		
    		<?php
		}
		elseif($tipo1 == 'DIVERGENTE' )
		{
			?>
    
    		<script language="javascript" type="text/javascript">
			location.href="questionario_estilos/avancado/divergente/divergente_avancado_1.php"
			</script>	
		
    		<?php
		}
		elseif($tipo1 == 'IMPULSIVO' )
		{
			?>
    
    		<script language="javascript" type="text/javascript">
			location.href="questionario_estilos/avancado/impulsivo/impulsivo_avancado_1.php"
			</script>	
		
    		<?php
		}	
		elseif($tipo1 == 'REFLEXIVO' )
		{
			?>
    
    		<script language="javascript" type="text/javascript">
			location.href="questionario_estilos/avancado/reflexivo/reflexivo_avancado_1.php"
			</script>	
		
    		<?php
		}																	
		
	  }  //Fecha o else
	  } //Fecha o primeiro if
      else
      {
      //Encerra a conexão com o banco
      mysqli_close();
      //Caso nenhuma linha seja retornada emite o alerta e retorna
      echo "<b><center>  Ocorreu um erro na busca pelo usuário com os dados informados...Retornando para a página de Login</center></b>";
      echo "<meta http-equiv='refresh' content='3;URL=Login.php'>";
      }
	 	  
      ?>