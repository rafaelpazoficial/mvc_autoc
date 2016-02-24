<?php
      class Usuario extends App{

            public function index()
            {
                  $nome = "Rafael Paz";
                  return $this->view('index:string', $nome);
            }

            public function hello(){
                  echo "hello world";
            }
      }