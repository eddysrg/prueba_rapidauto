# 🏢 Gestión de Fuerza de Ventas (Lotes y Vendedores)

[![Laravel v10.x](https://img.shields.io/badge/Laravel-10.x-FF2D20?style=for-the-badge&logo=laravel)](https://laravel.com)
[![PHP v8.3+](https://img.shields.io/badge/PHP-8.3%2B-777BB4?style=for-the-badge&logo=php)](https://www.php.net)

## 📝 Descripción del Proyecto

Este proyecto implementa un sistema de gestión de la fuerza de ventas, permitiendo la administración de **Lotes (Sucursales)** y la gestión completa de **Vendedores**, incluyendo su importación desde una fuente externa (API JSONPlaceholder).

El desarrollo se centró en cumplir los requisitos funcionales con una arquitectura robusta, priorizando la **limpieza del código (Clean Code)** y la **integridad de los datos**.

---

## 🛠️ Decisiones de Arquitectura y Buenas Prácticas

Se aplicaron patrones de diseño y decisiones estratégicas para demostrar dominio del framework:

### 1. Autenticación Manual (Sin Starter Kits)
Se implementó todo el sistema de autenticación (`Login`, `Register`, `Logout`) utilizando directamente los Facades de `Auth` y `Session`. 
* **Motivo:** Demostrar comprensión profunda de cómo Laravel maneja la seguridad, sesiones y hashing de contraseñas sin depender de herramientas prefabricadas como Breeze o Jetstream.

### 2. Patrón Service (SOLID / SRP)
La lógica de consumo de la API externa y la sincronización de datos se extrajo del controlador hacia `App\Services\ImportSellersService`.
* **Beneficio:** Los controladores se mantienen delgados ("Skinny Controllers") y la lógica de negocio es reutilizable y fácil de probar.

### 3. Manejo de Datos Complejos (JSON Casting)
Para manejar la estructura anidada de la API externa (objetos `address` y `company`), se utilizó la funcionalidad de **Attribute Casting** de Eloquent (`array`).
* **Beneficio:** Permite almacenar objetos complejos en una base de datos relacional sin crear múltiples tablas innecesarias para datos que no requieren búsqueda indexada.

### 4. Integridad Referencial y Validaciones
* **Base de Datos:** Se configuró `onDelete('restrict')` en las migraciones. Un Lote no puede ser eliminado si tiene vendedores asignados.
* **Validación:** Uso estricto de `FormRequests` (`StoreLotRequest`, `UpdateSellerRequest`) para validar datos, incluyendo reglas de unicidad (`unique`) que ignoran el registro actual durante la edición.

---

## 💻 Requisitos del Sistema

* PHP 8.3+
* Composer
* MySQL / MariaDB / PostgreSQL

---

## 🚀 Instalación y Configuración

1.  **Clonar el repositorio:**
    ```bash
    git clone https://github.com/eddysrg/prueba_rapidauto.git
    cd nombre-del-proyecto
    ```

2.  **Instalar dependencias:**
    ```bash
    composer install
    ```

3.  **Configurar entorno:**
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```
    *Configura tus credenciales de base de datos en el archivo `.env`.*

4.  **Ejecutar migraciones:**
    ```bash
    php artisan migrate
    ```

5.  **Iniciar servidor:**
    ```bash
    php artisan serve
    ```

---

## 🔑 Guía de Uso (Flujo Principal)

1.  **Acceso:** Registra un usuario en `/register` e inicia sesión.
2.  **Gestión de Lotes:** Ve a `/lots`. Debes crear al menos una sucursal (Lote) para poder asignar vendedores.
3.  **Importación:**
    * Ve a `/sellers/import`.
    * Selecciona un Lote de destino.
    * El sistema consumirá la API externa y creará/actualizará los vendedores, asignándolos automáticamente al lote seleccionado.
4.  **Gestión de Vendedores:**
    * Desde el listado, puedes **Editar** los datos de un vendedor (cambiar su email, nombre o moverlo de Lote).
    * Puedes **Eliminar** un vendedor (Soft Delete no implementado, eliminación física).

---

## ✅ Estado de los Requisitos y Bonus

### Requisitos Esenciales
- [x] Gestión de Lotes (CRUD completo).
- [x] Importación de Vendedores desde API Externa.
- [x] Asignación obligatoria a un Lote.
- [x] Autenticación (Login/Registro).

### Bonus y Criterios Avanzados
- [x] **Arquitectura:** Separación de lógica (Service Pattern).
- [x] **Base de Datos:** Integridad referencial (Foreign Keys restringidas).
- [x] **Seguridad:** Validaciones robustas con FormRequests.
- [ ] **API Propia:** (Pendiente).
- [ ] **Rendimiento:** Caching (Pendiente).
- [ ] **Procesos:** Queues/Jobs (Pendiente).
- [ ] **Frontend:** Diseño con Tailwind CSS (Básico implementado).

---