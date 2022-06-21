<?php
namespace TDD\controllers;

use TDD\libraries\Controller;

class Announcements extends Controller {

     // Properties, fields
     private $AnnouncementModel;
    public function __construct()
    {
        $this->AnnouncementModel = $this->model('Announcement');
    }
 
 
    public function index() {
        $data = [
            'title' => "annoucments"
          ];
          $this->view('/annoucements/index', $data);
  }
}