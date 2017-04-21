@extends('layout.admin');

@section('title', '文章添加');

@section('content');

    <script type="text/javascript" charset="utf-8" src="{{asset('/plugins/ueditor/ueditor.config.js')}}"></script>
    <script type="text/javascript" charset="utf-8" src="{{asset('/plugins/ueditor/ueditor.all.min.js')}}"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="{{asset('/plugins/ueditor/lang/zh-cn/zh-cn.js')}}"></script>
	<div class="mws-panel grid_8">
    	<div class="mws-panel-header">
        	<span class="mws-i-24 i-list">文章添加</span>
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
        	<form class="mws-form" action="{{url('/article')}}" method="post" enctype="multipart/form-data">
        		<div class="mws-form-inline">
        			<div class="mws-form-row">
        				<label>文章名称</label>
        				<div class="mws-form-item small">
        					<input type="text" class="mws-textinput" name="title" value="{{old('title')}}">
        				</div>
        			</div>
                    <div class="mws-form-row">
                                
                        <label>分类</label>
                        <div class="mws-form-item small">
                            <select name="cate_id">
                                <option value="0">请选择</option>
                                @foreach($cates as $k => $v)
                                <option value="{{$v->id}}">{{$v->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
        			
        			<div class="mws-form-row">
        				<label>文章主图</label>
        				<div class="mws-form-item small">
        					<input type="file" class="mws-textinput" name="img">
        				</div>
        			</div>

        			<div class="mws-form-row">
        				<label>文章内容</label>
        				<div class="mws-form-item small">
        					<textarea id="editor" rows="" cols="" style="width:800px;height:200px;" name="content"></textarea>
        				</div>
        			</div>

                    <div class="mws-form-row">
                        <label>标签</label>
                        <div class="mws-form-item clearfix">
                            <ul class="mws-form-list inline">
                                @foreach($tags as $k => $v)
                                <li><label><input type="checkbox" name="tag_id[]" value="{{$v->id}}"> {{$v->name}}</label></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
        			
        		</div>
                <script type="text/javascript">
                    //实例化编辑器
                    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
                    var ue = UE.getEditor('editor', {
                        toolbars: [
                            ['fullscreen', 'source', 'undo', 'redo', 'bold', 'simpleupload']
                        ]
                    });
                </script>
        		<div class="mws-button-row" style="text-align:left;">
        			{{csrf_field()}}
        			<input type="submit" value="添加" class="mws-button red">
        			<input type="reset" value="重置" class="mws-button gray">
        		</div>
        	</form>
        </div>    	
    </div>
@endsection