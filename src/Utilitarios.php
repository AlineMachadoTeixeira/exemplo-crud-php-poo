<?php
namespace ExemploCrudPoo;


//Falta o Método estático
abstract class Utilitarios{
    public static function formatarPreco( float $valor ):string {
        $valorFormatado = number_format($valor, 2, ",", ".");
         return "R$ " . $valorFormatado;      
        
    }
    
    public static function calcularTotal(float $valor, int $qtd):string {
        $total = $valor * $qtd;
        return Utilitarios::formatarPreco($total);
    }

}

// class Utilitarios{
//     public static string $dataAtual;

//     //Método estático
//     public static function obterData(){
//         /* self::propriedade
//         Permite o acesso à propriedade estática. */
//         self::$dataAtual = date("d/m/Y");
//     }

//     public static function definirAtendimento(int $idade):string{
//         // ? : é tipo if else verdadeiro mostra prioridade : falso  normal
//         return $idade >= 60 ? "prioridade" : "normal";
//     }
