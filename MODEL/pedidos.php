<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/MODEL/database.php';
class Pedido
{
    private $conn;

    public function __construct()
    {
        $database = new Database();

        $this->conn = $database->getConn();
    }

    public function all()
    {
        $query = "SELECT pedidos.id, clientes.nombre, pedidos.descripcion, pedidos.cantidad, pedidos.precio_unitario, pedidos.fecha_pedido  FROM `pedidos` 
        JOIN clientes on clientes.id = pedidos.cliente_id";

        $stm = $this->conn->prepare($query);
        $stm->execute();
        $result=$stm->fetchAll(PDO::FETCH_ASSOC);
        return  $result;
    }

    public function clientes()
    {
        $query = "SELECT id, nombre FROM `clientes`";

        $stm = $this->conn->prepare($query);

        $stm->execute();
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);

        return  $result;
    }


    function  create($cliente_id, $descripcion, $cantidad, $precio_unitario, $fecha_pedido)
    {

        $query  = 'INSERT INTO `pedidos`(`cliente_id`, `descripcion`, `cantidad`, `precio_unitario`, `fecha_pedido`) VALUES (?,?,?,?,?)';


        try {

            $stm = $this->conn->prepare($query);
            $stm->execute([$cliente_id, $descripcion, $cantidad, $precio_unitario, $fecha_pedido]);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
