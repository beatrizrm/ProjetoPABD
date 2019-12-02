<?php
include 'ConexaoBD.php';

class Editora {
    private $ideditora;
    private $noeditora;
    function getIdeditora() {
        return $this->ideditora;
    }

    function getNoeditora() {
        return $this->noeditora;
    }

    function setIdeditora($ideditora) {
        $this->ideditora = $ideditora;
    }

    function setNoeditora($noeditora) {
        $this->noeditora = $noeditora;
    }
    function __construct($ideditora = null, $noeditora = null) {
        $this->ideditora = $ideditora;
        $this->noeditora = $noeditora;
    }

    
        public function lista(){
        try {
            $sql  = "SELECT IdEditora, NoEditora FROM TbEditora ORDER BY NoEditora";
            $conn = ConexaoBD::conecta();
            $sql  = $conn->query($sql);
            $res = array();  
            while($row = $sql->fetch(PDO::FETCH_OBJ)) {
                $editora = new Editora();
                $editora->setIdeditora($row->IdEditora);
                $editora->setNoeditora($row->NoEditora);
                $res [] = $editora;
            }
            return $res;
        } catch (Exception $e) {
             echo "ERRO: ".$e->getMessage()."<br><br>";
        }     
    }
    
    public function consulta($ideditora){
        try {
            $sql  = "SELECT IdEditora, NoEditora FROM TbEditora WHERE IdEditora = ".$ideditora." ORDER BY NoEditora";
            $conn = ConexaoBD::conecta();
            $sql  = $conn->query($sql);

            $res = array();  
            while($row = $sql->fetch(PDO::FETCH_OBJ)) {
                 $editora = new Editora();
                $editora->setIdeditora($row->IdEditora);
                $editora->setNoeditora($row->NoEditora);
                $res [] = $editora;
            }
            return $res;
        } catch (Exception $e) {
             return "ERRO: ".$e->getMessage()."<br><br>";
        }     
    }
    
    public function altera($nome, $codigo){
        try {
            $sql = "UPDATE TbEditora
                       SET NoEditora = ? 
                     WHERE IdEditora = ?"; 
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
        $sql = "INSERT INTO TbEditora(IdEditora, NoEditora)
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
	      $sql = "DELETE FROM TbEditora WHERE IdEditora = ?"; 
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