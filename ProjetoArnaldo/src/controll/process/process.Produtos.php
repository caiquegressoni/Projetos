<?php

require("../../domain/connection.php");
require("../../domain/Produtos.php");

class ProdutosProcess
{
	var $pd;

	function doGet($arr)
	{
		$pd = new ProdutosDAO();
		if ($arr["cod"] == "0") {
			$sucess = $pd->readAll();
		} else {
			$sucess = $pd->read($arr["cod"]);
		}

		http_response_code(200);
		echo json_encode($sucess);
	}


	function doPost($arr)
	{
		$pd = new ProdutosDAO();
		$Produtos = new Produtos();
		$Produtos->setCod($arr["cod"]);
		$Produtos->setNome($arr["nome"]);
		$Produtos->setValor($arr["valor"]);
		$Produtos->setQuantidade($arr["quantidade"]);
		$sucess = $pd->create($Produtos);
		http_response_code(200);
		echo json_encode($sucess);
	}


	function doPut($arr)
	{
		$pd = new ProdutosDAO();
		$Produtos = new Produtos();
		$Produtos->setCod($arr["cod"]);
		$Produtos->setNome($arr["nome"]);
		$Produtos->setValor($arr["valor"]);
		$Produtos->setQuantidade($arr["quantidade"]);
		$sucess = $pd->update($Produtos);
		http_response_code(200);
		echo json_encode($sucess);
	}


	function doDelete($arr)
	{
		$pd = new ProdutosDAO();
		$sucess = $pd->delete($arr["cod"]);
		http_response_code(200);
		echo json_encode($sucess);
	}
}
