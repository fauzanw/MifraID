<?php

class WelcomeController extends Controller {
    public function index()
    {
        return $this->view('welcome');
    }
}