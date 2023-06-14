<?php 

namespace App\Controllers;  
use CodeIgniter\Controller;

  
class ProfileController extends Controller
{
    public function index()
    {
        $data = [];

		echo view('templates/header', $data);
		echo view('profile');
		echo view('templates/footer');
    }
}