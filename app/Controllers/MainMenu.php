<?php

namespace App\Controllers;

use App\Models\TestModel;
use App\Models\TestResults;

class MainMenu extends BaseController
{
    public function getIndex()
    {
        if (session_status() == PHP_SESSION_NONE)
            session_start();

        if ($_SESSION['loginType'] == 2) {
            $data = [
                'testsToDo' => $this->grabTests(),
            ];
            return view('mainMenu', $data);
        } else
            return view('mainMenu');
    }
    private function grabTests()
    {
        if (session_status() == PHP_SESSION_NONE)
            session_start();

        $tests = new TestModel();
        $foundTests = $tests->where('Class', $_SESSION['class'])->findAll();

        $finishedTests = new TestResults();
        $foundFinishedTests = $finishedTests->where('Acc_ID', $_SESSION['accID'])->findAll();

        $distinctTests = array();
        foreach ($foundTests as $foundTest) {
            $duplicatesCounter = 0;
            foreach ($foundFinishedTests as $finishedTest) {
                if ($finishedTest['Test_ID'] == $foundTest['ID'])
                    $duplicatesCounter++;
            }
            if ($duplicatesCounter == 0)
                $distinctTests[] = $foundTest;
        }

        return $distinctTests;
    }
}
