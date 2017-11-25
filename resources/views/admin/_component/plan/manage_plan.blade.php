@extends('admin.master')

@section('title')
    {{ trans('admin.manage_plan') }}
@endsection

@section('script')
    {!! Html::script('js/manage_plan.js') !!}
@endsection

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>{{ trans('admin.manage_plan') }}</h2>
        </div>
    </div>
<div class="panel-body" id="manage_plan">
    <button class="fa fa-plus btn btn-primary addValue" aria-hidden="true" data-toggle="modal" data-target="#addValue">{{ trans('admin.add') }}</button>
    <div class="modal fade" id="addValue" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">{{ trans('admin.add') }}</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="POST" id="multiple_select_form" action="{{ route('admin.plan.store') }}">
                        {{ csrf_field() }} 
                        <div>
                            <label for="label">{{ trans('admin.provinces') }}</label>
                            <select name="select_province" id="select_province" class="form-control select_province" data-live-search="true" multiple>
                                @foreach($provinces as $province)
                                    <option value="{{ $province->id }}">{{ $province->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="label">{{ trans('admin.title') }}</label>
                            <input class="form-control" name="title" id="title">
                        </div>
                        <div>
                            <label for="label">{{ trans('admin.description') }}</label>
                            <textarea class="form-control" name="description" id="description"></textarea>
                        </div>
                        <div>
                            <label for="label">{{ trans('admin.start_at') }}</label>
                            <input type="date" name="start_at" class="form-control" id="start_at">
                        </div>
                        <div>
                            <label for="label">{{ trans('admin.end_at') }}</label>
                            <input type="date" name="end_at" class="form-control" id="end_at">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('admin.close') }}</button>
                            <input type="submit" class="btn btn-primary createValue" name="submit" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row" id="search_plans">
        <div class="col-md-9">        
        </div>
        <div class="col-md-3">
            <input type="text" name="search_plan" id="search_plan" class="form-control" placeholder="Search" value="">
        </div>
    </div>
    <div class="row filter_data">
        <div class="col-md-9">        
        </div>
        <div class="col-md-3">
            <select class="form-control" id="filter_data">
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
                                <tr class="title-plans">
                                    <th>{{ trans('admin.id') }}</th>
                                    <th>{{ trans('admin.user') }}</th>
                                    <th>{{ trans('admin.title') }}</th>
                                    <th>{{ trans('admin.description') }}</th>
                                    <th>{{ trans('admin.start_at') }}</th>
                                    <th>{{ trans('admin.end_at') }}</th>
                                    <th>{{ trans('admin.price') }}</th>
                                    <th id="status">{{ trans('admin.status') }}</th>
                                    <th>{{ trans('admin.view') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($plans as $plan)
                                    <tr class="value-plans {{ $plan->id }}" id="value-plans {{ $plan->id }}">
                                        <td>{{ $loop->iteration }}</td>
                                        <td id="full_name">{{ $plan->user->full_name }} </td>
                                        <td>{{ $plan->title }}</td>
                                         <td>{{ substr($plan->description, 0, 20) }}...</td>
                                        <td>{{ $plan->start_at }}</td>
                                        <td>{{ $plan->end_at }}</td>
                                        <td>{{ $plan->price }}</td>
                                        <td>
                                            <a class="fa fa-edit change_permission" aria-hidden="true" data-toggle="modal" data-target="#myModal" value="{{ $plan->status }}" data="{{ $plan->id }}"></a> {{ ($plan->status == config('setting.status.inprogress')) ? trans('admin.inprogress') : trans('admin.approved') }}
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.plan.show', $plan->id) }}" type="button"><i class="fa fa-sign-in" aria-hidden="true"></i></a>
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
                    <div class="row">{{ $plans->links() }}</div>
                </div>
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
                                <option value="{{ $status }}" selected="" name="status">{{ $key }}
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
                <form class="form-horizontal" id="form-2" enctype="multipart/form-data" action="{{ route('admin.plan.update', $plan->id) }}">
                    <div>
                        <label for="label">{{ trans('admin.fullname') }}</label>
                        <input type="text" class="form-control" id="full_names">
                    </div>
                    <div>
                        <label for="label">{{ trans('admin.email') }}</label>
                        <input type="email" class="form-control" id="emails">
                    </div>
                    <div>
                        <label for="label">{{ trans('admin.address') }}</label>
                        <input type="text" class="form-control" id="addresss">
                    </div>
                    <div>
                        <label for="label">{{ trans('admin.gender') }}</label>
                        <input type="text" class="form-control" id="genders" selected value="">
                    </div>
                    <div>
                        <label for="label">{{ trans('admin.level') }}</label>
                        <input type="text" class="form-control" id="levels" selected value="">
                    </div>
                    <div>
                        <label for="label">{{ trans('admin.status') }}</label>
                        <input type="text" class="form-control" id="statuss" selected value="">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> 
@endsection
