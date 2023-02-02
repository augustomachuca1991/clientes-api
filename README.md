# PHP + Laravel

# 1) composer install
# 2) cp .env.example .env (configure params DB)
# 3) php artisan key:generate
# 4) php artisan migrate --seed
# 5) php artisan serve


```

---------------------
CAMPOS TABLA CLIENTS
--------------------
nombres'
apellidos'
fechaDeNacimiento'
cuit'
domicilio'
telefono'
email

-------------------------------------------------------------------------------
RUTAS API
-------------------------------------------------------------------------------
OPCIÓN: INDEX       URL: 127.0.0.1:8000/api/clients                  METHOD: GET
OPCIÓN: SHOW        URL: 127.0.0.1:8000/api/clients/{id}             METHOD: GET
OPCIÓN: SEARCH      URL: 127.0.0.1:8000/api/clients/search/{value}   METHOD: GET
OPCIÓN: UPDATE      URL: 127.0.0.1:8000/api/clients/update/{id}      METHOD: PUT
OPCIÓN: STORE       URL: 127.0.0.1:8000/api/clients/create           METHOD: POST
OPCIÓN: DESTROY     URL: 127.0.0.1:8000/api/clients/create           METHOD: DELETE


```
