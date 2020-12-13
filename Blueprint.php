<?php

namespace DB;

/**
 * Retorna campos MySQL.
 */
class Blueprint
{
	/**
	 * Guarda o status da condição NULL de um campo.
	 *
	 * @var String $nullable
	 */
	private $nullable;

	/**
	 * Guarda o valor padrão de um campo.
	 *
	 * @var String $defaultValue
	 */
	private $defaultValue;

	/**
	 * Define as propriedades da classe.
	 *
	 * @return void
	 */
	public function __construct()
	{
		// Define $nullable
		$this->nullable = "NOT NULL";

		// Define $defaultValue
		$this->defaultValue = "";
	}

	/**
	 * Configura o proximo campo a ser criado para aceitar NULL como valor.
	 *
	 * @return $this
	 */
	public function nullable()
	{
		// Define $nullable como vazio
		$this->nullable = "";

		// Retorna $this para encadear métodos
		return $this; 
	}

	/**
	 * Configura o proximo campo a ser criado com um valor padrão.
	 *
	 * @param $value
	 *
	 * @return $this
	 */
	public function default($value)
	{
		// Define $defaultValue com DEFAULT $value
		$this->defaultValue = "DEFAULT {$value}";

		// Retorna $this para encadear métodos
		return $this;
	}

	/**
	 * Retorna um campo primario para armazenar o id dos registros.
	 *
	 * @return String $field
	 */
	public function id()
	{
		// Monta o campo
		$field = "id INT(11) AUTO_INCREMENT PRIMARY KEY";

		// Retorna o campo
		return $field;
	}

	/**
	 * Retorna um campo para armazenar senhas criptografadas com MD5.
	 *
	 * @return String $field
	 */
	public function password()
	{
		// Monta o campo
		$field = "password CHAR(32) NOT NULL";

		// Retorna o campo $field
		return $field;
	}

	/**
	 * Retorna um campo do tipo TIMESTAMP que armazenara automaticamente a data e hora de inserção do registro na tabela.
	 *
	 * @return String $field
	 */
	public function created_at()
	{
		// Monta os campos
		$field = "created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP";

		// Retorna o campo $field
		return $field;
	}

	/**
	 * Retorna um campo do tipo TIMESTAMP que armazenara automaticamente a data e hora de updates nos registros da tabela.
	 *
	 * @return String $field
	 */
	public function updated_at()
	{
		// Monta os campos
		$field = "updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP";

		// Retorna o campo $field
		return $field;
	}


	/**
	 * Retorna um campo do tipo VARCHAR.
	 *
	 * @param String $name
	 * @param Int $length (Opcional)
	 *
	 * @return String $field
	 */
	public function string($name, $length=255)
	{
		// Monta o campo
		$field = "{$name} VARCHAR({$length}) {$this->nullable} {$this->defaultValue}";

		// Define $nullable como NOT NULL para não afetar outros campos caso tenha sido alterado
		$this->nullable = "NOT NULL";

		// Define $defaultValue como vazio para não afetar outros campos caso tenha sido alterado
		$this->defaultValue = "";

		// Retorna o campo
		return $field;
	}

	/**
	 * Retorna um campo do tipo CHAR.
	 *
	 * @param String $name
	 * @param Int $length (Opcional)
	 *
	 * @return String $field
	 */
	public function char($name, $length=255)
	{
		// Monta o campo
		$field = "{$name} CHAR({$length}) {$this->nullable} {$this->defaultValue}";

		// Define $nullable como NOT NULL para não afetar outros campos caso tenha sido alterado
		$this->nullable = "NOT NULL";

		// Define $defaultValue como vazio para não afetar outros campos caso tenha sido alterado
		$this->defaultValue = "";

		// Retorna o campo
		return $field;
	}

	/**
	 * Retorna um campo do tipo TEXT.
	 *
	 * @param String $name
	 *
	 * @return String $field
	 */
	public function text($name)
	{
		// Monta o campo
		$field = "{$name} TEXT {$this->nullable} {$this->defaultValue}";

		// Define $nullable como NOT NULL para não afetar outros campos caso tenha sido alterado
		$this->nullable = "NOT NULL";

		// Define $defaultValue como vazio para não afetar outros campos caso tenha sido alterado
		$this->defaultValue = "";

		// Retorna o campo
		return $field;
	}

	/**
	 * Retornar um campo do tipo INT.
	 *
	 * @param String $name
	 * @param Int $length (Opcional)
	 *
	 * @return String $field
	 */
	public function integer($name, $length=11)
	{
		// Monta o campo
		$field = "{$name} INT({$length}) {$this->nullable} {$this->defaultValue}";

		// Define $nullable como NOT NULL para não afetar outros campos caso tenha sido alterado
		$this->nullable = "NOT NULL";

		// Define $defaultValue como vazio para não afetar outros campos caso tenha sido alterado
		$this->defaultValue = "";

		// Retorna o campo
		return $field;
	}

	/**
	 * Retorna um campo do tipo DECIMAL.
	 *
	 * @param String $name
	 * @param Int $length1 (Opcional)
	 * @param Int $length2 (Opcional)
	 *
	 * @return String $field
	 */
	public function decimal($name, $length1=4, $length2=2)
	{
		// Monta o campo
		$field = "{$name} DECIMAL({$length1}, {$length2}) {$this->nullable} {$this->defaultValue}";

		// Define $nullable como NOT NULL para não afetar outros campos caso tenha sido alterado
		$this->nullable = "NOT NULL";

		// Define $defaultValue como vazio para não afetar outros campos caso tenha sido alterado
		$this->defaultValue = "";

		// Retorna o campo
		return $field;
	}
}

?>