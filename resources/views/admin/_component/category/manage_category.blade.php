@extends('admin.master')

@section('title')
    {{ trans('admin.manage_category') }}
@endsection

@section('script')
    {!! Html::script('js/manage_category.js') !!}
@endsection

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>{{ trans('admin.manage_category') }}</h2>
    </div>
</div>
<div class="panel-body">
<button class="fa fa-plus btn btn-primary addValue" aria-hidden="true" data-toggle="modal" data-target="#addValue">{{ trans('admin.add') }}</button>
<div class="modal fade" id="addValue" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">{{ trans('admin.add') }}</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" id="form-1" action="" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div>
                        <label for="label">{{ trans('admin.name') }}</label>
                        <input type="text" name="name" class="form-control" id="name">
                    </div>
                    <div>
                        <label for="label">{{ trans('admin.status') }}</label>
                        <select class="form-control" id="status" name="status" selected>
                            @foreach (config('setting.status') as $key => $status)
                            <option value="{{ $status }}" selected="" name="status">{{ $key }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary createValue">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row" id="search_categories">
    <div class="col-md-9">        
    </div>
    <div class="col-md-3">
        <input type="text" name="search_category" id="search_category" class="form-control" placeholder="Search" value="">
    </div>
</div>
<div class="row filter_data">
    <div class="col-md-9">        
    </div>
    <div class="col-md-3">
        <select class="form-control" id="filter_category">
            @foreach (config('setting.status') as $key => $status)
            <option value="{{ $status }}" selected="" name="status">{{ $key }}
            </option>
            @endforeach
        </select>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <table class="footable table table-stripped toggle-arrow-tiny">
                        <thead>
                            <tr class="title-users">
                                <th>ID</th>
                                <th>{{ trans('admin.name') }}</th>
                                <th>{{ trans('admin.status') }}</th>
                                <th>{{ trans('admin.detail') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                            <tr class="value-categories {{$category->id}}" id="value-categories {{$category->id}}">
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <a class="fa fa-edit change_permission" aria-hidden="true" data-toggle="modal" data-target="#myModal" value="{{ $category->status }}" data="{{ $category->id }}"></a> {{ ($category->status == config('setting.status.inprogress')) ? trans('admin.inprogress') : trans('admin.approved') }}
                                </td>
                                <td>
                                    <a type="button" class="btn btn-primary btn-sm view_detail" data-toggle="modal" data-target="#viewModal" data-id={{ $category->id }} value="{{ $category->status }}">{{ trans('admin.view') }}</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="8">
                                    <ul class="pagination pull-right"></ul>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="row">{{ $categories->links() }}</div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">
                    <p id="edit_permission">{{ trans('admin.edit_permission') }}</p>
                </h4>
            </div>
            <div class="modal-body row">
                <div class="col-md-3">
                    <p class="select_permission">{{ trans('admin.select_permission') }}</p>
                </div>
                <div class="col-md-9">
                    <form method="PUT" class="form-horizontal" name="form2" action="">
                        <select class="form-control select_permission" id="select_permission" selected data-id="" name="permission">
                            @foreach (config('setting.status') as $key => $status)
                            <option value="{{ $status }}" selected="">{{ $key }}
                            </option>
                            @endforeach
                        </select>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('admin.close') }}</button>
                            <button type="button" class="btn btn-primary updateStatus">{{ trans('admin.save')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">{{ trans('admin.details')}}</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="form-2" action="{{ route('admin.category.update', $category->id) }}">
                    {{ csrf_field() }}
                    <div>
                        <label for="label">ID</label>
                        <input type="text" class="form-control" id="id" value="" disabled="">
                    </div>
                    <div>
                        <label for="label">{{ trans('admin.name') }}</label>
                        <input type="text" class="form-control" id="name" value="">
                    </div>
                    <div>
                        <label for="label">{{ trans('admin.status') }}</label>
                        <select class="form-control" id="select_status" data-id="" value="">
                            @foreach (config('setting.status') as $key => $status)
                            <option value="{{ $status }}" name="status">{{ $key }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('admin.close') }}</button>
                        <button type="button" class="btn btn-primary updateValue">{{ trans('admin.save')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
