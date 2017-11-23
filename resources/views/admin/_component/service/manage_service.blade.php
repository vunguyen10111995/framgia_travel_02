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
                        <label for="label">{{ trans('admin.image') }}</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div>
                        <label for="label">{{ trans('admin.name') }}</label>
                        <input type="text" name="name" class="form-control" id="name">
                    </div>
                    <div>
                        <label for="label">{{ trans('admin.categories') }}</label>
                        <select class="form-control" name="category">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="label">{{ trans('admin.provinces') }}</label>
                        <select class="form-control" name="province">
                            @foreach($provinces as $province)
                                <option value="{{ $province->id }}">{{ $province->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="label">{{ trans('admin.price') }}</label>
                        <input type="text" name="price" class="form-control" id="price">
                    </div>
                    <div>
                        <label for="label">{{ trans('admin.rate') }}</label>
                        <select class="form-control" id="rate" name="rate">
                        @php $i = 1; @endphp;
                            <option value="">{{ trans('admin.select') }}</option>
                            @for($i = 1; $i <= 5; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                    <div>
                        <label for="label">{{ trans('admin.description') }}</label>
                        <textarea class="form-control" id="description" name="description"></textarea>
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
            @foreach($provinces as $province)
                <option value="{{ $province->id }}">{{ $province->name }}</option>
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
                            @foreach($services as $service)
                                <tr class="value-services {{ $service->id }}">
                                    <td>{{ $loop->iteration }}</td>
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
                <form class="form-horizontal" id="form-2" enctype="multipart/form-data" action="{{ route('admin.service.update', $service->id) }}">
                    {{ csrf_field() }}
                    <div>
                        <input type="file" id="file" name="avatar">
                        <div id="image_display">
                            <img src="" id="image" alt="" name="image">
                        </div>
                    </div>
                    <div>
                        <label for="label">{{ trans('admin.id') }}</label>
                        <input type="text" class="form-control" id="id" name="id" disabled="">
                    </div>
                    <div>
                        <label for="label">{{ trans('admin.name') }}</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div>
                        <label for="label">{{ trans('admin.categories') }}</label>
                        <select class="form-control category" id="category" data-id="" name="category">
                        </select>
                    </div>
                    <div>
                        <label for="label">{{ trans('admin.provinces') }}</label>
                        <select class="form-control province" id="province" selected data-id="" name="province">
                        </select>
                    </div>
                    <div>
                        <label for="label">{{ trans('admin.price') }}</label>
                        <input type="text" class="form-control" id="price" name="price">
                    </div>
                    <div>
                        <label for="label">{{ trans('admin.rate') }}</label>
                        <select class="form-control" name="rate" id="rate">
                            <option value="">{{ trans('admin.select') }}</option>
                            @for($i = 1; $i <= 5; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                    <div>
                        <label for="label">{{ trans('admin.description') }}</label>
                        <input type="text" class="form-control" id="description" name="description">
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
