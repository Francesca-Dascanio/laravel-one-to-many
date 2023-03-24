<h1>
    New Project Available!
</h1>

<h3>
    {{ $project->title }}
</h3>

@if ($project->img)
    <img src="{{ asset('storage/'.$project->img) }}" alt="{{ $project->title }}">
@endif

<p>
    {!! nl2br($project->description) !!}
</p>

<h4>
    Thank you for your attention
</h4>