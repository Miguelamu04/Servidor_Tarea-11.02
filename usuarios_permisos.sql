-- =====================================================
-- CREACIÓN DE USUARIOS PARA EL PROYECTO
-- Base de datos: deportes
-- =====================================================

-- -----------------------------------------------------
-- USUARIO ADMINISTRADOR
-- -----------------------------------------------------
-- Este usuario se utilizará para tareas de administración
-- como inserciones, modificaciones y borrados.
-- Tiene control total sobre la base de datos del proyecto.
-- -----------------------------------------------------

CREATE USER 'admin_deportes'@'localhost'
IDENTIFIED BY 'admin123';

-- Se conceden TODOS los permisos sobre la base de datos
-- porque el administrador debe poder gestionar usuarios,
-- deportes e inscripciones sin restricciones.
GRANT ALL PRIVILEGES
ON deportes.*
TO 'admin_deportes'@'localhost';

-- -----------------------------------------------------
-- USUARIO APLICACIÓN (USUARIO NORMAL)
-- -----------------------------------------------------
-- Este usuario es el que utilizaría la aplicación web.
-- Solo necesita permisos básicos para consultar datos
-- e insertar registros (registro e inscripciones).
-- -----------------------------------------------------

CREATE USER 'app_deportes'@'localhost'
IDENTIFIED BY 'app123';

-- Permisos de lectura para consultar usuarios y deportes
GRANT SELECT
ON deportes.*
TO 'app_deportes'@'localhost';

-- Permisos de inserción para permitir:
-- - registro de usuarios
-- - inscripción en deportes
GRANT INSERT
ON deportes.*
TO 'app_deportes'@'localhost';

-- Permisos de actualización para permitir:
-- - cambios de datos básicos si fuese necesario
GRANT UPDATE
ON deportes.*
TO 'app_deportes'@'localhost';

-- -----------------------------------------------------
-- APLICAR LOS CAMBIOS DE PERMISOS
-- -----------------------------------------------------
FLUSH PRIVILEGES;
