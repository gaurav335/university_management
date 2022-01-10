<?php

namespace App\Interfaces;

interface CollegeInterface
{
    public function addCollege($data);
    public function editCollege($data);
    public function updateCollege($data);
    public function deleteCollege($data);
    public function statusCollege($data);

}

?>