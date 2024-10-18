<?php
require_once '../../config/database.php';
require_once '../models/Vaga.php';

class VagaController {
    private $vaga;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->vaga = new Vaga($db);
    }

    public function listar() {
        $stmt = $this->vaga->listarVagas();
        $vagas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        require_once '../views/vagas/lista.php';
    }

    public function criar($empresa_id, $titulo, $descricao) {
        return $this->vaga->criarVaga($empresa_id, $titulo, $descricao);
    }
}
?>
