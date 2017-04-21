@extends('layout.admin');

@section('title', '标签更新');

@section('content');
	<div class="mws-panel grid_8">
    	<div class="mws-panel-header">
        	<span class="mws-i-24 i-list">标签更新</span>
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
        	<form class="mws-form" action="{{url('/tag/'.$info->id)}}" method="post" enctype="multipart/form-data">
        		<div class="mws-form-inline">
        			<div class="mws-form-row">
        				<label>标签名称</label>
        				<div class="mws-form-item small">
        					<input type="text" class="mws-textinput" name="name" value="{{$info->name}}">
        				</div>
        			</div>

        			
        		</div>
        		<div class="mws-button-row" style="text-align:left;">
        			{{csrf_field()}}
                    <input type="hidden" name="id" value="{{$info->id}}">
                    <input type="hidden" name="_method" value="PUT">
        			<input type="submit" value="修改" class="mws-button red">
        			<input type="reset" value="重置" class="mws-button gray">
        		</div>
        	</form>
        </div>    	
    </div>
@endsection