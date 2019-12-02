<?php
include 'ConexaoBD.php';
class Autor {
    private $idAutor;
    private $NoAutor;
    
    function getIdAutor() {
        return $this->idAutor;
    }

    function getNoAutor() {
        return $this->NoAutor;
    }

    function setIdAutor($idAutor) {
        $this->idAutor = $idAutor;
    }

    function setNoAutor($NoAutor) {
        $this->NoAutor = $NoAutor;
    }
    function __construct($idAutor = null, $NoAutor = null) {
        $this->idAutor = $idAutor;
        $this->NoAutor = $NoAutor;
    }

    public function lista(){
        try {
            $sql  = "SELECT IdAutor, NoAutor FROM TbAutor ORDER BY NoAutor";
            $conn = ConexaoBD::conecta();
            $sql  = $conn->query($sql);
            $res = array();  
            while($row = $sql->fetch(PDO::FETCH_OBJ)) {
                $autor = new Autor();                
                $autor->setIdAutor($row->IdAutor);
                $autor->setNoAutor($row->NoAutor);
                $res[] = $autor;
        }
        return $res;
        } catch (Exception $e) {
             return "ERRO: ".$e->getMessage()."<br><br>";
        }     
    }
    public function consulta($idAutor){
        try {
            $sql  = "SELECT IdAutor, NoAutor FROM TbAutor WHERE IdAutor = ".$idAutor." ORDER BY NoAutor";
            $conn = ConexaoBD::conecta();
            $sql  = $conn->query($sql);

            $res = array();  
            while($row = $sql->fetch(PDO::FETCH_OBJ)) {
                $autor = new Autor();                
                $autor->setIdAutor($row->IdAutor);
                $autor->setNoAutor($row->NoAutor);
                
                $res[] = $autor;
            }
            return $res;
        } catch (Exception $e) {
             return "ERRO: ".$e->getMessage()."<br><br>";
        }     
    }
    
    public function altera($nome, $id){
        try {
            $sql = "UPDATE TbAutor
                       SET NoAutor = ? 
                     WHERE IdAutor = ?"; 
            $conn = ConexaoBD::conecta();

            $stm = $conn->prepare($sql);
            $stm->bindParam(1, $nome);
            $stm->bindParam(2, $id);
            $stm->execute();
            return 1; 
	} catch (Exception $e) {
            return 0; 
        } //try-catch     
    } //método altera
    
    public function insere($id, $nome){
      try {
        $sql = "INSERT INTO TbAutor(IdAutor, NoAutor)
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
	      $sql = "DELETE FROM TbAutor WHERE IdAutor = ?"; 
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

