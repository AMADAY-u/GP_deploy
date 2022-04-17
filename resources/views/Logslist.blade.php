@extends('layouts.app')
@section('content')
    <!-- Book: 既に登録されてる本のリスト -->
    @if (count($Logs) > 0)
        <div class="my-4">
            <table class="table table-striped task-table">
                <!-- テーブルヘッダ -->
                <div>
                    <h1>投稿一覧</h1>
                    <div>&nbsp;</div>
                </div>
                <!-- テーブル本体 -->
                <div class="d-flex flex-wrap">
                    @foreach ($Logs as $Log)
                        <div  style="width:49.5%; height:100%;">
                            <div class="shadow rounded-9" >
                                <a href="{{ url('Logdetail/'.$Log->id) }}">
                                    <!-- 画像 -->
                                    <div >
                                        <div> <img src="upload/{{$Log->image}}" width='100%' height='128px'></div>
                                    </div>
                                    <!-- タイトル -->
                                    
                                        <div style="text-align: center;">{{ $Log->pet_title }}</div>
                                </a>
                            </div>
                        </div>  
                    @endforeach
                </div>
            </table>
        </div>
    @endif
@endsection