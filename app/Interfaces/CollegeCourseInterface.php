<?php

namespace App\Interfaces;

interface CollegeCourseInterface
{
    public function addCollegeCourse($data);
    public function editCollegeCourse($data);
    public function updateCollegeCourse($data);
    public function deleteCollegeCourse($data);
}
?>