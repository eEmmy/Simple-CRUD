<?php

// Carregar o arquivo do crud
require_once "path/to/DB.php";

/** --------------------------------------------------------------------------------------|
 * Os métodos de manipulação de dados retornam booleanos de acordo com o exito deles      |
 * se forem concluidos com sucesso retornarão true										  |
 * mas caso haja algum erro, essa exceção sera exibida e o método retorna falso			  |
 *																						  |
 * ---------------------------------------------------------------------------------------|
 *																						  |
 * Todos os métodos de manipulação suportam OR e AND nas clausulas WHERE				  |
 * porém apenas um deles pode ser usado, então se definido OR, a query inteira usara OR	  |
 * e se não definido nada a query inteira usara AND										  |
 * esse problema será corrigido em versões futuras										  |
 *																						  |
 * ---------------------------------------------------------------------------------------|
 * Todos os métodos CRUD de DB devem ser executados após o método ::table()               |
 * para prevenir erros/enganos na hora de executar as querys 							  |
 * ---------------------------------------------------------------------------------------|
 */

// Realiza um insert
DB::table('teste_schema')::
	create([
		'field' => 0,
		'an_field' => 'Esse texto',
		'money' => 145.06
	]);

// Realiza um update
// a sintaxe do array é
// [
//	'campo_a_ser_alterado' => ['novo_valor', 'operador de comparação', 'valor antigo']
// ]
DB::table('teste_schema')::
	update([
		'field' => [12, '=', 0],
		'money' => [23.1 '<=', 145.06]
	]);

// Realiza um update com OR no WHERE
DB::table('teste_schema')::
	update([
		'field' => [22, '=', 16],
		'money' => [23.18 '<', 145.06]
	], "OR");

// Realiza um delete
DB::table('teste_schema')::delete(['field', ">", 0]);
?>