<?php
namespace App\Controllers;
use App\Models\ProductoModel;
use App\Models\VentasModel;
use App\Models\VentasDetalleModel;
Use CodeIgniter\Controller;

class VentaController extends Controller{
    public function __construct()
    {
        helper(['form','url']);
    }

    public function registrarVenta(){
        if (!session()->get('logged_in')){
            return redirect()->to('login');
        }
        $session = session();
        require(APPPATH . 'Controllers/CarritoController.php');

        $cart_controller = new CarritoController();
        $cart_contents = $cart_controller->devolver_carrito();

        $productoModel = new ProductoModel();
        $ventasModel = new VentasModel();
        $ventasDetalleModel = new VentasDetalleModel();

        $productos_validos = [];
        $productos_sin_stock = [];
        $total = 0;

        foreach($cart_contents as $items){
            $producto = $productoModel->getProductoById($items['id']);

            if($producto && $producto['prodStock'] >= $items['qty']){
                array_push($productos_validos, $items);
                $total += $items['qty'] * $items['price'];

                
            }else{
                array_push($productos_sin_stock, $items);
                $cart_controller->eliminar_item($items['rowid']);
            }
        }
            // Si hay productos sin stock, avisar y volver al carrito
            if (!empty($productos_sin_stock)) {
                $nombres = array_map(fn($p) => $p['name'], $productos_sin_stock);
                $mensaje = 'Los siguientes productos no tienen stock suficiente y fueron eliminados del carrito: <br>' 
                    . implode(', ', $nombres);
                $session->setFlashdata('fail', $mensaje);
                return redirect()->to(base_url('carrito'));
            }

            // Si no hay productos válidos, no se registra la venta
            if (empty($productos_validos)) {
                $session->setFlashdata('fail', 'No hay productos válidos para registrar la venta.');
                return redirect()->to(base_url('carrito'));
            }

            // INSERTAR CABECERA DE VENTAS
            $venta_id = $ventasModel->insert([
                'ventasFecha' => date('Y-m-d H:i:s'),
                'ventasTotal' => $total,
                'usuarioId' => session()->get('UsuarioId')             
            ]);

            foreach ($productos_validos as $producto) {
                $ventasDetalleModel->insert([
                    'ventasId' => $venta_id,
                    'prodId' => $producto['id'],
                    'vdetalleCantidad' => $producto['qty'],
                    'vdetallePrecio' => $producto['price']
                ]);

            // Descontar stock
            $productoModel->actualizarStock($producto['id'], $producto['qty']); 
    }

    // Vaciar carrito
    $cart_controller->borrar_carrito();

    $session->setFlashdata('mensaje', 'Venta registrada con éxito.');
    return redirect()->to(base_url('compra/' . $venta_id));

    }

    // Función del cliente para ver el detalle de sus facturas de compras
    public function verCompras()
    {
        $ventas = new VentasModel();

        $id_usuario=session()->get('UsuarioId');

        $data['ventas'] = $ventas->getVentas($id_usuario);
        $dato['titulo'] = "Todas mis compras";

        echo view('front/header', $dato);
        echo view('front/navbar');
        echo view('cliente/verCompras', $data);
        echo view('front/footer');
    }

    // funcion para que el cliente pueda ver el detalle de su compra
    public function verDetalleCompra($ventaId) {
        $detalles = new VentasDetalleModel();
        $data['detalles'] = $detalles->getDetalle($ventaId);
        $dato['titulo'] = "Mi compra";

        echo view('front/header', $dato);
        echo view('front/navbar');
        echo view('cliente/verComprasDetalle', $data);
        echo view('front/footer');
    }

    //funcion para que el administrador pueda ver el detalle de venta de un compra en particular
    public function verDetalleVenta($ventaId){
        $detalles = new VentasDetalleModel();
        $data['detalles'] = $detalles->getDetalle($ventaId);
        $dato['titulo'] = "Venta detalle";

        echo view('front/header', $dato);
        echo view('admin/navbar');
        echo view('admin/ventaDetalle', $data);
        echo view('front/footer');
    }

}