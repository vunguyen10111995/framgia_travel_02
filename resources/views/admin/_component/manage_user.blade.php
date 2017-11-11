@extends('admin.master')
@section('title')
    {{ trans('admin.manage_user') }}
@endsection
@section('script')
    {!! Html::script('js/manage_user.js') !!}
@endsection
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>{{ trans('admin.manage_user') }}</h2>
    </div>
</div>
<div class="row" id="search_users">
    <div class="col-md-9">        
    </div>
    <div class="col-md-3">
        <input type="text" name="" class="form-control" placeholder="Search">
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
                                <th>{{ trans('admin.fullname') }}</th>
                                <th>{{ trans('admin.email') }}</th>
                                <th id="avatar">{{ trans('admin.avatar') }}</th>
                                <th>{{ trans('admin.address') }}</th>
                                <th id="gender">{{ trans('admin.gender') }}</th>
                                <th id="level">{{ trans('admin.level') }}</th>
                                <th id="status">{{ trans('admin.status') }}</th>
                                <th id="status">{{ trans('admin.detail') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr class="value-users">
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->full_name }}</td>
                                <td>{{ $user->email }}</td>
                                <td><img src="{{ $user->avatar }}" id="avatar"></td>
                                <td>{{ $user->address }}</td>
                                <td>{{ ($user->gender == 1) ? trans('admin.male') 
                                    : trans('admin.female') }}
                                </td>
                                <td><a class="fa fa-edit change_level" aria-hidden="true" data-toggle="modal" data-target="#myModal"></a>{{ ($user->level == 1) ? 'User' : 'Admin' }}</td>
                                <td><a class="fa fa-edit change_permission" aria-hidden="true" data-toggle="modal" data-target="#myModal"></a> {{ ($user->status == 1) ? trans('admin.blocked') : trans('admin.normal') }}</td>
                                <td><a>{{ trans('admin.view') }}</a></td>
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
                <div class="row">{{ $users->links() }}</div>
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
                <h4 class="modal-title" id="myModalLabel">
                    <p id="edit_level">{{ trans('admin.edit_level') }}</p>
                </h4>
            </div>
            <div class="modal-body row">
                <div class="col-md-3">
                    <p class="select_permission">{{ trans('admin.select_permission') }}</p>
                    <p class="select_level">{{ trans('admin.select_level') }}</p>
                </div>
                <div class="col-md-9">
                    <select class="form-control select_level">
                        <option>
                        </option>
                    </select>
                    <select class="form-control select_permission">
                        <option>
                        </option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('admin.close') }}</button>
                <button type="button" class="btn btn-primary">{{ trans('admin.save')}}</button>
            </div>
        </div>
    </div>
</div>
@endsection
