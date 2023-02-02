## Api Clients With Laravel 9


## Project Setup

```sh
1) composer install
```

```sh
2) cp .env.example .env (configure params DB)
```

```sh
3) php artisan key:generate
```

```sh
4) php artisan migrate
```

```sh
5) php artisan serve o php artisan serve --port=xxxx (especificar puesto)
```

```
hearders {Accept:application/json}

---------------------
TABLA CLIENTS
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
