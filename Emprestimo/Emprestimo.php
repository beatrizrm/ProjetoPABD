<?php
include 'ConexaoBD.php';
class Emprestimo {
    private $idemprestimo;
    private $daEmprestimo;
    private $daPrevisaoDevolucao;
    private $daDevolucao;
    private $nooperador;
    private $noAluno;
    private $nuMatricula;
    
    function getNuMatricula() {
        return $this->nuMatricula;
    }

    function setNuMatricula($nuMatricula) {
        $this->nuMatricula = $nuMatricula;
    }

       
    function getIdemprestimo() {
        return $this->idemprestimo;
    }

    function getDaEmprestimo() {
        return $this->daEmprestimo;
    }

    function getDaPrevisaoDevolucao() {
        return $this->daPrevisaoDevolucao;
    }

    function getDaDevolucao() {
        return $this->daDevolucao;
    }

    function getNooperador() {
        return $this->nooperador;
    }

    function setNoAluno($noAluno) {
        $this->noAluno = $noAluno;
    }

    
    function setIdemprestimo($idemprestimo) {
        $this->idemprestimo = $idemprestimo;
    }

    function setDaEmprestimo($daEmprestimo) {
        $this->daEmprestimo = $daEmprestimo;
    }

    function setDaPrevisaoDevolucao($daPrevisaoDevolucao) {
        $this->daPrevisaoDevolucao = $daPrevisaoDevolucao;
    }

    function setDaDevolucao($daDevolucao) {
        $this->daDevolucao = $daDevolucao;
    }

    function setNooperador($nooperador) {
        $this->nooperador = $nooperador;
    }

   

    function __construct($idemprestimo = null, $daEmprestimo = null, $daPrevisaoDevolucao = null, $daDevolucao = null, $idoperador = null, $noaluno = null, $numatricula = null) {
        $this->idemprestimo = $idemprestimo;
        $this->daEmprestimo = $daEmprestimo;
        $this->daPrevisaoDevolucao = $daPrevisaoDevolucao;
        $this->daDevolucao = $daDevolucao;
        $this->idoperador = $idoperador;
        $this->noaluno = $noaluno;
        $this->nuMatricula = $numatricula;
    }

    public function lista(){
        try {
            $sql  = "SELECT b.IdEmprestimo,b.DaPrevisaoDevolucao, b.NuMatricula, NoAluno, NoOperador FROM TbEmprestimo AS b INNER JOIN TbAluno AS i ON b.NuMatricula = i.NuMatricula
inner join tbOperador as c
on b.idoperador = c.idoperador";
            $conn = ConexaoBD::conecta();
            $sql  = $conn->query($sql);
            $res = array();  
            while($row = $sql->fetch(PDO::FETCH_OBJ)) {
                $emprestimo = new Emprestimo();
                $emprestimo->setDaPrevisaoDevolucao($row->DaPrevisaoDevolucao);
                $emprestimo->setNooperador($row->NoOperador);
                $emprestimo->setNoAluno($row->NoAluno);
                $emprestimo->setIdemprestimo($row->IdEmprestimo);
                $emprestimo->setNuMatricula($row->NuMatricula);
                
                $res[] = $emprestimo;
            }
            return $res;
        } catch (Exception $e) {
             echo "ERRO: ".$e->getMessage()."<br><br>";
        }     
    }
    
    public function consulta($idemprestimo){
        try {
            $sql  = "SELECT IdEmprestimo FROM TbEmprestimo WHERE IdEmprestimo = ".$idemprestimo."";
            $conn = ConexaoBD::conecta();
            $sql  = $conn->query($sql);

            $res = array();  
            while($row = $sql->fetch(PDO::FETCH_OBJ)) {
                $emprestimo = new Emprestimo();                
              $emprestimo->setIdemprestimo($row->IdEmprestimo);
                
                $res[] = $curso;
            }
            return $res;
        } catch (Exception $e) {
             return "ERRO: ".$e->getMessage()."<br><br>";
        }     
    }
 
    public function insere($id, $daemprestimo, $daprevisaodevolucao, $idoperador, $numatricula ){
      try {
        $sql = "INSERT INTO TbEmprestimoItem(IdEmprestimo, DaEmprestimo,
            DaPrevisaoDevolucao, IdOperador, NuMatricula)
                VALUES (?,?,?,?, ?)";
        $conn = ConexaoBD::conecta();

        $stm  = $conn->prepare($sql);              
        $stm->bindParam(1, $id);
        $stm->bindParam(2, $daemprestimo); 
        $stm->bindParam(4, $idoperador);
        $stm->bindParam(3, $daprevisaodevolucao);
        $stm->bindParam(5, $numatricula);
	$stm->execute();
        return 1;
      } catch (Exception $e) {
        return 0; 
      }     
    } //método insere
    
    public function exclui($codigo){
      try {
	      $sql = "DELETE FROM TbEmprestimo WHERE IdEmprestimo = ?"; 
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
