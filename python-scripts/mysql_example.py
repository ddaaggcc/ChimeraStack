import mysql.connector

def test_mysql():
    try:
        connection = mysql.connector.connect(
            host='chimera-mariadb',
            user='myuser',
            password='mypassword',
            database='mydatabase'
        )
        print("Conexión exitosa a MySQL desde Python!")
        cursor = connection.cursor()
        cursor.execute("SELECT NOW()")
        row = cursor.fetchone()
        print("Hora actual en MySQL:", row[0])
    except Exception as e:
        print("Error conectando a MySQL:", e)
    finally:
        if 'connection' in locals() and connection.is_connected():
            connection.close()

if __name__ == "__main__":
    test_mysql()
