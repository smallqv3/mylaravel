@extends('layout.admin')

@section('content')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
		<span class="mws-i-24 i-table-1">


			标签列表
		</span>
	</div>

	<div class="mws-panel-body">
		<div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
			
			<table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1"
			aria-describedby="DataTables_Table_1_info">
				
				<thead>
					<tr role="row">
						<th title="Rendering engine" class="sorting_asc" role="columnheader" tabindex="0"
						aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending"
						aria-label="Rendering engine: activate to sort column descending" style="width: 189px;">
							ID
						</th>
						<th title="Browser" class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
						rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"
						style="width: 268px;">
							标签名称
						</th>
						
						
						<th title="CSS grade" class="sorting" role="columnheader" tabindex="0"
						aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"
						style="width: 131px;">
							操作
						</th>
					</tr>
				</thead>


				<style type="text/css">
					.edit a{
						float: left;
						border: solid 1px #C9C9C9;
						display: block;
						width: 40px;
						text-align: center;
						line-height: 21px;
						height: 21px;
						text-decoration: none;
						color: buttontext;
						background-color: #EBEBEB;
						border-radius: 2px;
					}
					.center a:hover{
						color: white;
						background-color: #1C86EE;
					}
					.button{
						margin-left: 5px;
					}
				</style>
				<tbody role="alert" aria-live="polite" aria-relevant="all">
					@foreach($tags as $k => $v)
					<tr class="@if($k % 2 == 0) gradeA even @else gradeA odd @endif">
						<td class="  sorting_1">
							{{$v->id}}
						</td>
						<td class=" ">
							{{$v->name}}
						</td>
						
						
						<td class="center">
							<span class="edit"><a href="/tag/{{$v->id}}/edit">修改</a></span> 
							<form action="/tag/{{$v->id}}" method="post">
								{{csrf_field()}}
								<input type="hidden" name="_method" value="DELETE">
								<span class="dele"><button class="button">删除</button></span>
							</form>
						</td>
					</tr>
					@endforeach
					
					
				</tbody>
			</table>
		</div>
	</div>
</div>

@endsection