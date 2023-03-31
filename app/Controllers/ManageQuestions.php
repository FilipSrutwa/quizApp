<?php

namespace App\Controllers;

use App\Models\AnswerModel;
use App\Models\QuestionModel;
use App\Models\CategoryModel;

class ManageQuestions extends BaseController
{
    public function getIndex()
    {
        $data = [
            'foundQuestionsWithCategories' => $this->grabQuestionsWithCategories(),
            'foundAnswers' => $this->grabAnswers(),
        ];
        return view('manageQuestions', $data);
    }

    public function getQuestion($questionID)
    {
        $data = [
            'foundQuestion' => $this->grabQuestion($questionID),
            'foundAnswers' => $this->grabAnswersToQuestion($questionID),
        ];
        return view('question', $data);
    }
    public function getEditQuestion($questionID)
    {
        $data = [
            'foundQuestion' => $this->grabQuestion($questionID),
            'foundAnswers' => $this->grabAnswersToQuestion($questionID),
        ];
        return view('editQuestion', $data);
    }

    public function getAddQuestion()
    {
        $data = [
            'foundCategories' => $this->grabCategories(),
        ];
        return view('addQuestion', $data);
    }
    public function postAddQuestion()
    {
        $questionData = [
            'Category' => $_POST['category'],
            'Name' => $_POST['name'],
        ];
        $question = new QuestionModel();
        $question->insert($questionData);

        //pobranie ID ze wstawionego rekordu z bazy danych
        $db = \Config\Database::connect();
        $query = $db->query("SELECT ID FROM questions ORDER BY id DESC LIMIT 1");
        $questionID = $query->getRow();

        $correctAnswerData = [
            'Question' => $questionID->ID,
            'Answer' => $_POST['correctAnswer'],
            'isTrue' => 1,
        ];
        $answer = new AnswerModel();
        $answer->insert($correctAnswerData);

        $answerNamesInForm = array('secondAnswer', 'thirdAnswer', 'fourthAnswer');
        for ($i = 0; $i < 3; $i++) {
            $answerData = [
                'Question' => $questionID->ID,
                'Answer' => $_POST[$answerNamesInForm[$i]],
                'isTrue' => 0,
            ];
            $incorrectAnswer = new AnswerModel();
            $incorrectAnswer->insert($answerData);
        }

        return redirect()->to(site_url() . '/ManageQuestions');
    }
    public function getDropQuestion($questionID)
    {
        $db = \Config\Database::connect();
        $sql = 'DELETE FROM answers WHERE Question = ?';
        $query = $db->query($sql, $questionID);
        $sql = 'DELETE FROM questions WHERE ID = ?';
        $query = $db->query($sql, $questionID);

        return redirect()->to(site_url() . '/ManageQuestions');
    }
    private function grabCategories()
    {
        $categories = new CategoryModel();
        $foundCategories = $categories->findAll();

        return $foundCategories;
    }
    private function grabQuestion($questionID)
    {
        $question = new QuestionModel();
        $foundQuestion = $question->find($questionID);

        return $foundQuestion;
    }
    private function grabAnswersToQuestion($questionID)
    {
        $answers = new AnswerModel();
        $foundAnswers = $answers->where('Question', $questionID)->findAll();

        return $foundAnswers;
    }
    private function grabAnswers()
    {
        $answers = new AnswerModel();
        $foundAnswers = $answers->findAll();

        return $foundAnswers;
    }
    private function grabQuestionsWithCategories()
    {
        $db = \Config\Database::connect();
        $sql = 'SELECT questions.ID AS ID, questions.Name AS Name, categories.Name AS CategoryName FROM questions INNER JOIN categories ON questions.Category = categories.ID';
        $query = $db->query($sql);
        $results = $query->getResultArray();

        return $results;
    }
}
