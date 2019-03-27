@extends('layouts.app')
 
{{-- 1 --}}
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="card">
                <div class="card-header text-center">라라벨 Todo 사이트</div> {{-- 2 --}}
 
                <div class="card-body">
                    <div class="card-text">
                            총 가입자 수 : {{ $total['user'] }}</p> {{-- 3 --}}
                            프로젝트  수 : {{ $total['project'] }}</p>
                            Task     수 : {{ $total['task'] }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection