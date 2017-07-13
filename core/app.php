<?php

    namespace Core;

    /**
     * App
     * Função de inicialização da aplicação.
     */
    class App
    {
        //Default Controller
        protected $controller = "home";
        //Default Method
        protected $method = "index";
        //Parametros
        protected $params = [];
        //Controller Object
        protected $controllerObject;
        /**
         * Diretrizes para inicialização da aplicação
         */
        public function initialize()
        {
            //Define todos os parametros dispostos na url do browser.
            $url = $this->getUrl();
            /**
             * Verifica e define o controlador especificado através do browser,
             * caso não tenha sido definido um controlador especifico o padrão é
             * utilizado ('home').
             */
            if (isset($url[0])) {
                $this->controller = $url[0];
                unset($url[0]);
            }
            /**
             * Verifica e define o método especificado através do browser,
             * caso não tenha sido definido um método especifico o padrão é
             * utilizado ('index').
             */
            if (isset($url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
            //Define o nome do controlador
            $controllerName = 'Application\Controller\\'.ucwords($this->controller).'Controller';
            /**
             * Verifica se o controlador (classe) existe, caso exista
             * instancia o mesmo.
             */
            if (class_exists($controllerName)) {
                $this->controllerObject = new $controllerName;
            }

            /**
             * Verifica se o método (funcção) existe, caso exista
             * chama e envia os parametros para a mesma.
             */
            if (method_exists($this->controllerObject,$this->method)) {
                /**
                 * Define os parametros a serem enviados (parametros dispostos na url)
                 * no formato  ' controlador/metodo/PARAMETROS ', neste formato
                 * os parametros serão coletados somente após a definição do controlador
                 * e do método.
                 */
                if (isset($url)) {
                    $this->params = array_values($url);
                }
                //Chama a função e envia os parametros definidos anteriormente
                call_user_func_array(array($this->controllerObject,$this->method),$this->params);
            }
        }
        /**
         * GetUrl
         */
        private function getUrl()
        {
            if (isset($_GET['url'])) {
                return explode('/',$_GET['url']);
            }
        }
    }
