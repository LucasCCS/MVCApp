<?php

    namespace Application\Controller;

    use Core\Controller;
    /**
     * HomeController
     */
    class HomeController extends
        Controller
    {

        public function index()
        {
            $data = [
                'titulo' => 'Título da Página'
            ];
            $this->view('home',$data);
        }
    }
