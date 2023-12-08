<?php



if (isset($_GET['action']) && isset($_GET['controller'])) {

    require_once './CONTROLLER/' . $_GET['controller'] . '.php';

    $pedidoController = new $_GET['controller'];

    $pedidoController->{$_GET['action']}();
} else {
    require_once './CONTROLLER/PedidoController.php';
    $pedidoController = new PedidoController;
    $pedidoController->index();
}
