<?php

use App\Services\Controller;

class WelcomeController extends Controller {
    public function index()
    {
        return $this->view('welcome');
    }
}