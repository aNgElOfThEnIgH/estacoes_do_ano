<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/styles.css">
    <title>Estações do ano</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            text-align: center;
            margin: 0;
            padding: 20px;
        }

        h1 {
            color: lightblue;
        }

        form {
            background: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            display: inline-block;
            margin-top: 20px;
        }

        input[type="number"] {
            padding: 10px;
            margin: 10px 0;
            width: calc(100% - 20px);
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 1rem;
            cursor: pointer;
            border-radius: 5px;
            margin-top: 10px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .resultado {
            margin-top: 20px;
        }

        .resultado img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <form action="/estacoes_do_ano/" method="GET">
        <label for="dia"> Informe o Dia:</label>
        <input type="number" name="dia" min="1" max="31" required="required">
        <label for="mes">Informe o mês:</label>
        <input type="number" name="mes" min="1" max="12" required="required">
        <input type="submit" value="Ver estação">
    </form>
        <?php
            if ($_SERVER ['REQUEST_METHOD'] == 'GET' && isset($_GET['dia']) && isset($_GET['mes'])) {
                $dia = $_GET['dia'];
                $mes = $_GET['mes'];
                $estacao = '';
                $img = '';

                if (($mes == 12 && $dia >= 21) || ($mes <= 2) || ($mes == 3 && $dia < 21)) {
                    $estacao = 'Verão';
                    $img = 'https://img.freepik.com/vetores-gratis/fundo-realista-para-a-temporada-de-verao_23-2150266390.jpg?semt=ais_hybrid';
                } elseif (($mes == 3 && $dia >= 21) || ($mes <= 5) || ($mes == 6 && $dia < 21)) {
                    $estacao = 'Outono';
                    $img = 'https://s3.static.brasilescola.uol.com.br/be/2021/03/outono.jpg';
                } elseif (($mes == 6 && $dia >= 21) || ($mes <= 8) || ($mes == 9 && $dia < 21)) {
                    $estacao = 'Inverno';
                    $img = 'https://img.freepik.com/fotos-gratis/campo-cercado-por-colinas-e-arvores-nuas-cobertas-de-neve-durante-o-por-do-sol-no-inverno_181624-8202.jpg';
                } elseif (($mes == 9 && $dia >= 21) || ($mes <= 11) || ($mes == 12 && $dia < 21)) {
                    $estacao = 'Primavera';
                    $img = 'https://img.freepik.com/fotos-gratis/paisagem-de-primavera-com-flores-e-borboletas_52683-107767.jpg';
                } else {
                    $estacao = 'Data inválida';
                }

                echo "<div class='resultado'>";
                echo "<h2>Estação do Ano: $estacao</h2>";
                if (!empty($img)) {
                echo "<img src='$img' alt='Imagem da estação $estacao'>";
                }
                echo "</div>";
            }
        ?>
</body>
</html>