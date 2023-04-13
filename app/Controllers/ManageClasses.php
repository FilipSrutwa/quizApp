<?php

namespace App\Controllers;

use App\Models\ClassModel;

class ManageClasses extends BaseController
{
    public function getIndex()
    {
        $data = [
            'foundClasses' => $this->grabClasses(),
        ];
        return view('manageClasses', $data);
    }

    public function getAddClass()
    {
        return view('addClass');
    }

    public function getEditClass($classID)
    {
        $data = [
            'class' => $this->grabClass($classID),
        ];
        return view('editClass', $data);
    }

    public function postEditClass($classID)
    {
        $data = [
            'Name' => $_POST['name'],
        ];
        $class = new ClassModel();
        $class->update($classID, $data);

        return redirect()->to(site_url() . '/ManageClasses');
    }

    public function getDropClass($classID)
    {
        $class = new ClassModel();
        $class->delete($classID, true);

        return redirect()->to(site_url() . '/ManageClasses');
    }
    public function postAddClass()
    {
        $class = new ClassModel();
        $data = [
            'Name' => $_POST['name'],
        ];
        $class->insert($data);

        return redirect()->to(site_url() . '/ManageClasses');
    }

    private function grabClasses()
    {
        $class = new ClassModel();
        $foundClasses = $class->findAll();

        return $foundClasses;
    }
    private function grabClass($classID)
    {
        $class = new ClassModel();
        $foundClass = $class->find($classID);
        return $foundClass;
    }
}
