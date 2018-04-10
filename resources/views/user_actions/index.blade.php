@extends('layouts.app')

@section('content')
    <h3 class="page-title">User Log</h3>

    <p>
        
    </p>

    <div class="panel panel-default">
        <div class="panel-heading">
           List of User Log
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped {{ count($user_actions) > 0 ? 'datatable' : '' }} ">
                <thead>
                    <tr>
                        
                        <th>User</th>
                        <th>Action</th>
                        <th>Action Model</th>
                        <th>Action Id</th>
                        <th>Date Start</th>
						<th>Date Complete</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($user_actions) > 0)
                        @foreach ($user_actions as $user_action)
                            <tr data-entry-id="{{ $user_action->id }}">
                                
                                <td>{{ $user_action->user->name or '' }}</td>
                                <td>{{ $user_action->action }}</td>
                                <td>{{ $user_action->action_model }}</td>
                                <td>{{ $user_action->action_id }}</td>
                                <td>{{ $user_action->created_at->format('d-m-y H:m:s ') }}</td>
								<td>{{ $user_action->updated_at->format('d-m-y H:m:s ') }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6">@lang('quickadmin.no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

