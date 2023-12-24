# 2018-06-04,Italy,Netherlands,1,1,Friendly,Turin,Italy,FALSE
# 2018-06-04,Serbia,Chile,0,1,Friendly,Graz,Austria,TRUE
# 2018-06-04,Slovakia,Morocco,1,2,Friendly,Geneva,Switzerland,TRUE
# 2018-06-04,Armenia,Moldova,0,0,Friendly,Kematen,Austria,TRUE
# 2018-06-04,India,Kenya,3,0,Friendly,Mumbai,India,FALSE 

#Empates amistosos
#!/usr/bin/python3
#1872-11-30,Scotland,England,0,0,Friendly,Glasgow,Scotland,FALSE
#Buscar los partidos amistosos en los que empataron

import re

pattern = re.compile(r'^\d{4}\-\d{2}\-\d{2},(.+),(.+),(\d+),(\d+),Friendly,.*$')

empates_amistosos = 0
no_empates_amistosos = 0
total = 0

f = open("../results_4f052c2d-43b0-40fc-97a4-6672a196f4fb.csv", "r")

for line in f:
    res = re.match(pattern, line)
    if res:
        if res.group(3) == res.group(4):
            print(f"{res.group(1)} {res.group(3)} - {res.group(2)} {res.group(4)}")
            print(line)
            empates_amistosos+=1
        else:
            no_empates_amistosos+=1
    else:
        no_empates_amistosos+=1
    total+=1

f.close()

print(f"Empates amistosos: {empates_amistosos}, no empates amistosos: {no_empates_amistosos}")
print(f"Total contados: {total}, total suma: {empates_amistosos + no_empates_amistosos}")

import re

csv_data = r'C:\Users\Alfonso Zapata\jupyter\Cursos\Junio 2022\Curso de expresiones regulares - platzi\results.csv'
  
# print(csv_data)

# 2000-01-08,Trinidad and Tobago,Canada,0,0,Friendly,Port of Spain,Trinidad and Tobago,FALSE

pattern = re.compile(r'^(20[0-9]{2,2}\-\d\d\-\d\d),(.+),(.+),(\d),(\d),(.*),(.*),(.*),(.*)$')

with open(csv_data, 'r', encoding="utf8") as f:
    for line in f:
        res = re.match(pattern, line)
        if res:
            if res.group(4) == res.group(5):
                resultado = 'Empataron'
            elif res.group(4) > res.group(5):
                resultado = res.group(2)
            elif res.group(4) < res.group(5):
                resultado = res.group(3)
            print(f'''
            La fecha {res.group(1)}:
            {res.group(2)} vs {res.group(3)}
            Marcador: {res.group(4)} a {res.group(5)}
            Gano: {resultado}
            El partido se jugo por {res.group(6)}
            El encuentro se jugo en {res.group(7)}, {res.group(8)}
            La cancha fue neutral? {res.group(9)}''')
