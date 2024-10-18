<?php
class Vaga {
    private $conn;
    private $table_name = "vagas";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function listarVagas() {
        $query = "SELECT v.*, e.nome AS empresa 
                  FROM vagas v 
                  JOIN empresas e ON v.empresa_id = e.id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function criarVaga($empresa_id, $titulo, $descricao) {
        $query = "INSERT INTO vagas (empresa_id, titulo, descricao) 
                  VALUES (:empresa_id, :titulo, :descricao)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":empresa_id", $empresa_id);
        $stmt->bindParam(":titulo", $titulo);
        $stmt->bindParam(":descricao", $descricao);

        return $stmt->execute();
    }
}
?>
