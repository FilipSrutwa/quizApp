<?php

namespace App\Controllers;

class ManageStudents extends BaseController
{
    public function getIndex()
    {
        return view('manageStudents');
    }



    private function grabStudents()
    {
    }
}
