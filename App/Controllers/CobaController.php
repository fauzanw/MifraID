<?php

use App\Services\Controller;
use App\Models\User;

class CobaController extends Controller {
    public function index()
    {
        echo User::all();
    }
}