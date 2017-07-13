<?php

    namespace Application\Controller;
    /**
     * HomeController
     */
    class HomeController extends
        \Core\Controller
    {
        private $model;
        public function __construct()
        {
            $this->model = $this->model('home');
        }
        public function index()
        {
            /**
             * Array com dados a serem enviados para a view através da
             * function view($view, array)
             */
            $data = [
                'titulo' => 'Título da Página'
            ];
            //Insere a view deseja e envia o array de dados
            $this->view('home',$data);
        }
    }
