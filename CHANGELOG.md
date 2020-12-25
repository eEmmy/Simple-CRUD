# Changelog
Mudanças feitas no Simple-CRUD da versão 1.0.0 para 2.0.0

## Stable
### 2.0.0 - Worker

#### Adicionado
* **Schema**:
	* O usuário agora pode escolher se uma tabela existente deve ser excluída;
	* Novo tipo de retorno na função up: caso o usuário opte por não excluir a tabela, o valor retornado será 2
* **DB**:
	* Adicionado opção de condição where no método *all*
* **Instalação**: Instalação e versionamento agora são geridos pelo composer

#### Alterado
* **Schema**:
	* Migrations não precisam mais da função down;
	* Função down: de public para protected
* **DB**:
	* update: o agora a condição where é passada separadamente, como feito nos selects

#### Removido
* **Schema**:
	* Função down
