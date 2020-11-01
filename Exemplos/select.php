<?php

// Carregar o arquivo do crud
require_once "path/to/DB.php";

/** --------------------------------------------------------------------------------------|
 * Os métodos de select formatam resultados com PDO::fetchAll()						      |
 * logo retornam arrays na seguinte estrutura:											  |
 * 	[0] => [																			  |
 *		'field' => 'value'																  |
 * 		'other_field' => 'other_value'													  |
 *	],																				      |
 * 	[1] => [																			  |
 *		'field' => 'value'																  |
 * 		'other_field' => 'other_value'													  |
 *	]																					  |
 *																						  |
 * ---------------------------------------------------------------------------------------|
 *																						  |
 * Caso nenhum registro seja encontrado, o método retornara false 						  |
 *																						  |
 * ---------------------------------------------------------------------------------------|
 * Todos os métodos CRUD de DB devem ser executados após o método ::table()               |
 * para prevenir erros/enganos na hora de executar as querys 							  |
 * ---------------------------------------------------------------------------------------|
 */

// Executa um select *
DB::table('teste_schema')::all();

// Executa um select com os campos especificados
DB::table('teste_schema')::select(['field', 'an_field', 'id']);

// Executa um select passando parametros para ele
// todos esses parametros podem ser passados individualmente, não necessitando estar numa ordem ou ter algum para que outro funcione
// eles apenas precisam ser chamados antes do método ::select(), e não funcionam com o método ::all()
// por enquanto o método where só suporta AND
DB::table('teste_schema')::
	where([
		['field', '=', 16]
	])::
	orderBy('id ASC')::
	limit('10')::
	select([
		'id',
		'field',
		'text'
	]);
?>