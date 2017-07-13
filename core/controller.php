<?php

    namespace Core;

    /**
     * Controller
     */
    class Controller
    {
        /**
        * View - Renderiza uma view para o usuário
        */
        public function view($view,array $data)
        {
            //Define as variaveis contidas no array
            foreach ($data as $key => $value) {
                ${$key} = $value;
            }
            //Define o caminho para o arquivo da view
            $viewFile = 'application/view/'.$view.'View.php';
            //Verifica se o arquivo existe
            if (file_exists($viewFile)) {
                require_once($viewFile);
            }
        }
        /**
        * Model - Instancia um model específicio
        */
        public function Model($model)
        {
            $modelName = '\Application\Model\\'.ucwords($model).'Model';
            return new $modelName();
        }
    }
