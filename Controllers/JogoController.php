<?php
class jogoController {
    private $jogoModel; 

    public function __construct($conexao) {
        $this->jogoModel = new JogoModel($conexao);
    }

    public function listar() {
        return $this->jogoModel->listarJogo();
    }

    public function adicionar($nome, $ano, $hetariedade, $genero, $estudio) {
        return $this->jogoModel->adicionarJogo($nome, $ano, $hetariedade, $genero, $estudio);
    }

    public function editar($id, $nome, $ano , $hetariedade, $genero, $estudio) {
        return $this->jogoModel->atualizarJogo($id, $nome, $ano, $hetariedade, $genero, $estudio);
    }

    public function deletar($id) {
        return $this->jogoModel->deletarJogo($id);
    }

    public function buscar($id) {
        return $this->jogoModel->buscarJogo($id);
    }
}
// exemplo de como ficaria
/*
<?php

// Conexão com banco
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "filmes";

$conexao = new mysqli($host, $user, $pass, $dbname);

if ($conexao->connect_error) {
    die("Erro na conexão: " . $conexao->connect_error);
}

// Classe Filme
class Filme
{
    private $conn;

    public function __construct($conexao)
    {
        $this->conn = $conexao;
    }

    // Listar filmes
    public function listar()
    {
        $sql = "SELECT * FROM filmes";
        $resultado = $this->conn->query($sql);

        $filmes = [];

        while ($linha = $resultado->fetch_assoc()) {
            $filmes[] = $linha;
        }

        return $filmes;
    }

    // Buscar filme por ID
    public function buscar($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM filmes WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();

        return $stmt->get_result()->fetch_assoc();
    }

    // Adicionar filme
    public function adicionar($nome, $ano, $nota, $genero)
    {
        $stmt = $this->conn->prepare(
            "INSERT INTO filmes (nome, ano, nota, genero)
             VALUES (?, ?, ?, ?)"
        );

        $stmt->bind_param("sids", $nome, $ano, $nota, $genero);

        return $stmt->execute();
    }

    // Atualizar filme
    public function editar($id, $nome, $ano, $nota, $genero)
    {
        $stmt = $this->conn->prepare(
            "UPDATE filmes
             SET nome = ?, ano = ?, nota = ?, genero = ?
             WHERE id = ?"
        );

        $stmt->bind_param(
            "sidsi",
            $nome,
            $ano,
            $nota,
            $genero,
            $id
        );

        return $stmt->execute();
    }

    // Excluir filme
    public function deletar($id)
    {
        $stmt = $this->conn->prepare(
            "DELETE FROM filmes WHERE id = ?"
        );

        $stmt->bind_param("i", $id);

        return $stmt->execute();
    }
}

$filme = new Filme($conexao);

// ROTAS
$acao = $_GET['acao'] ?? 'listar';

switch ($acao) {

    case 'adicionar':

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $nome = trim($_POST['nome']);
            $ano = (int) $_POST['ano'];
            $nota = (float) $_POST['nota'];
            $genero = trim($_POST['genero']);

            if ($filme->adicionar($nome, $ano, $nota, $genero)) {
                header("Location: ?acao=listar");
                exit;
            }

            echo "Erro ao adicionar filme.";
        }

        break;

    case 'editar':

        $id = (int) $_GET['id'];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $nome = trim($_POST['nome']);
            $ano = (int) $_POST['ano'];
            $nota = (float) $_POST['nota'];
            $genero = trim($_POST['genero']);

            if ($filme->editar($id, $nome, $ano, $nota, $genero)) {
                header("Location: ?acao=listar");
                exit;
            }

            echo "Erro ao editar filme.";
        }

        $dados = $filme->buscar($id);
        ?>

        <h2>Editar Filme</h2>

        <form method="POST">
            <input type="text" name="nome" value="<?= htmlspecialchars($dados['nome']) ?>" required><br><br>

            <input type="number" name="ano" value="<?= $dados['ano'] ?>" required><br><br>

            <input type="number" step="0.1" name="nota" value="<?= $dados['nota'] ?>" required><br><br>

            <input type="text" name="genero" value="<?= htmlspecialchars($dados['genero']) ?>" required><br><br>

            <button type="submit">Salvar</button>
        </form>

        <?php
        exit;

    case 'deletar':

        $id = (int) $_GET['id'];

        if ($filme->deletar($id)) {
            header("Location: ?acao=listar");
            exit;
        }

        echo "Erro ao excluir.";
        break;

    case 'listar':
    default:

        $filmes = $filme->listar();
        ?>

        <h1>Cadastro de Filmes</h1>

        <h2>Novo Filme</h2>

        <form method="POST" action="?acao=adicionar">

            <input type="text" name="nome" placeholder="Nome" required>

            <input type="number" name="ano" placeholder="Ano" required>

            <input type="number" step="0.1" name="nota" placeholder="Nota" required>

            <input type="text" name="genero" placeholder="Gênero" required>

            <button type="submit">Cadastrar</button>

        </form>

        <hr>

        <h2>Lista de Filmes</h2>

        <table border="1" cellpadding="10">

            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Ano</th>
                <th>Nota</th>
                <th>Gênero</th>
                <th>Ações</th>
            </tr>

            <?php foreach ($filmes as $f): ?>

                <tr>
                    <td><?= $f['id'] ?></td>
                    <td><?= htmlspecialchars($f['nome']) ?></td>
                    <td><?= $f['ano'] ?></td>
                    <td><?= $f['nota'] ?></td>
                    <td><?= htmlspecialchars($f['genero']) ?></td>

                    <td>
                        <a href="?acao=editar&id=<?= $f['id'] ?>">Editar</a>

                        |

                        <a href="?acao=deletar&id=<?= $f['id'] ?>"
                           onclick="return confirm('Deseja excluir?')">
                           Excluir
                        </a>
                    </td>
                </tr>

            <?php endforeach; ?>

        </table>

        <?php
        break;
}

$conexao->close();
?>
*/