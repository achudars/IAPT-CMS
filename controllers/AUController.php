<?php

    class AUController {
        private $articlesModel;
        private $usersModel;

        public function __construct($articlesModel, $usersModel){
            $this->articlesModel = $articlesModel;
            $this->usersModel = $usersModel;
        }

    }


?>