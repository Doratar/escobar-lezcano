<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\CategoriaModel;

class CategoriaController extends Controller{

    protected $CategoriaModel;
    public function __construct()
    {
        helper(['form','url']);
        $this->CategoriaModel = new CategoriaModel();
    }

     public function create(){
        $data[] = [];
        $categorias = new CategoriaModel();
        $data['categorias'] = $categorias->getCategorias();
        return
        view('front/header.php', ['titulo' => 'Alta categoria'])
        .view('admin/navbar.php')
        .view('admin/categoriaAlta.php', data: $data)
        .view('front/footer.php');
    }

    public function formValidation() {
        $data[] = [];
        $categorias = new CategoriaModel();
        $data['categorias'] = $categorias->getCategorias();

        $input = $this->validate([
            'cateNombre' => 'required|min_length[3]'
        ]);

        if(!$input) {
            $data['validation'] = $this->validator;

            return view('front/header.php', ['titulo' => 'categoriaAlta'])
            .view('admin/navbar.php')
            .view('admin/categoriaAlta.php', $data)
            .view('front/footer.php');
        } else {
            // Guardar los datos de la categoria
            $data = [
                'cateNombre' => $this->request->getPost('cateNombre')
            ];

            if($this->CategoriaModel->insert($data)) {
                return redirect()->to('admin/categorias');
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
            'cateNombre' => 'required|min_length[3]'
        ]);

        if(!$input) {
            $data['validation'] = $this->validator;

            return view('front/header.php', ['titulo' => 'categoriaAlta'])
            .view('admin/navbar.php')
            .view('admin/categoriaAlta.php', $data)
            .view('front/footer.php');
        } else {
            // Guardar los datos de la categoria
            $data = [
                'cateId' => $this->request->getPost('cateId'),
                'cateNombre' => $this->request->getPost('cateNombre')
            ];

            if($this->CategoriaModel->update($data['cateId'], $data)) {
                return redirect()->to('admin/categorias');
            } else {
                return redirect()->back()->withInput()->with('error', 'Error al editar categoria');
            }
        }
    }
    public function edit($id) {
            $data['titulo'] = 'Editar Categoria';
            $data['categoria'] = $this->CategoriaModel->find($id);
            
            return
            view('front/header', $data)
            .view('admin/navbar')
            .view('admin/categoriaEditar', $data)
            .view('front/footer');
        }

}