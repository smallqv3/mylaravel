@extends('layout.admin');

@section('title', '分类添加');

@section('content');
	<div class="mws-panel grid_8">
    	<div class="mws-panel-header">
        	<span class="mws-i-24 i-list">分类添加</span>
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
        	<form class="mws-form" action="{{url('/cate/'.$info->id)}}" method="post" enctype="multipart/form-data">
        		<div class="mws-form-inline">
        			<div class="mws-form-row">
        				<label>分类名称</label>
        				<div class="mws-form-item small">
        					<input type="text" class="mws-textinput" name="name" value="{{$info['name']}}">
        				</div>
                        
        			</div>
                    <div class="mws-form-row">
                                
                        <label>父级分类</label>
                        <div class="mws-form-item small">
                            <select name="pid">
                                <option value="0">请选择</option>
                                @foreach($cates as $k => $v)
                                <option value="{{$v->id}}" @if($v->id == $info['pid']) selected @endif>{{$v->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
        		</div>
        		<div class="mws-button-row" style="text-align:left;">
        			{{csrf_field()}}
                    <input type="hidden" name="_method" value="PUT">
        			<input type="submit" value="修改" class="mws-button red">
        			<input type="reset" value="重置" class="mws-button gray">
        		</div>
        	</form>
        </div>    	
    </div>
@endsection