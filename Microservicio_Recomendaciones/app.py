from flask import Flask, jsonify, request
from pymongo import MongoClient

app = Flask(__name__)
client= MongoClient("mongodb://localhost:27017/")
db = client["microservicio_recomendaciones"]
recomendaciones_collection = db["recomendaciones"]

@app.route('/agregar_recomendacion', methods = ['POST'])
def crear_recomendacion():
    data = request.get_json()
    result = recomendaciones_collection.insert_one({
        "imc_min": float(data["imc_min"]),
        "imc_max": float(data["imc_max"]),
        "categoria": data["categoria"],
        "recomendacion": data["recomendacion"]
    })
    if result.inserted_id is None:
        return jsonify({"message": "No se pudo agregar la recomendacion"}), 500
    else:
        return jsonify({"message": "Recomendacion agregada exitosamente"}), 201

@app.route('/recomendar', methods = ['POST'])
def recomendar():
    data = request.get_json()
    peso = float(data["peso"])
    altura = float(data["altura"])

    if (altura <=0 or peso <=0):
        return jsonify({"error": "Altura o Peso no valido"}), 400
    
    imc = peso/(altura * altura)
    
    regla = recomendaciones_collection.find_one({
        "imc_min": {"$lte": imc},
        "imc_max": {"$gte": imc}
    })

    if not regla:
        return jsonify({"message": "No existe una recomendacion para este IMC"}), 404
    
    return jsonify({
        "imc": round(imc,2),
        "categoria": regla["categoria"],
        "recomendacion": regla["recomendacion"]
    })

if __name__ == '__main__':
    app.run(debug=True, port=5001)