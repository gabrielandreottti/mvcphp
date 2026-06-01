<?php
include '../config/conexao.php';
include '../controllers/JogoController.php';
include '../views/layouts/header.php';

$controller = new jogoController($conexao);
 
// Roteamento básico
if (isset($_GET['action'])) {

    $action = $_GET['action'];
    $id = $_GET['id'] ?? null;

    switch ($action) {

        case 'adicionar':
            include '../views/Jogos/add-form.php';
            break;

        case 'editar':
            if ($id) {
                $jogo = $controller->buscar($id);
                include '../views/Jogos/edit-form.php';
            }
            break;

        case 'deletar':
            if ($id) {
                $controller->deletar($id);
                header("Location: public/index.php?mensagem=Jogo deletado com sucesso");
                exit();
            }
            break;

        default:
            $jogo = $controller->listar();
            include '../views/Jogo/index.php';
            break;
    }

} else {

    $jogo = $controller->listar();
    include '../views/Jogo/index.php';
}
include '../views/layouts/footer.php';