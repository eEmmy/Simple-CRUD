<?php

namespace DB;

use PDO;

/**
 * Classe para criar ou destruir tabelas.
 *
 */
class Schema
{
	/**
	 * Guarda o objeto PDO.
	 *
	 * @var PDO $conn
	 */
	private static $conn;

	/**
	 * Realiza a conexão com o banco de dados.
	 *
	 * @return void
	 */
	static function init()
	{
		// Tenta realizar a conexão com o banco de dados
		try {
			// Importa os dados do arquivo de configuração
			$host = $GLOBALS["host"]; 
			$db = $GLOBALS["db"]; 
			$user = $GLOBALS["user"]; 
			$pass = $GLOBALS["pass"]; 
			$debug = $GLOBALS["debug"];

			// Instancia o pdo
			self::$conn = new PDO("mysql:host=" . $host . 
				";dbname=" . $db,
				$user,
				$pass,

				// Define a conexão como permanente
				array(
					PDO::ATTR_PERSISTENT => true
				)
			);

			// Verifica as configurações de debug
			if ($debug) {
				// Muda as configurações para mostrar os erros
				self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}
		} 
		catch (Exception $e) {
			// Retorna o erro
			throw new Exception("Erro ao criar a conexão pdo - " . $e->getMessage());
			
			return false;
		}
	}

	/**
	 * Cria uma tabela.
	 * 
	 * @param String $tableName
	 * @param Array $fields
	 * 
	 * @return Bool
	 */
	public static function up($tableName, $fields)
	{
		// Instancia o objeto self::$conn
		self::init();

		// Verifica se $tableName tem algum conteudo
		if (empty($tableName)) {
			// Retorna o erro
			throw new Exception("O nome da tabela não pode ser vazio.");
			
			return false;
		}

		// Verifica se a tabela já existe
		if(self::tableExists($tableName)) {
			// Executa o método down
			$down = self::down($tableName);

			// Verifica se a tabela foi excluida
			if ($down == false) {
				return 2;
			}
		}

		// Verifica se $fields tem algum valor definido
		if (count($fields) == 0) {
			// Retorna o erro
			throw new Exception("Schema::up() - Algum campo tem que ser informado.");
			
			return false;
		}

		// Query para criação da tabela
		$tableQuery = "CREATE TABLE IF NOT EXISTS {$tableName} (";
		
		// Armazena os campos
		$fieldsQuery = "";

		// Loop em $fields
		foreach ($fields as $key => $field) {
			// Adiciona o campo a $fieldsQuery
			$fieldsQuery .= "{$field}";

			// Verifica se existem mais campos
			if ($field != end($fields)) {
				// Adiciona uma virgula a $fieldsQuery
				$fieldsQuery .= ", ";
			}
			else{
				// Monta a query
				$tableQuery .= "{$fieldsQuery}) ENGINE=INNODB DEFAULT CHARSET=UTF8";

				// Quebra o loop
				break;
			}
		}

		// Tenta criar a tabela
		try {
			// Cria a tabela
			self::$conn->exec($tableQuery);

			// Retorna true
			return true;
		}
		catch (Exception $e) {
			// Retorna o erro
			throw new Exception("Ocorreu o seguinte erro - " . $e->getMessage());
			
			return false;
		}
	}

	/**
	 * Exclui uma tabela caso já exista.
	 *
	 * @param String $tableName
	 *
	 * @return void
	 */
	protected static function down($tableName)
	{
		// Exibe a pergunta para o usuario
		echo "Deseja mesmo apagar a tabela {$tableName}? [S|n]: ";
		
		// Verifica se o usuario concorda em deletar a tabela,
		$userResponse = rtrim(fgets(STDIN));

		// Verifica a resposta
		if ($userResponse == "n") {
			// Encerra a função
			return false;
		}
		
		// Instancia o objeto self::$conn
		self::init();

		// Verifica se $tableName tem algum conteudo
		if (empty($tableName)) {
			// Retorna o erro
			throw new Exception("O nome da tabela não pode ser vazio.");
			
			return false;
		}

		// Tenta excluir a tabela
		try {
			// Prepara a query
			$queryPrepare = self::$conn->query("DROP TABLE IF EXISTS {$tableName}");

			// Executa a query
			$queryPrepare->execute();
			
		} catch (Exception $e) {
			// Retorna o erro
			throw new Exception("Schema::down() - Ocorreu o seguinte erro: " . $e->getMessage());
			
			return false;
		}
	}

	/**
	 * Verifica se uma tabela existe.
	 *
	 * @param String $tableName
	 *
	 * @return Bool
	 */
	protected static function tableExists($tableName)
	{
		// Instancia o objeto self::$conn
		self::init();

		// Query para buscar a tabela de migrations
		$selectQuery = "
		SELECT 
			COUNT(*) AS tableExists
		FROM 
			information_schema.tables
		WHERE 
			table_name = '{$tableName}'";

		// Executa o select
		$selectRes = self::$conn->query($selectQuery);
		
		// Formata o resultado
		$selectRes = $selectRes->fetch(PDO::FETCH_ASSOC);

		// Verifica se a tabela existe
		if ($selectRes["tableExists"] == 0) {  // Não existe
			// Retorna false
			return false;
		}
		else {  // Existe
			// Retorna true
			return true;
		}
	}
}

?>