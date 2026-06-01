<h1>Lista de Jogos</h1>

<table>
    <tr>
        <th>Nome</th>
        <th>Ano</th>
        <th>Hetariedade</th>
        <th>Gênero</th>
        <th>Estudio</th>
    </tr>

    <?php while($linha = $filmes->fetch_assoc()): ?>
        <tr>
            <td><?= htmlspecialchars($linha['nome']) ?></td>
            <td><?= htmlspecialchars($linha['ano']) ?></td>
            <td><?= htmlspecialchars($linha['hereditariedade']) ?></td>
            <td><?= htmlspecialchars($linha['genero']) ?></td>
            <td><?= htmlspecialchars($linha['estudio']) ?></td>

            <td>
                <a href="?action=editar&id=<?= $linha['id'] ?>">Editar</a>
                <a href="?action=deletar&id=<?= $linha['id'] ?>">Deletar</a>
            </td>
        </tr>
    <?php endwhile; ?>

</table>

<a href="?action=adicionar">Cadastro</a>