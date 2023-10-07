<?php

require 'flight/Flight.php';

Flight::register('db', 'PDO', array('mysql:host=localhost;dbname=universidad_db','root','root'));

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
$method = $_SERVER['REQUEST_METHOD'];
if($method == "OPTIONS") {
    die();
}


// CRUD Estudios

// Obtener todo el listado de Estudios
Flight::route('GET /estudios', function () {
    $sentencia = Flight::db()->prepare("SELECT * FROM `Estudio`");
    $sentencia->execute();
    $datos=$sentencia->fetchAll();
    Flight::json($datos);
});

// Crear Estudio
Flight::route('POST /estudios', function () {
    $nombre=(Flight::request()->data->nombre);

    $sql="INSERT INTO Estudio (nombre) VALUES(?)";
    $sentencia=Flight::db()->prepare($sql);
    $sentencia->bindParam(1,$nombre);
    $sentencia->execute();

    Flight::jsonp(["Nuevo Estudio Agregado"]);
});

// Borrar Estudio
Flight::route('DELETE /estudios', function () {
    $id=(Flight::request()->data->id);

    $sql="DELETE FROM Estudio WHERE id=?";
    $sentencia=Flight::db()->prepare($sql);
    $sentencia->bindParam(1,$id);
    $sentencia->execute();

    Flight::jsonp(["Estudio Borrado"]);
});

// Actualizar Estudio
Flight::route('PUT /estudios', function () {
    $nombre=(Flight::request()->data->nombre);

    $sql="UPDATE Estudio SET nombre=? WHERE id=?";
    $sentencia=Flight::db()->prepare($sql);
    $sentencia->bindParam(1,$nombre);
    $sentencia->bindParam(2,$id);
    $sentencia->execute();

    Flight::jsonp(["Estudio Actualizado"]);
});

// CRUD Profesores

// Obtener todo el listado de Profesores
Flight::route('GET /profesores', function () {
    $sentencia=Flight::db()->prepare("SELECT * FROM `Profesor`");
    $sentencia->execute();
    $datos=$sentencia->fetchAll();
    Flight::json($datos);
});

// Crear Profesor
Flight::route('POST /profesores', function () {
    //$id=(Flight::request()->data->id);
    $nombre=(Flight::request()->data->nombre);
    //print_r($nombre);
    $sql="INSERT INTO Profesor (nombre) VALUES(?)";
    $sentencia=Flight::db()->prepare($sql);
    //$sentencia->bindParam(1,$id);
    $sentencia->bindParam(1,$nombre);
    $sentencia->execute();

    Flight::jsonp(["Nuevo Profesor Agregado"]);
});

// Borrar Profesor
Flight::route('DELETE /profesores', function () {
    $id=(Flight::request()->data->id);

    $sql="DELETE FROM Profesor WHERE id=?";
    $sentencia=Flight::db()->prepare($sql);
    $sentencia->bindParam(1,$id);
    $sentencia->execute();

    Flight::jsonp(["Profesor Borrado"]);
});

// Actualizar Profesor
Flight::route('PUT /profesores', function () {
    $nombre=(Flight::request()->data->nombre);

    $sql="UPDATE Profesor SET nombre=? WHERE id=?";
    $sentencia=Flight::db()->prepare($sql);
    $sentencia->bindParam(1,$nombre);
    $sentencia->bindParam(2,$id);
    $sentencia->execute();

    Flight::jsonp(["Profesor Actualizado"]);
});


// CRUD Asignatura

// Obtener todo el listado de Asignaturas
Flight::route('GET /asignaturas', function () {
    $sentencia = Flight::db()->prepare("SELECT * FROM `Asignatura`");
    $sentencia->execute();
    $datos=$sentencia->fetchAll();
    Flight::json($datos);
});

