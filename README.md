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
OPCIÓN: INDEX       URL: /api/clients                  METHOD: GET
OPCIÓN: SHOW        URL: /api/clients/{id}             METHOD: GET
OPCIÓN: SEARCH      URL: /api/clients/search/{value}   METHOD: GET
OPCIÓN: UPDATE      URL: /api/clients/update/{id}      METHOD: PUT
OPCIÓN: STORE       URL: /api/clients/create           METHOD: POST
OPCIÓN: DESTROY     URL: /api/clients/delete/{id}      METHOD: DELETE


```
