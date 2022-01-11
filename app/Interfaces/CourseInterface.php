<?php

namespace App\Interfaces;

interface CourseInterface
{
    public function addCourse($data);
    public function editCourse($data);
    public function updateCourse($data);
    public function deleteCourse($data);
    public function statusCourse($data);
}

?>
