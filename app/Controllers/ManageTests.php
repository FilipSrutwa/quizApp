<?php

namespace App\Controllers;

use App\Models\AnswerModel;
use App\Models\ClassModel;
use App\Models\CategoryModel;
use App\Models\TestModel;
use App\Models\QuestionModel;
use App\Models\TestQuestionModel;

class ManageTests extends BaseController
{
    public function getIndex()
    {
        $data = [
            'foundTests' => $this->grabJoinedData(),
        ];
        return view('manageTests', $data);
    }

    public function getTest($testID)
    {
        $data = [
            'foundQuestions' => $this->grabQuestions($testID),
            'testID' => $testID,
        ];

        return view('test', $data);
    }

    public function getAddTest()
    {
        $data = [
            'foundClasses' => $this->grabClasses(),
            'foundCategories' => $this->grabCategories(),
        ];
        return view('addTest', $data);
    }

    public function postAddTest()
    {
        $data = [
            'Name' => $_POST['name'],
            'Class' => $_POST['class'],
            'Category' => $_POST['category'],
        ];

        $testModel = new TestModel();
        $testModel->save($data);

        return redirect()->to(site_url() . '/ManageTests');
    }

    public function getAddQuestionToTest($testID)
    {
        $data = [
            'testID' => $testID,
            'questions' => $this->grabDistinctQuestions($testID),
        ];
        return view('addQuestionToTest', $data);
    }

    public function postAddQuestionToTest($testID)
    {
        $data = [
            'Test_ID' => $testID,
            'Question_ID' => $_POST['questionID'],
        ];
        $testQuestionModel = new TestQuestionModel();
        $testQuestionModel->insert($data);
        return redirect()->to(site_url() . '/ManageTests/test/' . $testID);
    }

    public function getDropTestQuestion($testID)
    {
        $testQuestionModel = new TestQuestionModel();
        $testQuestionModel->delete($_GET['testQuestionID'], true);

        return redirect()->to(site_url() . '/ManageTests/test/' . $testID);
    }

    private function grabJoinedData()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT tests.ID AS ID, tests.Name AS Name, classes.Name AS Class, categories.Name AS Category FROM tests INNER JOIN classes ON classes.ID = tests.Class INNER JOIN categories ON categories.ID = tests.Category");
        $result = $query->getResultArray();

        return $result;
    }

    private function grabDistinctQuestions($testID)
    {
        $testModel = new TestModel();
        $foundTest = $testModel->find($testID);

        $questions = new QuestionModel();
        $foundQuestions = $questions->where('Category', $foundTest['Category'])->findAll();

        $testQuestionsModel = new TestQuestionModel();
        $foundTestQuestions = $testQuestionsModel->findAll();

        $distinctQuestions = array();
        foreach ($foundQuestions as $question) {
            $duplicatesCounter = 0;
            foreach ($foundTestQuestions as $testQuestion) {
                if ($question['ID'] == $testQuestion['Question_ID'])
                    $duplicatesCounter++;
            }
            if ($duplicatesCounter == 0)
                $distinctQuestions[] = $question;
        }
        return $distinctQuestions;
    }

    private function grabTest($testID)
    {
        $test = new TestModel();
        $foundTest = $test->find($testID);

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

    private function grabCategories()
    {
        $categories = new CategoryModel();
        $foundCategories = $categories->findAll();

        return $foundCategories;
    }

    private function grabClasses()
    {
        $class = new ClassModel();
        $foundClasses = $class->findAll();

        return $foundClasses;
    }
}
