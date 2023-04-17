<?php

namespace App\Controllers;

use App\Models\TestModel;
use App\Models\TestQuestionModel;
use App\Models\AnswerModel;
use App\Models\QuestionModel;
use App\Models\TestResults;

class DoTest extends BaseController
{
    public function getIndex()
    {
    }
    public function getFillTest($testID)
    {
        $data = [
            'foundQuestions' => $this->grabQuestions($testID),
        ];
        return view('fillTest', $data);
    }

    public function postFillTest($testID)
    {
        if (session_status() == PHP_SESSION_NONE)
            session_start();

        $foundQuestions = $this->grabQuestions($testID);
        $maxPoints = count($foundQuestions);

        $earnedPoints = 0;
        foreach ($_POST as $key => $value) {
            if ($value == 1)
                $earnedPoints++;
        }

        echo $earnedPoints;
        echo $maxPoints;

        //saving data
        $dataToSave = [
            'Test_ID' => $testID,
            'Acc_ID' => $_SESSION['accID'],
            'Points' => $earnedPoints,
            'Max_points' => $maxPoints,
        ];
        $testsResults = new TestResults();
        $testsResults->save($dataToSave);

        return redirect()->to(site_url() . '/MyResults');
    }
    private function grabTest($testID)
    {
        $tests = new TestModel();
        $foundTest = $tests->find($testID);

        return $foundTest;
    }
    private function grabQuestions($testID)
    {
        $testQuestions = new TestQuestionModel();
        $foundTestQuestions = $testQuestions->where('Test_ID', $testID)->findAll();

        $questionModel = new QuestionModel();
        $answersModel = new AnswerModel();
        $questionsWithAnswers = array();
        foreach ($foundTestQuestions as $testQuestion) {
            $foundQuestion = $questionModel->find($testQuestion['Question_ID']);
            $foundAnswers = $answersModel->where('Question', $foundQuestion['ID'])->findAll();

            $questionsWithAnswers[] = array(
                "testQuestionID" => $testQuestion['ID'],
                "questionName" => $foundQuestion['Name'],
                "questionID" => $foundQuestion['ID'],
                "correctAnswer" => $foundAnswers[0]['Answer'],
                "secondAnswer" => $foundAnswers[1]['Answer'],
                "thirdAnswer" => $foundAnswers[2]['Answer'],
                "fourthAnswer" => $foundAnswers[3]['Answer'],
            );
        }

        return $questionsWithAnswers;
    }
}
