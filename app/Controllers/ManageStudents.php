<?php

namespace App\Controllers;

use App\Models\AccountModel;
use App\Models\ClassModel;

class ManageStudents extends BaseController
{
    public function getIndex()
    {
        $data = [
            'foundStudents' => $this->grabStudents(),
        ];
        return view('manageStudents', $data);
    }

    public function getStudent($studentID)
    {
        $data = [
            'foundStudent' => $this->grabStudent($studentID),
        ];
        return view('manageStudent', $data);
    }

    public function getEditStudent($studentID)
    {
        $data = [
            'foundStudent' => $this->grabStudent($studentID),
            'foundClasses' => $this->grabClasses(),
        ];
        return view('editStudent', $data);
    }
    public function postEditStudent($studentID)
    {
        $data = [
            'Login' => $_POST['login'],
            'Password' => $_POST['password'],
            'Name' => $_POST['name'],
            'Surname' => $_POST['surname'],
            'Class' => $_POST['class'],
        ];

        $acc = new AccountModel();
        $acc->update($_POST['accID'], $data);

        return redirect()->to(site_url() . '/ManageStudents/student/' . $_POST['accID']);
    }
    public function getAddStudent()
    {
        $data = [
            'foundClasses' => $this->grabClasses(),
        ];
        return view('addStudent', $data);
    }
    public function postAddStudent()
    {
        $data = [
            'Login' => $_POST['login'],
            'Password' => $_POST['password'],
            'Name' => $_POST['name'],
            'Surname' => $_POST['surname'],
            'Class' => $_POST['class'],
            'Acc_type' => $_POST['accType'],
        ];

        $acc = new AccountModel();
        $acc->save($data);
        return redirect()->to(site_url() . '/ManageStudents');
    }

    //funkcje i usuwanko
    public function getDropStudent($studentID)
    {
        $acc = new AccountModel();
        $acc->delete($studentID, true);

        return redirect()->to(site_url() . '/ManageStudents');
    }

    private function grabStudents()
    {
        $db = \Config\Database::connect();
        $sql = 'SELECT accounts.ID AS ID, accounts.Name as Name, accounts.Surname as Surname, classes.Name AS Class FROM accounts INNER JOIN classes ON classes.ID = accounts.Class WHERE accounts.Class IS NOT NULL';
        $query = $db->query($sql);

        $results = $query->getResultArray();
        return $results;
    }
    private function grabStudent($studentID)
    {
        $db = \Config\Database::connect();
        $sql = 'SELECT accounts.ID AS ID,accounts.Login AS Login, accounts.Name as Name, accounts.Surname as Surname, classes.Name AS Class, accounts.Class AS ClassID,accounts.Password AS Password FROM accounts INNER JOIN classes ON classes.ID = accounts.Class WHERE accounts.Class IS NOT NULL AND accounts.ID = ' . $studentID;
        $query = $db->query($sql);

        $results = $query->getRow();
        return $results;
    }
    private function grabClasses()
    {
        $class = new ClassModel();

        return $class->findAll();
    }
}
