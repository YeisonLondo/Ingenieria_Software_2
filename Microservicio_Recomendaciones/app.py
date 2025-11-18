from flask import Flask, jsonify, request
from pymongo import MongoClient
import os

app = Flask(__name__)

MONGO_HOST = os.getenv("MONGO_HOST", "mongo_recomendaciones")
MONGO_PORT = int(os.getenv("MONGO_PORT", 27017))
MONGO_DB = os.getenv("MONGO_DB", "microservicio_recomendaciones")


client = MongoClient(f"mongodb://{MONGO_HOST}:{MONGO_PORT}/")
db = client[MONGO_DB]
recomendaciones_collection = db["recomendaciones"]

@app.route('/agregar_recomendacion', methods=['POST'])
def crear_recomendacion():
    data = request.get_json()
    result = recomendaciones_collection.insert_one({
        "imc_min": float(data["imc_min"]),
        "imc_max": float(data["imc_max"]),
        "categoria": data["categoria"],
        "recomendacion": data["recomendacion"]
    })
    if result.inserted_id:
        return jsonify({"message": "Recomendación agregada exitosamente"}), 201
    else:
        return jsonify({"message": "No se pudo agregar la recomendación"}), 500

@app.route('/recomendar', methods=['POST'])
def recomendar():
    data = request.get_json()
    peso = float(data["peso"])
    altura = float(data["altura"])

    if altura <= 0 or peso <= 0:
        return jsonify({"error": "Altura o peso no válido"}), 400

    imc = peso / (altura * altura)

    regla = recomendaciones_collection.find_one({
        "imc_min": {"$lte": imc},
        "imc_max": {"$gte": imc}
    })

    if not regla:
        return jsonify({"message": "No existe una recomendación para este IMC"}), 404

    return jsonify({
        "imc": round(imc, 2),
        "categoria": regla["categoria"],
        "recomendacion": regla["recomendacion"]
    })

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5003, debug=True)
