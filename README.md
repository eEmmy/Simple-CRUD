# Simple-CRUD
Alguns arquivos para criar tabelas e manipular bancos de dados com PHP PDO.

## Getting Started
Para rodar os arquivos de exemplo, mude o require_once para o caminho pedido neles. Essa alteração precisa ser feita nos seguintes arquivos:
- Database/DB.php
- Database/Schema.php
- Database/Blueprint.php
- Todos os arquivos dentro de Exemplos/

Para colocar os arquivos para funcionar em um servidor é só seguir os exemplos mudando apenas os caminhos dos arquivos solicitados. Você também precisa editar o arquivo config.php (ou o nome que tenha dado a ele) com as configurações de seu servidor MySql/MariaDB.

### Pré-requisitos
**Debian/Ubuntu Linux Distros**
```
sudo apt install php php-mysql mysql-server -y
sudo mysql -u root

CREATE USER 'seu_usuario'@'localhost' IDENTIFIED BY 'sua_senha';
GRANT ALL PRIVILEGES ON * . * TO 'seu_usuario'@'localhost';

FLUSH PRIVILEGES;

exit;
```

**Windows 7 e a cima**
Apenas instale algum servidor LAMPP (XAMPP, WAMPP, etc.) e coloque-o para rodar.

### Instalação
**Debian/Ubuntu Linux Distros**
```
git clone https://github.com/eEmmy/Simple-CRUD.git
```

**Windows 7 e a cima**
Apenas baixe o arquivo .zip do GitHub e descompacte-o com qualquer gerenciador de arquivos.

## Autore
* **Emmy Gomes** - *Todo o deselvonvimento*- [eEmmy](https://github.com/eEmmy)
 