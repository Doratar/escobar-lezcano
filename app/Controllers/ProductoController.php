<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\{ProductoModel, CategoriaModel};

class ProductoController extends Controller{

    protected $ProductoModel;
    protected $CategoriaModel;
    public function __construct()
    {
        helper(['form','url']);
        $this->ProductoModel = new ProductoModel();
        $this->CategoriaModel = new CategoriaModel();
    }

    public function catalogo(){
        $data['titulo'] = 'Catalogo de Productos';
        $data['productos'] = $this->ProductoModel->getProductosActivos();
        return
        view('front/header', $data)
        .view('front/navbar')
        .view('productos/productoCatalogo', $data)
        .view('front/footer');
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
            //'prodImagenUrl' => 'uploaded[prodImagenUrl]',
            'prodImagenUrl' => 'permit_empty|uploaded[prodImagenUrl]|is_image[prodImagenUrl]',
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
            //$imagen = $this->request->getFile('prodImagenUrl');
            //$nombreAleatorio = $imagen->getRandomName();
            //$imagen->move(ROOTPATH . 'assets/uploads', $nombreAleatorio);
            $imagen = $this->request->getFile('prodImagenUrl');

            if ($imagen && $imagen->isValid() && !$imagen->hasMoved()) {
                $prodId = $this->request->getPost('prodId');
                $extension = $imagen->getClientExtension();
                $nombreArchivo = $prodId . '.' . $extension;
                $rutaDestino = ROOTPATH . 'assets/uploads/' . $nombreArchivo;

                // Eliminar la imagen anterior si existe
                if (file_exists($rutaDestino)) {
                    unlink($rutaDestino);
                }

                // Mover la nueva imagen
                $imagen->move(ROOTPATH . 'assets/uploads', $nombreArchivo);
                $nombreFinal = $nombreArchivo;
            } else {
                $nombreFinal = $this->request->getPost('imagenActual');
            }


            // Guardar los datos del producto
            $data = [
                'prodId' => $this->request->getPost('prodId'),
                'prodNombre' => $this->request->getPost('prodNombre'),
                'prodDescripcion' => $this->request->getPost('prodDescripcion'),
                'prodPrecio' => $this->request->getPost('prodPrecio'),
                'cateId' => $this->request->getPost('cateId'),
                'prodImagenUrl' => $nombreFinal,
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

    public function edit($id) {
        $data['titulo'] = 'Editar Producto';
        $data['producto'] = $this->ProductoModel->find($id);
        $categorias = new CategoriaModel();
        $data['categorias'] = $categorias->getCategorias();

        return
        view('front/header', $data)
        .view('admin/navbar')
        .view('productos/productoEditar', $data)
        .view('front/footer');
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

    public function buscarProducto() {
        $parametro = $this->request->getVar('busqueda');
        $data['titulo'] = 'Catalogo de Productos';
        $data['productos'] = $this->ProductoModel->buscarProducto($parametro);
        return
        view('front/header', $data)
        .view('front/navbar')
        .view('productos/productoCatalogo', $data)
        .view('front/footer');
    }
}