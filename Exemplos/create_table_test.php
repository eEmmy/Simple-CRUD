<?php

// Carrega os arquivos para criação de tabela
require_once "path/to/Schema.php";
require_once "path/to/Blueprint.php";

// Instancia objeto blueprint
$table = new Blueprint();

// Cria a tabela
Schema::up('teste_schema', [
	$table->id(),
	$table->default(10)->integer('field'),
	$table->string('an_field'),

	$table->nullable()->text('`text`'),
	$table->decimal('money', 10, 2)
]);

?>