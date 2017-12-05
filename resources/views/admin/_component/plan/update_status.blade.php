<tr class="value-plans {{ $plan->id }}" id="value-plans {{ $plan->id }}">
    <td>{{ $plan->id }}</td>
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
        <a href="{{ route('admin.plan.show', $plan->id) }}" type="button" class="btn btn-primary btn-sm view_detail" data-id={{ $plan->id }}>{{ trans('admin.view') }}</a>
    </td>
</tr>
