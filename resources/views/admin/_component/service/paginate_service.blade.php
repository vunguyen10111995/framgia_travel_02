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
