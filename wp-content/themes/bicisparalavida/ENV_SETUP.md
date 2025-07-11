# Configuración de Variables de Entorno

## Instalación de Dependencias

Primero, instala las nuevas dependencias:

```bash
composer install
```

## Configuración del Archivo .env

1. Crea un archivo `.env` en la raíz del tema:

```bash
touch .env
```

2. Agrega las siguientes variables al archivo `.env`:

```env
# Configuración de APIs
BREVO_API_KEY=tu_api_key_de_brevo_aqui

# Otras configuraciones que puedas necesitar
# DB_HOST=localhost
# DB_NAME=database_name
```

3. **Importante**: Asegúrate de que el archivo `.env` esté en tu `.gitignore` para no subir las credenciales al repositorio:

```gitignore
.env
```

## Configuración Alternativa (WordPress Constants)

Si prefieres usar constantes de WordPress, puedes definir la API key en tu `wp-config.php`:

```php
define('BREVO_API_KEY', 'tu_api_key_de_brevo_aqui');
```

Y luego modificar el código para usar:

```php
$brevoApiKey = defined('BREVO_API_KEY') ? BREVO_API_KEY : '';
```

## Seguridad

- Nunca subas archivos `.env` al repositorio
- Rota las API keys regularmente
- Usa diferentes keys para desarrollo y producción
