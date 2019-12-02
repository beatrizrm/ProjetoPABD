<?php

include 'ConexaoBD.php';
class Nacionalidade {
    private $idnacionalidade;
    private $nonacionalidade;
    
    function getIdnacionalidade() {
        return $this->idnacionalidade;
    }

    function getNonacionalidade() {
        return $this->nonacionalidade;
    }

    function setIdnacionalidade($idnacionalidade) {
        $this->idnacionalidade = $idnacionalidade;
    }

    function setNonacionalidade($nonacionalidade) {
        $this->nonacionalidade = $nonacionalidade;
    }

    function __construct($idnacionalidade = null, $nonacionalidade = null) {
        $this->idnacionalidade = $idnacionalidade;
        $this->nonacionalidade = $nonacionalidade;
    }

    public function lista(){
        try {
            $sql  = "SELECT IdNacionalidade, NoNacionalidade FROM TbNacionalidade ORDER BY Nonacionalidade";
            $conn = ConexaoBD::conecta();
            $sql  = $conn->query($sql);
            $res = array();  
            while($row = $sql->fetch(PDO::FETCH_OBJ)) {
                   $Nacionalidade = new Nacionalidade();                
               $Nacionalidade->setIdnacionalidade($row->IdNacionalidade);
                $Nacionalidade->setNonacionalidade($row->NoNacionalidade);
                
                
                $res[] = $Nacionalidade;
            }
            return $res;
        } catch (Exception $e) {
             echo "ERRO: ".$e->getMessage()."<br><br>";
        }     
    }
    
    public function consulta($idnacionalidade){
        try {
            $sql  = "SELECT IdNacionalidade, NoNacionalidade FROM TbNacionalidade WHERE IdNacionalidade = ".$idnacionalidade." ORDER BY NoNacionalidade";
            $conn = ConexaoBD::conecta();
            $sql  = $conn->query($sql);

            $res = array();  
            while($row = $sql->fetch(PDO::FETCH_OBJ)) {
                $Nacionalidade = new Nacionalidade();                
               $Nacionalidade->setIdnacionalidade($row->IdNacionalidade);
                $Nacionalidade->setNonacionalidade($row->NoNacionalidade);
                
                
                $res[] = $Nacionalidade;
            }
            return $res;
        } catch (Exception $e) {
             return "ERRO: ".$e->getMessage()."<br><br>";
        }     
    }
    
    public function altera($nome, $codigo){
        try {
            $sql = "UPDATE TbNacionalidade
                       SET NoNacionalidade = ? 
                     WHERE IdNacionalidade = ?"; 
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
        $sql = "INSERT INTO TbNacionalidade(IdNacionalidade, NoNacionalidade)
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
	      $sql = "DELETE FROM TbNacionalidade WHERE IdNacionalidade = ?"; 
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