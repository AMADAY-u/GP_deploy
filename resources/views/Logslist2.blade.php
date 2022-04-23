@extends('layouts.app')
@section('content')
    <!-- Book: 既に登録されてる本のリスト -->
    @if (count($Logs) > 0)
        <div class="my-5">
            <table class="table table-striped task-table">
                <!-- テーブルヘッダ -->
                <div>
                    <h1>不調一覧</h1>
                </div>
                <!-- テーブル本体 -->
                <div class="d-flex flex-wrap">
                    @foreach ($Logs as $Log)
                        @if($Log->comment_check == 0)
                            <div  style="width:33%; height:100%;">
                                
                                <div class="shadow rounded-9" >
                                    <a href="{{ url('Logdetail/'.$Log->id) }}">
                                        <!-- 画像 -->
                                        <div >
                                            <div> <img src="upload/{{$Log->image}}" width='100%' height='128px'　style="object-fit:cover"></div>
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