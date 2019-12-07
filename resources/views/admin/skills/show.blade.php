@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.skill.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.skills.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.skill.fields.id') }}
                        </th>
                        <td>
                            {{ $skill->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.skill.fields.name') }}
                        </th>
                        <td>
                            {{ $skill->name }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.skills.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#skills_jobs" role="tab" data-toggle="tab">
                {{ trans('cruds.job.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#skills_users" role="tab" data-toggle="tab">
                {{ trans('cruds.user.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="skills_jobs">
            @includeIf('admin.skills.relationships.skillsJobs', ['jobs' => $skill->skillsJobs])
        </div>
        <div class="tab-pane" role="tabpanel" id="skills_users">
            @includeIf('admin.skills.relationships.skillsUsers', ['users' => $skill->skillsUsers])
        </div>
    </div>
</div>

@endsection