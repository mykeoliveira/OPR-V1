<?php

/***  Configurações do Script ***/

$_SG['conectaServidor'] = true;    // Abre uma conexão com o servidor MySQL?

$_SG['abreSessao'] = true;         // Inicia a sessão com um session_start()?

$_SG['caseSensitive'] = false;     // Usar case-sensitive? Onde 'thiago' é diferente de 'THIAGO'

// Evita que, ao mudar os dados do usuário no banco de dados o mesmo contiue logado.
$_SG['validaSempre'] = true;       // Deseja validar o usuário e a senha a cada carregamento de página?

$_SG['servidor'] = 'localhost';    // Servidor MySQL

$_SG['usuario'] = 'myke1';          // Usuário MySQL

$_SG['senha'] = '';                // Senha MySQL

$_SG['banco'] = 'REA';    // Banco de dados MySQL

$_SG['paginaLogin'] = 'Login.php'; // Página de login

$_SG['tabela'] = 'usuario';        // Nome da tabela onde os usuários são salvos


// ======================================
//   ~ Não edite a partir deste ponto ~
// ======================================

// Verifica se precisa fazer a conexão com o MySQL
if ($_SG['conectaServidor'] == true) {
	
	$_SG['link'] = @mysqli_connect($_SG['servidor'], $_SG['usuario'], $_SG['senha']) or die("MySQL: Não foi possível conectar-se ao servidor [".$_SG['servidor']."].");
	mysqli_select_db($_SG['link'] , $_SG['banco']) or die("MySQL: Não foi possível conectar-se ao banco de dados [".$_SG['banco']."].");

}

// Verifica se precisa iniciar a sessão
if ($_SG['abreSessao'] == true) {
	session_start();
}

/**
* Função que valida um usuário e senha
*
* @return bool - Se o usuário foi validado ou não (true/false)
*/

function validaUsuario($login, $senha_usuario) {

	global $_SG;
	
	$cS = ($_SG['caseSensitive']) ? 'BINARY' : '';
	
	// Usa a função addslashes para escapar as aspas
	$nlogin = addslashes($login);
	$nsenha_usuario = addslashes($senha_usuario);
	
	// Monta uma consulta SQL (query) para procurar um usuário
	$sql = "SELECT `id_usuario`, `nome` FROM `".$_SG['tabela']."` WHERE ".$cS." `login` = '".$nlogin."' AND ".$cS." `senha` = '".$nsenha_usuario."' LIMIT 1";
	$query = mysqli_query($sql);
	$resultado = mysqli_fetch_assoc($query);
	
	// Verifica se encontrou algum registro
	if (empty($resultado)) {
		
		// Nenhum registro foi encontrado => o login é inválido
		return false;

	} 
	
	else {
		
		// Definimos dois valores na sessão com os dados do usuário
		$_SESSION['usuarioID'] = $resultado['id_usuario']; // Pega o valor da coluna 'id_usuario do registro encontrado no MySQL
		$_SESSION['usuarioNome'] = $resultado['nome']; // Pega o valor da coluna 'nome' do registro encontrado no MySQL
		
		// Verifica a opção se sempre validar o login
		if ($_SG['validaSempre'] == true) {

			// Definimos dois valores na sessão com os dados do login
			$_SESSION['usuarioLogin'] = $login;
			$_SESSION['usuarioSenha'] = $senha_usuario;
		}
		
		return true;
		
	}

}


/**
* Função que protege uma página
*/

function protegePagina() {

	global $_SG;

	if (!isset($_SESSION['usuarioID']) OR !isset($_SESSION['usuarioNome'])) {
	
		// Não há usuário logado, manda pra página de login
		expulsaVisitante();
	
	} 
	
	else {
	
		// Há usuário logado, verifica se precisa validar o login novamente
		if ($_SG['validaSempre'] == true) {
		  
			// Verifica se os dados salvos na sessão batem com os dados do banco de dados
			if (!validaUsuario($_SESSION['usuarioLogin'], $_SESSION['usuarioSenha'])) {
	
				// Os dados não batem, manda pra tela de login
				expulsaVisitante();
	  		
			}
		
		}
	
	}
	
}


/**
* Função para expulsar um visitante
*/

function expulsaVisitante() {

	global $_SG;

	// Remove as variáveis da sessão (caso elas existam)
	unset($_SESSION['usuarioID'], $_SESSION['usuarioNome'], $_SESSION['usuarioLogin'], $_SESSION['usuarioSenha']);

	// Manda pra tela de login
	header("Location: ".$_SG['paginaLogin']);

}

?>