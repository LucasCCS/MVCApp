<?php
    #Autoload Composer
    require_once 'vendor/autoload.php';
    use Core\App;
    #Cria o objeto e inicia a aplicação
    $app = new App();
    $app->initialize();
