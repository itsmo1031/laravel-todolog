<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * 세션 정보를 사용하기 위해 web 미들웨어 그룹 지정.
    *
    * @return void
    */
    public function __construct() //1
    {
        $this->middleware('web');
    }
    
    /**
     * 사이트 웰컴 화면
     *
     * @return \Illuminate\Http\Response
     */
    public function index()  //2
    {
        // 3 사용자, 프로젝트, 태스트 수 가져오기. 아직 모델을 생성하지 않았으므로 0 으로 설정
        $userCount = 0; //User::count();  
        $projectCount = 0; //Project::count();
        $taskCount = 0; //Task::count();
    
        $total = [ 'user' => $userCount,
            'project' => $projectCount,
            'task' => $taskCount,
        ];
        return view('welcome')->with('total', $total);
    }
}
