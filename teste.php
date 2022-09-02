<?php
$alfabet = array_merge(range('a', 'z'), range('A', 'Z'), range(0, 9));

$path = 'C:\Users\marce\OneDrive\Documentos\BCC\2022\2 Semestre\att.xml';
$xml = file_get_contents($path);
$new = simplexml_load_string($xml);
$con = json_encode($new);
$newArr = json_decode($con, true);
$transictionsMtrix = [];

foreach ($newArr['automaton']['transition'] as $transition) {
    if (isRegex($transition['read']))
        $transictionsMtrix[$transition['from']] = matrizForTransitionRegex($transition, $alfabet);
    else {
        $transictionsMtrix[$transition['from']][$transition['read']] = $transition['to'];
    }
}

echo 'Transições: <br>';
foreach ($transictionsMtrix as $key => $state){
    echo '<br>  [ ' .$key . ' ] => <br>';
    foreach ($state as $k => $s){
        echo $k . ' => ' . $s . ', ';
    }
};

$alfabet = array_merge(range('a', 'z'), range(0, 9));


function isRegex($regex)
{
    return (preg_match("/^\/[\s\S]+\/$/", $regex));
}


function testRegex($regex, $str)
{
    if (!isRegex($regex))
        return false;
    return preg_match($regex, $str);
}

function matrizForTransitionRegex($t, $alfabet)
{
    foreach ($alfabet as $char) {
        if (testRegex($t['read'], $char)) {
            $matrix[$t['from']][$char] = $t['to'];
        }
    }
    return $matrix[$t['from']];
}