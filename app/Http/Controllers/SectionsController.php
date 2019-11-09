<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class SectionsController extends Controller
{
    public function index()
    {
    	$sections = DB::table('sections')->get();
    	return view('section.index' , compact('sections'));

    }

    public function filter()
    {
    	$studnts = DB::table('students')
    		->rightjoin('payments', 'students.id', '=', 'payments.students_id')
          
    		->where('section_id', request()->secttion_id)
    		->get();

    	return $students;
    }

}
