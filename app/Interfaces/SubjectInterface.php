<?php

namespace App\Interfaces;

interface SubjectInterface
{
    public function addSubject($data);
    public function editSubject($data);
    public function updateSubject($data);
    public function deleteSubject($data);
    public function adminSubjectStatus($data);
}