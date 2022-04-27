@extends('layouts.app')
@section('content')
    <!-- Book: 既に登録されてる本のリスト -->
    @if (count($Logs) > 0)
        <div class="my-5">
            <table class="table table-striped task-table">
                <!-- テーブルヘッダ -->
                <div class="card-title text-center">
                    <h1>健康一覧</h1>
                </div>
                <!-- テーブル本体 -->
                <div class="d-flex flex-wrap">
                    @foreach ($Logs as $Log)
                        @if($Log->comment_check == 1)
                            <div  style="width:33.3%; height:100%;">
                                
                                <div class="" >
                                    
                                    <a href="{{ url('Logdetail/'.$Log->id) }}">
                                        <!-- 画像 -->
                                        <div >
                                            <div> <img src="upload/{{$Log->image}}" width='100%' height='123.75px' style="object-fit:cover"></div>
                                        </div>
                                        <!-- タイトル -->
                                        
                                            <!--<div style="text-align: center;">{{ $Log->pet_title }}</div>-->
                                    </a>
                                </div>
                            </div>  
                        @endif
                    @endforeach
                </div>
            </table>
        </div>
    @endif
@endsection