<?php

	require("../../domain/connection.php");
	require("../../domain/Produtos.php");

	class ProdutosProcess {
		var $Pd;

		function doGet($arr){
			$Pd = new ProdutosDAO();
			$sucess = "use to result to DAO";
			http_response_code(200);
			echo json_encode($sucess);
		}


		function doPost($arr){
			$Pd = new ProdutosDAO();
			$sucess = "use to result to DAO";
			http_response_code(200);
			echo json_encode($sucess);
		}


		function doPut($arr){
			$Pd = new ProdutosDAO();
			$sucess = "use to result to DAO";
			http_response_code(200);
			echo json_encode($sucess);
		}


		function doDelete($arr){
			$Pd = new ProdutosDAO();
			$sucess = "use to result to DAO";
			http_response_code(200);
			echo json_encode($sucess);
		}
	}