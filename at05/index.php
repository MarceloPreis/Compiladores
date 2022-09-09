<!DOCTYPE html>
<html lang="en">

<head>
    <title>Atividade 05</title>
</head>

<body>
    <form action="" method="get">
        <textarea name="entrada"></textarea>
        <input type="submit">
    </form>
    <?php
    // error_reporting(0);
    require_once 'AnalisadorSintaticoPreditivo.php';
    require_once 'AnalizadorLexico.php';

    use SintaticoPreditivo\AnalisadorSintaticoPreditivo;
    // use AnalizadorLexico\AnalizadorLexico;
    $path = 'C:\Users\marce\OneDrive\Documentos\BCC\2022\2 Semestre\Compiladores\at05\at05(1).jff';

    if (isset($_GET['entrada'])) {        
        $e = new AnalisadorSintaticoPreditivo($path, $_GET['entrada']);
        // var_dump($e->tokens);
        if ($e->validadte())
            echo 'deu boa';
        else
            echo 'n deu';
    }
    ?>
</body>

</html>