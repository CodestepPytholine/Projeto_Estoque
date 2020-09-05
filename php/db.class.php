<?php

class db
{

	public $conexao;
	public $caminho;
	public $resultado;
	public $sql;

	function dbConnect($dominio, $usuario, $senha, $db)
	{
		$this->conexao = mysqli_connect($dominio, $usuario, $senha, $db);
	}

	function dbError()
	{
		echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
	}

	function dbClose()
	{
		mysqli_close($this->conexao);
	}

	function dbInsert($tab, $campos)
	{
		$this->sql = "insert into $tab values $campos";
		$this->resultado = mysqli_query($this->conexao, $this->sql) or die('Error querying database. SQL:' . $this->sql);
	}

	function dbSelect($tab, $campos, $condicao)
	{
		$this->sql = "select $campos from $tab $condicao";
		$this->resultado =  mysqli_query($this->conexao, $this->sql) or die('Error querying database. :' . $this->sql);
	}

	function dbSelectNo($tab, $campos)
	{
		$this->sql = "select $campos from $tab";
		$this->resultado =  mysqli_query($this->conexao, $this->sql) or die('Error querying database. :' . $this->sql);
	}

	function dbPaginacao($tab, $campos, $condicao, $qtd, $url)
	{
		$this->sql = "select $campos from $tab where $condicao";
		$this->resultado =  mysqli_query($this->conexao, $this->sql) or die('Error querying database.');
		$rows = mysqli_num_rows($this->resultado);

		$qtd_links = $rows / $qtd;

		for ($i = 0; $i < $qtd_links; $i++) {
			//$ss = ($i * $qtd);
			$n_pagina = $i + 1;
			$table_lnk[0] .= "<li><a href=\"$url$n_pagina\">$n_pagina</a></li>";
		}
		$table_lnk[1] = $qtd_links;
		return $table_lnk;
	}

	function mysqli_result($res, $row = 0, $col = 0)
	{
		$numrows = mysqli_num_rows($res);
		if ($numrows && $row <= ($numrows - 1) && $row >= 0) {
			mysqli_data_seek($res, $row);
			$resrow = (is_numeric($col)) ? mysqli_fetch_row($res) : mysqli_fetch_assoc($res);
			if (isset($resrow[$col])) {
				return $resrow[$col];
			}
		}
		return false;
	}

	function dbDelete($tab, $condicao)
	{
		$this->sql = "delete from $tab where $condicao";
		$this->resultado =  mysqli_query($this->conexao, $this->sql) or die('Error querying database.');
	}

	function dbUpdate($tab, $campos, $condicao)
	{
		$this->sql = "update $tab set $campos where $condicao";
		$this->resultado =  mysqli_query($this->conexao, $this->sql) or die('Error querying database. SQL:' . $this->sql);
	}
	function dbFree()
	{
		mysqli_free_result($this->resultado);
	}
}
