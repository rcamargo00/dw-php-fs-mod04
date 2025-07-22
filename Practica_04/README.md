# Desarrollo de un Servicio Web RESTful con Laravel
by rcamargo

## 1. Modelado y Creación de la Base de Datos
Primero, necesitamos una base de datos. Asumo que ya tienes MySQL instalado y funcionando.

Crear la Base de Datos:

Puedes crear la base de datos directamente desde tu gestor de MySQL (por ejemplo, phpMyAdmin, MySQL Workbench) o desde la terminal:

```SQL

CREATE DATABASE mi_aplicacion_api;
```
Configuración de la Conexión en Laravel:

En tu proyecto Laravel, abre el archivo .env en la raíz de tu proyecto y configura las credenciales de tu base de datos. Asegúrate de que DB_DATABASE coincida con el nombre que le diste a tu base de datos (mi_aplicacion_api en este ejemplo).

Fragmento de código
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=mi_aplicacion_api
DB_USERNAME=root # Tu usuario de MySQL
DB_PASSWORD=      # Tu contraseña de MySQL
```
Definir la Tabla (Migración de Laravel):

Laravel utiliza migraciones para gestionar el esquema de la base de datos. Esto es mucho mejor que crear la tabla manualmente, ya que te permite controlar versiones y compartir el esquema fácilmente.

Para crear una migración, ejecuta el siguiente comando en tu terminal dentro del directorio de tu proyecto Laravel:

```Bash

php artisan make:migration create_productos_table
```
Esto creará un archivo en database/migrations con un nombre similar a 
2023_07_21_xxxxxx_create_productos_table.php. Abre este archivo y modifica el método up() para definir la estructura de tu tabla. En este ejemplo, usaré una tabla llamada productos con 4 campos adicionales: nombre, descripcion, precio y stock.

```PHP

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id(); // id automático
            $table->string('nombre');
            $table->text('descripcion')->nullable();
            $table->decimal('precio', 8, 2);
            $table->integer('stock');
            $table->timestamps(); // created_at y updated_at automáticos
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
```
Finalmente, ejecuta la migración para crear la tabla en tu base de datos:

```Bash

php artisan migrate
```
## 2. Generación del Recurso en Laravel
Ahora crearemos el Modelo y el Controlador para nuestra tabla productos.

Crear el Modelo:

El modelo es la representación de tu tabla en Laravel y te permite interactuar con la base de datos de manera orientada a objetos.

Bash

php artisan make:model Producto
Esto creará un archivo app/Models/Producto.php. Dentro de este archivo, puedes especificar los campos que se pueden asignar masivamente (fillable) y aquellos que deben estar protegidos (guarded). Para este ejemplo, permitiremos la asignación masiva para todos los campos, excepto el id y los timestamps.

```PHP

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'stock',
    ];
}
```
Implementar el Controlador:

El controlador manejará las peticiones HTTP y la lógica de negocio. Utilizaremos un Resource Controller de Laravel, que genera automáticamente métodos para las operaciones CRUD (Index, Store, Show, Update, Destroy).

```Bash

php artisan make:controller ProductoController --api
```
La opción --api es crucial, ya que genera un controlador optimizado para APIs, sin los métodos de vista que no necesitamos para un backend.

Abre el archivo app/Http/Controllers/ProductoController.php y verás los métodos predefinidos. Vamos a implementar la lógica para cada uno:

```PHP

<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::all();
        return response()->json($productos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        $producto = Producto::create($request->all());
        return response()->json($producto, Response::HTTP_CREATED); // 201 Created
    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        return response()->json($producto);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'nombre' => 'sometimes|required|string|max:255',
            'precio' => 'sometimes|required|numeric|min:0',
            'stock' => 'sometimes|required|integer|min:0',
        ]);

        $producto->update($request->all());
        return response()->json($producto);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT); // 204 No Content
    }
}
```
## 3. Configuración de Rutas API
Las rutas para tu API se definen en el archivo routes/api.php. Laravel tiene un método apiResource que crea automáticamente las 7 rutas RESTful estándar para un recurso.

Abre routes/api.php y añade la siguiente línea:

```PHP

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController; // Importa el controlador


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('productos', ProductoController::class);
```
Para ver las rutas registradas, puedes ejecutar el siguiente comando en tu terminal:

```Bash

