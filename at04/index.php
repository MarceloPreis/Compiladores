<!DOCTYPE html>
<html lang="en">

<head>
    <title>At 04</title>
</head>

<body>
    <form action="" method="get">
        <input type="text" name="entrada">
        <input type="submit">
    </form>
    <?php
    require_once 'AnalisadorSintatico.php';
    require_once 'AnalizadorLexico.php';
    use AnalisadorSintatico\AnalisadorSintatico;

    if (isset($_GET['entrada'])) {

        $lexico = new AnalizadorLexico('C:\Users\marce\OneDrive\Documentos\BCC\2022\2 Semestre\Compiladores\at04\at05(1).jff');

        $sintetico = new AnalisadorSintatico('C:\Users\marce\OneDrive\Documentos\BCC\2022\2 Semestre\Compiladores\at04\at05(1).jff');
        $sintetico->lexico->indentifyrToken($_GET['entrada']);
        var_dump($sintetico->lexico->tokens);

        if ($sintetico->P())
            echo "Válido";
        else
            echo "Inválido";
    }
    ?>

</body>

</html>