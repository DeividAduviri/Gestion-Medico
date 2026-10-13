<?php
$editar = $medico->getId() !== null;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $editar ? "Editar médico" : "Nuevo médico" ?></title>
    <link rel="stylesheet" href="public/css/estilos.css">
</head>

<body>

<div class="contenedor formulario">

    <h1><?= $editar ? "Editar médico" : "Nuevo médico" ?></h1>

    <form method="POST"
          action="index.php?accion=<?= $editar ? "actualizar" : "guardar" ?>">

        <?php if ($editar): ?>
            <input type="hidden"
                   name="id"
                   value="<?= $medico->getId() ?>">
        <?php endif; ?>

        <label for="nombres">Nombres:</label>
        <input type="text"
               id="nombres"
               name="nombres"
               required
               value="<?= htmlspecialchars($medico->getNombres()) ?>">

        <label for="apellidos">Apellidos:</label>
        <input type="text"
               id="apellidos"
               name="apellidos"
               required
               value="<?= htmlspecialchars($medico->getApellidos()) ?>">

        <label for="especialidad">Especialidad:</label>
        <input type="text"
               id="especialidad"
               name="especialidad"
               required
               value="<?= htmlspecialchars($medico->getEspecialidad()) ?>">

        <label for="telefono">Teléfono:</label>
        <input type="text"
               id="telefono"
               name="telefono"
               value="<?= htmlspecialchars($medico->getTelefono()) ?>">

        <label for="foto">Foto:</label>
        <input type="text"
               id="foto"
               name="foto"
               placeholder="ejemplo.jpg"
               value="<?= htmlspecialchars($medico->getFoto()) ?>">

        <div class="acciones-formulario">

            <a href="index.php"
               class="btn btn-cancelar">
                Cancelar
            </a>

            <button type="submit"
                    class="btn btn-guardar">
                <?= $editar ? "Actualizar" : "Guardar" ?>
            </button>

        </div>

    </form>

</div>

</body>
</html>