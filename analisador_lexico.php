<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analisador Léxi


        co</title>
</head>
<?php
error_reporting(0);

$TRASITIONS = [
    'q0' => [
        'a' => 'q30', 'b' => 'q30', 'c' => 'q30', 'd' => 'q30', 'e' => 'q30', 'f' => 'q4', 'g' => 'q30', 'h' => 'q30', 'i' => 'q1',
        'j' => 'q30', 'k' => 'q30', 'l' => 'q30', 'm' => 'q30', 'n' => 'q30', 'o' => 'q30', 'p' => 'q8', 'q' => 'q30', 'r' => 'q30',
        's' => 'q30', 't' => 'q30', 'u' => 'q30', 'v' => 'q30', 'w' => 'q30', 'x' => 'q30', 'y' => 'q30', 'z' => 'q30',

        '1' => 'q15', '2' => 'q15', '3' => 'q15', '4' => 'q15', '5' => 'q15', '6' => 'q15', '7' => 'q15', '8' => 'q15', '9' => 'q15',

        '>' => 'q17', '<' => 'q18', '(' => 'q19', ')' => 'q20', '{' => 'q21', '}' => 'q22', '-' => 'q23', '+' => 'q24', '*' => 'q25',
        '/' => 'q26', '=' => 'q27', '==' => 'q28', '!=' => 'q29',

        ' ' => 'q0'

    ],
    'q1' => [
        'a' => 'q30', 'b' => 'q30', 'c' => 'q30', 'd' => 'q30', 'e' => 'q30', 'f' => 'q2', 'g' => 'q30', 'h' => 'q30', 'i' => 'q1',
        'j' => 'q30', 'k' => 'q30', 'l' => 'q30', 'm' => 'q30', 'n' => 'q30', 'o' => 'q30', 'p' => 'q8', 'q' => 'q30', 'r' => 'q30',
        's' => 'q30', 't' => 'q30', 'u' => 'q30', 'v' => 'q30', 'w' => 'q30', 'x' => 'q30', 'y' => 'q30', 'z' => 'q30',

        '1' => 'q30', '2' => 'q30', '3' => 'q30', '4' => 'q30', '5' => 'q30', '6' => 'q30', '7' => 'q30', '8' => 'q30', '9' => 'q30',

        '>' => 'q17', '<' => 'q18', '(' => 'q19', ')' => 'q20', '{' => 'q21', '}' => 'q22', '-' => 'q23', '+' => 'q24', '*' => 'q25',
        '/' => 'q26', '=' => 'q27', '==' => 'q28', '!=' => 'q29',

        ' ' => 'q31'
    ],
    'q2' => [
        'a' => 'q30', 'b' => 'q30', 'c' => 'q30', 'd' => 'q30', 'e' => 'q30', 'f' => 'q30', 'g' => 'q30', 'h' => 'q30', 'i' => 'q5',
        'j' => 'q30', 'k' => 'q30', 'l' => 'q30', 'm' => 'q30', 'n' => 'q30', 'o' => 'q30', 'p' => 'q8', 'q' => 'q30', 'r' => 'q30',
        's' => 'q30', 't' => 'q30', 'u' => 'q30', 'v' => 'q30', 'w' => 'q30', 'x' => 'q30', 'y' => 'q30', 'z' => 'q30',

        '1' => 'q30', '2' => 'q30', '3' => 'q30', '4' => 'q30', '5' => 'q30', '6' => 'q30', '7' => 'q30', '8' => 'q30', '9' => 'q30',

        '>' => 'q17', '<' => 'q18', '(' => 'q19', ')' => 'q20', '{' => 'q21', '}' => 'q22', '-' => 'q23', '+' => 'q24', '*' => 'q25',
        '/' => 'q26', '=' => 'q27', '==' => 'q28', '!=' => 'q29',

        ' ' => 'q3'

    ],
    'q3' => [
        'a' => 'q30', 'b' => 'q30', 'c' => 'q30', 'd' => 'q30', 'e' => 'q30', 'f' => 'q4', 'g' => 'q30', 'h' => 'q30', 'i' => 'q1',
        'j' => 'q30', 'k' => 'q30', 'l' => 'q30', 'm' => 'q30', 'n' => 'q30', 'o' => 'q30', 'p' => 'q8', 'q' => 'q30', 'r' => 'q30',
        's' => 'q30', 't' => 'q30', 'u' => 'q30', 'v' => 'q30', 'w' => 'q30', 'x' => 'q30', 'y' => 'q30', 'z' => 'q30',

        '1' => 'q15', '2' => 'q15', '3' => 'q15', '4' => 'q15', '5' => 'q15', '6' => 'q15', '7' => 'q15', '8' => 'q15', '9' => 'q15',

        '>' => 'q17', '<' => 'q18', '(' => 'q19', ')' => 'q20', '{' => 'q21', '}' => 'q22', '-' => 'q23', '+' => 'q24', '*' => 'q25',
        '/' => 'q26', '=' => 'q27', '==' => 'q28', '!=' => 'q29',

        ' ' => 'q0'
    ],

    'q4' => [
        'a' => 'q30', 'b' => 'q30', 'c' => 'q30', 'd' => 'q30', 'e' => 'q30', 'f' => 'q2', 'g' => 'q30', 'h' => 'q30', 'i' => 'q30',
        'j' => 'q30', 'k' => 'q30', 'l' => 'q30', 'm' => 'q30', 'n' => 'q30', 'o' => 'q5', 'p' => 'q8', 'q' => 'q30', 'r' => 'q30',
        's' => 'q30', 't' => 'q30', 'u' => 'q30', 'v' => 'q30', 'w' => 'q30', 'x' => 'q30', 'y' => 'q30', 'z' => 'q30',

        '1' => 'q15', '2' => 'q15', '3' => 'q15', '4' => 'q15', '5' => 'q15', '6' => 'q15', '7' => 'q15', '8' => 'q15', '9' => 'q15',

        '>' => 'q17', '<' => 'q18', '(' => 'q19', ')' => 'q20', '{' => 'q21', '}' => 'q22', '-' => 'q23', '+' => 'q24', '*' => 'q25',
        '/' => 'q26', '=' => 'q27', '==' => 'q28', '!=' => 'q29',

        ' ' => 'q0'
    ],
    'q5' => [
        'a' => 'q30', 'b' => 'q30', 'c' => 'q30', 'd' => 'q30', 'e' => 'q30', 'f' => 'q2', 'g' => 'q30', 'h' => 'q30', 'i' => 'q30',
        'j' => 'q30', 'k' => 'q30', 'l' => 'q30', 'm' => 'q30', 'n' => 'q30', 'o' => 'q30', 'p' => 'q8', 'q' => 'q30', 'r' => 'q6',
        's' => 'q30', 't' => 'q30', 'u' => 'q30', 'v' => 'q30', 'w' => 'q30', 'x' => 'q30', 'y' => 'q30', 'z' => 'q30',

        '1' => 'q15', '2' => 'q15', '3' => 'q15', '4' => 'q15', '5' => 'q15', '6' => 'q15', '7' => 'q15', '8' => 'q15', '9' => 'q15',

        '>' => 'q17', '<' => 'q18', '(' => 'q19', ')' => 'q20', '{' => 'q21', '}' => 'q22', '-' => 'q23', '+' => 'q24', '*' => 'q25',
        '/' => 'q26', '=' => 'q27', '==' => 'q28', '!=' => 'q29',

        ' ' => 'q31'
    ],

    'q7' => [
        'a' => 'q30', 'b' => 'q30', 'c' => 'q30', 'd' => 'q30', 'e' => 'q30', 'f' => 'q4', 'g' => 'q30', 'h' => 'q30', 'i' => 'q1',
        'j' => 'q30', 'k' => 'q30', 'l' => 'q30', 'm' => 'q30', 'n' => 'q30', 'o' => 'q5', 'p' => 'q8', 'q' => 'q30', 'r' => 'q30',
        's' => 'q30', 't' => 'q30', 'u' => 'q30', 'v' => 'q30', 'w' => 'q30', 'x' => 'q30', 'y' => 'q30', 'z' => 'q30',

        '1' => 'q15', '2' => 'q15', '3' => 'q15', '4' => 'q15', '5' => 'q15', '6' => 'q15', '7' => 'q15', '8' => 'q15', '9' => 'q15',

        '>' => 'q17', '<' => 'q18', '(' => 'q19', ')' => 'q20', '{' => 'q21', '}' => 'q22', '-' => 'q23', '+' => 'q24', '*' => 'q25',
        '/' => 'q26', '=' => 'q27', '==' => 'q28', '!=' => 'q29',

        ' ' => 'q0'
    ],

    'q6' => [
        'a' => 'q30', 'b' => 'q30', 'c' => 'q30', 'd' => 'q30', 'e' => 'q30', 'f' => 'q2', 'g' => 'q30', 'h' => 'q30', 'i' => 'q30',
        'j' => 'q30', 'k' => 'q30', 'l' => 'q30', 'm' => 'q30', 'n' => 'q30', 'o' => 'q5', 'p' => 'q8', 'q' => 'q30', 'r' => 'q30',
        's' => 'q30', 't' => 'q30', 'u' => 'q30', 'v' => 'q30', 'w' => 'q30', 'x' => 'q30', 'y' => 'q30', 'z' => 'q30',

        '1' => 'q15', '2' => 'q15', '3' => 'q15', '4' => 'q15', '5' => 'q15', '6' => 'q15', '7' => 'q15', '8' => 'q15', '9' => 'q15',

        '>' => 'q17', '<' => 'q18', '(' => 'q19', ')' => 'q20', '{' => 'q21', '}' => 'q22', '-' => 'q23', '+' => 'q24', '*' => 'q25',
        '/' => 'q26', '=' => 'q27', '==' => 'q28', '!=' => 'q29',

        ' ' => 'q7'
    ],
    'q8' => [
        'a' => 'q30', 'b' => 'q30', 'c' => 'q30', 'd' => 'q30', 'e' => 'q30', 'f' => 'q2', 'g' => 'q30', 'h' => 'q30', 'i' => 'q30',
        'j' => 'q30', 'k' => 'q30', 'l' => 'q30', 'm' => 'q30', 'n' => 'q30', 'o' => 'q5', 'p' => 'q8', 'q' => 'q30', 'r' => 'q9',
        's' => 'q30', 't' => 'q30', 'u' => 'q30', 'v' => 'q30', 'w' => 'q30', 'x' => 'q30', 'y' => 'q30', 'z' => 'q30',

        '1' => 'q15', '2' => 'q15', '3' => 'q15', '4' => 'q15', '5' => 'q15', '6' => 'q15', '7' => 'q15', '8' => 'q15', '9' => 'q15',

        '>' => 'q17', '<' => 'q18', '(' => 'q19', ')' => 'q20', '{' => 'q21', '}' => 'q22', '-' => 'q23', '+' => 'q24', '*' => 'q25',
        '/' => 'q26', '=' => 'q27', '==' => 'q28', '!=' => 'q29',

        ' ' => 'q0'
    ],
    'q9' => [
        'a' => 'q30', 'b' => 'q30', 'c' => 'q30', 'd' => 'q30', 'e' => 'q30', 'f' => 'q2', 'g' => 'q30', 'h' => 'q30', 'i' => 'q10',
        'j' => 'q30', 'k' => 'q30', 'l' => 'q30', 'm' => 'q30', 'n' => 'q30', 'o' => 'q5', 'p' => 'q8', 'q' => 'q30', 'r' => 'q30',
        's' => 'q30', 't' => 'q30', 'u' => 'q30', 'v' => 'q30', 'w' => 'q30', 'x' => 'q30', 'y' => 'q30', 'z' => 'q30',

        '1' => 'q30', '2' => 'q30', '3' => 'q30', '4' => 'q30', '5' => 'q30', '6' => 'q30', '7' => 'q30', '8' => 'q30', '9' => 'q30',

        '>' => 'q17', '<' => 'q18', '(' => 'q19', ')' => 'q20', '{' => 'q21', '}' => 'q22', '-' => 'q23', '+' => 'q24', '*' => 'q25',
        '/' => 'q26', '=' => 'q27', '==' => 'q28', '!=' => 'q29',

        ' ' => 'q0'
    ],
    'q10' => [
        'a' => 'q30', 'b' => 'q30', 'c' => 'q30', 'd' => 'q30', 'e' => 'q30', 'f' => 'q2', 'g' => 'q30', 'h' => 'q30', 'i' => 'q30',
        'j' => 'q30', 'k' => 'q30', 'l' => 'q30', 'm' => 'q30', 'n' => 'q11', 'o' => 'q5', 'p' => 'q8', 'q' => 'q30', 'r' => 'q30',
        's' => 'q30', 't' => 'q30', 'u' => 'q30', 'v' => 'q30', 'w' => 'q30', 'x' => 'q30', 'y' => 'q30', 'z' => 'q30',

        '1' => 'q15', '2' => 'q15', '3' => 'q15', '4' => 'q15', '5' => 'q15', '6' => 'q15', '7' => 'q15', '8' => 'q15', '9' => 'q15',

        '>' => 'q17', '<' => 'q18', '(' => 'q19', ')' => 'q20', '{' => 'q21', '}' => 'q22', '-' => 'q23', '+' => 'q24', '*' => 'q25',
        '/' => 'q26', '=' => 'q27', '==' => 'q28', '!=' => 'q29',

        ' ' => 'q0'
    ],
    'q11' => [
        'a' => 'q30', 'b' => 'q30', 'c' => 'q30', 'd' => 'q30', 'e' => 'q30', 'f' => 'q2', 'g' => 'q30', 'h' => 'q30', 'i' => 'q30',
        'j' => 'q30', 'k' => 'q30', 'l' => 'q30', 'm' => 'q30', 'n' => 'q30', 'o' => 'q5', 'p' => 'q8', 'q' => 'q30', 'r' => 'q30',
        's' => 'q30', 't' => 'q12', 'u' => 'q30', 'v' => 'q30', 'w' => 'q30', 'x' => 'q30', 'y' => 'q30', 'z' => 'q30',

        '1' => 'q15', '2' => 'q15', '3' => 'q15', '4' => 'q15', '5' => 'q15', '6' => 'q15', '7' => 'q15', '8' => 'q15', '9' => 'q15',

        '>' => 'q17', '<' => 'q18', '(' => 'q19', ')' => 'q20', '{' => 'q21', '}' => 'q22', '-' => 'q23', '+' => 'q24', '*' => 'q25',
        '/' => 'q26', '=' => 'q27', '==' => 'q28', '!=' => 'q29',

        ' ' => 'q0'
    ],
    'q12' => [
        'a' => 'q30', 'b' => 'q30', 'c' => 'q30', 'd' => 'q30', 'e' => 'q30', 'f' => 'q30', 'g' => 'q30', 'h' => 'q30', 'i' => 'q30',
        'j' => 'q30', 'k' => 'q30', 'l' => 'q30', 'm' => 'q30', 'n' => 'q30', 'o' => 'q5', 'p' => 'q30', 'q' => 'q30', 'r' => 'q30',
        's' => 'q30', 't' => 'q13', 'u' => 'q30', 'v' => 'q30', 'w' => 'q30', 'x' => 'q30', 'y' => 'q30', 'z' => 'q30',

        '1' => 'q15', '2' => 'q15', '3' => 'q15', '4' => 'q15', '5' => 'q15', '6' => 'q15', '7' => 'q15', '8' => 'q15', '9' => 'q15',

        '>' => 'q17', '<' => 'q18', '(' => 'q19', ')' => 'q20', '{' => 'q21', '}' => 'q22', '-' => 'q23', '+' => 'q24', '*' => 'q25',
        '/' => 'q26', '=' => 'q27', '==' => 'q28', '!=' => 'q29',

        ' ' => 'q13'
    ],
    'q13' => [
        'a' => 'q30', 'b' => 'q30', 'c' => 'q30', 'd' => 'q30', 'e' => 'q30', 'f' => 'q30', 'g' => 'q30', 'h' => 'q30', 'i' => 'q1',
        'j' => 'q30', 'k' => 'q30', 'l' => 'q30', 'm' => 'q30', 'n' => 'q30', 'o' => 'q5', 'p' => 'q8', 'q' => 'q30', 'r' => 'q30',
        's' => 'q30', 't' => 'q13', 'u' => 'q30', 'v' => 'q30', 'w' => 'q30', 'x' => 'q30', 'y' => 'q30', 'z' => 'q30',

        '1' => 'q15', '2' => 'q15', '3' => 'q15', '4' => 'q15', '5' => 'q15', '6' => 'q15', '7' => 'q15', '8' => 'q15', '9' => 'q15',

        '>' => 'q17', '<' => 'q18', '(' => 'q19', ')' => 'q20', '{' => 'q21', '}' => 'q22', '-' => 'q23', '+' => 'q24', '*' => 'q25',
        '/' => 'q26', '=' => 'q27', '==' => 'q28', '!=' => 'q29',

    ],
    'q15' => [
        '1' => 'q15', '2' => 'q15', '3' => 'q15', '4' => 'q15', '5' => 'q15', '6' => 'q15', '7' => 'q15', '8' => 'q15', '9' => 'q15',
        ' ' => 'q32'
    ],
    'q17' => [
        'a' => 'q30', 'b' => 'q30', 'c' => 'q30', 'd' => 'q30', 'e' => 'q30', 'f' => 'q4', 'g' => 'q30', 'h' => 'q30', 'i' => 'q1',
        'j' => 'q30', 'k' => 'q30', 'l' => 'q30', 'm' => 'q30', 'n' => 'q30', 'o' => 'q5', 'p' => 'q8', 'q' => 'q30', 'r' => 'q30',
        's' => 'q30', 't' => 'q13', 'u' => 'q30', 'v' => 'q30', 'w' => 'q30', 'x' => 'q30', 'y' => 'q30', 'z' => 'q30',

        '1' => 'q15', '2' => 'q15', '3' => 'q15', '4' => 'q15', '5' => 'q15', '6' => 'q15', '7' => 'q15', '8' => 'q15', '9' => 'q15',

        '>' => 'q17', '<' => 'q18', '(' => 'q19', ')' => 'q20', '{' => 'q21', '}' => 'q22', '-' => 'q23', '+' => 'q24', '*' => 'q25',
        '/' => 'q26', '=' => 'q27', '==' => 'q28', '!=' => 'q29',

        ' ' => 'q0'
    ],

    'q18' => [
        'a' => 'q30', 'b' => 'q30', 'c' => 'q30', 'd' => 'q30', 'e' => 'q30', 'f' => 'q4', 'g' => 'q30', 'h' => 'q30', 'i' => 'q1',
        'j' => 'q30', 'k' => 'q30', 'l' => 'q30', 'm' => 'q30', 'n' => 'q30', 'o' => 'q5', 'p' => 'q8', 'q' => 'q30', 'r' => 'q30',
        's' => 'q30', 't' => 'q13', 'u' => 'q30', 'v' => 'q30', 'w' => 'q30', 'x' => 'q30', 'y' => 'q30', 'z' => 'q30',

        '1' => 'q15', '2' => 'q15', '3' => 'q15', '4' => 'q15', '5' => 'q15', '6' => 'q15', '7' => 'q15', '8' => 'q15', '9' => 'q15',

        '>' => 'q17', '<' => 'q18', '(' => 'q19', ')' => 'q20', '{' => 'q21', '}' => 'q22', '-' => 'q23', '+' => 'q24', '*' => 'q25',
        '/' => 'q26', '=' => 'q27', '==' => 'q28', '!=' => 'q29',

        ' ' => 'q0'
    ],
    'q19' => [
        'a' => 'q30', 'b' => 'q30', 'c' => 'q30', 'd' => 'q30', 'e' => 'q30', 'f' => 'q4', 'g' => 'q30', 'h' => 'q30', 'i' => 'q1',
        'j' => 'q30', 'k' => 'q30', 'l' => 'q30', 'm' => 'q30', 'n' => 'q30', 'o' => 'q5', 'p' => 'q8', 'q' => 'q30', 'r' => 'q30',
        's' => 'q30', 't' => 'q13', 'u' => 'q30', 'v' => 'q30', 'w' => 'q30', 'x' => 'q30', 'y' => 'q30', 'z' => 'q30',

        '1' => 'q15', '2' => 'q15', '3' => 'q15', '4' => 'q15', '5' => 'q15', '6' => 'q15', '7' => 'q15', '8' => 'q15', '9' => 'q15',

        '>' => 'q17', '<' => 'q18', '(' => 'q19', ')' => 'q20', '{' => 'q21', '}' => 'q22', '-' => 'q23', '+' => 'q24', '*' => 'q25',
        '/' => 'q26', '=' => 'q27', '==' => 'q28', '!=' => 'q29',

        ' ' => 'q0'
    ],
    'q20' => [
        'a' => 'q30', 'b' => 'q30', 'c' => 'q30', 'd' => 'q30', 'e' => 'q30', 'f' => 'q4', 'g' => 'q30', 'h' => 'q30', 'i' => 'q1',
        'j' => 'q30', 'k' => 'q30', 'l' => 'q30', 'm' => 'q30', 'n' => 'q30', 'o' => 'q5', 'p' => 'q8', 'q' => 'q30', 'r' => 'q30',
        's' => 'q30', 't' => 'q13', 'u' => 'q30', 'v' => 'q30', 'w' => 'q30', 'x' => 'q30', 'y' => 'q30', 'z' => 'q30',

        '1' => 'q15', '2' => 'q15', '3' => 'q15', '4' => 'q15', '5' => 'q15', '6' => 'q15', '7' => 'q15', '8' => 'q15', '9' => 'q15',

        '>' => 'q17', '<' => 'q18', '(' => 'q19', ')' => 'q20', '{' => 'q21', '}' => 'q22', '-' => 'q23', '+' => 'q24', '*' => 'q25',
        '/' => 'q26', '=' => 'q27', '==' => 'q28', '!=' => 'q29',

        ' ' => 'q0'
    ],

    'q21' => [
        'a' => 'q30', 'b' => 'q30', 'c' => 'q30', 'd' => 'q30', 'e' => 'q30', 'f' => 'q4', 'g' => 'q30', 'h' => 'q30', 'i' => 'q1',
        'j' => 'q30', 'k' => 'q30', 'l' => 'q30', 'm' => 'q30', 'n' => 'q30', 'o' => 'q5', 'p' => 'q8', 'q' => 'q30', 'r' => 'q30',
        's' => 'q30', 't' => 'q13', 'u' => 'q30', 'v' => 'q30', 'w' => 'q30', 'x' => 'q30', 'y' => 'q30', 'z' => 'q30',

        '1' => 'q15', '2' => 'q15', '3' => 'q15', '4' => 'q15', '5' => 'q15', '6' => 'q15', '7' => 'q15', '8' => 'q15', '9' => 'q15',

        '>' => 'q17', '<' => 'q18', '(' => 'q19', ')' => 'q20', '{' => 'q21', '}' => 'q22', '-' => 'q23', '+' => 'q24', '*' => 'q25',
        '/' => 'q26', '=' => 'q27', '==' => 'q28', '!=' => 'q29',

        ' ' => 'q0'
    ],

    'q22' => [
        'a' => 'q30', 'b' => 'q30', 'c' => 'q30', 'd' => 'q30', 'e' => 'q30', 'f' => 'q4', 'g' => 'q30', 'h' => 'q30', 'i' => 'q1',
        'j' => 'q30', 'k' => 'q30', 'l' => 'q30', 'm' => 'q30', 'n' => 'q30', 'o' => 'q5', 'p' => 'q8', 'q' => 'q30', 'r' => 'q30',
        's' => 'q30', 't' => 'q13', 'u' => 'q30', 'v' => 'q30', 'w' => 'q30', 'x' => 'q30', 'y' => 'q30', 'z' => 'q30',

        '1' => 'q15', '2' => 'q15', '3' => 'q15', '4' => 'q15', '5' => 'q15', '6' => 'q15', '7' => 'q15', '8' => 'q15', '9' => 'q15',

        '>' => 'q17', '<' => 'q18', '(' => 'q19', ')' => 'q20', '{' => 'q21', '}' => 'q22', '-' => 'q23', '+' => 'q24', '*' => 'q25',
        '/' => 'q26', '=' => 'q27', '==' => 'q28', '!=' => 'q29',

        ' ' => 'q0'
    ],

    'q23' => [
        'a' => 'q30', 'b' => 'q30', 'c' => 'q30', 'd' => 'q30', 'e' => 'q30', 'f' => 'q4', 'g' => 'q30', 'h' => 'q30', 'i' => 'q1',
        'j' => 'q30', 'k' => 'q30', 'l' => 'q30', 'm' => 'q30', 'n' => 'q30', 'o' => 'q5', 'p' => 'q8', 'q' => 'q30', 'r' => 'q30',
        's' => 'q30', 't' => 'q13', 'u' => 'q30', 'v' => 'q30', 'w' => 'q30', 'x' => 'q30', 'y' => 'q30', 'z' => 'q30',

        '1' => 'q15', '2' => 'q15', '3' => 'q15', '4' => 'q15', '5' => 'q15', '6' => 'q15', '7' => 'q15', '8' => 'q15', '9' => 'q15',

        '>' => 'q17', '<' => 'q18', '(' => 'q19', ')' => 'q20', '{' => 'q21', '}' => 'q22', '-' => 'q23', '+' => 'q24', '*' => 'q25',
        '/' => 'q26', '=' => 'q27', '==' => 'q28', '!=' => 'q29',

        ' ' => 'q0'
    ],

    'q24' => [
        'a' => 'q30', 'b' => 'q30', 'c' => 'q30', 'd' => 'q30', 'e' => 'q30', 'f' => 'q4', 'g' => 'q30', 'h' => 'q30', 'i' => 'q1',
        'j' => 'q30', 'k' => 'q30', 'l' => 'q30', 'm' => 'q30', 'n' => 'q30', 'o' => 'q5', 'p' => 'q8', 'q' => 'q30', 'r' => 'q30',
        's' => 'q30', 't' => 'q13', 'u' => 'q30', 'v' => 'q30', 'w' => 'q30', 'x' => 'q30', 'y' => 'q30', 'z' => 'q30',

        '1' => 'q15', '2' => 'q15', '3' => 'q15', '4' => 'q15', '5' => 'q15', '6' => 'q15', '7' => 'q15', '8' => 'q15', '9' => 'q15',

        '>' => 'q17', '<' => 'q18', '(' => 'q19', ')' => 'q20', '{' => 'q21', '}' => 'q22', '-' => 'q23', '+' => 'q24', '*' => 'q25',
        '/' => 'q26', '=' => 'q27', '==' => 'q28', '!=' => 'q29',

        ' ' => 'q0'
    ],

    'q25' => [
        'a' => 'q30', 'b' => 'q30', 'c' => 'q30', 'd' => 'q30', 'e' => 'q30', 'f' => 'q4', 'g' => 'q30', 'h' => 'q30', 'i' => 'q1',
        'j' => 'q30', 'k' => 'q30', 'l' => 'q30', 'm' => 'q30', 'n' => 'q30', 'o' => 'q5', 'p' => 'q8', 'q' => 'q30', 'r' => 'q30',
        's' => 'q30', 't' => 'q13', 'u' => 'q30', 'v' => 'q30', 'w' => 'q30', 'x' => 'q30', 'y' => 'q30', 'z' => 'q30',

        '1' => 'q15', '2' => 'q15', '3' => 'q15', '4' => 'q15', '5' => 'q15', '6' => 'q15', '7' => 'q15', '8' => 'q15', '9' => 'q15',

        '>' => 'q17', '<' => 'q18', '(' => 'q19', ')' => 'q20', '{' => 'q21', '}' => 'q22', '-' => 'q23', '+' => 'q24', '*' => 'q25',
        '/' => 'q26', '=' => 'q27', '==' => 'q28', '!=' => 'q29',

        ' ' => 'q0'
    ],

    'q26' => [
        'a' => 'q30', 'b' => 'q30', 'c' => 'q30', 'd' => 'q30', 'e' => 'q30', 'f' => 'q4', 'g' => 'q30', 'h' => 'q30', 'i' => 'q1',
        'j' => 'q30', 'k' => 'q30', 'l' => 'q30', 'm' => 'q30', 'n' => 'q30', 'o' => 'q5', 'p' => 'q8', 'q' => 'q30', 'r' => 'q30',
        's' => 'q30', 't' => 'q13', 'u' => 'q30', 'v' => 'q30', 'w' => 'q30', 'x' => 'q30', 'y' => 'q30', 'z' => 'q30',

        '1' => 'q15', '2' => 'q15', '3' => 'q15', '4' => 'q15', '5' => 'q15', '6' => 'q15', '7' => 'q15', '8' => 'q15', '9' => 'q15',

        '>' => 'q17', '<' => 'q18', '(' => 'q19', ')' => 'q20', '{' => 'q21', '}' => 'q22', '-' => 'q23', '+' => 'q24', '*' => 'q25',
        '/' => 'q26', '=' => 'q27', '==' => 'q28', '!=' => 'q29',

        ' ' => 'q0'
    ],

    'q30' => [
        'a' => 'q30', 'b' => 'q30', 'c' => 'q30', 'd' => 'q30', 'e' => 'q30', 'f' => 'q30', 'g' => 'q30', 'h' => 'q30', 'i' => 'q30',
        'j' => 'q30', 'k' => 'q30', 'l' => 'q30', 'm' => 'q30', 'n' => 'q30', 'o' => 'q5', 'p' => 'q8', 'q' => 'q30', 'r' => 'q30',
        's' => 'q30', 't' => 'q30', 'u' => 'q30', 'v' => 'q30', 'w' => 'q30', 'x' => 'q30', 'y' => 'q30', 'z' => 'q30',

        '1' => 'q30', '2' => 'q30', '3' => 'q30', '4' => 'q30', '5' => 'q30', '6' => 'q30', '7' => 'q30', '8' => 'q30', '9' => 'q30',

        '>' => 'q17', '<' => 'q18', '(' => 'q19', ')' => 'q20', '{' => 'q21', '}' => 'q22', '-' => 'q23', '+' => 'q24', '*' => 'q25',
        '/' => 'q26', '=' => 'q27', '==' => 'q28', '!=' => 'q29',

        ' ' => 'q31'
    ],

    'q31' => [
        'a' => 'q30', 'b' => 'q30', 'c' => 'q30', 'd' => 'q30', 'e' => 'q30', 'f' => 'q4', 'g' => 'q30', 'h' => 'q30', 'i' => 'q1',
        'j' => 'q30', 'k' => 'q30', 'l' => 'q30', 'm' => 'q30', 'n' => 'q30', 'o' => 'q5', 'p' => 'q8', 'q' => 'q30', 'r' => 'q30',
        's' => 'q30', 't' => 'q13', 'u' => 'q30', 'v' => 'q30', 'w' => 'q30', 'x' => 'q30', 'y' => 'q30', 'z' => 'q30',

        '1' => 'q15', '2' => 'q15', '3' => 'q15', '4' => 'q15', '5' => 'q15', '6' => 'q15', '7' => 'q15', '8' => 'q15', '9' => 'q15',

        '>' => 'q17', '<' => 'q18', '(' => 'q19', ')' => 'q20', '{' => 'q21', '}' => 'q22', '-' => 'q23', '+' => 'q24', '*' => 'q25',
        '/' => 'q26', '=' => 'q27', '==' => 'q28', '!=' => 'q29',

        ' ' => 'q0'
    ],

    'q32' => [
        'a' => 'q30', 'b' => 'q30', 'c' => 'q30', 'd' => 'q30', 'e' => 'q30', 'f' => 'q4', 'g' => 'q30', 'h' => 'q30', 'i' => 'q1',
        'j' => 'q30', 'k' => 'q30', 'l' => 'q30', 'm' => 'q30', 'n' => 'q30', 'o' => 'q5', 'p' => 'q8', 'q' => 'q30', 'r' => 'q30',
        's' => 'q30', 't' => 'q13', 'u' => 'q30', 'v' => 'q30', 'w' => 'q30', 'x' => 'q30', 'y' => 'q30', 'z' => 'q30',

        '1' => 'q30', '2' => 'q30', '3' => 'q30', '4' => 'q30', '5' => 'q30', '6' => 'q30', '7' => 'q30', '8' => 'q30', '9' => 'q30',

        '>' => 'q17', '<' => 'q18', '(' => 'q19', ')' => 'q20', '{' => 'q21', '}' => 'q22', '-' => 'q23', '+' => 'q24', '*' => 'q25',
        '/' => 'q26', '=' => 'q27', '==' => 'q28', '!=' => 'q29',

        ' ' => 'q0'
    ]
];

