<?php

	require("../../domain/connection.php");
	require("../../domain/Compras.php");

	class ComprasProcess {
		var $Cd;

		function doGet($arr){
			$Cd = new ComprasDAO();
			$sucess = "use to result to DAO";
			http_response_code(200);
			echo json_encode($sucess);
		}


		function doPost($arr){
			$Cd = new ComprasDAO();
			$sucess = "use to result to DAO";
			http_response_code(200);
			echo json_encode($sucess);
		}


		function doPut($arr){
			$Cd = new ComprasDAO();
			$sucess = "use to result to DAO";
			http_response_code(200);
			echo json_encode($sucess);
		}


		function doDelete($arr){
			$Cd = new ComprasDAO();
			$sucess = "use to result to DAO";
			http_response_code(200);
			echo json_encode($sucess);
		}
	}