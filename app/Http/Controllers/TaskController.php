<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    //
    public function list3(){
        $tasks= [
            ['name' => 'Response 클래스 분석', 'due_date' => '2015-06-01 11:22:33'],
            ['name' => '블레이드 예제 작성', 'due_date' => '2015-06-03 15:12:42'],
        ]; 
        return view('task.list3')->with('tasks', $tasks);
    }

    public function param(Request $req, $id = 1, $arg = 'argument'){
        dump( ['path' => $req->path(),
               'url' => $req->url(),
               'fullUrl' => $req->fullUrl(),
               'method' => $req->method(),
               'name' => $req->get('name'),
               'ajax' => $req->ajax(),
               'header' => $req->header(),
              ]);
    }
}
