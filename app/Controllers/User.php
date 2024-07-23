<?php

namespace App\Controllers;

class User extends BaseController
{
    public function index(): string
    {
        return view('User/Dashboard');
    }

    public function Presensiguru()
    {
        return view('User/PresensiGuru');
    }

    public function Jadwal()
    {
        return view('User/JadwalUser');
    }
}
