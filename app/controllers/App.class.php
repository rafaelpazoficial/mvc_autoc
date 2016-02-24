<?php
      /*
            Carrega toda a aplicação
      */
      class App{
            public $url;

            public function __construct()
            {
                  $key = filter_input(INPUT_GET, 'key');
                  $this->url = ($key != null ? $key : 'index');
            }

            //cria a url de navegacao
            public function getKeys()
            {
                  return explode('/', $this->url);
            }

            public function controller()
            {
                  return $this->getKeys()[0];
            }

            public function action()
            {
                  return $this->getKeys()[1] = (isset($this->getKeys()[1]) && $this->getKeys()[1]!=null ? $this->getKeys()[1] : 'index');
            }

            public function view($view, $results)
            {
                  $reView = explode(':', $view);

                  if($reView[1]=='id' && is_numeric(self::action())):
                        echo "Sim é um id";
                  elseif($reView[1]=='string' && is_string(self::action())):
                        echo "sim é uma string";
                  else:
                        echo "error";
                  endif;

                  $view = 'app/views/'.$reView['0'].'.mvc.html';
                  $dados = file_get_contents($view);
                  echo str_replace('#', $results, $dados);
            }

            private function isMethod($class_name, $metodo)
            {
                  return method_exists($class_name, $metodo);
            }


            public function run()
            {
                  $controller = ucfirst(self::controller());
                  $action = self::action();
                  
                  $run = new $controller;
                  if(!$this->isMethod($run, self::action())):
                        $action = 'index';
                  endif;      
                  $run->$action();
                  return $run;
            }


      }
