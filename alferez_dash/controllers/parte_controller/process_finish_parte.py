import sys
import ConnectDatabase
import handler_db

try:
    parte = int(sys.argv[1])

    #instance
    connect = ConnectDatabase.ConnectDataBase()
    handler = handler_db.HandlerQuery()

    #init connection
    connect.initConnectionDB()

    #query1
    query = "select detalle_faltas_parte.id_detalle from detalle_faltas_parte where id_parte = {}".format(parte)
    result_values = handler.queryBasicDataBase(query, connect)

    detalle_process = [value[0] for value in result_values]

    #query2
    query = "select id_detalle from detalle"
    result_values = handler.queryBasicDataBase(query, connect)

    detalle_full = [value[0] for value in result_values]

    #insert into detalle parte
    details_to_insert = []
    for value in detalle_full:
        cont=0
        for element in detalle_process:
            if element == value:
                cont=1
                break
        if cont==0:
            details_to_insert.append(value)

    for detail in details_to_insert:
        query = "insert into detalle_faltas_parte values ({}, {}, 0)".format(parte, detail)
        handler.insertToTable(query, connect)

    connect.closeConnectionDB()
    print("OK")
except:
    print("ERROR")
    pass    