php artisan route:list --path=api
```
Esto te mostrará una tabla con todas las rutas de la API, incluyendo sus verbos HTTP, URIs y los métodos del controlador a los que apuntan.

## 4. Pruebas del Servicio Web
Ahora es el momento de probar tu API utilizando una herramienta como Postman o Insomnia. Necesitarás tener tu servidor Laravel corriendo.

```Bash

php artisan serve
```

Esto iniciará el servidor de desarrollo de Laravel, generalmente en http://127.0.0.1:8000. Todas tus rutas API tendrán el prefijo /api/. Por lo tanto, tus endpoints serán http://127.0.0.1:8000/api/productos y http://127.0.0.1:8000/api/productos/{id}.

Aquí te muestro cómo probar cada método CRUD:

### a) Crear (POST) - http://127.0.0.1:8000/api/productos
    Método: POST

    Headers:

    Content-Type: application/json

    Accept: application/json

    Body (raw JSON):

    ```JSON

    {
        "nombre": "Laptop Gamer",
        "descripcion": "Potente laptop para juegos de última generación.",
        "precio": 1200.00,
        "stock": 50
    }
    ```
    Respuesta esperada (Status 201 Created):

    ```JSON

    {
        "nombre": "Laptop Gamer",
        "descripcion": "Potente laptop para juegos de última generación.",
        "precio": "1200.00",
        "stock": 50,
        "updated_at": "2025-07-21T16:00:00.000000Z",
        "created_at": "2025-07-21T16:00:00.000000Z",
        "id": 1
    }
    ```

### b) Leer todos (GET) - http://127.0.0.1:8000/api/productos
    Método: GET

    Headers:

    Accept: application/json

    Respuesta esperada (Status 200 OK):

    ```JSON

    [
        {
            "id": 1,
            "nombre": "Laptop Gamer",
            "descripcion": "Potente laptop para juegos de última generación.",
            "precio": "1200.00",
            "stock": 50,
            "created_at": "2025-07-21T16:00:00.000000Z",
            "updated_at": "2025-07-21T16:00:00.000000Z"
        }
    ]
    ```
    

### c) Leer uno (GET) - http://127.0.0.1:8000/api/productos/1 (usando el ID del producto creado)
    Método: GET

    Headers:

    Accept: application/json

    Respuesta esperada (Status 200 OK):

    ```JSON

    {
        "id": 1,
        "nombre": "Laptop Gamer",
        "descripcion": "Potente laptop para juegos de última generación.",
        "precio": "1200.00",
        "stock": 50,
        "created_at": "2025-07-21T16:00:00.000000Z",
        "updated_at": "2025-07-21T16:00:00.000000Z"
    }
    ```

### d) Actualizar (PUT/PATCH) - http://127.0.0.1:8000/api/productos/1
    Método: PUT (para reemplazar completamente el recurso) o PATCH (para actualizar parcialmente). El controlador de recursos de Laravel soporta ambos. Usaremos PUT para este ejemplo.

    Headers:

    Content-Type: application/json

    Accept: application/json

    Body (raw JSON):

    ```JSON

    {
        "nombre": "Laptop Gamer Pro",
        "descripcion": "Versión mejorada de la laptop para juegos.",
        "precio": 1500.00,
        "stock": 45
    }
    ```
    Respuesta esperada (Status 200 OK):

    ```JSON

    {
        "id": 1,
        "nombre": "Laptop Gamer Pro",
        "descripcion": "Versión mejorada de la laptop para juegos.",
        "precio": "1500.00",
        "stock": 45,
        "created_at": "2025-07-21T16:00:00.000000Z",
        "updated_at": "2025-07-21T16:00:00.000000Z"
    }
    ```
    

### e) Eliminar (DELETE) - http://127.0.0.1:8000/api/productos/1
    Método: DELETE

    Headers:

    Accept: application/json

    Respuesta esperada (Status 204 No Content):

    No hay cuerpo de respuesta en un 204.

