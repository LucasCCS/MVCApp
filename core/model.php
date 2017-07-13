<?php

    namespace Core;

    /**
     * Model
     */
    class Model extends Connection
    {
        /**
         * Execute - Função de exemplo para execução de querys
         */
        public function execute($query,array $data)
        {
            //Prepara os valores dispostos na query
            $pdo = $this->conn->prepare($query);
            //Verifica e preenche todos valores a serem preparados antes da execução da query
            foreach ($data as $key => $value) {
                $pdo->bindParam("$key",$value);
            }
            //Executa a query
            $pdo->execute();
            //Retorna os valores obtidos e armazena-os no array result
            while ($row = $pdo->fetchObject()) {
                $result[] = $row;
            }
            if (isset($result)) return $result;
        }
    }
