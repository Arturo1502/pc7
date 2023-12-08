<?php

session_start();
if (isset($_SESSION['clientes'])) {
    $clientes = $_SESSION['clientes'];
    
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practica Calificada 06</title>

    <!-- css -->
    <link rel="stylesheet" href="../STILES/styles.css   ">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100&display=swap" rel="stylesheet">

    <!-- script de alerta -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

<body>

    <div class="container">
        <h1>Formulario de pedidos</h1>
        <div class="contenido">


            <form class="formulario" action="../index.php?action=store&controller=PedidoController" method="post">
                <div class="inputs">
                    <label for="cliente">Cliente:</label>
                    <select id="cliente" name="cliente" require>
                        <option value="" selected disabled>Seleccionar nombre del Cliente</option>

                        <?php foreach ($clientes as  $cliente) : ?>
                            <option value="<?= $cliente['id'] ?>"><?= $cliente['nombre'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="inputs">
                    <label for="descripcion">Descripcion:</label>
                    <input type="text" id="descripcion" name="descripcion">
                </div>


                <div class="inputs">
                    <label for="cantidad">Cantidad:</label>
                    <input type="number" id="cantidad" name="cantidad">
                </div>

                <div class="inputs">
                    <label for="preciounit">Precio unitario:</label>
                    <input type="number" step="any" id="preciounit" name="preciounit">
                </div>

                <div class="inputs">
                    <label for="fechapedido">Fecha del pedido:</label>
                    <input type="date" id="fechapedido" name="fechapedido">
                </div>

                <button class="btn" type="submit">Registrar pedido</button>

            </form>
            <a href="./viewTabladePedidos.php"> Volver atras</a>
        </div>
    </div>
</body>

</html>