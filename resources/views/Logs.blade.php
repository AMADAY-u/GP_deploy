@extends('layouts.app')
@section('content')
    <!-- Bootstrapの定形コード… -->
    <div class="card-body my-4">
        <h1 class="card-title">
            投稿フォーム
        </h1>
        
        <!-- ↓バリデーションエラーの表示に使用-->
        <!-- ↑バリデーションエラーの表示に使用-->

        <!-- 本登録フォーム -->
        <form action="{{ url('Logs') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            <!-- 画像 -->
             <div class="form-group col-md-6 p-2">
                <label for="pet_title" class="col-sm-3 control-label">投稿画像</label>
                <input type="file" name="image" class="form-control" id="image" >
            </div>
            <!-- タイトル -->
            <div class="form-group col-md-6 p-2">
                <label for="pet_title" class="col-sm-3 control-label">タイトル</label>
                <input type="text" name="pet_title" class="form-control" id="pet_title" value="{{ old('pet_title') }}">
            </div>
            <!-- 餌の内容物 -->
            <div class="form-group col-md-6 p-2">
                <label for="pet_foodname" class="col-sm-3 control-label">食べ物は？</label>
                <input type="text" name="pet_foodname" class="form-control" id="pet_foodname" value="{{ old('pet_foodname') }}">
            </div>
            <!-- 活動量 -->
            <div class="form-group col-md-6 p-2">
                <label for="pet_activity" class="col-sm-3 control-label">どれくらい活発？</label>
    <!--            <input type="text" name="pet_activity" class="form-control" id="pet_activity" value="{{ old('pet_activity') }}">-->
				<select class="browser-default form-control" name="pet_activity">
					<option name="pet_activity" class="form-control" id="pet_activity" value="" disabled selected>どれくらい元気かをお答えください。</option>
					<option name="pet_activity" class="form-control" id="pet_activity" value="5">元気が良過ぎる!!</option>
					<option name="pet_activity" class="form-control" id="pet_activity" value="4">元気良い!</option>
					<option name="pet_activity" class="form-control" id="pet_activity" value="3">いつも通り</option>
					<option name="pet_activity" class="form-control" id="pet_activity" value="2">あまり元気がない</option>
					<option name="pet_activity" class="form-control" id="pet_activity" value="1">動かない</option>
				</select>
            </div>
            <!-- 食欲 -->
            <div class="form-group col-md-6 p-2">
                <label for="pet_hungry" class="col-sm-3 control-label">食欲はある？</label>
                <!--<input type="text" name="pet_hungry" class="form-control" id="pet_hungry" value="{{ old('pet_hungry') }}">-->
            	<select class="browser-default form-control" name="pet_hungry">
					<option name="pet_activity" class="form-control" id="pet_hungry" value="" disabled selected>食欲についてをお答えください。</option>
					<option name="pet_activity" class="form-control" id="pet_hungry" value="5">よく食べる！！（100％）</option>
					<option name="pet_activity" class="form-control" id="pet_hungry" value="4">そこそこ食べる！（80％）</option>
					<option name="pet_activity" class="form-control" id="pet_hungry" value="3">前より食べない（60％）</option>
					<option name="pet_activity" class="form-control" id="pet_hungry" value="2">ほとんど食べない（40％</option>
					<option name="pet_activity" class="form-control" id="pet_hungry" value="1">ぜんぜん食べない（20％</option>
				</select>
            </div>
            <!-- コメント -->
            <div class="form-group col-md-6 p-2">
                <label for="pet_comment" class="col-sm-3 control-label">コメント</label>
                <input type="textarea" name="pet_comment" class="form-control" id="pet_comment" value="{{ old('pet_comment') }}">
            </div>
            
            <div class="form-group col-md-6 p-2 row g-2">
                <label for="pet_comment" class="col-sm-3 control-label">今の状態は？</label>
        			<label class=" col-6">
        				<input class="col-6" name="comment_check" type="radio" value="1"/>
        				<span>健康(^_^)</span>
        			</label>
        			<label class="with-gap col-6">
        				<input class="with-gap col-6" name="comment_check" type="radio" value="0"/>
        				<span>不調(＞＜)</span>
        			</label>
            </div>
            
            
            <!-- 本 登録ボタン -->
            <div class="form-group p-2">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-primary">
                        Save
                    </button>
                </div>
            </div>
        </form>
    </div>
    

@endsection