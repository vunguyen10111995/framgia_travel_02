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
                        <td id="full_name">{{ $plan->user->full_name }} <a href=""><i class="fa fa-sign-out" aria-hidden="true"></i></a></td>
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
