<?php

class Compras
{
	var $cod;
	var $data;
	var $codProduto;
	var $custo;
	var $quantidade;

	function getCod()
	{
		return $this->cod;
	}
	function setCod($cod)
	{
		$this->cod = $cod;
	}

	function getData()
	{
		return $this->data;
	}
	function setData($data)
	{
		$this->data = $data;
	}

	function getCodProduto()
	{
		return $this->codProduto;
	}
	function setCodProduto($codProduto)
	{
		$this->codProduto = $codProduto;
	}

	function getCusto()
	{
		return $this->custo;
	}
	function setCusto($custo)
	{
		$this->custo = $custo;
	}

	function getQuantidade()
	{
		return $this->quantidade;
	}
	function setQuantidade($quantidade)
	{
		$this->quantidade = $quantidade;
	}
}

class ComprasDAO
{
	function create($Compras)
	{
		$result = array();

		try {
			$query = "INSERT INTO table_name (column1, column2) VALUES (value1, value2)";

			$con = new Connection();

			if (Connection::getInstance()->exec($query) >= 1) {
			}

			$con = null;
		} catch (PDOException $e) {
			$result["err"] = $e->getMessage();
		}

		return $result;
	}

	function read()
	{
		$result = array();

		try {
			$query = "SELECT column1, column2 FROM table_name WHERE condition";

			$con = new Connection();

			$resultSet = Connection::getInstance()->query($query);

			while ($row = $resultSet->fetchObject()) {
			}

			$con = null;
		} catch (PDOException $e) {
			$result["err"] = $e->getMessage();
		}

		return $result;
	}

	function update()
	{
		$result = array();

		try {
			$query = "UPDATE table_name SET column1 = value1, column2 = value2 WHERE condition";

			$con = new Connection();

			$status = Connection::getInstance()->prepare($query);

			if ($status->execute()) {
			}

			$con = null;
		} catch (PDOException $e) {
			$result["err"] = $e->getMessage();
		}

		return $result;
	}

	function delete()
	{
		$result = array();

		try {
			$query = "DELETE FROM table_name WHERE condition";

			$con = new Connection();

			if (Connection::getInstance()->exec($query) >= 1) {
			}

			$con = null;
		} catch (PDOException $e) {
			$result["err"] = $e->getMessage();
		}

		return $result;
	}
}