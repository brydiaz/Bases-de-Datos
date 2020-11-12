#IMPORTS
from flask import Flask, jsonify, request
from flask_cors import CORS, cross_origin
import dataBase


app= Flask(__name__)
cors = CORS(app)

@app.route('/workers', methods=['GET'])
def getWorkers():
    nexo= dataBase.getWorkersData()#Objeto de la base de datos
    return jsonify(nexo)#devolvemos un Json pero primero lo transforma de manera correcta


@app.route('/deparments', methods=['GET'])
@cross_origin()
def getDeparments():
    nexo= dataBase.getDeparmentsData()#Objeto de la base de datos
    return jsonify(nexo)#devolvemos un Json pero primero lo transforma de manera correcta

@app.route('/deparments', methods=['POST'])
def insertDeparments():
    newDeparment={
        "idDeparment": request.json['idDeparment'],
        "deparmentName" : request.json['deparmentName'],
        "workersID" : request.json['workersID']
    }
    nexo= dataBase.insertDeparment(newDeparment)

@app.route('/workers', methods=['POST'])
def insertWorkers():
    deparments= dataBase.conection(1)
    myquery = { "deparmentName": request.json['nameDeparmentFk'] }
    deparment= deparments.find_one(myquery, {"_id":0, "idDeparment":1})
    newDeparment={
        "idWorker": request.json['idWorker'],
        "lastNameWorker" : request.json['lastNameWorker'],
        "nameWorker" : request.json['nameWorker'],
        "dateOfAdmisionWorker" : request.json['dateOfAdmisionWorker'],
        "idDeparmentFk" : deparment['idDeparment'],
        "nameDeparmentFk" : request.json['nameDeparmentFk']
    }
    print(newDeparment)
    nexo= dataBase.insertWorker(newDeparment)

@app.route('/workers', methods=['DELETE'])
def deleteWorker():
    idWorker = request.json['idWorker']
    nexo = dataBase.deleteWorker("idWorker", int(idWorker))

@app.route('/deparments', methods=['DELETE'])
def deleteDeparment():
    idDeparment = request.json['idDeparment']
    nexo = dataBase.deleteDeparment("idDeparment", int(idDeparment))

@app.route('/workers', methods=['PUT'])
def editWorker():
    deparments= dataBase.conection(1)
    myquery = { "deparmentName": request.json['nameDeparmentFk'] }
    deparment= deparments.find_one(myquery, {"_id":0, "idDeparment":1})
    newDeparment={
        "lastNameWorker" : request.json['lastNameWorker'],
        "nameWorker" : request.json['nameWorker'],
        "dateOfAdmisionWorker" : request.json['dateOfAdmisionWorker'],
        "idDeparmentFk" : deparment['idDeparment'],
        "nameDeparmentFk" : request.json['nameDeparmentFk']
    }
    nexo= dataBase.actWorker(int(request.json['idWorker']),newDeparment)

@app.route('/deparments', methods=['PUT'])
def editDeparment():
    newDeparment={
        "deparmentName" : request.json['deparmentName'],
    }
    nexo= dataBase.actDeparment(int( request.json['idDeparment']), newDeparment)

if __name__=='__main__':
    print("API WORKING")
    app.run(debug=True, port=5000)
    