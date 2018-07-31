@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.timeslots.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.timeslots.fields.manager')</th>
                            <td field-key='manager'>{{ $timeslot->manager->name or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.timeslots.fields.start-time')</th>
                            <td field-key='start_time'>{{ $timeslot->start_time }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.timeslots.fields.end-time')</th>
                            <td field-key='end_time'>{{ $timeslot->end_time }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.timeslots.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop
