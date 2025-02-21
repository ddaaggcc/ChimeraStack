ARG PYTHON_VERSION=3.11
FROM python:${PYTHON_VERSION}

WORKDIR /app

COPY ./python-scripts/requirements.txt /app/requirements.txt
RUN pip install --no-cache-dir -r requirements.txt

# Copiamos los scripts, incluido app.py
COPY ./python-scripts /app

# Exponemos el puerto 5000
EXPOSE 5000

# Al arrancar el contenedor, ejecutamos Flask
CMD ["python", "app.py"]
