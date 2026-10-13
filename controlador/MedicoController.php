<?php

require_once "modelo/Medico.php";
require_once "modelo/MedicoDao.php";

class MedicoController
{
    private $dao;

    // CONSTRUCTOR
    public function __construct($dao)
    {
        $this->dao = $dao;
    }

    // LISTAR
    public function index()
    {
        $medicos = $this->dao->listar();
        require "vista/medicos/index.php";
    }

    // NUEVO
    public function nuevo()
    {
        $medico = new Medico();

        require "vista/medicos/formulario.php";
    }

    // GUARDAR
    public function guardar()
    {
        $medico = new Medico();

        $medico->setNombres($_POST["nombres"]);
        $medico->setApellidos($_POST["apellidos"]);
        $medico->setEspecialidad($_POST["especialidad"]);
        $medico->setTelefono($_POST["telefono"]);
        $medico->setFoto($_POST["foto"]);

        $this->dao->insertar($medico);

        header("Location: index.php");
        exit;
    }

    // EDITAR
    public function editar()
    {
        $id = $_GET["id"];

        $medico = $this->dao->buscarPorId($id);

        require "vista/medicos/formulario.php";
    }

    // ACTUALIZAR
    public function actualizar()
    {
        $medico = new Medico();

        $medico->setId($_POST["id"]);
        $medico->setNombres($_POST["nombres"]);
        $medico->setApellidos($_POST["apellidos"]);
        $medico->setEspecialidad($_POST["especialidad"]);
        $medico->setTelefono($_POST["telefono"]);
        $medico->setFoto($_POST["foto"]);

        $this->dao->actualizar($medico);

        header("Location: index.php");
        exit;
    }

    // ELIMINAR
    public function eliminar()
    {
        $id = $_GET["id"];

        $this->dao->eliminar($id);

        header("Location: index.php");
        exit;
    }
}

?>
