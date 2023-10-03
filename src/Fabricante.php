<?php
namespace ExemploCrudPoo;

use PDO;

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
        $this->nome = $nome;
        return $this;
    }
}