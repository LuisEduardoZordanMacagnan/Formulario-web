<?php 
    class Usuario{
        private $id;
        private $nome;
        private $senha;
        private $email;
        
        function setId($id){
            $this->id = $id;
        }

        function getId(){
            return $this->id;
        }

        function setNome($nome){
            $this->nome = $nome;
        }

        function getNome(){
            return $this->nome;
        }

        function setSenha($senha){
            $this->senha = $senha;
        }

        function getSenha(){
            return $this->senha;
        }

        function setEmail($email){
            $this->email = $email;
        }

        function getEmail(){
            return $this->email;
        }
    }
?>