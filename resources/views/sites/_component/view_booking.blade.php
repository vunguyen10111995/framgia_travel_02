@if(count($bookings))
    <table class="footable table table-bordered toggle-arrow-tiny">
        <thead>
            <tr class="title-users">
                <th>{{ trans('site.number') }}</th>
                <th>{{ trans('site.title') }}</th>
                <th>{{ trans('site.full_name') }}</th>
                <th>{{ trans('site.country') }}</th>
                <th>{{ trans('site.phone') }}</th>
                <th>{{ trans('site.total_price') }}</th>
                <th>{{ trans('site.date_of_book') }}</th>
                <th>{{ trans('site.status') }}</th>
                <th>{{ trans('site.viewmore') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bookings as $booking)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $booking->plan->title }}</td>
                    <td>{{ $booking->full_name }}</td>
                    <td>{{ $booking->country == 1 ? "VietNam" : ($booking->country == 2 ? "Oversea" : "Foreign") }}</td>
                    <td>{{ $booking->phone }}</td>
                    <td>{{ $booking->total_amount }}</td>
                    <td>{{ $booking->created_at }}</td>
                    <td>{{ ($booking->status == config('setting.status.inprogress')) ? trans('admin.inprogress') : trans('admin.approved') }}</td>
                    <td><a href="" class="view_detail_booking">{{ trans('site.viewmore') }}</a></td>
                    {!! Form::hidden('detail_book', $booking->id, array('class' => 'detail_book')) !!}
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <h4>{{ trans('site.not_booking') }}</h4>
@endif
