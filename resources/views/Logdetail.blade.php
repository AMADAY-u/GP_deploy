@extends('layouts.app')
@section('content')
    <!-- Book: 既に登録されてる本のリスト -->
        <div class="my-4">
            <table class="table table-striped task-table">
                
                <!-- テーブル本体 -->
                <div>
                    <div class ='row mt-4'>
                        
                        <div>
                            <!-- 画像 -->
                            <div class="table-text mb-3">
                                <div> <img src="upload/{{$Log->image}}" width="100%"></div>
                            </div>
                            
                            <!-- タイトル -->
                            <h1 class="table-text fs-1 fw-bold text-center">
                                <div class=''>{{ $Log->pet_title }}</div>
                            </h1>
                            
                            
                            <div class="mx-3">
                                <!-- 餌内容物 -->
                                <div class="table-text pb-3">
                                    <div class="fs-4" style="text-decoration:underline;">何食べてる？</div>
                                    <div>{{ $Log->pet_foodname }}</div>
                                </div>
                                <!-- 活動量 -->
                                <div class="table-text pb-3">
                                    <div class="fs-4" style="text-decoration:underline;">どれくらい元気？</div>
                                    <div>{{ $Log->pet_activity }}</div>
                                </div>
                                <!-- 食欲 -->
                                <div class="table-text pb-3">
                                    <div class="fs-4" style="text-decoration:underline;"><u)>食欲はある？</u></div>
                                    <div>{{ $Log->pet_hungry }}</div>
                                </div>
                                <!-- コメント -->
                                <div class="table-text pb-3">
                                    <div class="fs-4" style="text-decoration:underline;">コメント</div>
                                    <div>{{ $Log->pet_comment }}</div>
                                </div>
                                
                                <!-- 本: 削除ボタン -->
                                <div class='row mb-3'>
                                    <div class='col-6 px-md-4'>
                                         @if($Log->user_id === Auth::id())
                                            <form action="{{ url('Log/'.$Log->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">
                                                    削除
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                   <!-- 本: 更新ボタン -->
                                    <div class='col-6'>
                                         @if($Log->user_id === Auth::id())
                                            <a href="{{ url('Logsedit/'.$Log->id) }}">
                                                <button type="submit" class="btn btn-primary">更新</button>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                                <hr>
                                 <!--コメント送信-->
                                <div class="input-group mb-3">
                                    <form action="{{ url('Comments') }}" method="POST" class="form-horizontal">
                                        @csrf
                                         <input type="textarea" name="comment_content" class="form-control" id="comment_content" value="{{ old('comment_content') }}">
                                        
                                        <!-- id 値を送信 -->
                                        <input type="hidden" name="id" value="{{$Log->id}}" />
                                        <!--/ id 値を送信 -->
                                         <!-- コメント 登録ボタン -->
                                        <div class="form-group p-2">
                                            <div class="col-sm-offset-3 col-sm-6">
                                                <button type="submit" class=" btn-primary">
                                                    送信
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                
                                
                                 @if (count($comments) > 0)
                                    <div>
                                        <table class="table table-striped task-table">
                                            <!-- テーブル本体 -->
                                            <tbody>
                                                @foreach ($comments as $comment)
                                                    <tr>
                                                        <!-- 本タイトル -->
                                                        <td class="table-text">
                                                            <div>{{ $comment->comment_content }}</div>
                                                        </td>
                                                        <!-- 本: 削除ボタン -->
                                                        <!--<td>-->
                                                        <!--    <form action="{{ url('comment/'.$comment->id) }}" method="POST">-->
                                                        <!--        @csrf-->
                                                        <!--        @method('delete')-->
                                                        <!--        <button type="submit" class="btn btn-danger">-->
                                                        <!--            削除-->
                                                        <!--        </button>-->
                                                        <!--    </form>-->
                                                        <!--</td>-->
                                                        <!-- 本: 更新ボタン -->
                                                        <!--<td>-->
                                                        <!--    <a href="{{ url('commentsedit/'.$comment->id) }}">-->
                                                        <!--        <button type="submit" class="btn btn-primary">更新</button>-->
                                                        <!--    </a>-->
                                                        <!--</td>-->
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @endif
                                
                            </div>
                        </div>
                    </div>
                </div>
            </table>
        </div>
@endsection