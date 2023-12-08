<?php

session_start();
if (isset($_SESSION['pedidos'])) {
    $pedidos = $_SESSION['pedidos'];
    // print_r($pedidos);
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos</title>
    <style>
        body {
            padding: 0;
            margin: 0;
            font-family: 'Poppins', sans-serif;

            box-sizing: border-box;
            background-color: #F5F5DD;
            margin: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        h2 {
        text-align: center;
        margin-top: 55px;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #3498DB;
            color: white;
        }

        .nuevo-pedido-btn {
            display: inline-block;
            padding: 10px;
            margin-top: 20px;
            background-color: #3498DB;
            color: #fff;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>

<body>

    <h2>Visualización de Pedidos</h2>

    <table>
        <thead>
            <tr>
                <th>ID Pedido</th>
                <th>Cliente</th>
                <th>Descripcion</th>
                <th>Cantidad</th>
                <th>Precio Unitario</th>
                <th>Fecha del Pedido</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pedidos as $pedido) : ?>
                <tr>
                    <td><?= $pedido['id'] ?></td>
                    <td><?= $pedido['nombre'] ?></td>
                    <td><?= $pedido['descripcion'] ?></td>
                    <td><?= $pedido['cantidad'] ?></td>
                    <td>$<?= $pedido['precio_unitario'] ?>.00</td>
                    <td><?= $pedido['fecha_pedido'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>


    <a href="../index.php?action=create&controller=PedidoController" class="nuevo-pedido-btn">Nuevo Pedido</a>

</body>

</html>