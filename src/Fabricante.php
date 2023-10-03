<?php
namespace ExemploCrudPoo;

// final, pois não vai receber herança de ninguem. 
final class Fabricante {
    private int $id;
    private string $nome;
        
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