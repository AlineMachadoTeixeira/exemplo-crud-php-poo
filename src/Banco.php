<?php
namespace ExemploCrudPoo;


// Usamos use, pois é classe do pHP 
use PDO;
use Exception;

abstract class Banco {
    /* Propriedade/atributos estáticos para acessa ao Banco */
     private static string $servidor = "localhost";
     private static string $usuario = "root";
     private static string $senha = "";
     private static string $banco = "vendas";

     /* Classes internas do proprio PHP (como é o caso da PDO ) precisam do use NomeDaClasse OU de uma barra invertida no momento da criação (como a baixo)*/
     //private static \PDO $conexao; 

     private static PDO $conexao;  // Se for desta forma, é usado "use PDO " linha 6

     //Método de conexão ao banco (será usado outras classes ) 
     public static function conecta():PDO {

        try {
            self::$conexao = new PDO(
                "mysql:host=" . self::$servidor . ";dbname=" . self::$banco . ";charset=utf8",
                self::$usuario, self::$senha
            ); 
            
            self::$conexao->setAttribute(
                PDO::ATTR_ERRMODE, 
                PDO::ERRMODE_EXCEPTION
            );

           
        } catch(Exception $erro){
            die("Deu ruim: ".$erro->getMessage());
        }

        return self::$conexao;

     }

} // FIM DA CLASSE Banco

//Banco::conecta();// Teste












