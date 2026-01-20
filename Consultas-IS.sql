-- A. Consultar el tamaño de los campos de texto
SELECT COLUMN_NAME, CHARACTER_MAXIMUM_LENGTH
FROM INFORMATION_SCHEMA.COLUMNS
WHERE TABLE_SCHEMA = 'videojuegos' 
    AND TABLE_NAME = 'juegos' 
    AND COLUMN_NAME = 'nombre';


-- B. Verificar si el ID es Auto_Increment
SELECT COLUMN_NAME, EXTRA
FROM INFORMATION_SCHEMA.COLUMNS
WHERE TABLE_SCHEMA = 'videojuegos' 
    AND TABLE_NAME = 'juegos' 
    AND COLUMN_NAME = 'idJuego';


-- C. Buscar tablas con nombres similares en el esquema
SELECT TABLE_NAME
FROM INFORMATION_SCHEMA.TABLES
WHERE TABLE_SCHEMA = 'videojuegos' 
    AND TABLE_NAME LIKE '%juego%';