$ESTADOS_FINAIS = [
    'q3' => 'IF',
    'q7' => 'FOR',
    'q13' => 'PRINT',
    'q17' => '">"',
    'q18' => '"<"',
    'q19' => '"("',
    'q20' => '")"',
    'q21' => '"{"',
    'q22' => '"}"',
    'q23' => '"-"',
    'q24' => '"+"',
    'q25' => '"*"',
    'q26' => '"/"',
    'q31' => 'VAR',
    'q32' => 'CONST'
];

$qAtual = 'q0';

if (isset($_GET['entrada'])) {
    $entrada = $_GET['entrada'] . ' ';
    echo 'Entrada => ' . $entrada . '<br>';
    $entrada = str_split($entrada);

    foreach ($entrada as $e) {
        if (!$TRASITIONS[$qAtual][$e]) {
            echo "Entrada Inválida! => " . $e;
            break;
        }
        $qAtual = $TRASITIONS[$qAtual][$e];
        if (array_key_exists($qAtual, $ESTADOS_FINAIS))
            echo 'TOKEN => ' . $ESTADOS_FINAIS[$qAtual] . '<br>';
    }
}

?>

<body>

    <form action="" method="get">
        <input type="text" name="entrada">
        <input type="submit">
    </form>

</body>

</html>