<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\AdminModel;

class Admin extends Controller
{
    public function index(): string
    {
        return view('Admin/Dashboard');
    }

    public function LevelAccess()
    {
        $model = new AdminModel();
        $data['check'] = $model->where('is_verif', 1)->where('level', 'user')->where('id_user')->findAll();
        $data['userlevel'] = $model->where('level', 'admin')->findAll();

        return view('Admin/LevelAccess', $data);
    }


    // level akses
    public function CreateLevelAccess()
    {
        $rules = [
            'nama' => 'required|min_length[3]|max_length[20]',
            'email' => 'required|valid_email',
            'level' => 'required',
            'is_active' => 'required',
        ];

        if ($this->validate($rules)) {
            $model = new AdminModel();
            $data = [
                'nama' => $this->request->getVar('nama'),
                'email' => $this->request->getVar('email'),
                'level' => $this->request->getVar('level'),
                'is_active' => $this->request->getVar('is_active'),
                'is_verif' => 1,
            ];
            $model->save($data);
            session()->setFlashdata("message", "Data Berhasil Di Tambahakan");
            return redirect()->route('LevelAccessAdmin');
        } else {
            $data['validation'] = $this->validator;
        }
    }

    public function EditLevelAccess($id)
    {
        // $model = new AdminModel();
        // $data['check'] = $model->where('id_user', $id)->first();

        // $validation =  \Config\Services::validation();
        // $validation->setRules([
        //     'id_user' => 'required',
        //     'title' => 'required'
        // ]);
        // $isDataValid = $validation->withRequest($this->request)->run();
        // // jika data vlid, maka simpan ke database
        // if ($isDataValid) {
        //     $model->update($id, [
        //         "title" => $this->request->getPost('title'),
        //         "content" => $this->request->getPost('content'),
        //         "status" => $this->request->getPost('status')
        //     ]);
        //     return redirect('admin/news');
        // }

        // // tampilkan form edit
        // echo view('admin_edit_news', $data);
    }

    public function DelLevelAccess($id = null)
    {
        $model = new AdminModel();
        $data['check'] = $model->where('id_user', $id)->delete();

        session()->setFlashdata('message', 'Data berhasil di delete');
        return redirect()->route('LevelAccessAdmin');
    }

    // data presensi guru
    public function PresensiGuru()
    {
        $model = new AdminModel();
        $data['data'] = $model->findAll();

        return view('admin/PresensiGuru', $data);
    }

    // data guru
    public function DataGuru()
    {
        $model = new AdminModel();
        $data['data'] = $model->findAll();

        return view('admin/DataGuru', $data);
    }

    // data user
    public function DataUser()
    {
        $model = new AdminModel();
        $data['datauser'] = $model->findAll();

        return view('Admin/DataUser', $data);
    }
    
    public function TambahDataGuru()
    {
        $rules = [
            'nama' => 'required',
            'email' => 'required|valid_email',
            'password' => 'required|min_length[8]',
        ];

        if ($this->validate($rules)) {
            $model = new AdminModel();
            $data = [
                'nama' => $this->request->getPost('nama'),
                'email' => $this->request->getPost('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'is_verif' => 1,
                'is_active' => 1,
                'level' => 1
            ];
            $model->save($data);
            session()->setFlashdata("message", "Akun berhasil dibuat");
            return redirect()->route('DataGuruAdmin');
        } else {
            $data['validation'] = $this->validator;
        }
    }

    public function TambahUser()
    {
        $rules = [
            'nama' => 'required',
            'email' => 'required|valid_email',
            'password' => 'required|min_length[8]',
            'is_verif' => 'required',
            'is_active' => 'required',
            'level' => 'required'
        ];

        if ($this->validate($rules)) {
            $model = new AdminModel();
            $data = [
                'nama' => $this->request->getPost('nama'),
                'email' => $this->request->getPost('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'is_verif' => $this->request->getPost('is_verif'),
                'is_active' => $this->request->getPost('is_active'),
                'level' => $this->request->getPost('level')
            ];
            $model->save($data);
            session()->setFlashdata("message", "Akun berhasil dibuat");
            return redirect()->route('DataUserAdmin');
        } else {
            $data['validation'] = $this->validator;
        }
    }
}
