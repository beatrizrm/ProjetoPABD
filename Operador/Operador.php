<?php
include 'ConexaoBD.php';
class Operador {
    private $idOperador;
    private $noOperador;
    
    function getIdOperador() {
        return $this->idOperador;
    }

    function getNoOperador() {
        return $this->noOperador;
    }

    function setIdOperador($idOperador) {
        $this->idOperador = $idOperador;
    }

    function setNoOperador($noOperador) {
        $this->noOperador = $noOperador;
    }

    function __construct($idOperador = null, $noOperador = null) {
        $this->idOperador = $idOperador;
        $this->noOperador = $noOperador;
    }

    public function lista(){
        try {
            $sql  = "SELECT IdOperador, NoOperador FROM TbOperador ORDER BY NoOperador";
            $conn = ConexaoBD::conecta();
            $sql  = $conn->query($sql);
            $res = array();  
            while($row = $sql->fetch(PDO::FETCH_OBJ)) {
                $Operador = new Operador();                
                $Operador->setIdOperador($row->IdOperador);
                $Operador->setNoOperador($row->NoOperador);
                $res[] = $Operador;
            }
            return $res;
        } catch (Exception $e) {
             echo "ERRO: ".$e->getMessage()."<br><br>";
        }     
    }
    
    public function consulta($idOperador){
        try {
            $sql  = "SELECT IdOperador, NoOperador FROM TbOperador WHERE IdOperador = ".$idOperador." ORDER BY NoOperador";
            $conn = ConexaoBD::conecta();
            $sql  = $conn->query($sql);

            $res = array();  
            while($row = $sql->fetch(PDO::FETCH_OBJ)) {
                $Operador = new Operador();                
                $Operador->setIdOperador($row->IdOperador);
                $Operador->setNoOperador($row->NoOperador);
                
                $res[] = $Operador;
            }
            return $res;
        } catch (Exception $e) {
             return "ERRO: ".$e->getMessage()."<br><br>";
        }     
    }
    
    public function altera($nome, $codigo){
        try {
            $sql = "UPDATE TbOperador
                       SET NoOperador = ? 
                     WHERE IdOperador = ?"; 
            $conn = ConexaoBD::conecta();

            $stm = $conn->prepare($sql);
            $stm->bindParam(1, $nome);
            $stm->bindParam(2, $codigo);
            $stm->execute();
            return 1; 
	} catch (Exception $e) {
            return 0; 
        } //try-catch     
    } //método altera
    
    public function insere($id, $nome){
      try {
        $sql = "INSERT INTO TbOperador(IdOperador, NoOperador)
                VALUES (?, ?)";
        $conn = ConexaoBD::conecta();

        $stm  = $conn->prepare($sql);              
        $stm->bindParam(1, $id);
        $stm->bindParam(2, $nome); 
	$stm->execute();
        return 1;
      } catch (Exception $e) {
        return 0; 
      }     
    } //método insere
    
    public function exclui($codigo){
      try {
	      $sql = "DELETE FROM TbOperador WHERE IdOperador = ?"; 
	      $conn = ConexaoBD::conecta();
                                       
	      $stm = $conn->prepare($sql);
	      $stm->bindParam(1, $codigo);
	      $stm->execute();
              return 1; 
	    } catch (Exception $e) {
              return 0; 
      } //try-catch     
    } //método exclui

}