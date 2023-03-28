<?php

namespace App\Controllers;

use App\Models\AccountModel;

class ManageAccount extends BaseController
{
    public function getIndex()
    {
        $accFound = $this->grabAccount();
        $data = [
            'login' => $accFound['Login'],
            'ID' => $accFound['ID'],
            'name' => $accFound['Name'],
            'surname' => $accFound['Surname'],
        ];
        return view('manageAccount', $data);
    }

    public function getEditAccount()
    {
        $accFound = $this->grabAccount();
        $data = [
            'login' => $accFound['Login'],
            'ID' => $accFound['ID'],
            'password' => $accFound['Password'],
            'name' => $accFound['Name'],
            'surname' => $accFound['Surname'],
        ];
        return view('editAccount', $data);
    }
    public function postEditAccount()
    {
        $data = [
            'Login' => $_POST['login'],
            'Password' => $_POST['password'],
            'Name' => $_POST['name'],
            'Surname' => $_POST['surname'],
        ];
        $acc = new AccountModel();
        $acc->update($_POST['accID'], $data);

        return redirect()->to(site_url() . '/ManageAccount');
    }

    private function grabAccount()
    {
        if (session_status() === PHP_SESSION_NONE)
            session_start();
        $acc = new AccountModel();
        $accFound = $acc->find($_SESSION['accID']);

        return $accFound;
    }
}
