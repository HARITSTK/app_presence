<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class RoleCheck extends FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();
        if (!$session->get('isLoggedIn')) {
            return redirect()->route('/');
        }

        // Periksa hak akses pengguna
        $role_id = $session->get('id_level');
        if ($role_id != 1 && $role_id != 2) {
            return redirect()->route('/forbidden');
        }

        // // Periksa apakah sesi masih berlaku
        // $loginTime = $session->get('loginTime');
        // $currentTime = time();
        // $sessionExpiration = config('App')->sessionExpiration;

        // if (($currentTime - $loginTime) > $sessionExpiration) {
        //     // Hapus sesi dan arahkan ke halaman login
        //     $session->destroy();
        //     return redirect()->to('/login');
        // } else {
        //     // Update waktu login untuk memperpanjang sesi
        //     $session->set('loginTime', $currentTime);
        // }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
