<?php
      define("HOME", 'http://suaresposta.dev/site');
      //Configuracoes do database
      function config()
      {
            $Config = [
                  'database'=>[
                        'host'=>'suaresposta.dev',
                        'user'=>'root',
                        'pass'=>'',
                        'dbsa'=>'site'
                  ],
                  'website'=>[
                        'site_url'=> HOME,
                        'application'=>'app'
                  ]
            ];
            return $Config;
      }

      //Carrega as classes do sistema
      include "app/system/autoload.inc.php";
?>
