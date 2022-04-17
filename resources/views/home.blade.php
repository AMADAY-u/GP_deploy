@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    <!--↓ここから追加↓-->
                    
                   
                    
                    <div class="alert alert-primary">
                            <!-- Book: 既に登録されてる本のリスト -->
                           <p>Profile)</p>
                            @if(isset($profiles))
        
                                <tr>
                                    <!-- タイトル -->
                                    <td class="table-text ">
                                        <h2 class="pb-1 text-black">{{ $profiles->pet_name}} ちゃん</h2>
                                        
                                            <div class="container">
                                                <div class="row g-2">
                                                    
                                                    <div class="pb-1 col-5">品種：{{ $profiles->pet_specie}}</div>
                                                    <div class="pb-1 col-7">性別：{{ $profiles->pet_sex}}</div>
            
                                                    <div class="pb-1 col-4">年齢：{{ $profiles->pet_age}}</div>
                                                    <div class="pb-1 col-8">誕生日：{{ $profiles->pet_birth}}</div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="fw-bold">自己紹介</div>
                                            <div>{{ $profiles->pet_content}}</div>
                                            

                                        
                                        
                                        
                                        <!--<div class='row'>-->
                                        <!--    <div class="pb-3">-->
                                        <!--         <form action="{{ url('Log/'.$profiles->id) }}" method="POST">-->
                                        <!--            @csrf-->
                                        <!--            @method('delete')-->
                                        <!--            <button type="submit" class="btn btn-danger">-->
                                        <!--                削除-->
                                        <!--            </button>-->
                                        <!--        </form>-->
                                        <!--    </div>-->
                                            <!-- 本: 更新ボタン -->
                                        <!--    <div>-->
                                        <!--         <a href="{{ url('Logsedit/'.$profiles->id) }}">-->
                                        <!--            <button type="submit" class="btn btn-primary">更新</button>-->
                                        <!--        </a>-->
                                        <!--    </div>-->
                                        <!--</div>-->
                                    </td>
                                </tr>
                                @else
                                 <div class="d-grid gap-2">
                                    <a href="{{ url('Profile') }}">
                                        <button class="btn btn-primary" type="button">Profile作制</button>
                                    </a>
                                </div>
                            @endif
                    </div>
                    
                    <table class="table table-striped task-table">
                        <!-- テーブルヘッダ -->
                        <thead>
                            <th>自分の投稿一覧</th>
                            <th>&nbsp;</th>
                        </thead>
                        <!-- テーブル本体 -->
                        <tbody>
                            @if(isset($Logs))
                                @foreach ($Logs as $Log)
                                    <tr>
                                       
                                        <!-- 画像 -->
                                        <td class="table-text">
                                             <a href="{{ url('Logdetail/'.$Log->id) }}">
                                                <div> <img src="upload/{{$Log->image}}" width="200"></div>
                                            </a>
                                        </td>
                                        
                                        
                                        <!-- タイトル -->
                                        <td class="table-text ">
                                            <div class="pb-4">{{ $Log->pet_title}}</div>
                                            
                                            <div class='row'>
                                                <div class="pb-3">
                                                     <form action="{{ url('Log/'.$Log->id) }}" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger">
                                                            削除
                                                        </button>
                                                    </form>
                                                </div>
                                                <!-- 本: 更新ボタン -->
                                                <div>
                                                     <a href="{{ url('Logsedit/'.$Log->id) }}">
                                                        <button type="submit" class="btn btn-primary">更新</button>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                    <!--↑ここまで↑-->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
