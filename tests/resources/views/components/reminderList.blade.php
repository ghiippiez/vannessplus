@foreach ($reminders as $reminder)
<div class="well">
{{ $reminder }}
<a class="btn btn-success pull-right">Done</a>
</div>
@endforeach