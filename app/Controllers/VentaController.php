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
        $session = session();
        require(APPPATH . 'Controllers/CarritoController.php');

        $cart_controller = new CarritoController();
        $cart_contents = $cart_controller->devolver_carrito();

        $productoModel = new ProductoModel();
        $ventasModel = new VentasModel();
        $usuarioModel = new VentasDetalleModel();

        $productos_validos = [];
        $productos_sin_stock = [];
        $total =0;

        foreach($cart_contents as $items){
            $producto = $productoModel->getProductoById($items['id']);

            if($producto && $producto['prodStock'] >= $items['qty']){
                array_push($productos_validos, $items);
                $total += $items['qty'] * $items['price'];

                
            }else{
                array_push($productos_sin_stock, $items);
                $cart_controller->eliminar_item($items['rowid']);
            }
            // Si hay productos sin stock, avisar y volver al carrito
            if (!empty($productos_sin_stock)) {
                $mensaje = 'Los siguientes productos no tienen stock suficiente y fueron eliminados del carrito: <br>' 
                    . implode(', ', $productos_sin_stock);
                $session->setFlashdata('mensaje', $mensaje);
                return redirect()->to(base_url('carrito'));
            }

            // Si no hay productos válidos, no se registra la venta
            if (empty($productos_validos)) {
                $session->setFlashdata('mensaje', 'No hay productos válidos para registrar la venta.');
                return redirect()->to(base_url('carrito'));
            }

        }
    }
        // Función del usuario cliente para ver sus compras
    public function ver_factura($venta_id){
    // echo $venta_id; die;
    $detalle_ventas = new VentasDetalleModel();
    $data['venta'] = $detalle_ventas->getDetalles($venta_id);

    $dato['titulo'] = "Mi compra";

    echo view('front/header', $dato);
    echo view('front/nvbar');
    echo view('back/compras/vista_compras', $data);
    echo view('front/footer');
}

// Función del cliente para ver el detalle de sus facturas de compras
public function ver_facturas_usuario($id_usuario)
{
    $ventas = new VentasModel();

    $data['ventas'] = $ventas->getVentas($id_usuario);
    $dato['titulo'] = "Todas mis compras";

    echo view('front/header', $dato);
    echo view('front/navbar');
    echo view('back/compras/ver_factura_usuario', $data);
    echo view('front/footer');
}

}