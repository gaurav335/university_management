<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\MeritRound;
use App\Models\Addmissions;
use App\Models\CollegeMerit;
use App\Models\AddmissionConfimation;
use App\Models\User;
use DateTime;


class IndexController extends Controller
{
    public function home()
    {

        // if(Auth::user())
        // {

        //     $date = new DateTime();
        //     $today = $date->format('Y-m-d');
        //     $meritRound = MeritRound::where('status', '1')->get();
        //     $addmissionUser = Addmissions::where('user_id',Auth::user()->id)->get();
        //     $admissioncheck = Addmissions::where('user_id',Auth::user()->id)->first();
        //     $conformation = AddmissionConfimation::where('addmission_id',$admissioncheck->id)->first();
        //     if(empty($conformation->addmission_id))
        //     {
        //         $collegeMerit = CollegeMerit::all();
        //         foreach($meritRound as $merit)
        //         {
        //             foreach($addmissionUser as $users)
        //             {
        //                 foreach($collegeMerit as $clgmerits)
        //                 {
        //                     if($today == $merit->merit_result_declare_date)
        //                     {
        //                         if($users->merit >=$clgmerits->merit  && in_array($clgmerits->college_id,$users->college_id) && $clgmerits->course_id == $users->course_id)
        //                         {
        //                             AddmissionConfimation::create([
        //                                 'addmission_id' => $users->id,
        //                                 'confirm_college_id' => $clgmerits->college_id,
        //                                 'confirm_round_id' => $clgmerits->merit_round_id,
        //                                 'confirm_merit' => $users->merit,
        //                             ]);
        //                         }
        //                     }
        //                 }
        //             }
                    
        //         }
        //     }
        // }
        return view("student.home");
    }

    public function about()
    {
        return view("student.about");
    }

    public function lecturers()
    {
        return view("student.lecturers");
    }

    public function news()
    {
        return view("student.news");
    }

    public function newsDetails()
    {
        return view("student.newsdetails");
    }

    public function event()
    {
        return view("student.event");
    }

    public function eventDetails()
    {
        return view("student.eventdetails");
    }

    public function gallery()
    {
        return view("student.gallery");
    }

    public function contact()
    {
        return view("student.contact");
    }

    public function reserech()
    {
        return view("student.reserech");
    }

    public function reserechDetails()
    {
        return view("student.reserechdetails");
    }

    public function faq()
    {
        return view("student.faq");
    }

    public function store()
    {
        return view("student.store");
    }
}
