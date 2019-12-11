@component('mail::message')
# Hello
There are new jobs for you<br>
@foreach($jobs as $job)
  Title: {{ $job->title }}<br>
  Skills: {{ $job->skills->implode('name', ', ') }}<br>
  Description: {{ $job->description }}<br>
  Contact email: {{ $job->contact_email }}<br>
@if(!$loop->last)
  * * *
@endif
@endforeach

@component('mail::button', ['url' => route('admin.jobs.index')])
View Jobs
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
