// 2018-06-04,Italy,Netherlands,1,1,Friendly,Turin,Italy,FALSE
// 2018-06-04,Serbia,Chile,0,1,Friendly,Graz,Austria,TRUE
// 2018-06-04,Slovakia,Morocco,1,2,Friendly,Geneva,Switzerland,TRUE
// 2018-06-04,Armenia,Moldova,0,0,Friendly,Kematen,Austria,TRUE
// 2018-06-04,India,Kenya,3,0,Friendly,Mumbai,India,FALSE 

// Match para expresiones regulares en PHP:
// preg_match( '/regex/',
// 		$line,
//		$m)

// Donde:
// - regex: es la expresion regular.
// - $line: cadena de caracteres (cada línea del archivo).
// - $m: arreglo en donde cada match va a ir en cada uno de los lugares. En el script, este arreglo tiene dos elementos donde el elemento [0] es la cadena de caracteres de prueba y el elemento [1] es el grupo de caracteres que hace match.

// Expresión regular para obtener partidos jugados en enero del 2018:
// ^2018\-01\-(\d\d),.*$

// Código:
<?php
$file = fopen("../files/results.csv","r");

$match   = 0;
$nomatch = 0;

while(!feof($file)) {
    $line = fgets($file);
    if(preg_match(
        '/^2018\-01\-(\d\d),.*$/',
        $line,
        $m
      )
    ) {
        print_r($m); 
        $match++;
    } else {
        $nomatch++;
    }
}
fclose($file);

printf("\n\nmatch: %d\nnomatch: %d\n", $match, $nomatch);


Regex para hacer match con la totalidad de los datos'/^(\d{4,4}\-\d\d\-\d\d),([\w\-\.\ ñáéíóúçã&]+),([\w\-\.\ ñáéíóúçã&]+),(\d+),(\d+),.*$/i'

// Código:

<?php

$file = fopen("../Curso de Expresiones Regulares/results.csv", "r");

$match = 0;
$nomatch = 0;

$t = time();

while (!feof($file)) {
    $line = fgets($file);
    #echo $line;
    #'/^2018\-01\-(\d\d),.*$/'
    #2018-01-31,Mexico,Bosnia-Herzegovina,1,0,Friendly,San Antonio,USA,TRUE
    if (preg_match('/^(\d{4,4}\-\d\d\-\d\d),([\w\-\.\ ñáéíóúçã&]+),([\w\-\.\ ñáéíóúçã&]+),(\d+),(\d+),.*$/i', $line, $m)) {
        #print_r($m); #imprime el arreglo
        if ($m[4] == $m[5]) {
            echo "empate: " ;
        } elseif ($m[4] > $m[5]) {
            echo "local:   " ;
        } else {
            echo "visitante: ";
        }
        printf("\t%s, %s [%d - %d]\n", $m[2], $m[3], $m[4], $m[5]);
        $match++;
    } else {
        $nomatch++;
        echo $line;
    }
}

fclose($file);

printf("\n\nMatch %d\n No match %d\n", $match, $nomatch);

printf("Tiempo: %d segs\n", time() - $t);