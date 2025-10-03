from datetime import datetime
from flask import Flask, jsonify, request
from pymongo import MongoClient
app = Flask(__name__)
client = MongoClient('mongodb://Localhost:27017/')
db = client["microservicio_gestion_clases"]
clases_collection = db["clases"]

@app.route('/mostrar_clases', methods = ['GET'])
def mostrar_clases():
    clases = list(clases_collection.find({},  {"_id": 0}))
    return jsonify(clases), 200

@app.route('/agregar_clase', methods = ['POST'])
def agregar_clase():
    data = request.get_json()
    result = clases_collection.insert_one({
        "id": int(data["id"]),
        "fecha": datetime.strptime(data["fecha"], "%Y-%m-%d"),
        "hora": data["hora"],
        "instructor": data["instructor"],
        "duracion en horas": float(data["duracion"]),
        "cupos": int(data["cupos"]),
    })
    if result.inserted_id is None:
        return jsonify({"message": "No se pudo agregar la clase"}), 500
    else:
        return jsonify({"message": "La clase se agrego correctamente"}), 201

@app.route('/modificar_clase/<int:id>', methods = ['PUT'])
def modificar_clase(id):
    data = request.get_json()
    result = clases_collection.update_one({"id": id}, 
    {"$set":{
        "fecha": datetime.strptime(data["fecha"], "%Y-%m-%d"),
        "hora": data["hora"],
        "instructor": data["instructor"],
        "duracion en horas": float(data["duracion"]),
        "cupos": int(data["cupos"]),
    }})
    if result.modified_count > 0:
        return jsonify({"message": "La clase se modifico correctamente"}), 200
    else:
        return jsonify({"message": "No se pudo modificar la clase"}), 404

@app.route('/eliminar_clase/<int:id>', methods=['DELETE'])
def eliminar_clase(id):
    result = clases_collection.delete_one({"id": id})
    if result.deleted_count > 0:
        return jsonify({"message": "La clase se elimino correctamente"}), 200
    else:
        return jsonify({"message": "La clase no se logro eliminar"}), 404
    
@app.route('/buscar_fecha/<string:fecha>', methods=['GET'])
def buscar_fecha(fecha):
    fecha_dt = datetime.strptime(fecha, "%Y-%m-%d")

    clases = list(clases_collection.find(
        {"fecha": fecha_dt},
        {"_id": 0}
    ))

    if clases:
        return jsonify(clases), 200
    else:
        return jsonify({"message": "No se encontraron clases en esa fecha"}), 404
    
@app.route('/buscar_instructor/<string:instructor>', methods = ['GET'])
def buscar_instructor(instructor):
    clases = list(clases_collection.find(
    { "instructor": instructor},
    {"_id": 0}
    ))

    if clases:
        return jsonify(clases), 200
    else:
        return jsonify({"message": "No se encontraron clases con este instructor"}), 404


if __name__ == '__main__':
    app.run(debug=True, port=5001)