// Obtener las asignaturas de un Estudio
Flight::route('GET /asignaturas/@idEstudio', function ($idEstudio) {
    $sentencia=Flight::db()->prepare("SELECT * FROM `Asignatura` where idEstudio=?");
    $sentencia->bindParam(1,$idEstudio);
    $sentencia->execute();
    $datos=$sentencia->fetchAll();
    Flight::json($datos);
});

// Crear Asignatura
Flight::route('POST /asignaturas', function () {
    $nombre=(Flight::request()->data->nombre);
    $idEstudio=(Flight::request()->data->idEstudio);

    $sql="INSERT INTO Asignatura (nombre,idEstudio) VALUES(?,?)";
    $sentencia=Flight::db()->prepare($sql);
    $sentencia->bindParam(1,$nombre);
    $sentencia->bindParam(2,$idEstudio);
    $sentencia->execute();

    Flight::jsonp(["Nueva Asignatura Agregada"]);
});

// Borrar Asignatura
Flight::route('DELETE /asignaturas', function () {
    $id=(Flight::request()->data->id);

    $sql="DELETE FROM Asignatura WHERE id=?";
    $sentencia=Flight::db()->prepare($sql);
    $sentencia->bindParam(1,$id);
    $sentencia->execute();

    Flight::jsonp(["Asignatura Borrada"]);
});

// Actualizar Asignatura
Flight::route('PUT /asignaturas', function () {
    $nombre=(Flight::request()->data->nombre);
    $idEstudio=(Flight::request()->data->idEstudio);

    $sql="UPDATE Asignatura SET nombre=?, idEstudio=? WHERE id=?";
    $sentencia=Flight::db()->prepare($sql);
    $sentencia->bindParam(1,$nombre);
    $sentencia->bindParam(2,$idEstudio);
    $sentencia->bindParam(3,$id);
    $sentencia->execute();

    Flight::jsonp(["Asignatura Actualizada"]);
});

// CRUD Profesores-Asignaturas

// Obtener todo el listado de Profesores-Asignaturas
Flight::route('GET /profesoresAsignaturas', function () {
    $sentencia=Flight::db()->prepare("SELECT * FROM `Profesor-Asignatura`");
    $sentencia->execute();
    $datos=$sentencia->fetchAll();
    Flight::json($datos);
});

// Crear Profesor-Asignatura
Flight::route('POST /profesoresAsignaturas', function () {
    $idProfesor=(Flight::request()->data->idProfesor);
    $idAsignatura=(Flight::request()->data->idAsignatura);

    $sql="INSERT INTO Profesor-Asignatura (idProfesor,idAsignatura) VALUES(?,?)";
    $sentencia=Flight::db()->prepare($sql);
    $sentencia->bindParam(1,$idProfesor);
    $sentencia->bindParam(2,$idAsignatura);
    $sentencia->execute();

    Flight::jsonp(["Nueva Profesor-Asignatura Agregada"]);
});

// Borrar Profesor-Asignatura
Flight::route('DELETE /profesoresAsignaturas', function () {
    $id=(Flight::request()->data->id);

    $sql="DELETE FROM Profesor-Asignatura WHERE id=?";
    $sentencia=Flight::db()->prepare($sql);
    $sentencia->bindParam(1,$id);
    $sentencia->execute();

    Flight::jsonp(["Profesor-Asignatura Borrada"]);
});

// Actualizar Profesor-Asignatura
Flight::route('PUT /profesoresAsignaturas', function () {
    $idProfesor=(Flight::request()->data->idProfesor);
    $idAsignatura=(Flight::request()->data->idAsignatura);

    $sql="UPDATE Profesor-Asignatura SET idProfesor=?, idAsignatura=? WHERE id=?";
    $sentencia=Flight::db()->prepare($sql);
    $sentencia->bindParam(1,$idProfesor);
    $sentencia->bindParam(2,$idAsignatura);
    $sentencia->bindParam(3,$id);
    $sentencia->execute();

    Flight::jsonp(["Profesor-Asignatura Actualizada"]);
});


Flight::start();
