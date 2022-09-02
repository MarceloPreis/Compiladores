<!DOCTYPE html>

<head>
    <title>Atividade 04</title>

    <?php

    use AalisadorSintatico\AnalisadorSintatico;
    use lexico\AnalisadorLexico;
    use token\Token;


    if (isset($_GET['entrada'])) {


        $adicionais = [' ', '*', '=', '-', '+', '(', ')', '{', '}'];
        $estados = [
            'q0', 'q1', 'q2', 'q3', 'q4', 'q5', 'q6', 'q7', 'q8', 'q9', 'q10', 
            'q11', 'q12', 'q13', 'q14', 'q15', 'q16', 'q17', 'q18', 'q19', 'q20', 'q21'
        ];
        $padrao = [
            'q0' => 'q8',
            'q1' => 'q8',
            'q2' => 'q8',
            'q3' => 'q8',
            'q4' => 'q8',
            'q5' => 'q8',
            'q6' => 'q8',
            'q7' => 'q8',
            'q8' => 'q8',
            'q9' => 'q8',
            'q10' => 'q8',
            'q11' => 'q8',
            'q12' => 'q8',
            'q13' => 'q8',
            'q14' => 'q8',
            'q15' => 'q8',
            'q16' => 'q8',
            'q17' => 'q8',
            'q18' => 'q8',
            'q19' => 'q8',
            'q20' => 'q8',
            'q21' => 'q8',
        ];

        $exc = [
            'q0' => [
                'i' => 'q1',
                'w' => 'q3',
                'p' => 'q18',
                '=' => 'q11',
                '}' => 'q12',
                '{' => 'q13',
                ')' => 'q14',
                '(' => 'q10',
                '+' => 'q15',
                '-' => 'q19',
            ],

            'q3' => [
                'h' => 'q4'
            ],

            'q4' => [
                'i' => 'q5'
            ],
            ''
            

        ];


        $analisadorLexico = new AnalisadorLexico();
        $analisadorLexico->FINAIS = [
            'q2' => 'INT',
            'q0' => 'MULT',
        ];
        $analisadorLexico->tabelaDeTransicao($estados, $padrao, $exc, $adicionais);
        $analisadorLexico->indentificarToken($_GET['entrada'], 'q0');
        $analisadorLexico->showTokens();

        $analisadorSintatico = new AnalisadorSintatico();
        $analisadorSintatico->TOKEN_LIST = $analisadorLexico->TOKENS;
        // $analisadorSintatico->validate();
    }

    ?>

</head>

<body>

</body>

</html>