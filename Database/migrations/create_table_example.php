<?php

// Carrega os arquivos para criação de tabela
require_once "path/to/Schema.php";
require_once "path/to/Blueprint.php";

// Instancia objeto blueprint
$table = new Blueprint();

// Cria a tabela
Schema::up('', [
	$table->id()

]);

?>