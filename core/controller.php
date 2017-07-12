<?php

    namespace Core;

    /**
     * Controller
     */
    class Controller
    {

        public function view($view,$data = [])
        {
            #Define as variaveis contidas no array
            foreach ($data as $key => $value) {
                ${$key} = $value;
            }
            #Define o caminho para o arquivo da view
            $viewFile = 'application/view/'.$view.'View.php';
            #Verifica se o arquivo existe
            if (file_exists($viewFile)) {
                require_once($viewFile);
            }

        }
    }
