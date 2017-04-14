@extends('layout.admin');

@section('title', '用户添加');

@section('content');
	<div class="mws-panel grid_8">
    	<div class="mws-panel-header">
        	<span class="mws-i-24 i-list">用户更新</span>
        </div>
    	
		@if (count($errors) > 0)
		<div class="mws-form-message error">
            <ul>
            	@foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
            </ul>
        </div>
        @endif
        <div class="mws-panel-body">
        	<form class="mws-form" action="{{url('/user/update')}}" method="post" enctype="multipart/form-data">
        		<div class="mws-form-inline">
        			<div class="mws-form-row">
        				<label>用户名</label>
        				<div class="mws-form-item small">
        					<input type="text" class="mws-textinput" name="username" value="{{$user->username}}">
        				</div>
        			</div>
        			<div class="mws-form-row">
        				<label>邮箱</label>
        				<div class="mws-form-item small">
        					<input type="text" class="mws-textinput" name="email" value="{{$user->email}}">
        				</div>
        			</div>
        			
        			<div class="mws-form-row">
        				<label>头像</label>
                        <img src="{{$user->profile}}" alt="">
        				<div class="mws-form-item small">
        					<input type="file" class="mws-textinput" name="profile">
        				</div>
        			</div>

        			<div class="mws-form-row">
        				<label>个人介绍</label>
        				<div class="mws-form-item small">
        					<textarea rows="100%" cols="100%" name="intro">{{$user->intro}}</textarea>
        				</div>
        			</div>
        			
        		</div>
        		<div class="mws-button-row" style="text-align:left;">
        			{{csrf_field()}}

                    <input type="hidden" name="id" value="{{$user->id}}">
        			<input type="submit" value="更新" class="mws-button red">
        			<input type="reset" value="重置" class="mws-button gray">
        		</div>
        	</form>
        </div>    	
    </div>
@endsection