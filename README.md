# API REST Laravel 11 - Tienda de Ropa

API REST desarrollada con Laravel 11, JWT para autenticación y MySQL como base de datos.

---

## Requisitos

- PHP 8.2+
- Composer
- MySQL

---

## Instalación local

```bash
# Clonar el repositorio
git clone https://github.com/edgarfpllefia/codespaces-laravel
cd tu-repo

# Instalar dependencias
composer install

# Copiar el fichero de entorno
cp .env.example .env

# Generar la clave de la aplicación
php artisan key:generate

# Generar el secret JWT
php artisan jwt:secret
```

### Configurar el fichero `.env`

```dotenv
DB_CONNECTION=mysql
DB_HOST=tu-host
DB_PORT=3306
DB_DATABASE=tu-database
DB_USERNAME=tu-usuario
DB_PASSWORD=tu-contraseña
```

### Ejecutar migraciones y seeders

```bash
php artisan migrate:fresh --seed
```

### Arrancar el servidor

```bash
php artisan serve
```

La API estará disponible en `http://localhost:8000`

---

## URL de producción (Railway)

```
https://codespaces-laravel-production-d065.up.railway.app
```

---

## Autenticación

La API utiliza JWT. Para acceder a las rutas protegidas hay que incluir el token en la cabecera:

```
Authorization: Bearer <token>
```

---

## Endpoints

### Autenticación (públicos)

| Método | Ruta            | Descripción                     |
| ------ | --------------- | ------------------------------- |
| POST   | `/api/register` | Registro de usuario             |
| POST   | `/api/login`    | Login y obtención del token JWT |

### Usuario autenticado

| Método | Ruta          | Descripción                     |
| ------ | ------------- | ------------------------------- |
| GET    | `/api/me`     | Datos del usuario autenticado   |
| POST   | `/api/logout` | Cerrar sesión e invalidar token |

### Categorías (públicas)

| Método | Ruta                            | Descripción                         |
| ------ | ------------------------------- | ----------------------------------- |
| GET    | `/api/categories`               | Listar todas las categorías         |
| GET    | `/api/categories/{id}`          | Obtener categoría por ID            |
| GET    | `/api/categories/{id}/products` | Obtener categoría con sus productos |

### Categorías (solo admin)

| Método | Ruta                   | Descripción          |
| ------ | ---------------------- | -------------------- |
| POST   | `/api/categories`      | Crear categoría      |
| PUT    | `/api/categories/{id}` | Actualizar categoría |
| DELETE | `/api/categories/{id}` | Eliminar categoría   |

### Productos (públicos)

| Método | Ruta                                  | Descripción                               |
| ------ | ------------------------------------- | ----------------------------------------- |
| GET    | `/api/products`                       | Listar todos los productos                |
| GET    | `/api/products/{id}`                  | Obtener producto por ID                   |
| GET    | `/api/products/category/{categoryId}` | Obtener productos filtrados por categoría |

### Productos (solo admin)

| Método | Ruta                 | Descripción         |
| ------ | -------------------- | ------------------- |
| POST   | `/api/products`      | Crear producto      |
| PUT    | `/api/products/{id}` | Actualizar producto |
| DELETE | `/api/products/{id}` | Eliminar producto   |

---

## Ejemplos de peticiones (Postman)

### Registro

```json
POST /api/register
{
    "name": "Edgar",
    "email": "edgar@gmail.com",
    "password": "12345678",
    "password_confirmation": "12345678"
}
```

### Login

```json
POST /api/login
{
    "email": "edgar@gmail.com",
    "password": "12345678"
}
```

### Crear producto (requiere token admin)

```json
POST /api/products
Authorization: Bearer <token>

{
    "name": "Camiseta básica",
    "description": "Tejido 100% algodón",
    "price": 19.99,
    "stock": 50,
    "size": "M",
    "color": "Blanco",
    "category_id": 1
}
```

---

## Roles de usuario

- `user` — acceso a rutas públicas y `/me`, `/logout`
- `admin` — acceso total, incluido CRUD de categorías y productos

Los usuarios nuevos se registran siempre como `user`. Para crear un admin, modificar directamente en la base de datos o mediante seeder.

Para esta prueba "SE QUE NO ES CORRECTO" puedes crear role: "admin" desde el POST en el /register. Para así poder hacer pruebas.

---

## Tecnologías

- Laravel 11
- JWT Auth (tymon/jwt-auth)
- MySQL (AlwaysData)
- Railway (despliegue)
