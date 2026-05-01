<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;
class Login extends BaseController
{
    public function LoginUser()
    {
      
        if ($this->request->getMethod() === 'POST')
         {
              
        
            $uname    = $this->request->getPost('Username');
            $password = $this->request->getPost('Pass');

            $userModel = new UserModel();
            $user = $userModel->where('Username', $uname)->first();
            if ($user && password_verify($password, $user['Pass'])) {

                session()->set([
                    'UID'   => $user['ID'],
                    'Username'     => $user['Username'],
                    'logged_in' => true
                ]);

                return redirect()->to('/dashboard');
            }

            return redirect()->back()->with('error', 'Invalid Username or password');
        }
        return redirect()->to('login');

        
    }
     public function logout()
    {
        
        session()->destroy();               
        return redirect()->to('/jskjhdUjsa65');
    }
}
