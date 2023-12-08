<?php

require_once  $_SERVER['DOCUMENT_ROOT']  . '/MODEL/pedidos.php';

class PedidoController
{


    function index()
    {
        $pedido = new Pedido;
        $pedidos = $pedido->all();

        session_start();
        
        $_SESSION['pedidos'] = $pedidos;

        header('location: ../VIEW/viewTabladePedidos.php');
    }

    function create()
    {
        $cliente = new Pedido;
        $clientes = $cliente->clientes();
        
        
        session_start();

        $_SESSION['clientes'] = $clientes;
        header('location: ../VIEW/viewForm.php');
    }

    function store()
    {   
        
        $pedido = new Pedido;
        $pedido->create($_POST['cliente'], $_POST['descripcion'],$_POST['cantidad'], $_POST['preciounit'], $_POST['fechapedido']);

        header('location: ../index.php');
    }
}
