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
