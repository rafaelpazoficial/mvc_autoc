<?php
      function __autoload($Class)
      {
            $path             = Config()['website']['application'];
            //controllers | Models | Views
            $directories      = ['controllers'];
            $verification     = FALSE;

            foreach($directories as $dirs)
            {
                  if(is_dir("{$path}/{$dirs}") && file_exists("{$path}/$dirs/{$Class}.class.php"))
                  {
                        include "{$path}/$dirs/{$Class}.class.php";
                        $verification = TRUE;
                  }
            }

            if(!$verification)
            {
                  die("A CLASSE {$Class} NÃO FOI ENCONTRADA!");
            }
      }
?>
