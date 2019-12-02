<?php

include  'ConexaoBD.php';
class Obra {
    private $idobra;
    private $noobra;
    
    function getIdobra() {
        return $this->idobra;
    }

    function getNoobra() {
        return $this->noobra;
    }

    function setIdobra($idobra) {
        $this->idobra = $idobra;
    }

    function setNoobra($noobra) {
        $this->noobra = $noobra;
    }

    function __construct($idobra = null, $noobra = null) {
        $this->idobra = $idobra;
        $this->$noobra = $noobra;
    }

    public function lista(){
        try {
            $sql  = "SELECT IdObra, NoObra FROM TbObra ORDER BY NoObra";
            $conn = ConexaoBD::conecta();
            $sql  = $conn->query($sql);
            $res = array();  
            while($row = $sql->fetch(PDO::FETCH_OBJ)) {
                $obra = new Obra();                
                $obra->setIdobra($row->IdObra);
                $obra->setNoobra($row->NoObra);
                $res[] = $obra;
            }
            return $res;
        } catch (Exception $e) {
             echo "ERRO: ".$e->getMessage()."<br><br>";
        }     
    }
    
    public function consulta($idobra){
        try {
            $sql  = "SELECT IdObra, NoObra FROM TbObra = WHERE IdObra = ".$idobra." ORDER BY NoObra";
            $conn = ConexaoBD::conecta();
            $sql  = $conn->query($sql);

            $res = array();  
            while($row = $sql->fetch(PDO::FETCH_OBJ)) {
                $obra = new Obra();                
                $obra->setIdobra($row->IdObra);
                $obra->setNoobra($row->NoObra);
                
                $res[] = $Obra;
            }
            return $res;
        } catch (Exception $e) {
             return "ERRO: ".$e->getMessage()."<br><br>";
        }     
    }
    
    public function altera($nome, $codigo){
        try {
            $sql = "UPDATE TbObra
                       SET NoObra = ? 
                     WHERE IdObra = ?"; 
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
        $sql = "INSERT INTO TbObra(IdObra, NoObra)
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
	      $sql = "DELETE FROM TbObra WHERE IdObra = ?"; 
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