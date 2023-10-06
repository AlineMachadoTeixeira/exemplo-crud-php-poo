<?php
use ExemploCrudPoo\Produto;
require_once "../vendor/autoload.php";
$produto = new Produto;
$produto->setId($_GET ['id']);
$produto->excluirProduto();
header("location:visualizar.php");


//$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
//excluirProduto($conexao, $id);
//header("location:visualizar.php");