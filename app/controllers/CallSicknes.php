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
                    'reason'=>$_POST['reason'],
                ];
        }
        // looking if email is empty
        if(empty($data['email']))
        {
            $data['emailError'] = 'please fill in a vallid email';
        }else
        {
            $data['emailError'] = '';
        }
        // looking for the empty email error to send the data if it is empty
        if(empty($data['emailError']))
        {
            if($this->Emailcheck->checkemail($data))
            {
                if ($this->Callsickmodel->createSicknes($data)) {
                    header('location: ' . URLROOT . './CallSicknes/index');
                } else {
                    die('something went wrong');
                }
            }else
            {
                echo "something went wrong";
            }
        }else
        {
            $data['emailError'] = 'please fill in a vallid email';
        }
        //bring the data to the view
        $this->view('CallSicknes/index', $data);
    }
}