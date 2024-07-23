<?php

namespace App\Controllers;

use App\Models\AuthModel;
use CodeIgniter\Controller;

class Auth extends Controller
{
    public function Home()
    {
        return view('Authentication/Auth');
    }

    public function SysLogin()
    {
        $session = session();

        // if($this->request->getMethod() == 'post') {

        $rules = [
            'nama' => 'required',
            'password' => 'required',
        ];

        if ($this->validate($rules)) {
            $AuthModel = new AuthModel();
            $nama = $this->request->getVar('nama');
            $password = $this->request->getVar('password');
            $user = $AuthModel->getUserByNama($nama);
            if ($user) {
                if (password_verify($password, $user['password'])) {
                    $session->set([
                        'IsLoggedIn' => true,
                        'id_user' => $user['id_user'],
                        'nama' => $user['nama'],
                        'email' => $user['email'],
                        'is_active' => $user['is_active'],
                        'is_verif' => $user['is_verif'],
                        'level' => $user['level'],
                        'loginTime' => time() // Simpan waktu login
                    ]);
                    if ($user['is_verif'] == 'verif') {
                        if ($user['level'] == 'admin') {
                            return redirect()->route('DashboardAdmin');
                        } else if ($user['level'] == 'user') {
                            return redirect()->route('DashboardUser');
                        } else {
                            $session->setFlashdata('message', 'akun tidak valid!');
                            return redirect()->route('/');
                        }
                    } else {
                        $session->setFlashdata('message', 'akun tidak terverifikasi!');
                        return redirect()->route('/');
                    }
                } else {
                    $session->setFlashdata('message', 'password salah!');
                    return redirect()->route('/');
                }
            } else {
                $session->setFlashdata('message', 'akun tidak ditemukan!');
                return redirect()->route('/');
            }
        } else {
            $data['validation'] = $this->validator;
        }
        // }
    }

    public function SysRegis()
    {
        $rules = [
            'nama' => 'required|min_length[3]|max_length[20]',
            'email' => 'required|valid_email',
            'password' => 'required|min_length[8]'
        ];

        if ($this->validate($rules)) {
            $model = new AuthModel();
            $data = [
                'nama' => $this->request->getVar('nama'),
                'email' => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'is_active' => 1,
                'is_verif' => 2,
                'level' => 'user',
            ];
            $model->save($data);
            session()->setFlashdata("message", "Akun berhasil dibuat");
            return redirect()->route('/');
        } else {
            $data['validation'] = $this->validator;
            return redirect()->route('/');
        }
    }

    public function ForgetPage()
    {
        return view('Authentication/ForgetPage');
    }

    public function Logout()
    {
        session()->destroy();
        session()->setFlashdata('message', 'logout success');
        return redirect()->route('/');
    }
}
