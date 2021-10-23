import sys
import ConnectDatabase
import handler_db

parte = int(sys.argv[1])

#instance
connect = ConnectDatabase.ConnectDataBase()
handler = handler_db.HandlerQuery()

#init connection
connect.initConnectionDB()

#traer toda la info de la lista de detalles
query = "select id_detalle from detalle"
result_values = handler.queryBasicDataBase(query, connect)

detalle_full = [value[0] for value in result_values]

for detalle in detalle_full:
    query = "insert into detalle_faltas_parte values ({}, {}, 0)".format(parte, detalle)
    handler.insertToTable(query, connect)

connect.closeConnectionDB()