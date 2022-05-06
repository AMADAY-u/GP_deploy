@extends('layouts.app')
@section('content')
    <!-- Book: 既に登録されてる本のリスト -->
        <div class="my-5">
            <table class="table table-striped task-table">
                
                <!-- テーブル本体 -->
                <div>
                    <div>
                        
                        <div>
                            <!-- 画像 -->
                            <div class="table-text mb-3">
                                <div> <img src="../upload/{{$Log->image}}" width="100%"></div>
                            </div>
                            
                            <!-- タイトル -->
                            <h1 class="table-text fs-1 fw-bold text-center">
                                <div class='mb-3'>{{ $Log->pet_title }}</div>
                            </h1>
                            
                            @if($Log->comment_check == 0)
                            <!--グラフ作成-->
                                <?php
                                    $Activity =  $Log->pet_activity;
                                    $Hungry =  $Log->pet_hungry;
                                    $Water =  $Log->pet_water;
                                    $Urine =  $Log->pet_urine;
                                    $Feces =  $Log->pet_feces;
                                    $Emit =  $Log->pet_emit;
                                    
                                    $total_score = $Activity + $Hungry + $Water + $Urine + $Feces + $Emit;
                                    $area = '群馬県';
                                    
                                    
                                    echo '<div class="mx-3 alert alert-info rounded p-2">';
                                    $high   = 10;
                                    $middle = 20;
                                    if($total_score <= $high){
                                        echo "<h2>あなたのスコアは".$total_score."点です。</h2>";
                                        
                                        echo "<p>健康上の問題がある可能性が高いです！</p>
                                              <p>お住まいの地域の医療携室へ相談してみることをお勧めします！";
                                    }
                                    elseif($total_score <= $middle){
                                        echo "<h2>あなたのスコアは".$total_score."点です。</h2>";
                                        echo "<p>健康上の問題がある可能性は高くありませんが、問題があるかもしれません。</p>
                                              <p>動物病院へ相談してみてはいかがでしょうか？";
                                    }
                                    else{
                                        echo "<h2>あなたのスコアは".$total_score."点です。</h2>";
                                        echo "<p>健康上の問題がある可能性は低そうです。</p>
                                              <p>但し、気になることがある場はお住まいの地域の動物病院へ相談してみしょう。</p>";
                                    }
                                    echo "<br>";
                                    echo "<a href=\"https://google.co.jp/search?&q=動物病院&q=".$area."\" target=\"_blank\">お住まいの地域の動物病院を検索する。</p></a>";
                                
                               
                                ?>
                                <canvas id='myRaderChart' class="pb"></canvas>
                                <script>
                                    let activity = JSON.parse('<?php echo $Activity; ?>'); 
                                    let hungry = JSON.parse('<?php echo $Hungry; ?>'); 
                                    let water = JSON.parse('<?php echo $Water; ?>'); 
                                    let urine = JSON.parse('<?php echo $Urine; ?>'); 
                                    let feces = JSON.parse('<?php echo $Feces; ?>'); 
                                    let emit = JSON.parse('<?php echo $Emit; ?>'); 
                                    
                                   
                                   
                                    
                                    console.log(activity);
                                    var ctx = document.getElementById("myRaderChart");
                                    var myRadarChart = new Chart(ctx, {
                                        type: 'radar', 
                                        data: { 
                                            labels: ["活動性", "食欲", "飲水", "尿", "便", "嘔吐"],
                                            datasets: [{
                                                label: '健康状態',
                                                data: [activity, hungry, water, urine, feces, emit],
                                                backgroundColor: 'RGBA(225,95,150, 0.5)',
                                                borderColor: 'RGBA(225,95,150, 1)',
                                                borderWidth: 1,
                                                pointBackgroundColor: 'RGB(46,106,177)'
                                            }]
                                        },
                                        options: {
                                            title: {
                                                display: true,
                                                text: '健康状態'
                                            },
                                            scale:{
                                                r:{
                                                    suggestedMin: 0,
                                                    suggestedMax: 5,
                                                    stepSize: 1,
                                                    callback: function(value, index, values){
                                                        return  value +  '点'
                                                    }
                                                }
                                            }
                                        }
                                    });
                                   
                                </script>
                                
                                    <div class="">
                                         <!--活動量 -->
                                        <div class="table-text py-1 d-flex flex-wrap border-top border-bottom border-info">
                                            <div class="text-center" style="text-decoration:underline; width:50%;">どれくらい元気？</div>
                                            <div class="text-center" style="width:50%;">
                                                @if($Log->pet_activity == 5)
                                                    <div>元気良い！！</div>
                                                @endif
                                                @if($Log->pet_activity == 4)
                                                     <div>いつも通り</div>
                                                @endif
                                                @if($Log->pet_activity == 3)
                                                     <div>いつもより元気がない</div>
                                                @endif
                                                @if($Log->pet_activity == 2)
                                                     <div>自力で動ける</div>
                                                @endif
                                                @if($Log->pet_activity == 1)
                                                     <div>ほとんど動かない</div>
                                                @endif
                                                @if($Log->pet_activity == 0)
                                                     <div>動かない</div>
                                                @endif
                                            </div>
                                        </div>
                                         <!--食欲 -->
                                        <div class="table-text py-1 d-flex flex-wrap border-bottom border-info">
                                            <div class="text-center" style="text-decoration:underline; width:50%;">食欲ある？</div>
                                            <div class="text-center" style="width:50%;">
                                            @if($Log->pet_hungry == 5)
                                                <div>よく食べる！！(100％)</div>
                                            @endif
                                            @if($Log->pet_hungry == 4)
                                                 <div>そこそこ食べる！(80％)</div>
                                            @endif
                                            @if($Log->pet_hungry == 3)
                                                 <div>前より食べない(60％)</div>
                                            @endif
                                            @if($Log->pet_hungry == 2)
                                                 <div>あげると食べる(40％)</div>
                                            @endif
                                            @if($Log->pet_hungry == 1)
                                                 <div>ほとんど食べない(20％)</div>
                                            @endif
                                            @if($Log->pet_hungry == 0)
                                                 <div>全く食べない(0％)</div>
                                            @endif
                                            </div>
                                        </div>
                                        
                                         <!--飲水 -->
                                        <div class="table-text py-1 d-flex flex-wrap border-bottom border-info">
                                            <div class="text-center" style="text-decoration:underline; width:50%;">水どれくらい飲む？</div>
                                            <div class="text-center" style="width:50%;">
                                            @if($Log->pet_water == 5)
                                                <div>いつもよりも多い</div>
                                            @endif
                                            @if($Log->pet_water == 4)
                                                 <div>いつも通り！</div>
                                            @endif
                                            @if($Log->pet_water == 3)
                                                 <div>いつもより飲まない</div>
                                            @endif
                                            @if($Log->pet_water == 2)
                                                 <div>少ないけど自力で飲める</div>
                                            @endif
                                            @if($Log->pet_water == 1)
                                                 <div>飲ませてあげてる</div>
                                            @endif
                                            @if($Log->pet_water == 0)
                                                 <div>全く飲めない</div>
                                            @endif
                                            </div>
                                        </div>
                                        
                                        <!--排尿 -->
                                        <div class="table-text py-1 d-flex flex-wrap border-bottom border-info">
                                            <div class="text-center" style="text-decoration:underline; width:50%;">おしっこはしてる？</div>
                                            <div class="text-center" style="width:50%;">
                                            @if($Log->pet_urine == 5)
                                                <div>いつもより多く出る</div>
                                            @endif
                                            @if($Log->pet_urine == 4)
                                                 <div>いつも通り</div>
                                            @endif
                                            @if($Log->pet_urine == 3)
                                                 <div>いつもより少ないかな</div>
                                            @endif
                                            @if($Log->pet_urine == 2)
                                                 <div>少し出てるけど少ない</div>
                                            @endif
                                            @if($Log->pet_urine == 1)
                                                 <div>踏ん張るけど出ていない<br>血尿</div>
                                            @endif
                                            @if($Log->pet_urine == 0)
                                                 <div>全く見られない</div>
                                            @endif
                                            </div>
                                        </div>
                                        
                                         <!--排尿 -->
                                        <div class="table-text py-1 d-flex flex-wrap border-bottom border-info">
                                            <div class="text-center" style="text-decoration:underline; width:50%;">うんちはどんな感じ？</div>
                                            <div class="text-center" style="width:50%;">
                                            @if($Log->pet_feces == 5)
                                                <div>いつも通り変わらない</div>
                                            @endif
                                            @if($Log->pet_feces == 4)
                                                 <div>少し頻度が減った<br>たまにやわらかい便が出る</div>
                                            @endif
                                            @if($Log->pet_feces == 3)
                                                 <div>頻度が明らかに減った<br>柔らかい便が出ている</div>
                                            @endif
                                            @if($Log->pet_feces == 2)
                                                 <div>ほんの少し出る<br>ときどき泥状の便が出る</div>
                                            @endif
                                            @if($Log->pet_feces == 1)
                                                 <div>ほとんど出ない<br>泥状/黒い便</div>
                                            @endif
                                            @if($Log->pet_feces == 0)
                                                 <div>全くでない<br>液状/血便</div>
                                            @endif
                                            </div>
                                        </div>
                                        
                                          <!--嘔吐 -->
                                        <div class="table-text py-1 d-flex flex-wrap border-bottom border-info">
                                            <div class="text-center" style="text-decoration:underline; width:50%;">どれくらい吐く？</div>
                                            <div class="text-center" style="width:50%;">
                                            @if($Log->pet_emit == 5)
                                                <div>全く吐かない</div>
                                            @endif
                                            @if($Log->pet_emit == 4)
                                                 <div>いつもと変わらない程度</div>
                                            @endif
                                            @if($Log->pet_emit == 3)
                                                 <div>いつもより少し多いかも</div>
                                            @endif
                                            @if($Log->pet_emit == 2)
                                                 <div>多いけど理由はわかる<br>(薬とか)</div>
                                            @endif
                                            @if($Log->pet_emit == 1)
                                                 <div>理由がわからずに多い</div>
                                            @endif
                                            @if($Log->pet_emit == 0)
                                                 <div>止まらない</div>
                                            @endif
                                            </div>
                                         </div>
                                    </div>
                                </div>    
                                
                            @endif
                            
                            
                            
                            
                            
                            <div class="mx-3">
                                <!-- 餌内容物 -->
                                <div class="table-text d-flex flex-wrap border-info">

                                    <div class="fs-4" style="text-decoration:underline;width:50%;">何食べてる？</div>
                                    <div class="fs-3" style="width:50%;">{{ $Log->pet_foodname }}</div>
                                </div>
                                
                                <!-- コメント -->
                                <div class="table-text pb-3">
                                    <div class="fs-4" style="text-decoration:underline;">コメント</div>
                                    <div class="fs-4 ps-3">{{ $Log->pet_comment }}</div>
                                </div>
                                
                                
                                
                                
                                
                                
                                <!-- 本: 削除ボタン -->
                                <!--<div class='row mb-3'>-->
                                <!--    <div class='col-6 px-md-4'>-->
                                <!--         @if($Log->user_id === Auth::id())-->
                                <!--            <form action="{{ url('Log/'.$Log->id) }}" method="POST">-->
                                <!--                @csrf-->
                                <!--                @method('delete')-->
                                <!--                <button type="submit" class="btn btn-danger">-->
                                <!--                    削除-->
                                <!--                </button>-->
                                <!--            </form>-->
                                <!--        @endif-->
                                <!--    </div>-->
                                    
                                    
                                   <!-- 本: 更新ボタン -->
                                <!--    <div class='col-6'>-->
                                <!--         @if($Log->user_id === Auth::id())-->
                                <!--            <a href="{{ url('Logsedit/'.$Log->id) }}">-->
                                <!--                <button type="submit" class="btn btn-primary">更新</button>-->
                                <!--            </a>-->
                                <!--        @endif-->
                                <!--    </div>-->
                                <!--</div>-->
                                <hr>
                                 <!--コメント送信-->
                                <div class="row">
                                    <form action="{{ url('Comments') }}" method="POST" class="form-horizontal">
                                        @csrf
                                        <!-- id 値を送信 -->
                                        <input type="hidden" name="id" value="{{$Log->id}}" />
                                        <!--/ id 値を送信 -->
                                         
                                        
                                         <!-- コメント 登録ボタン -->
                                        <div class="input-group mb-3">
                                            <input type="text" id="comment_content" class="form-control" name="comment_content" placeholder="質問ある場合はこちらに！"  aria-describedby="button-addon2" value="{{ old('comment_content') }}">
                                            <button class="btn btn-primary" type="submit" id="button-addon2" style="z-index:0;">送信</button>
                                        </div>
                                    </form>
                                </div>
                                
                                
                                 @if (count($comments) > 0)
                                    <div>
                                        <table class="table table-striped task-table">
                                            <!-- テーブル本体 -->
                                            <tbody>
                                                @foreach ($comments as $comment)
                                                    <!--<div>-->
                                                        @if($comment->user_id === 2)
                                                        
                                                        <div class="fw-bold ms-1">専属獣医スタッフ</div>
                                                        
                                                        @endif
                                                    <!--</div>-->
                                                    <div class="mx-3 rounded mb-2" style="background-color:#d3d3d3;">
                                                    
                                                    
                                                        
                                                        <!-- 本タイトル -->
                                                        <div class="table-text">
                                                            <div>{{ $comment->comment_content }}</div>
                                                        </div>
                                                        
                                                        
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
                                                    </div>
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