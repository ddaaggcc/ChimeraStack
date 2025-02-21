# python-scripts/app.py
from flask import Flask, request, jsonify

app = Flask(__name__)

@app.route("/")
def home():
    return "Hola desde el contenedor de Python con Flask!"

@app.route("/sumar")
def sumar():
    a = request.args.get("a", default=0, type=int)
    b = request.args.get("b", default=0, type=int)
    resultado = a + b
    return jsonify({"resultado": resultado})

if __name__ == "__main__":
    # Flask escuchando en el puerto 5000
    app.run(host="0.0.0.0", port=5000)
