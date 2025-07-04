<?php
namespace App\Controllers;
Use App\Models\ConsultasModel;
Use CodeIgniter\Controller;

class ConsultasController extends Controller{
    public function __construct()
    {
        helper(['form','url']);
    }

    public function index(){
        $data['titulo'] = 'Consultas';
        $data['usuario'] = session()->get('UsuarioMail');
        $data['cart'] = \Config\Services::cart();
        echo view('front/header', $data);
        echo view('front/navbar',$data);
        echo view('front/contacto', $data);
        echo view('front/footer');
    }
    public function consultas()
    {
        // TODO aca va la tabla de consultas
        $data['titulo'] = 'Consultas';
        $consultasModel = new ConsultasModel();
        $data['consultas'] = $consultasModel->getConsultas();
        //$data['consultas'] = $consultasModel->paginate(5); // 5 registros por página
        $data['pager'] = $consultasModel->pager;

        echo view('front/header', $data);
        echo view('admin/navbar');
        echo view('admin/tabla-consultas', $data);
        echo view('front/footer');
    }

public function formValidation()
{
    $input = $this->validate([
        'consultasMail' => 'required|valid_email',
        'consultasTelefono' => 'required|min_length[10]|max_length[15]',
        'consultasDetalle' => 'required|min_length[10]'
    ], 
    [
        'consultasMail' => [
            'required' => 'El correo es obligatorio',
            'valid_email' => 'El formato del correo es incorrecto'
        ],
        'consultasTelefono' => [
            'required' => 'El teléfono es obligatorio',
            'min_length' => 'El teléfono debe tener al menos 10 caracteres',
            'max_length' => 'El teléfono no puede tener más de 15 caracteres'
        ],
        'consultasDetalle' => [
            'required' => 'El detalle es obligatorio',
            'min_length' => 'La consulta debe tener al menos 10 caracteres'
        ]
    ]);

    if (!$input) {
        // Devuelve a la vista con errores
        $data = [
            'titulo' => 'Consultas',
            'usuario' => session()->get('UsuarioMail'),
            'validation' => $this->validator
        ];

        return view('front/header', $data)
             . view('front/navbar')
             . view('front/contacto', $data)
             . view('front/footer');
    } else {
        // Cargar modelo y guardar la consulta
        $model = new ConsultasModel();
        $consulta = [
            'consultasFecha'     => date('Y-m-d H:i:s'),
            'consultasMail'      => $this->request->getVar('consultasMail'),
            'consultasTelefono'  => $this->request->getVar('consultasTelefono'),
            'consultasDetalle'   => $this->request->getVar('consultasDetalle'),
            'consultasAtendido'  => 'NO'
        ];

        if ($model->createConsulta($consulta)) {
            return redirect()->to(base_url('/contacto'))->with('success', 'Consulta enviada correctamente.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Error al enviar la consulta.');
        }
    }
}

    public function marcarLeido($id)
    {
        $model = new ConsultasModel();
        if($model->marcarLeido($id)){
            return redirect()->to(base_url('/admin/consultas'))->with('success', 'Consulta marcada como leída.');
        } else {
            return redirect()->back()->with('error', 'Error al marcar la consulta como leída.');
        }
    }

}