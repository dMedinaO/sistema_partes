import pandas as pd
import sys
import ConnectDatabase
import handler_db
import re
import unicodedata

connection = ConnectDatabase.ConnectDataBase()
handler = handler_db.HandlerQuery()

#start connection
connection.initConnectionDB()

dataset = pd.read_excel(sys.argv[1], sheet_name="company")
company = sys.argv[2]

response=""

query_delete = "DELETE FROM  cadete where company = '{}'".format(company)
handler.insertToTable(query_delete, connection)

dict_company = {"1" : "PRIMERA", "2": "SEGUNDA", "3": "TERCERA", "4": "CUARTA", "5" : "QUINTA", "6": "SEXTA"}

try:

    for i in range(len(dataset)):
        orden_value = dataset['ORDEN'][i]
        seccion_value = dataset['SECCION'][i]
        company = dict_company[str(dataset['COMP'][i])]
        name_value = dataset['NOMBRES'][i]
        name_value = unicodedata.normalize("NFD",str(name_value))
        name_value = name_value.encode("utf8").decode("ascii","ignore")
        name_value = re.sub('[^A-Z a-z0-9]+', '', name_value)
        query_delete = "DELETE FROM cadete where numero_orden = '{}'".format(orden_value)
        query_add_ficha = "INSERT INTO cadete values ('{}', '{}', '{}', {}, NOW(), NOW())".format(orden_value, name_value, company, seccion_value)

        handler.insertToTable(query_delete, connection)
        handler.insertToTable(query_add_ficha, connection)

    response="OK"	
except:
    response="ERROR"

connection.closeConnectionDB()

print(response)