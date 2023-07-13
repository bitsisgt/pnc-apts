<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\DataTables\UsersDataTable;
 
class UsersController extends Controller
{
    public function maintenance_users(UsersDataTable $dataTable)
    {
        return $dataTable->render('maintenance.users');
    }

    public function create()
    {
        return view('user_form');
    }


}
