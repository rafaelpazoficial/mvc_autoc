<?php
      class Read{
            private $Results;
            private $CountResults;
            private $Query;

            //faz execução automatica da query
            public function __construct()
            {
            	$this->execute();
            }

            //cria a query
            public function ExeRead($Tabela,$Condicao = '',$Ordem = '')
            {
            	$this->Query = "SELECT * FROM {$Tabela}{$Condicao} {$Ordem}";
            	return $this->Query;
            }

            //recupera os resultados
            public function getResults()
            {
            	return $this->Results;
            }

            //recupera o total de registros
            public function getRowCount()
            {
            	return $this->CountResults;
            }


            //executa a query
            private function execute()
            {
            	$usuarios = new DB;
			      $db = $usuarios->conn()->prepare("SELECT * FROM usuarios");
			      $db->execute();
			      $resultados = $db->fetch(PDO::FETCH_OBJ);
			      $this->Results = $resultados;
			      $this->CountResults = $db->rowCount();

            }

      }