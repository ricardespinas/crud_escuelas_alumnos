@echo off
cls
echo ===========================================
echo 1. Bajando los contenedores...
echo ===========================================
docker-compose down
if errorlevel 1 (
    echo Error al bajar los contenedores.
    pause
    exit /b
)

echo ===========================================
echo 2. Construyendo la imagen sin cache...
echo ===========================================
docker-compose build --no-cache
if errorlevel 1 (
    echo Error al construir la imagen.
    pause
    exit /b
)

echo ===========================================
echo 3. Levantando los contenedores...
echo ===========================================
docker-compose up -d
if errorlevel 1 (
    echo Error al levantar los contenedores.
    pause
    exit /b
)

echo ===========================================
echo Todo listo. Contenedores corriendo.
echo ===========================================
