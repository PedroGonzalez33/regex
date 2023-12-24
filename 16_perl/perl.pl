# 2018-06-04,Italy,Netherlands,1,1,Friendly,Turin,Italy,FALSE
# 2018-06-04,Serbia,Chile,0,1,Friendly,Graz,Austria,TRUE
# 2018-06-04,Slovakia,Morocco,1,2,Friendly,Geneva,Switzerland,TRUE
# 2018-06-04,Armenia,Moldova,0,0,Friendly,Kematen,Austria,TRUE
# 2018-06-04,India,Kenya,3,0,Friendly,Mumbai,India,FALSE

#Todas las expresiones regulares van entre dos diagonales m/miExpresionRegular/

#Ejemplos:
#Cada partido que se hizo en febrero: ^[\d]{4,4}\-02-.*$
#!/usr/bin/perl

use strict;
use warnings;

my $t = time;

open(my $f, "<../files/results.csv") or die("no hay archivo");

my $match = 0;
my $nomatch = 0;

while(<$f>) {
	chomp; # omite saltos de linea y otros caracteres
	# 2018-06-04,Italy,Netherlands,1,1,Friendly,Turin,Italy,FALSE
    # m --> match 
    # en pearl: /regex/
    if(m/^[\d]{4,4}\-02\-.*$/){
        printf $_."\n";
        $match++;
    } else{
        $nomatch++;
    }

}

close($f);

printf("Se encontraron \n - %d matches\n - %d no matches\ntardo %d segundos\n"
	, $match, $nomatch, time() - $t);

# Cada vez que ganó el visitante: ^[\d]{4,4}.*?,(.*?),(.*?),(\d+),(\d+),.*$ -> lo podemos imprimir en Perl como:
#!/usr/bin/perl

use strict;
use warnings;

my $t = time;

open(my $f, "<../files/results.csv") or die("no hay archivo");

my $match = 0;
my $nomatch = 0;

while(<$f>) {
	chomp;

	if(m/^([\d]{4,4}).*?,(.*?),(.*?),(\d+),(\d+),.*$/){
		if($5 > $4) {
			printf("%s: %s (%d) - (%d) %s\n",
				$1, $2, $4, $5, $3
			);
		}
	    $match++;
	} else {
		$nomatch++;
	}
}

close($f);

printf("Se encontraron \n - %d matches\n - %d no matches\ntardo %d segundos\n"
	, $match, $nomatch, time() - $t);

# Lo mismo pero ahora añadimos el año del partido: ^([\d]{4,4})\-.*?,(.*?),(.*?),(\d+),(\d+),.*$ -> Lo mostramos así:
#!/usr/bin/perl

if(m/^([\d]{4,4})\-.*?,(.*?),(.*?),(\d+),(\d+),.*$/) {
    if ($5 > $4) {
      printf("%s: %s (%d) - (%d) %s\n", $1, $2, $4, $5, $3);
      # $1 es la fecha
      # $2 es el equipo local
      # $3 es el equipo visitante
      # $4 es el marcador del equipo local
      # $5 es el marcador del equipo visitante
    }
    $match++;
  }