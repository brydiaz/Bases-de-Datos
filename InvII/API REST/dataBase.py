import pymongo
from pymongo import MongoClient

#Metodo de conexion, cuenta con dos modos
def conection(mode):
    con = MongoClient('localhost',27017)
    db = con.InvII
    if (mode==1):
        conexion= db.deparment
        print("Conexion Exitosa con Departamento")
        return conexion
    elif(mode==2):
        conexion=db.worker
        print("Conexion Exitosa con Trabajadores")
        return conexion
    else:            
        print("Error en la base de datos")

#Consigue los datos de los departamentos de la base, devuelve un json con los objetos
def getDeparmentsData():
    deparments= conection(1)
    jsonList=[]
    for x in deparments.find({},{ "_id":0}):
        jsonList.append(x)
    return jsonList

#Inserta un departamento a la base
def insertDeparment(deparmentToInsert):
    deparments= conection(1)
    deparments.insert_one(deparmentToInsert);

#Borra un departamento de la base
def deleteDeparment(key, value):
    deparments= conection(1)
    myquery = { key : value}
    deparments.delete_one(myquery)

#Actualiza un departamento de la base, pero solo la llave y valor por ves
def actDeparment(key, value, newValue):
    workers= conection(2)
    workerToUpdate={ key: value }
    newvalues = {"$set" : {key: newValue}}
    workers.update_one(workerToUpdate, newvalues)


#Consigue los datos de los trabajadores de la base, devuelve un json con los objetos
def getWorkersData():
    workers= conection(2)
    jsonList=[]
    for x in workers.find({},{ "_id":0}):
        jsonList.append(x)
    return jsonList

#Inserta un trabajador a la base
def insertWorker(workerToInsert):
    workers= conection(2)
    workers.insert_one(workerToInsert);

#Borra un trabajador de la base
def deleteWorker(key, value):
    workers= conection(2)
    myquery = { key : value}
    workers.delete_one(myquery)

#Actualiza un trabajador de la base, pero solo la llave y valor por ves
def actWorker(key, value, newValue):
    workers= conection(2)
    workerToUpdate={ key: value }
    newvalues = {"$set" : {key: newValue}}
    workers.update_one(workerToUpdate, newvalues)

