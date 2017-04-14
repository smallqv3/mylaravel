@extends('layout.admin')

@section('content')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
		<span class="mws-i-24 i-table-1">


			用户列表
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
							用户名
						</th>
						<th title="Platform(s)" class="sorting" role="columnheader" tabindex="0"
						aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending"
						style="width: 251px;">
							邮箱
						</th>
						<th title="Engine version" class="sorting" role="columnheader" tabindex="0"
						aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending"
						style="width: 167px;">
							头像
						</th>
						<th title="CSS grade" class="sorting" role="columnheader" tabindex="0"
						aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"
						style="width: 131px;">
							操作
						</th>
					</tr>
				</thead>
				<style type="text/css">
					.center a:hover{
						color: white;
						font-size: 18px;
					}
					.edit,.dele{
						
					}
				</style>
				<tbody role="alert" aria-live="polite" aria-relevant="all">
					@foreach($users as $k => $v)
					<tr class="@if($k % 2 == 0) gradeA even @else gradeA odd @endif">
						<td class="  sorting_1">
							{{$v->id}}
						</td>
						<td class=" ">
							{{$v->username}}
						</td>
						<td class=" ">
							{{$v->email}}
						</td>
						<td class="center ">
							<img src="{{$v->profile}}" width="40" alt="">
						</td>
						<td class="center">
							<a href="/user/edit/{{$v->id}}"><span class="edit">修改</span></a> | 
							<a href="/user/delete/{{$v->id}}"><span class="dele">删除</span></a>
						</td>
					</tr>
					@endforeach
					
					
				</tbody>
			</table>
		</div>
	</div>
</div>

@endsection