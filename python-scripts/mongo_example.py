import pymongo

def test_mongo():
    try:
        client = pymongo.MongoClient("mongodb://chimera-mongodb:27017")
        db = client["testdb"]
        collection = db["testcollection"]
        doc = {"nombre": "Diego", "mensaje": "Hola desde Python y MongoDB!"}
        result = collection.insert_one(doc)
        print("Documento insertado con _id:", result.inserted_id)

        found = collection.find_one({"nombre": "Diego"})
        print("Documento encontrado:", found)
    except Exception as e:
        print("Error con MongoDB:", e)

if __name__ == "__main__":
    test_mongo()
