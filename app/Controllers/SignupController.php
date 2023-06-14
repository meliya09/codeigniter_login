<?php 

namespace App\Controllers;  
use CodeIgniter\Controller;
use App\Models\UserModel;
  
class SignupController extends Controller
{
    public function index()
    {
        helper(['form']);
        $data = [];
        echo view('signup', $data);
    }
  
    public function store()
    {
        helper(['form']);
        $rules = [
            'name'          => 'required|min_length[2]|max_length[50]',
            'email'         => 'required|min_length[4]|max_length[100]|valid_email|is_unique[users.email]',
            'password'      => 'required|min_length[4]|max_length[50]',
            'confirmpassword'  => 'matches[password]'
            // 'gambar' => 'uploaded[gambar]|max_size[gambar, 1024]|is_image[gambar]'
        ];
          
        if($this->validate($rules)){
            $userModel = new UserModel();

            $data = [
                'name'     => $this->request->getVar('name'),
                'email'    => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];

            $userModel->save($data);

            return redirect()->to('/signin');
        }else{
            $data['validation'] = $this->validator;
            echo view('signup', $data);
        }

        // if(!$this->validate($rules)){
		// 	return $this->fail($this->validator->getErrors());
		// }else{

			//Get the file
			
			// $file = $this->request->getFile('gambar');
			// $profile_image = $file->getName();

		// Renaming file before upload
		// $temp = explode(".",$profile_image);
		// $newfilename = round(microtime(true)) . '.' . end($temp);

		// if ($file->move("images", $newfilename)) {

		// 	$fileModel = new UserModel();

		// 	$data = [
				
        //         'name'     => $this->request->getVar('name'),
        //         'email'    => $this->request->getVar('email'),
        //         'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
		// 		'gambar' => $newfilename,
		// 		'file_path' => "/images/" . $newfilename,
		// 	];

		// 	$post_id = $this->model->insert($data);
		// 	$data['post_id'] = $post_id;

		// 	return $this->respondCreated($data);
		// }
	}
}
