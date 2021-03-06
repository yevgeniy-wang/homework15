<?php


namespace App\Http\Controllers;


class AdminController
{
    public function __invoke()
    {
        return view('pages.admin');
    }
}
