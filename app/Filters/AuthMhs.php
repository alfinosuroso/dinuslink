<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthMhs implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Do something here    
        if (session()->has('isLoggedIn')) {
            $role = session()->get('role');
            if ($role === 'mahasiswa') {
                return redirect()->to(site_url('/'));
            } 
        } 
        // Jika user belum login dan menuju route admin
        else if (!session()->has('isLoggedIn')) {
              return redirect()->to(site_url('/'));
        }
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
