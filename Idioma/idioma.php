<?php
  
class idioma {
    private $ididioma;
    private $noidioma;
    
    function getIdidioma() {
        return $this->ididioma;
    }

    function getNoidioma() {
        return $this->noidioma;
    }

    function setIdidioma($ididioma) {
        $this->ididioma = $ididioma;
    }

    function setNoidioma($noidioma) {
        $this->noidioma = $noidioma;
    }

    function __construct($ididioma = null, $noidioma = null) {
        $this->ididioma = $ididioma;
        $this->noidioma= $noidioma;
    }

    public function lista(){
        try {
            $sql  = "SELECT Ididioma, Noidioma FROM Tbidioma ORDER BY Noidioma";
            $conn = ConexaoBD::conecta();
            $sql  = $conn->query($sql);
            $res = array();  
            while($row = $sql->fetch(PDO::FETCH_OBJ)) {
                $idioma = new idioma();                
                $idioma->setIdidioma($row->Ididioma);
                $idioma->setNoidioma($row->Noidioma);
                $res[] = $idioma;
            }
            return $res;
        } catch (Exception $e) {
             echo "ERRO: ".$e->getMessage()."<br><br>";
        }     
    }
    
    public function consulta($ididioma){
        try {
            $sql  = "SELECT Ididioma, Noidioma FROM Tbidioma WHERE Ididioma = ".$ididioma." ORDER BY Noidioma";
            $conn = ConexaoBD::conecta();
            $sql  = $conn->query($sql);

            $res = array();  
            while($row = $sql->fetch(PDO::FETCH_OBJ)) {
                $idioma = new idioma();                
                $idioma->setIdidioma($row->Ididioma);
                $idioma->setNoidioma($row->Noidioma);
                
                $res[] = $idioma;
            }
            return $res;
        } catch (Exception $e) {
             return "ERRO: ".$e->getMessage()."<br><br>";
        }     
    }
    
    public function altera($nome, $codigo){
        try {
            $sql = "UPDATE Tbidioma
                       SET Noidioma = ? 
                     WHERE Ididioma = ?"; 
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
        $sql = "INSERT INTO Tbidioma(Ididioma, Noidioma)
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
	      $sql = "DELETE FROM Tbidioma WHERE Ididioma = ?"; 
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
?>