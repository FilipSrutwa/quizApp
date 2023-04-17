<?php

namespace App\Controllers;

use App\Models\TestResults;

class MyResults extends BaseController
{
    public function getIndex()
    {
        if (session_status() == PHP_SESSION_NONE)
            session_start();
        $data = [
            'foundResults' => $this->grabResults($_SESSION['accID']),
        ];

        return view('myResults', $data);
    }
    private function grabResults($accID)
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT tests.Name AS Name, Points, Max_points AS MaxPoints FROM tests_results INNER JOIN tests ON tests.ID = Test_ID WHERE Acc_ID = " . $accID . ";");
        $result = $query->getResultArray();

        return $result;
    }
}
