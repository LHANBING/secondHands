@extends('admins.layout.admins')

@section('title','用户列表页面')

@section('content')
  

<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>
            <i class="icon-table">
            </i>
            用户列表页面
        </span>
    </div>
    <div class="mws-panel-body no-padding">
        <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
       		 <form action="/admin/user" method="get">
	            <div id="DataTables_Table_1_length" class="dataTables_length">
	                <label>
	                    显示
	                    <select size="1" name="num" aria-controls="DataTables_Table_1">
	                        <option value="10">
	                            10
	                        </option>
	                        <option value="25">
	                            25
	                        </option>
	                        <option value="50">
	                            50
	                        </option>
	                    </select>
	                    条数据
	                </label>
	            </div>
	            <div class="dataTables_filter" id="DataTables_Table_1_filter">
	                <label>
	                    关键字:
	                    <input type="text" name="search" aria-controls="DataTables_Table_1" value="{{ isset($request->search) ? $request->search : '' }}">
	                </label>
		
					<button class="btn btn-danger">搜索</button>

	            </div>
			</form>

            <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1"
            aria-describedby="DataTables_Table_1_info">
                <thead>
                    <tr role="row">
                        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending"
                        style="width: 191px;">
                            ID
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"
                        style="width: 200px;">
                            用户名
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending"
                        style="width: 180px;">
                            邮箱
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending"
                        style="width: 166.193px;">
                            手机号
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"
                        style="width: 125.193px;">
                            头像
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"
                        style="width: 125.193px;">
                            状态
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"
                        style="width: 160px;">
                            操作
                        </th>
                    </tr>
                </thead>
                <tbody role="alert" aria-live="polite" aria-relevant="all">
					
					{{--@foreach($res as $k => $v) 

                    <tr class="@if($k % 2 == 0) odd @else even @endif" style="height: 90px">
                        <td class="">
                           {{$v->id}}
                        </td>
                         <td class="">
                           {{$v->username}}
                        </td>
                         <td class="">
                           {{$v->email}}
                        </td>
                         <td class="">
                           {{$v->phone}}
                        </td>
                         <td class="">
                         	<img src="{{$v->profile}}" width="50%" alt="">
                        </td>
                         <td class="">
                         	<button class="btn btn-info">{{$v->status ? '开启':'关闭'}}</button>
                        </td>
                        <td class="">
                           <a href="/admin/user/{{$v->id}}/edit" class="btn btn-danger">修改</a>

                           <form action="/admin/user/{{$v->id}}" method="post" style="display: inline;">
                             
                             {{ csrf_field() }}
                             {{ method_field('DELETE') }}
                             <button class="btn btn-warning">删除</button>  
                           </form>
                        </td>

                    </tr>

                    @endforeach--}}
                    
                </tbody>
            </table>
           {{-- <div class="dataTables_info" id="DataTables_Table_1_info">
                Showing 1 to {{$last}} of {{$count}} entries
            </div>
            --}}
                <style>
                    .pagination li{
                        float: left;
                        height: 20px;
                        padding: 0 10px;
                        display: block;
                        font-size: 12px;
                        line-height: 20px;
                        text-align: center;
                        cursor: pointer;
                        outline: none;
                        background-color: #444444;
                        color: #fff;
                        text-decoration: none;
                        border-right: 1px solid #232323;
                        border-left: 1px solid #666666;
                        border-right: 1px solid rgba(0, 0, 0, 0.5);
                        border-left: 1px solid rgba(255, 255, 255, 0.15);
                        -webkit-box-shadow: 0px 1px 0px rgba(0, 0, 0, 0.5), inset 0px 1px 0px rgba(255, 255, 255, 0.15);
                        -moz-box-shadow: 0px 1px 0px rgba(0, 0, 0, 0.5), inset 0px 1px 0px rgba(255, 255, 255, 0.15);
                        box-shadow: 0px 1px 0px rgba(0, 0, 0, 0.5), inset 0px 1px 0px rgba(255, 255, 255, 0.15);
                    }

                  
                .pagination a {
                       color: #fff;
                   } 

                .pagination .active{
                        background-color: #88a9eb;
                        color: #323232;
                        border: none;
                        background-image: none;
                        -webkit-box-shadow: inset 0px 0px 4px rgba(0, 0, 0, 0.25);
                        -moz-box-shadow: inset 0px 0px 4px rgba(0, 0, 0, 0.25);
                        box-shadow: inset 0px 0px 4px rgba(0, 0, 0, 0.25);

                  }

                .pagination .disabled{
                    color: #666666;
                    cursor: default;
                  }
                
                .pagination{
                    margin: 0px;
                }
                </style>
            <div class="dataTables_paginate paging_full_numbers" id="paginate">

                 {{--   {!! $res->appends($request->all())->render() !!}  --}}
            </div>
        </div>
    </div>
</div>

@endsection()

@section('js')


@endsection