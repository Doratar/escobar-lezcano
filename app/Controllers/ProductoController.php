<?php
namespace App\Controllers;
use App\Models\ColorModel;
use App\Models\TallesModel;
Use App\Models\UsuarioModel;
Use App\Models\CategoriaModel;
Use CodeIgniter\Controller;
use CodeIgniter\View\Table;

class ProductoController extends Controller{

    protected $ProductoModel;
    protected $CategoriaModel;
    public function __construct()
    {
        helper(['form','url']);
        $this->ProductoModel = new \App\Models\ProductoModel();
        $this ->categorias = new CategoriaModel();
    }

    public function catalogo(){
        $data['titulo'] = 'Catalogo de Productos';
        $data['productos'] = $this->ProductoModel->getProductosActivos();
        return
        view('front/header.php', $data)
        .view('front/navbar.php')
        .view('productos/productoCatalogo.php', $data)
        .view('front/footer.php');
    }

     public function create(){
        $data[] = [];
        $categorias = new CategoriaModel();
        $data['categorias'] = $categorias->getCategorias();
        return
        view('front/header.php', ['titulo' => 'Alta producto'])
        .view('admin/navbar.php')
        .view('productos/productoAlta.php', data: $data)
        .view('front/footer.php');
    }

    public function formValidation() {
        $data[] = [];
        $categorias = new CategoriaModel();
        $data['categorias'] = $categorias->getCategorias();

        $input = $this->validate([
            'prodNombre' => 'required|min_length[3]',
            'prodDescripcion' => 'required|min_length[10]',
            'prodPrecio' => 'required|numeric',
            'cateId' => 'required|integer',
            'prodImagenUrl' => 'uploaded[prodImagenUrl]',
            'prodMarca' => 'required|min_length[2]'
        ]);

        if(!$input) {
            $data['validation'] = $this->validator;

            return view('front/header.php', ['titulo' => 'productoAlta'])
            .view('admin/navbar.php')
            .view('productos/productoAlta.php', $data)
            .view('front/footer.php');
        } else {
            // Procesar la imagen y guardar el producto
            $imagen = $this->request->getFile('prodImagenUrl');
            $nombreAleatorio = $imagen->getRandomName();
            $imagen->move(ROOTPATH . 'assets/uploads', $nombreAleatorio);

            // Guardar los datos del producto
            $data = [
                'prodNombre' => $this->request->getPost('prodNombre'),
                'prodDescripcion' => $this->request->getPost('prodDescripcion'),
                'prodPrecio' => $this->request->getPost('prodPrecio'),
                'cateId' => $this->request->getPost('cateId'),
                'prodImagenUrl' => $nombreAleatorio,
                'prodMarca' => $this->request->getPost('prodMarca'),
                'prodColor' => $this->request->getPost('prodColor'),
                'prodStock' => $this->request->getPost('prodStock'),
                'prodStockMinimo' => $this->request->getPost('prodStockMinimo'),
                'prodActivo' => TRUE
            ];

            if($this->ProductoModel->insert($data)) {
                return redirect()->to('admin/productos');
            } else {
                return redirect()->back()->withInput()->with('error', 'Error al crear el producto');
            }
        }
    }

    public function formValidationEditar(){
        $data[] = [];
        $categorias = new CategoriaModel();
        $data['categorias'] = $categorias->getCategorias();

        $input = $this->validate([
            'prodNombre' => 'required|min_length[3]',
            'prodDescripcion' => 'required|min_length[10]',
            'prodPrecio' => 'required|numeric',
            'cateId' => 'required|integer',
            'prodImagenUrl' => 'uploaded[prodImagenUrl]',
            'prodMarca' => 'required|min_length[2]'
        ]);

        if(!$input) {
            $data['validation'] = $this->validator;

            return view('front/header.php', ['titulo' => 'productoAlta'])
            .view('admin/navbar.php')
            .view('productos/productoAlta.php', $data)
            .view('front/footer.php');
        } else {
            // Procesar la imagen y guardar el producto
            $imagen = $this->request->getFile('prodImagenUrl');
            $nombreAleatorio = $imagen->getRandomName();
            $imagen->move(ROOTPATH . 'assets/uploads', $nombreAleatorio);

            // Guardar los datos del producto
            $data = [
                'prodId' => $this->request->getPost('prodId'),
                'prodNombre' => $this->request->getPost('prodNombre'),
                'prodDescripcion' => $this->request->getPost('prodDescripcion'),
                'prodPrecio' => $this->request->getPost('prodPrecio'),
                'cateId' => $this->request->getPost('cateId'),
                'prodImagenUrl' => $nombreAleatorio,
                'prodMarca' => $this->request->getPost('prodMarca'),
                'prodColor' => $this->request->getPost('prodColor'),
                'prodStock' => $this->request->getPost('prodStock'),
                'prodStockMinimo' => $this->request->getPost('prodStockMinimo'),
                'prodActivo' => TRUE
            ];

            if($this->ProductoModel->update($data['prodId'], $data)) {
                return redirect()->to('admin/productos');
            } else {
                return redirect()->back()->withInput()->with('error', 'Error al crear el producto');
            }
        }
    }

    public function insertarVariante($id) {
        $data['titulo'] = 'Alta de Variante';
        $data['producto'] = $this->ProductoModel->find($id);
        $categorias = new CategoriaModel();
        $data['categorias'] = $categorias->getCategorias();

        return
        view('front/header.php', $data)
        .view('admin/navbar.php')
        .view('productos/varianteAlta.php', $data)
        .view('front/footer.php');
    }

    public function edit($id) {
        $data['titulo'] = 'Editar Producto';
        $data['producto'] = $this->ProductoModel->find($id);
        $categorias = new CategoriaModel();
        $data['categorias'] = $categorias->getCategorias();

        return
        view('front/header.php', $data)
        .view('admin/navbar.php')
        .view('productos/productoEditar.php', $data)
        .view('front/footer.php');
    }

    public function verProducto($id) {
        $data['titulo'] = 'Ver Producto';
        $data['producto'] = $this->ProductoModel->getProductoById($id);
        $categorias = new CategoriaModel(); 
        $data['categorias'] = $categorias->getCategorias();

        return
        view('front/header', $data)
        .view('front/navbar')
        .view('productos/productoVer', $data)
        .view('front/footer');
    }

    // Funcion para dar de baja logica de los productos
    public function eliminarProducto($id) {
        $this->ProductoModel->eliminarProducto($id);
        return redirect()->to('admin/productos');
    }

    // Funcion para dar de alta logica los productos
    public function activarProducto($id) {
        $this->ProductoModel->update($id, ['prodActivo'=> TRUE]);
        return redirect()->to('admin/productos');
    }
}