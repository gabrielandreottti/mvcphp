<?php

class JogoModel
{
    private $conexao;

    public function __construct($conexao)
    {
        $this->conexao = $conexao;
    }

    public function listarJogo()
    {
        // código para listar
    }

    public function buscarJogo($id)
    {
        // código para buscar por id
    }

    public function adicionarJogo($nome, $ano, $hetariedade, $genero, $estudio)
    {
        // código para inserir
    }

    public function atualizarJogo($id, $nome, $ano, $hetariedade, $genero, $estudio)
    {
        // código para atualizar
    }

    public function deletarJogo($id)
    {
        // código para deletar
    }
}