@extends('layouts.app')
@section('content')
    <!-- Bootstrapの定形コード… -->
    <div class="card-body my-4">
        <div class="card-title text-center fw-bold fs-3">
             プロフィール作成
        </div>
        
        <!-- ↓バリデーションエラーの表示に使用-->
        <!-- ↑バリデーションエラーの表示に使用-->

        <!-- 本登録フォーム -->
        <form action="{{ url('Profiles') }}" method="POST" class="form-horizontal">
            @csrf
            <!-- 名前 -->
            <div class="form-group col-md-6 p-2">
                <label for="pet_name" class="col-sm-3 control-label">ペットの名前</label>
                <input type="text" name="pet_name" class="form-control" id="pet_name" value="{{ old('pet_name') }}">
            </div>
            <!-- 品種 -->
            <div class="form-group col-md-6 p-2">
                <label for="pet_specie" class="col-sm-3 control-label">品種</label>
                <input type="text" name="pet_specie" class="form-control" id="pet_specie" value="{{ old('pet_specie') }}">
            </div>
            <!-- 年齢 -->
            <div class="form-group col-md-6 p-2">
                <label for="pet_age" class="col-sm-3 control-label">年齢</label>
                <input type="text" name="pet_age" class="form-control" id="pet_age" value="{{ old('pet_age') }}">
            </div>
            <!-- 性別 -->
            <div class="form-group col-md-6 p-2">
                <label for="pet_sex" class="col-sm-3 control-label">性別（不妊）</label>
                <input type="text" name="pet_sex" class="form-control" id="pet_sex" value="{{ old('pet_sex') }}">
            </div>
            <!-- 誕生日 -->
            <div class="form-group col-md-6 p-2">
                <label for="pet_birth" class="col-sm-3 control-label">誕生日</label>
                <input type="date" name="pet_birth" class="form-control" id="pet_birth" value="{{ old('pet_birth') }}">
            </div>
            <!-- comment -->
            <div class="form-group col-md-6 p-2">
                <label for="pet_content" class="col-sm-3 control-label">コメント</label>
                <input type="textarea" name="pet_content" class="form-control" id="pet_content" value="{{ old('pet_content') }}">
            </div>
            
            <!-- profile 登録ボタン -->
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