-- Crear la base de datos
CREATE DATABASE registro_estudiantes;
USE registro_estudiantes;

-- Tabla principal de estudiantes
CREATE TABLE estudiantes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    apellido VARCHAR(100) NOT NULL,
    documento VARCHAR(20) UNIQUE NOT NULL,
    fecha_nacimiento DATE NOT NULL,
    edad INT,
    genero ENUM('Masculino','Femenino','Otro') NOT NULL,
    direccion VARCHAR(150),
    telefono VARCHAR(20),
    correo VARCHAR(100),
    curso_id INT,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabla de cursos o grados
CREATE TABLE cursos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre_curso VARCHAR(50) NOT NULL,
    descripcion VARCHAR(200)
);

-- Tabla de docentes
CREATE TABLE docentes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    apellido VARCHAR(100) NOT NULL,
    documento VARCHAR(20) UNIQUE NOT NULL,
    telefono VARCHAR(20),
    correo VARCHAR(100),
    especialidad VARCHAR(100)
);

-- Relación cursos-docentes (un curso puede tener un docente principal)
ALTER TABLE cursos
ADD COLUMN docente_id INT,
ADD FOREIGN KEY (docente_id) REFERENCES docentes(id);

-- Tabla de asignaturas
CREATE TABLE asignaturas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre_asignatura VARCHAR(100) NOT NULL,
    descripcion VARCHAR(200),
    curso_id INT,
    FOREIGN KEY (curso_id) REFERENCES cursos(id)
);

-- Tabla de matrículas (relaciona estudiante con curso y asignaturas)
CREATE TABLE matriculas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    estudiante_id INT,
    curso_id INT,
    fecha_matricula DATE,
    FOREIGN KEY (estudiante_id) REFERENCES estudiantes(id),
    FOREIGN KEY (curso_id) REFERENCES cursos(id)
);

-- Tabla de calificaciones
CREATE TABLE calificaciones (
    id INT AUTO_INCREMENT PRIMARY KEY,
    estudiante_id INT,
    asignatura_id INT,
    nota DECIMAL(4,2),
    periodo ENUM('1','2','3','4') NOT NULL,
    FOREIGN KEY (estudiante_id) REFERENCES estudiantes(id),
    FOREIGN KEY (asignatura_id) REFERENCES asignaturas(id)
);

-- Tabla de asistencia
CREATE TABLE asistencias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    estudiante_id INT,
    fecha DATE,
    estado ENUM('Presente','Ausente','Tarde','Justificado') NOT NULL,
    FOREIGN KEY (estudiante_id) REFERENCES estudiantes(id)
);
