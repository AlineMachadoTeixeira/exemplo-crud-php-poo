<?php
namespace ExemploCrudPoo;

use PDO;
use Exception;

// final, pois não vai receber herança de ninguem. 
final class Fabricante {
    private int $id;
    private string $nome;

    /* Essa propriedade receberá os recursos PDO através da classe Banco (dependendo deste projeto) Liga fabricante com banco*/
    private PDO $conexao;  //crie use linha 4 

    public function __construct(){
        /* No momento em que um objeto Fabricante for criado, automaticamente será feita a chamada de metodo "conecta" existente na classe Banco. */
        $this->conexao = Banco::conecta();       
    }



    public function lerFabricantes():array {
        $sql = "SELECT * FROM fabricantes ORDER BY nome";
        
        try {
            $consulta = $this->conexao->prepare($sql);
            $consulta->execute();
            $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $erro) {
            die("Erro: ".$erro->getMessage());
        }    
    
        return $resultado;
    } 

    public function inserirFabricante():void {
        $sql = "INSERT INTO fabricantes(nome) VALUES(:nome)";
    
        try {
            $consulta = $this->conexao->prepare($sql);
            $consulta->bindValue(":nome", $this->nome, PDO::PARAM_STR);
            $consulta->execute();
        } catch (Exception $erro) {
            die("Erro ao inserir: ".$erro->getMessage());
        }
    
    }

    public function lerUmFabricante():array {
        $sql = "SELECT * FROM fabricantes WHERE id = :id";
    
        try {
            $consulta = $this->conexao->prepare($sql);
            $consulta->bindValue(":id", $this->id, PDO::PARAM_INT);
            $consulta->execute();
            $resultado = $consulta->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $erro) {
            die("Erro ao carregar: ".$erro->getMessage());
        }
    
        return $resultado;
    } 
    













        
    //id
    public function getId(): int
    {
        return $this->id;
    }    
    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    //nome
    public function getNome(): string
    {
        return $this->nome;
    }    
    public function setNome(string $nome): self
    {
        $this->nome = filter_var($nome, FILTER_SANITIZE_SPECIAL_CHARS);
        return $this;
    }
}