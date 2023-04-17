<?php

namespace App\Controllers;

use App\Models\TestResults;

class StudentsResults extends BaseController
{
    public function getIndex()
    {
        $data = [
            'foundResults' => $this->grabStudentsResults(),
        ];
        return view('studentsResults', $data);
    }
    public function getDropResult($resultID)
    {
        $testResult = new TestResults();
        $testResult->delete($resultID);

        return redirect()->to(site_url() . '/StudentsResults');
    }
    public function grabStudentsResults()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT tests_Results.ID AS ID, tests.Name AS TestName, accounts.Name AS StudentName, accounts.Surname AS StudentSurname, Points, Max_Points, Test_ID AS TestID FROM tests_results INNER JOIN accounts ON ACC_ID = accounts.ID INNER JOIN tests ON Test_ID = tests.ID;");
        $result = $query->getResultArray();

        return $result;
    }
}
