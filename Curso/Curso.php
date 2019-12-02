<?php

include_once('ConexaoBD.php');
class Curso {
    private $idcurso;
    private $nocurso;
    
    function getIdcurso() {
        return $this->idcurso;
    }

    function getNocurso() {
        return $this->nocurso;
    }

    function setIdcurso($idcurso) {
        $this->idcurso = $idcurso;
    }

    function setNocurso($nocurso) {
        $this->nocurso = $nocurso;
    }

    function __construct($idcurso = null, $nocurso = null) {
        $this->idcurso = $idcurso;
        $this->nocurso = $nocurso;
    }

    public function lista(){
        try {
            $sql  = "SELECT IdCurso, NoCurso FROM TbCurso ORDER BY NoCurso";
            $conn = ConexaoBD::conecta();
            $sql  = $conn->query($sql);
            $res = array();  
            while($row = $sql->fetch(PDO::FETCH_OBJ)) {
                $curso = new Curso();                
                $curso->setIdcurso($row->IdCurso);
                $curso->setNocurso($row->NoCurso);
                $res[] = $curso;
            }
            return $res;
        } catch (Exception $e) {
             echo "ERRO: ".$e->getMessage()."<br><br>";
        }     
    }
    
    public function consulta($idcurso){
        try {
            $sql  = "SELECT IdCurso, NoCurso FROM TbCurso WHERE IdCurso = ".$idcurso." ORDER BY NoCurso";
            $conn = ConexaoBD::conecta();
            $sql  = $conn->query($sql);

            $res = array();  
            while($row = $sql->fetch(PDO::FETCH_OBJ)) {
                $curso = new Curso();                
                $curso->setIdcurso($row->IdCurso);
                $curso->setNocurso($row->NoCurso);
                
                $res[] = $curso;
            }
            return $res;
        } catch (Exception $e) {
             return "ERRO: ".$e->getMessage()."<br><br>";
        }     
    }
    
    public function altera($nome, $codigo){
        try {
            $sql = "UPDATE TbCurso
                       SET NoCurso = ? 
                     WHERE IdCurso = ?"; 
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
        $sql = "INSERT INTO TbCurso(IdCurso, NoCurso)
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
	      $sql = "DELETE FROM TbCurso WHERE IdCurso = ?"; 
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