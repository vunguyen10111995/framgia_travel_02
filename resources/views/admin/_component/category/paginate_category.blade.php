<div class="ibox float-e-margins">
    <div class="ibox-content">
        <table class="footable table table-stripped toggle-arrow-tiny">
            <thead>
                <tr class="title-categories">
                    <th>ID</th>
                    <th>{{ trans('admin.name') }}</th>
                    <th>{{ trans('admin.status') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr class="value-categories {{$category->id}}">
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            <a class="fa fa-edit change_permission" aria-hidden="true" data-toggle="modal" data-target="#myModal" value="{{ $category->status }}" data="{{ $category->id }}"></a> {{ ($category->status == config('setting.status.inprogress')) ? trans('admin.inprogress') : trans('admin.approved') }}
                        </td>
                        <td>
                            <a type="button" class="btn btn-primary btn-sm view_detail" data-toggle="modal" data-target="#viewModal" data-id={{ $category->id }}>{{ trans('admin.view') }}</a>
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
