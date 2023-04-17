<?php

namespace App\Controllers;

use function PHPUnit\Framework\isEmpty;

class Login extends BaseController
{
    public function getIndex()
    {
        return view('login');
    }
    public function getWrongCredentials()
    {
        return view('wrongCredentials');
    }
    public function postIndex()
    {
        $user = $this->checkLogin($_POST['login'], $_POST['password']);
        if (empty($user))
            return $this->getWrongCredentials();
        else {
            session_start();
            $_SESSION['loginType'] = $user->Acc_type; //1 - nauczyciel 2 - student
            $_SESSION['accID'] = $user->ID;
            $_SESSION['class'] = $user->Class;
            return redirect()->to('/MainMenu');
        }
    }
    private function checkLogin($login, $password)
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT ID,`Login`,`Password`,`Acc_type`,Class FROM Accounts WHERE Login = '$login' AND Password = '$password'");
        $result = $query->getRow();

        return $result;
    }
}
