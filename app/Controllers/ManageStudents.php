<?php

namespace App\Controllers;

use App\Models\AccountModel;

class ManageStudents extends BaseController
{
    public function getIndex()
    {
        $data = [
            'foundStudents' => $this->grabStudents(),
        ];
        return view('manageStudents', $data);
    }

    private function grabStudents()
    {
        $db = \Config\Database::connect();
        $sql = 'SELECT accounts.ID AS ID, accounts.Name as Name, accounts.Surname as Surname, classes.Name AS Class FROM accounts INNER JOIN classes ON classes.ID = accounts.Class WHERE accounts.Class IS NOT NULL';
        $query = $db->query($sql);

        $results = $query->getResultArray();
        return $results;
    }
}
