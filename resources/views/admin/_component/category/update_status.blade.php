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
