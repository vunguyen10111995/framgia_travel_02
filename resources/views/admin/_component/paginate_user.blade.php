<div class="ibox float-e-margins">
    <div class="ibox-content">
        <table class="footable table table-stripped toggle-arrow-tiny">
            <thead>
                <tr class="title-users">
                    <th>ID</th>
                    <th>{{ trans('admin.fullname') }}</th>
                    <th>{{ trans('admin.email') }}</th>
                    <th id="avatar">{{ trans('admin.avatar') }}</th>
                    <th>{{ trans('admin.address') }}</th>
                    <th id="gender">{{ trans('admin.gender') }}</th>
                    <th id="level">{{ trans('admin.level') }}</th>
                    <th id="status">{{ trans('admin.status') }}</th>
                    <th id="status">{{ trans('admin.detail') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr class="value-users">
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->full_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td><img src="{{ $user->avatar }}" id="avatar"></td>
                        <td>{{ $user->address }}</td>
                        <td>{{ ($user->gender == 1) ? trans('admin.male') 
                            : trans('admin.female') }}
                        </td>
                        <td><a class="fa fa-edit change_level" aria-hidden="true" data-toggle="modal" data-target="#myModal"></a>{{ ($user->level == 1) ? 'User' : 'Admin' }}</td>
                        <td><a class="fa fa-edit change_permission" aria-hidden="true" data-toggle="modal" data-target="#myModal"></a> {{ ($user->status == 1) ? trans('admin.blocked') : trans('admin.normal') }}</td>
                        <td><a>{{ trans('admin.view') }}</a></td>
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
    <div class="row">{{ $users->links() }}</div>
</div>
