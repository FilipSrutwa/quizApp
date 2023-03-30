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

    private function grabQuestions()
    {
        $questions = new QuestionModel();
        $foundQuestions = $questions->findAll();

        return $foundQuestions;
    }
    private function grabAnswers()
    {
        $answers = new AnswerModel();
        $foundAnswers = $answers->findAll();

        return $foundAnswers;
    }
    private function grabCategories()
    {
        $categories = new CategoryModel();
        $foundCategories = $categories->findAll();

        return $foundCategories;
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
