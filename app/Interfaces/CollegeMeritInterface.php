<?php

namespace App\Interfaces;

interface CollegeMeritInterface
{
    public function selectMeritRound($data);
    public function addMeritRound($data);
    public function editMeritRound($data);
    public function updateMeritRound($data);
    public function deleteMeritRound($data);
}
?>