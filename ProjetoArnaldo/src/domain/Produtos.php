<?php

class Produtos
{
	var $cod;
	var $nome;
	var $descricao;
	var $valor;
	var $quantidade;

	function getCod()
	{
		return $this->cod;
	}
	function setCod($cod)
	{
		$this->cod = $cod;
	}

	function getNome()
	{
		return $this->nome;
	}
	function setNome($nome)
	{
		$this->nome = $nome;
	}

	function getDescricao()
	{
		return $this->descricao;
	}
	function setDescricao($descricao)
	{
		$this->descricao = $descricao;
	}

	function getValor()
	{
		return $this->valor;
	}
	function setValor($valor)
	{
		$this->valor = $valor;
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

class ProdutosDAO
{

	function create($Produtos)
	{
		$result = array();

		try {
			$query = "INSERT INTO Produtos VALUES (default, '" . $Produtos->getNome() . "','" . $Produtos->getValor() . "','" . $Produtos->getQuantidade() . "')";

			$con = new Connection();

			if (Connection::getInstance()->exec($query) >= 1) {
				$result["cod"] = connection::getInstance()->lastInsertId();
				$result["nome"] = $Produtos->getNome();
				$result["valor"] = $Produtos->getValor();
				$result["quantidade"] = $Produtos->getQuantidade();
			} else {
				$result["erro"] = "Não foi possivel adicionar o produto";
			}
			$con = null;
		} catch (PDOException $e) {
			$result["erro"] = "Não foi possivel adicionar o produto.";
		}

		return $result;
	}

	function readAll()
	{
		$result = array();

		try {
			$query = "SELECT * FROM Produtos";
			$con = new Connection();
			$resultSet = Connection::getInstance()->query($query);
			while ($linha = $resultSet->fetchObject()) {
				$Produtos = new Produtos();
				$Produtos->setCod($linha->cod);
				$Produtos->setNome(utf8_encode($linha->nome));
				$Produtos->setValor($linha->valor);
				$Produtos->setQuantidade($linha->quantidade);
				$result[] = $Produtos;
			}

			$con = null;
		} catch (PDOException $e) {
			$result["erro"] = "Erro com a venda.";
		}

		return $result;
	}

	function read($cod)
	{
		$result = array();
		$query = "SELECT * FROM Produtos where cod=$cod";
		try {
			$con = new Connection();
			$resultSet = Connection::getInstance()->query($query);
			if ($resultSet) {
				while ($linha = $resultSet->fetchObject()) {
					$Produtos = new Produtos();
					$Produtos->setCod($linha->cod);
					$Produtos->setNome($linha->nome);
					$Produtos->setValor($linha->valor);
					$Produtos->setQuantidade($linha->quantidade);

					$result[] = $Produtos;
				}
			}
			$con = null;
		} catch (PDOException $e) {
			$result["erro"] = "Erro no produto.";
		}

		return $result;
	}

	function update($prod)
	{
		$result = array();
		$cod = $prod->getCod();
		$nome = $prod->getNome();
		$valor = $prod->getValor();
		$quantidade = $prod->getQuantidade();

		try {
			$query = "UPDATE Produtos SET nome = '$nome', valor = '$valor',quantidade = '$quantidade' WHERE cod = $cod";

			$con = new Connection();

			$status = Connection::getInstance()->prepare($query);
			echo $query;
			if ($status->execute()) {
				$result = $prod;
			} else {
				$result["erro"] = "Não foi possivel atualizar os dados";
			}

			$con = null;
		} catch (PDOException $e) {
			$result["erro"] = "Erro no produto.";
		}

		return $result;
	}

	function delete($cod)
	{
		$result = array();
		$query = "DELETE FROM Produtos WHERE cod = $cod";
		try {

			$con = new Connection();

			if (Connection::getInstance()->exec($query) >= 1) {
				$result["msg"] = "O produto foi excluida.";
			} else {
				$result["Erro"] = "produto não excluida.";
			}

			$con = null;
		} catch (PDOException $e) {
			$result["err"] = $e->getMessage();
		}

		return $result;
	}
}
