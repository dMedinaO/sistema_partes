import pandas as pd
import sys
import ConnectDatabase
import handler_db

#recibimos los parametros para hacer la configuracion
date_process = sys.argv[1]
reparticion = sys.argv[2].replace("_", " ")
name_export = sys.argv[3]

#instancia de objetos
connect = ConnectDatabase.ConnectDataBase()
handler = handler_db.HandlerQuery()

#init connection
connect.initConnectionDB()

#0. obtenemos el numero de demostraciones
query = "select * from detalle"
number_response =  len(handler.queryBasicDataBase(query, connect))+3

#1. obtenemos todos los partes que cumplen con dicha condicion
query = "select id_parte, fuerza, forman, faltan, compania  from parte where  DATE(fecha)='{}' AND reparticion = '{}'".format(date_process, reparticion)
result_values = handler.queryBasicDataBase(query, connect)
company_names = ["PRIMERA", "SEGUNDA", "TERCERA", "CUARTA", "QUINTA", "SEXTA"]
header = []

list_datasets = []

for row in result_values:
    
    matrix_data = []

    #obtenemos la informacion de los conteos
    query_count = "select detalle.valor_detalle, detalle_faltas_parte.cantidad from detalle_faltas_parte join detalle on (detalle.id_detalle = detalle_faltas_parte.id_detalle) where id_parte = {}".format(row[0])
    header.append(row[4])
    response_data = handler.queryBasicDataBase(query_count, connect)

    for value_data in response_data:
        row_value = [value_data[0], value_data[1]]
        matrix_data.append(row_value)
    
    matrix_data.append(["Fuerza", row[1]])
    matrix_data.append(["Forman", row[2]])
    matrix_data.append(["Faltan", row[3]])

    df_data = pd.DataFrame(matrix_data, columns=["Demostraciones_{}".format(row[4]), "{}".format(row[4])])
    list_datasets.append(df_data)

df_concat = pd.concat(list_datasets, axis=1)

new_dataset = pd.DataFrame()
new_dataset['Demostraciones'] = df_concat['Demostraciones_{}'.format(header[0])]

for value in header:
    new_dataset[value] = df_concat[value]

#adding pending companies
for company in company_names:

    if company not in new_dataset.columns:

        column = [0 for i in range(number_response)]
        new_dataset[company] = column

#sort columns
new_dataset_sort = pd.DataFrame()
new_dataset_sort['Demostraciones'] = new_dataset['Demostraciones']

for company in company_names:
    new_dataset_sort[company] = new_dataset[company]

#add last column with the summary of elements
total_elements = []

for i in range(len(new_dataset_sort)):
    count=0
    for column in company_names:
        count+=new_dataset_sort[column][i]
    
    total_elements.append(count)

new_dataset_sort['TOTALES'] = total_elements

#export results
new_dataset_sort.to_csv(name_export, index=False)
