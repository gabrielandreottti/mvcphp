<?php
include '../config/conexao.php';
include '../controllers/JogoController.php';
//include '../views/layouts/header.php';

$controller = new JogoController($conexao);
 
// Roteamento básico
if (isset($_GET['action'])) {

    $action = $_GET['action'];
    $id = $_GET['id'] ?? null;

    switch ($action) {

        case 'adicionar':
            include '../views/Jogo/add-form.php';
            break;

        case 'editar':
            if ($id) {
                $jogo = $controller->buscar($id);
                include '../views/Jogo/edit-form.php';
            }
            break;

        case 'deletar':
            if ($id) {
                $controller->deletar($id);
                header("Location: index.php?mensagem=Jogo deletado com sucesso");
                exit();
            }
            break;

        default:
          $jogos = $controller->listar();
            include '../views/Jogo/index.php';
            break;
    }

} else {

   $jogos = $controller->listar();
    include '../views/Jogo/index.php';
}
include '../views/layouts/footer.php';