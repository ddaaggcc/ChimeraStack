import redis

def test_redis():
    try:
        r = redis.Redis(host='chimera-redis', port=6379, db=0)
        r.set('python-saludo', 'Hola desde Python en Redis!')
        value = r.get('python-saludo').decode('utf-8')
        print("Valor leído de Redis:", value)
    except Exception as e:
        print("Error con Redis:", e)

if __name__ == "__main__":
    test_redis()
