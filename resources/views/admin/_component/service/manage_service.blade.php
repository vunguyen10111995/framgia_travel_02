@extends('admin.master')
@section('title')
    {{ trans('admin.manage_service') }}
@endsection
@section('script')
    {!! Html::script('js/manage_service.js') !!}
@endsection
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>{{ trans('admin.manage_service') }}</h2>
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
                <form class="form-horizontal" method="POST" id="form-1" action="{{route('admin.service.store')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div>
                        <label for="label">{{ trans('admin.avatar') }}</label>
                        <input type="file" name="image" class="form-control" id="image">
                    </div>
                    <div>
                        <label for="label">{{ trans('admin.fullname') }}</label>
                        <input type="text" name="full_name" class="form-control" id="full_name">
                    </div>
                    <div>
                        <label for="label">{{ trans('admin.email') }}</label>
                        <input type="email" name="email" class="form-control" id="email">
                    </div>
                    <div>
                        <label for="label">{{ trans('admin.password') }}</label>
                        <input type="password" name="password" class="form-control" id="password">
                    </div>
                    <div>
                        <label for="label">{{ trans('admin.repassword') }}</label>
                        <input type="password" name="repassword" class="form-control" id="repassword">
                    </div>
                    <div>
                        <label for="label">{{ trans('admin.address') }}</label>
                        <input type="text" name="address" class="form-control" id="address">
                    </div>
                    <div>
                        <label for="label">{{ trans('admin.gender') }}</label>
                        <select class="form-control" name="gender" selected id="gender">
                            @foreach (config('setting.gender') as $key => $gender)
                                <option value="{{ $gender }}" selected="" name="gender">{{ $key }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="label">{{ trans('admin.level') }}</label>
                        <select class="form-control" id="level" name="level" selected>
                            @foreach (config('setting.level') as $key => $level)
                                <option value="{{ $level }}" selected="" name="level">{{ $key }}
                                </option>
                            @endforeach
                        </select>
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
                        <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('admin.close') }}</button>
                        <button type="button" class="btn btn-primary createValue">{{ trans('admin.save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row" id="search_services">
    <div class="col-md-9">        
    </div>
    <div class="col-md-3">
        <input type="text" id="search_service" class="form-control" placeholder="Search" value="">
    </div>
</div>
<div class="row filter_data">
    <div class="col-md-9">        
    </div>
    <div class="col-md-3">
        <select class="form-control" id="filter_data">
            @foreach (config('setting.level') as $key => $level)
                <option value="{{ $level }}" selected="" name="level">{{ $key }}
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
                            <tr class="title-services">
                                <th>{{ trans('admin.id') }}</th>
                                <th>{{ trans('admin.name') }}</th>
                                <th>{{ trans('admin.categories') }}</th>
                                <th>{{ trans('admin.provinces') }}</th>
                                <th>{{ trans('admin.price') }}</th>
                                <th>{{ trans('admin.rate') }}</th>
                                <th>{{ trans('admin.description') }}</th>
                                <th>{{ trans('admin.detail') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php $stt = 1; @endphp
                            @foreach($services as $service)
                                <tr class="value-services {{ $service->id }}">
                                    <td>{{ $stt++ }}</td>
                                    <td>{{ $service->name }}</td>
                                    <td>{{ $service->category->name }}</td>
                                    <td>{{ $service->province->name }}</td>
                                    <td>{{ $service->price }}</td>
                                    <td>{{ $service->rate }} <i class="fa fa-star" aria-hidden="true"></i></td>
                                    <td>{{ substr($service->description, 0, 20) }}...</td>
                                    <td>
                                        <a type="button" class="btn btn-primary btn-sm view_detail" data-toggle="modal" data-target="#viewModal" data-id={{ $service->id }}>{{ trans('admin.view') }}</a>
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
                <div class="row">{{ $services->links() }}</div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">{{ trans('admin.details') }}</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="form-2" enctype="multipart/form-data">
                    <div>
                        <img src="" id="images">
                    </div>
                    <div>
                        <label for="label">{{ trans('admin.name') }}</label>
                        <input type="text" class="form-control" id="name">
                    </div>
                    <div>
                        <label for="label">{{ trans('admin.categories') }}</label>
                        <input type="email" class="form-control" id="category">
                    </div>
                    <div>
                        <label for="label">{{ trans('admin.provinces') }}</label>
                        <input type="text" class="form-control" id="province">
                    </div>
                    <div>
                        <label for="label">{{ trans('admin.price') }}</label>
                        <input type="text" class="form-control" id="price">
                    </div>
                    <div>
                        <label for="label">{{ trans('admin.rate') }}</label>
                        <input type="text" class="form-control" id="rate">
                    </div>
                    <div>
                        <label for="label">{{ trans('admin.description') }}</label>
                        <input type="text" class="form-control" id="description">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('admin.close') }}</button>
                        <button type="button" class="btn btn-primary updateStatus">{{ trans('admin.save')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
