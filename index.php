<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">

    <!-- site title -->
    <title>Movies</title>
</head>
<body>
    <header class="header">
        <h1 class="header-title">Movies</h1>
    </header>
    <main>
        <div class="container">
            <div class="row">
                <h3>Adicionar</h3>
                <form action="./php/request.php" method="POST">
                    <fieldset>
                        <input type="text" name="titulo" placeholder="Título">
                        <input type="text" name="verba" placeholder="Verba">
                        <input type="date" name="gravacaoInicial" placeholder="Início das Gravações" id="">
                        <input type="date" name="gravacaoFinal" placeholder="Fim das Gravações" id="">
                        <input type="submit" value="Adicionar" name="create">
                    </fieldset>
                </form>
            </div>
            <hr>
            <div class="row">
                <h3>Deletar</h3>
                <form action="./php/request.php" method="POST">
                    <fieldset>
                        <input type="number" name="id" placeholder="Id do filme a ser deletado">
                        <input type="submit" value="Deletar" name="delete">
                    </fieldset>
                </form>
            </div>
            <hr>
            <div class="row">
                <h3>Atualizar</h3>
                <form action="./php/request.php" method="POST">
                    <fieldset>
                        <input type="number" name="id" placeholder="Id do filme a ser atualizado">
                        <input type="text" name="titulo" placeholder="Título">
                        <input type="text" name="verba" placeholder="Verba">
                        <input type="date" name="gravacaoInicial" placeholder="Início das Gravações" id="">
                        <input type="date" name="gravacaoFinal" placeholder="Fim das Gravações" id="">
                        <input type="submit" value="Atualizar" name="update">
                    </fieldset>
                </form>
            </div>
            <hr>
            <div class="row">
                <h3>Listar</h3>
                <table>
                    <thead>
                        <tr>
                            <td>Id</td>
                            <td>Titulo</td>
                            <td>Verba</td>
                            <td>Gravação Inicial</td>
                            <td>Gravação Final</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                            require "./php/filmeDAO.php";
                            $filme = new filmeDAO();

                            $filmes = $filme->getAll();

                            for ($i=0; $i < count($filmes); $i++) {
                                ?>
                                <tr>
                                    <td><?= $filmes[$i]->getId() ?></td>
                                    <td><?= $filmes[$i]->getTitulo() ?></td>
                                    <td><?= $filmes[$i]->getVerba() ?></td>
                                    <td><?= date_format($filmes[$i]->getDtGravacaoInicio(), "d/m/Y") ?></td>
                                    <td><?= date_format($filmes[$i]->getDtGravacaoFim(), "d/m/Y") ?></td>
                                </tr>
                                <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
</html>