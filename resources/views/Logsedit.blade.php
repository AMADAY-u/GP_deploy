@extends('layouts.app')
@section('content')
    <div class="row container">
        <div class="col-md-12 my-4">
            <!-- ↓バリデーションエラーの表示に使用-->
    
            <!-- ↑バリデーションエラーの表示に使用-->
            <form action="{{ url('Logs/update') }}" method="POST">
            @csrf
            
            <!-- タイトル -->
            <div class="form-group col-md-6 p-2">
                <label for="pet_title" class="col-sm-3 control-label">タイトル</label>
                <input type="text" name="pet_title" class="form-control" id="pet_title" value="{{$Log->pet_title}}">
            </div>
            <!-- 餌の内容物 -->
            <div class="form-group col-md-6 p-2">
                <label for="pet_foodname" class="col-sm-3 control-label">食べ物は？</label>
                <input type="text" name="pet_foodname" class="form-control" id="pet_foodname" value="{{$Log->pet_foodname}}">
            </div>
            <!-- 活動量 -->
            <div class="form-group col-md-6 p-2">
                <label for="pet_activity" class="col-sm-3 control-label">どれくらい活発？</label>
               <input type="text" name="pet_activity" class="form-control" id="pet_activity" value="{{$Log->pet_activity}}">
            </div>
            <!-- 食欲 -->
            <div class="form-group col-md-6 p-2">
                <label for="pet_hungry" class="col-sm-3 control-label">食欲はある？</label>
                <input type="text" name="pet_hungry" class="form-control" id="pet_hungry" value="{{$Log->pet_hungry}}">
            </div>
            <!-- コメント -->
            <div class="form-group col-md-6 p-2">
                <label for="pet_comment" class="col-sm-3 control-label">コメント</label>
                <input type="textarea" name="pet_comment" class="form-control" id="pet_comment" value="{{$Log->pet_comment}}">
            </div>
            
            
            <!-- Save ボタン/Back ボタン -->
                <div class="form-group p-2">
	                <div class="well well-sm">
	                    <button type="submit" class="btn btn-primary">Save</button>
	                    <a class="btn btn-link pull-right" href="{{ url('/Logslist') }}"> Back</a>
	                </div>
                </div>
                <!--/ Save ボタン/Back ボタン -->
                
                <!-- id 値を送信 -->
                <input type="hidden" name="id" value="{{$Log->id}}" />
                <!--/ id 値を送信 -->
                
                <!-- CSRF -->
                @csrf
                <!--/ CSRF -->
            </form>
        </div>
    </div>
@endsection