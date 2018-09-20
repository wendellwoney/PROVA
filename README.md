#Teste técnico para vaga de Analista Desenvolvedor PHP.


## Tarefa do teste-1

Escreva um programa que imprima números de 1 a 100. Mas, para múltiplos de 3 imprima
“Fizz” em vez do número e para múltiplos de 5 imprima “Buzz”. Para números múltiplos
de ambos (3 e 5), imprima “FizzBuzz”.

# Solução:
Criação de uma classe com um método simples para realizar a tarefa, foi feito com parâmetrização
apenas pra representar o dinamismo do uso de uma classe, que no caso desta implementação a classe
poderia ser instânciada em vários locais e executar a mesma tarefa para um intervalo diferente a
cada uso.

## Instalação e teste

# Requisitos
* PHP 5.3.3 ou superior.


Após ter clonado o repositório na raiz de um servidor apache funcional com PHP mínimo 5.3.3 instalado, apenas digite na barra de endereços do seu navegador a seguinte url:

```
http://localhost/questao_01/src/
```

## Tarefa do teste-2

Refatore o código abaixo, fazendo as alterações que julgar necessário.

```php
<?
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    header("Location: http://www.google.com");
    exit();
} elseif (isset($_COOKIE['Loggedin']) && $_COOKIE['Loggedin'] == true) {
    header("Location: http://www.google.com");
    exit();
}
```

## Instalação e teste

# Requisitos
* PHP 5.3.3 ou superior.


Após ter clonado o repositório na raiz de um servidor apache funcional com PHP mínimo 5.3.3 instalado, apenas digite na barra de endereços do seu navegador a seguinte url:

```
http://localhost/questao_02/src/
```



##  Tarefa do teste-3

Refatore o código abaixo, fazendo as alterações que julgar necessário.

```php
<?php
class MyUserClass
{
    public function getUserList()
    {
        $dbconn = new DatabaseConnection('localhost','user','password');
        $results = $dbconn->query('select name from user');
        sort($results);
        return $results;
    }
}
```

# Requisitos
* PHP 5.3.3 ou superior.


Após ter clonado o repositório na raiz de um servidor apache funcional com PHP mínimo 5.3.3 instalado, apenas digite na barra de endereços do seu navegador a seguinte url:

```
http://localhost/questao_03/src/
```

## Tarefa do teste-4

Desenvolva uma API Rest para um sistema gerenciador de tarefas
(inclusão/alteração/exclusão). As tarefas consistem em título e descrição, ordenadas por
prioridade.

Desenvolver utilizando:
    * Linguagem PHP ou framework CakePHP;
	(Por se tratar de um simples micro-serviço optei por usar um Micro-Framework, mais indicado para desenvolvimento de
	APIs por possuir um kernel mais enxuto que dispensa recursos voltados para camadas de visão neste caso foi
	utilizado o Slim 3).
    * Banco de dados MySQL;
Diferenciais:
    * Criação de interface para visualização da lista de tarefas; (Implementado)
    * Interface com drag and drop;
    * Interface responsiva (desktop e mobile); (Implementado)

# Informação:

- A API Rest foi desenvolvida utilizando o slim 2.6 e doctrine 2.5

- Interface para gerênciamento das tarefas foi criada utilizando o framework Bootstrap, junto com o
pacote de Icons Font Awesome.


### Requisitos para a API
* HTTP Server. Por exemplo: Apache. Mod_rewrite ativado.
* PHP 5.3 ou superior.
* MySQL

### Instalação e teste

Uma vez que o repositório esteja clonado na raiz de um servidor apache funcional com PHP mínimo 5.3 instalado,
crie o banco de dados tarefa no servidor mysql, considerando que o banco de dados tenha sido criado com o nome definido (tarefa), execute o seguinte comando para criação das tabelas "php vendor\doctrine\orm\bin\doctrine.php orm:schema-tool:create" 
feito isto então acesse em seu navegador a seguinte url:

```
Acesso a API
http://localhost/questao_04/
```

```
Acesso a Aplicação
http://localhost/questao_04_site/
<<<<<<< HEAD
```
=======
```
>>>>>>> 7f2d17736da1db990c4a203d80a58c79bf107f7b
