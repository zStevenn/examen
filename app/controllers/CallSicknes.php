<?php

namespace TDD\controllers;

use TDD\libraries\Controller;


class CallSicknes extends Controller
{
    private $Callsickmodel;
    private $Emailcheck;


    public function __construct()
    {
        //initiate the model
        $this->Callsickmodel = $this->model('CallSick');
        $this->Emailcheck = $this->model('Instructor');
    }

    public function index()
    {
        // array to put the data in to give to the view
        $data=
            [
                'email'=> '',
                'reason'=>'',
                'emailError'=>''
            ];
        //looking for a post data to be send from the view
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $_POST = filter_input_array(INPUT_POST);
            $data=
                [
                    'email'=>$_POST['email'],
                    'reason'=>$_POST['reason']
                ];

            $data = $this->validateCreateForm($data);

            if(empty($data['emailError']))
            {
                if($this->Emailcheck->checkemail($data))
                {
                    if ($this->Callsickmodel->createSicknes($data)) {
                        header('location: ' . URLROOT . './CallSicknes/index');
                    } else {
                        die('something went wrong');
                    }
                }
            }else
            {
                echo "<div class='alert alert-danger' role='alert'>
                            Geen email ingevuld
                        </div>";
                header("Refresh:3; url=" . URLROOT . "/callsicknes/index");
            }
        }
        //bring the data to the view
        $this->view('CallSicknes/index', $data);
        $this->view('CallSicknes/index', $data);
    }

    private function validateCreateForm($data) {


        if(empty($data['email']))
        {
            $data['emailError'] = 'please fill in a vallid email';
        }
        return $data;
    }
}