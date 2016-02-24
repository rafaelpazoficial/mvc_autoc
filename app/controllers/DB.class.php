<?php
      /*
            Conexão com banco de dados
            Versão : 1.0
      */
      class DB{
            //recebe os dados da database
            private $Config;
            //usado para setar as propriedades da conexão
            private static $Conection;
            //constroi as informacoes do banco de dados
            public function __construct()
            {
                  $this->Config = config();
            }

            //cria a conexão segura com banco de dados usando metodo privado
            private function database()
            {
                  if(is_null(self::$Conection))
                  {
                        //verifica se a conexão não contem erros
                        try {
                              $dns = 'mysql:host='.$this->Config['database']['host'].';dbname='.$this->Config['database']['dbsa'];
                              self::$Conection = new PDO($dns, $this->Config['database']['user'], $this->Config['database']['pass']);
                              self::$Conection->setAttribute(PDO::ERRMODE_EXCEPTION, PDO::ATTR_ERRMODE);
                        } catch (PDOException $e) {
                              //system_msg($e->getMessage(), SYS_ERROR);
                              echo $e->getMessage();
                        }
                  }
                  //retorn a conexao do database
                  return self::$Conection;
            }

            //retorn acesso a conexão usando o metodo privado
            public function conn()
            {
                  return $this->database();
            }
      }
?>
