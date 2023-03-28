<?php

namespace App\Controllers;

class Logout extends BaseController
{
    public function getIndex()
    {
        if (session_status() === PHP_SESSION_NONE)
            session_start();

        session_destroy();
        return redirect()->to(site_url());
    }
}
