@extends('layouts.app')
@section('content')
    <!-- Bootstrapの定形コード… -->
    <div class="card-body my-4">
        <h1 class="card-title text-center">
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
            
            <!-- コメント -->
            <div class="form-group col-md-6 p-2">
                <label for="pet_comment" class="col-sm-3 control-label">コメント</label>
                <input type="textarea" name="pet_comment" class="form-control" id="pet_comment" value="{{ old('pet_comment') }}">
            </div>
            
            <!--体調種類-->
            
             <div class="form-group col-md-6 p-2row g-2">
                <label for="pet_comment" class="col-sm-3 control-label">今の状態は？</label>
        			<p>
            			<label class=" col-6">
            				<input  id="hide" class="col-6" name="comment_check" type="radio" value="1" onclick="buttonClick()"/>
            				<span>健康(^ ^)b</span>
            				
            			</label>
        			</p>
        			<label class="with-gap col-6">
        				<input id="disp" class="with-gap col-6" name="comment_check" type="radio" value="0" onclick="buttonClick()"/>
        				<span>不調(＞＜)</span>
        			</label>
            </div>
            
            <div id="sub-form" style="display:none;">
            
                <!-- 活動量 -->
                <div class="form-group col-md-6 p-2">
                    <label for="pet_activity" class="col-sm-3 control-label">どれくらい活発ですか？</label>
                 <!-- <input type="text" name="pet_activity" class="form-control" id="pet_activity" value="{{ old('pet_activity') }}">-->
    				<select class="browser-default form-control" name="pet_activity">
    					<option name="pet_activity" class="form-control" id="pet_activity" value="" disabled selected>活動量について選んでね🐕</option>
    					<option name="pet_activity" class="form-control" id="pet_activity" value="5">元気良い！</option>
    					<option name="pet_activity" class="form-control" id="pet_activity" value="4">いつも通り</option>
    					<option name="pet_activity" class="form-control" id="pet_activity" value="3">いつもより元気がない</option>
    					<option name="pet_activity" class="form-control" id="pet_activity" value="2">自力で動ける</option>
    					<option name="pet_activity" class="form-control" id="pet_activity" value="1">ほとんど動かない</option>
    					<option name="pet_activity" class="form-control" id="pet_activity" value="0">動かない</option>
    				</select>
                </div>
                <!-- 食欲 -->
                <div class="form-group col-md-6 p-2">
                    <label for="pet_hungry" class="col-sm-3 control-label">食欲はある？</label>
                    <!--<input type="text" name="pet_hungry" class="form-control" id="pet_hungry" value="{{ old('pet_hungry') }}">-->
                	<select class="browser-default form-control" name="pet_hungry">
    					<option name="pet_hungry" class="form-control text-muted" id="pet_hungry" value="" disabled selected>食欲について選んでね🐈</option>
    					<option name="pet_hungry" class="form-control" id="pet_hungry" value="5">よく食べる！！(100％)</option>
    					<option name="pet_hungry" class="form-control" id="pet_hungry" value="4">そこそこ食べる！(80％)</option>
    					<option name="pet_hungry" class="form-control" id="pet_hungry" value="3">前より食べない(60％)</option>
    					<option name="pet_hungry" class="form-control" id="pet_hungry" value="2">あげると食べる(40％)</option>
    					<option name="pet_hungry" class="form-control" id="pet_hungry" value="1">ほとんど食べない(20％)</option>
    					<option name="pet_hungry" class="form-control" id="pet_hungry" value="0">全く食べない(0％)</option>
    				</select>
                </div>
                
                <!-- 飲水 -->
                <div class="form-group col-md-6 p-2">
                    <label for="pet_water" class="col-sm-3 control-label">水はどれくらい飲む？</label>
                    <!--<input type="text" name="pet_hungry" class="form-control" id="pet_hungry" value="{{ old('pet_water') }}">-->
                	<select class="browser-default form-control" name="pet_water">
    					<option name="pet_water" class="form-control text-muted" id="pet_water" value="" disabled selected>飲水量について選んでね🐢</option>
    					<option name="pet_water" class="form-control" id="pet_water" value="5">いつもよりも多い</option>
    					<option name="pet_water" class="form-control" id="pet_water" value="4">いつも通り</option>
    					<option name="pet_water" class="form-control" id="pet_water" value="3">いつもより飲まない</option>
    					<option name="pet_water" class="form-control" id="pet_water" value="2">少ないけど自力では飲める</option>
    					<option name="pet_water" class="form-control" id="pet_water" value="1">飲ませてあげてる</option>
    					<option name="pet_water" class="form-control" id="pet_water" value="0">全く飲めない</option>
    				</select>
                </div>
                
                <!-- 排尿 -->
                <div class="form-group col-md-6 p-2">
                    <label for="pet_urine" class="col-sm-3 control-label">おしっこはしてる？</label>
                    <!--<input type="text" name="pet_hungry" class="form-control" id="pet_hungry" value="{{ old('pet_urine') }}">-->
                	<select class="browser-default form-control" name="pet_urine">
    					<option name="pet_urine" class="form-control text-muted" id="pet_urine" value="" disabled selected>排尿について選んでね🐇</option>
    					<option name="pet_urine" class="form-control" id="pet_urine" value="5">いつもより多く出る</option>
    					<option name="pet_urine" class="form-control" id="pet_urine" value="4">いつも通り</option>
    					<option name="pet_urine" class="form-control" id="pet_urine" value="3">いつもより少ないかな</option>
    					<option name="pet_urine" class="form-control" id="pet_urine" value="2">少しだけ出てるけど少ない</option>
    					<option name="pet_urine" class="form-control" id="pet_urine" value="1">踏ん張っているけど出ていない / 血尿</option>
    					<option name="pet_urine" class="form-control" id="pet_urine" value="0">全く見られない</option>
    				</select>
                </div>
                
                <!-- 排泄 -->
                <div class="form-group col-md-6 p-2">
                    <label for="pet_feces" class="col-sm-3 control-label">うんちはどんな感じ？</label>
                    <!--<input type="text" name="pet_hungry" class="form-control" id="pet_hungry" value="{{ old('pet_feces') }}">-->
                	<select class="browser-default form-control" name="pet_feces">
    					<option name="pet_feces" class="form-control text-muted" id="pet_feces" value="" disabled selected>排便について選んでね🐍</option>
    					<option name="pet_feces" class="form-control" id="pet_feces" value="5">いつも通り変わらない</option>
    					<option name="pet_feces" class="form-control" id="pet_feces" value="4">少し頻度が減った/たまにやわらかい便が出る</option>
    					<option name="pet_feces" class="form-control" id="pet_feces" value="3">頻度が明らかに減った/柔らかい便が出ている</option>
    					<option name="pet_feces" class="form-control" id="pet_feces" value="2">ほんの少し出る/ときどき泥状の便が出る</option>
    					<option name="pet_feces" class="form-control" id="pet_feces" value="1">ほとんど出ない/泥状/黒い便</option>
    					<option name="pet_feces" class="form-control" id="pet_feces" value="0">全くでない/液状/血便</option>
    				</select>
                </div>
                
                 <!-- 嘔吐 -->
                <div class="form-group col-md-6 p-2">
                    <label for="pet_emit" class="col-sm-3 control-label">どれくらい吐く？</label>
                    <!--<input type="text" name="pet_hungry" class="form-control" id="pet_hungry" value="{{ old('pet_emit') }}">-->
                	<select class="browser-default form-control" name="pet_emit">
    					<option name="pet_emit" class="form-control text-muted" id="pet_emit" value="" disabled selected>嘔吐について選んでね🐀</option>
    					<option name="pet_emit" class="form-control" id="pet_emit" value="5">全く吐かない</option>
    					<option name="pet_emit" class="form-control" id="pet_emit" value="4">いつもと変わらない程度</option>
    					<option name="pet_emit" class="form-control" id="pet_emit" value="3">いつもより少し多いかも</option>
    					<option name="pet_emit" class="form-control" id="pet_emit" value="2">多いけど理由はわかる（薬とか）</option>
    					<option name="pet_emit" class="form-control" id="pet_emit" value="1">理由がわからず明らかに多い</option>
    					<option name="pet_emit" class="form-control" id="pet_emit" value="0">止まらない</option>
    				</select>
                </div>
            </div>
            
            
            
           
            
            
            <!-- 本 登録ボタン -->
            <div class="form-group pt-3">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-primary">
                        投稿
                    </button>
                </div>
            </div>
        </form>
    </div>
    
    
    
@endsection