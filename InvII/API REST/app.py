#IMPORTS
from flask import Flask, jsonify, request
from flask_cors import CORS, cross_origin
import dataBase


app= Flask(__name__)
cors = CORS(app)

@app.route('/workers', methods=['GET'])
@cross_origin()
def getWorkers():
    nexo= dataBase.getWorkersData()#Objeto de la base de datos
    return jsonify(nexo)#devolvemos un Json pero primero lo transforma de manera correcta


@app.route('/deparments', methods=['GET'])
@cross_origin()
def getDeparments():
    nexo= dataBase.getDeparmentsData()#Objeto de la base de datos
    return jsonify(nexo)#devolvemos un Json pero primero lo transforma de manera correcta

if __name__=='__main__':
    print("API WORKING")
    app.run(debug=True, port=5000)
    