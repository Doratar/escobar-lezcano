<?php
namespace App\Controllers;
Use App\Models\ProductoModel;
Use App\Models\UsuarioModel;
Use CodeIgniter\Controller;

class CarritoController extends BaseController{

    protected $ProductoModel;
    public function __construct()
    {
        helper(['form', 'url', 'cart']);
        $cart = \Config\Services::cart();
        $session = session();

        $this->ProductoModel = new ProductoModel();
    }
        public function catalogo()
    {
        $data['titulo'] = 'Catalogo de Productos';
        $data['productos'] = $this->ProductoModel->getProductosActivos();
        return
        view('front/header.php', $data)
        .view('front/navbar.php')
        .view('productos/productoCatalogo', $data)
        .view('front/footer.php');
    }

    public function mostrarCarrito() //carrito que se muestra
    {
        $cart = \Config\Services::cart();
        $cartContents = $cart->contents();
        $data['cart'] = $cartContents;

        $dato['titulo'] = 'Tu carrito';
        echo view('front/header', $dato);
        echo view('front/navbar');
        echo view('back/carrito/carrito_parte_view', $data);
        echo view('front/footer');
    }
    public function mostrarCompra($venta_id)
    {
        $cart = \Config\Services::cart();
        $data['cart'] = $cart->contents();
        $data['venta_id'] = $venta_id;

        $dato['titulo'] = 'Tu carrito';
        echo view('front/header', $dato);
        echo view('front/navbar');
        echo view('cliente/graciasCompra', $data);
        echo view('front/footer');
    }

public function add() // Agregar productos al carrito
{
    $request = \Config\Services::request(); // Trae todo lo relacionado con la solicitud HTTP
    $cart = \Config\Services::Cart(); // Devuelve una instancia del carrito activa

    $cart->insert([
        'id' => $request->getPost('prodId'),
        'qty'=> 1,
        'name'=> $request->getPost('prodNombre'),
        'price'=> $request->getPost('prodPrecio'),
        //'imagen' => $request->getPost('imagen'),
    ]);

    return redirect()->back()->withInput();
}

public function eliminar_item($rowid)
{
    $cart = \Config\Services::Cart();
    $cart->remove($rowid);
    return redirect()->to(base_url('carrito'));
}

public function borrar_carrito()
{
    $cart = \Config\Services::Cart();
    $cart->destroy();
    return redirect()->to(base_url('carrito'));
}

    //Actualiza el carrito que se muestra
    public function actualiza_carrito()
    {
        $cart     = \Config\Services::Cart();
        $request  = \Config\Services::request();

        $cart->update(array(
            'id'     => $request->getPost('prodId'),
            'qty'    => 1,
            'price'  => $request->getPost('prodPrecio'),
            'name'   => $request->getPost('prodNombre'),
            // 'imagen' => $request->getPost('imagen'),
        ));

        return redirect()->back()->withInput();
    }

    public function remove($rowid)
{
    $cart = \Config\Services::cart();
    if ($rowid === "all") {
        $cart->destroy(); // vacía el carrito
    } else {
        $cart->remove($rowid);
    }
    return redirect()->back()->withInput();
}

public function devolver_carrito()
{
    $cart = \Config\Services::cart();
    return $cart->contents();
}

public function suma($rowid)
{
    // suma 1 a la cantidad del producto
    $cart = \Config\Services::cart();
    $item = $cart->getItem($rowid);
    if ($item) {
        $cart->update([
            'rowid' => $rowid,
            'qty'   => $item['qty'] + 1
        ]);
    }
    return redirect()->to('carrito');
}

public function resta($rowid)
{
    // resta 1 a la cantidad al producto
    $cart = \Config\Services::cart();
    $item = $cart->getItem($rowid);

    if ($item) {
        if ($item['qty'] > 1) {
            $cart->update([
                'rowid' => $rowid,
                'qty'   => $item['qty'] - 1
            ]);
        } else {
            $cart->remove($rowid);
        }
    }
    return redirect()->to('carrito');
}
    public function index(){
        $data['titulo'] = 'Inicio';
        $data['usuario'] = session()->get('usuario');
        echo view('front/header', $data);
        echo view('cliente/cliente-navbar');
        echo view('carrito');
        echo view('front/footer');
    }

    protected function logout() {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url('/login'));
    }
}