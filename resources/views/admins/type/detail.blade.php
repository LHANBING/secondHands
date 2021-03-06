@extends('admins.layout.admins')

@section('title','商品详情页面')

@section('content')
  

<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>
            <i class="icon-table">
            </i>
            商品详情页面
        </span>
    </div>
                     @if(session('msg'))
                        <div class="mws-form-message info">                 

                            {{session('msg')}}

                        </div>
                    @endif
    <div class="mws-panel-body no-padding">
        <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
       		 <form action="/admin/manager" method="get">
	            <div id="DataTables_Table_1_length" class="dataTables_length">
	                <label>
                        显示
                        <select size="1" name="num" aria-controls="DataTables_Table_1">
                            <option value="10" @if(isset($request->num) ? $request->num : '10' ) @endif>
                                10
                            </option>
                            <option value="25"  @if($request->num == '25') selected="selected" @endif>
                                25
                            </option>
                            <option value="50"  @if($request->num == '50') selected="selected" @endif>
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
                    <tr role="row" >
                        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending"
                        style="width: 191px;">
                            ID
                        </th>
                         <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"
                        style="width: 125.193px;">
                            商品照片
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"
                        style="width: 200px;">
                            商品名称
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"
                        style="width: 200px;">
                            商品现价
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"
                        style="width: 200px;">
                            商品原价
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"
                        style="width: 200px;">
                            商品运费
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"
                        style="width: 200px;">
                            商品发货地址
                        </th>

                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"
                        style="width: 160px;">
                            操作
                        </th>
                    </tr>
                </thead>
                <tbody role="alert" aria-live="polite" aria-relevant="all">
					
					@foreach($res as $k => $v) 

                    <tr class="@if($k % 2 == 0) odd @else even @endif" style="height: 90px">
                        <td class=""  style="text-align: center">
                           {{$v->id}}
                        </td>
						<td class="" style="text-align: center">
                            <img src="{{$v->goods_photo}}" width="50%" alt="">
                        </td>
                         <td class="" style="text-align: center">
                           {{$v->title}}
                        </td>
                         <td class="" style="text-align: center">
                           {{$v->newprice}}
                        </td>
                         <td class="" style="text-align: center">
                           {{$v->oldprice}}
                        </td>
                         <td class="" style="text-align: center">
                           {{$v->transprice}}
                        </td>
                         <td class="" style="text-align: center">
                           {{$v->address}}
                        </td>
                        <td class="" style="text-align: center">
                           <a href="/admin/typechild/{{$v->id}}" class="btn btn-danger">查看商品详情</a>
                        </td>

                    </tr>

                    @endforeach
                    
                </tbody>
            </table>
            <div class="dataTables_info" id="DataTables_Table_1_info">
                Showing 1 to {{$last}} of {{$count}} entries
            </div>
            
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

                    {!! $res->appends($request->all())->render() !!}
            </div>
        </div>
    </div>
</div>

@endsection()

@section('js')

   <script type="text/javascript">
        $('.mws-form-message').delay(3000).slideUp(1000);
    </script>

@endsection