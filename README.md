📌 DIRECTORIO_CMS

DIRECTORIO_CMS es un sistema de gestión de contenido (CMS) diseñado para organizar y administrar grupos de WhatsApp y más. Permite a los usuarios crear, editar y visualizar grupos categorizados de manera eficiente.

🚀 Características

✅ Crear y gestionar grupos de WhatsApp fácilmente.✅ Organizar grupos con etiquetas y categorías.✅ Subir imágenes personalizadas para cada grupo.✅ Interfaz moderna, amigable y completamente responsiva.

📋 Requisitos

🔹 PHP 7.4 o superior

🔹 MySQL
🔹 Servidor web (Apache recomendado)
🔹 Extensiones de PHP necesarias:
      extension=gd
      extension=mysqli  

🔧 Instalación

1️⃣ Clonar el repositorio en tu servidor local:

git clone https://github.com/tu-usuario/DIRECTORIO_CMS.git

2️⃣ Acceder al directorio del proyecto:

cd DIRECTORIO_CMS

3️⃣ Configurar el servidor web para apuntar al directorio DIRECTORIO_CMS.

4️⃣ Crear la base de datos y ejecutar el script SQL proporcionado en database.sql:

CREATE DATABASE nombre_de_tu_base_de_datos;
USE nombre_de_tu_base_de_datos;
-- Ejecuta el contenido del archivo database.sql

5️⃣ Configurar la conexión a la base de datos en config.php:

<?php
$servername = "localhost";
$username = "tu_usuario";
$password = "tu_contraseña";
$dbname = "nombre_de_tu_base_de_datos";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>

6️⃣ Reiniciar el servidor web para aplicar los cambios.

PARA EL LOGIN ES  admin - 123456

🎯 Uso

1️⃣ Abre tu navegador web y accede a la aplicación.2️⃣ Usa la interfaz para crear y gestionar grupos de WhatsApp.3️⃣ Sube imágenes y organiza los grupos según las categorías disponibles.

📂 Estructura del Proyecto

📌 index.php - Punto de entrada principal de la aplicación.
📌 config.php - Configuración de la base de datos.
📂 controlador/ - Contiene los controladores de la aplicación.
📂 modelos/ - Contiene los modelos de la aplicación.
📂 vistas/ - Contiene las vistas de la aplicación.
📂 modulos/ - Contiene los módulos específicos de la vista.
📂 admin/ - Archivos de administración y gestión de imágenes.

[![panel.jpg](https://i.postimg.cc/BQhz62Br/panel.jpg)](https://postimg.cc/bstgVDMg)
[![cms-grupos.jpg](https://i.postimg.cc/ZqNsV2zm/cms-grupos.jpg)](https://postimg.cc/1g9KzWz7)
