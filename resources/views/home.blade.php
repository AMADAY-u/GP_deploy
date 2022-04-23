@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body my-4">
                    <!--↓ここから追加↓-->
                    
                   
                    
                    <div class="alert alert-primary">
                            <!-- Book: 既に登録されてる本のリスト -->
                           <h1 style='color: orange;'>Profile</h1>
                            @if(isset($profiles))
        
                                <tr>
                                    <!-- タイトル -->
                                    <td class="table-text ">
                                        <div class="d-flex">
                                             <div class="flex-shrink-0">
                                                 <img src="{{ asset('img/201807_hana_01.jpg') }}" alt="hana" style="width:100px;">
                                                    
                                             </div>
                                             <div class="flex-grow-1 ms-3">
                                                <h2 class="pb-1 text-black">{{ $profiles->pet_name}} ちゃん</h2>
                                        
                                                <div class="">
                                                    <div class="g-2">
                                                        
                                                        <div class="">品種：{{ $profiles->pet_specie}}</div>
                                                        <div class="">性別：{{ $profiles->pet_sex}}</div>
                
                                                        <div class="">年齢：{{ $profiles->pet_age}}</div>
                                                        <div class="">誕生日：{{ $profiles->pet_birth}}</div>
                                                    </div>
                                                </div>
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
                                            <div class="fw-bold text-center">{{ $Log->pet_title}}</div>
                                        </td>
                                        
                                        
                                        <!-- タイトル -->
                                        <td class="table-text align-top">
                                            <div class='row pt-2'>
                                                
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
