<?php

namespace App\Interfaces;

interface StudentInterface
{
    public function studentRag($data);
    public function checkStudentEmail($data);
    public function checkStudentContactNo($data);

    public function addStudentMarks($data);
    public function updateStudentMarks($data);

    public function addAdminssionForm($data);

}