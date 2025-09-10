<!-- how we access it in View -->
<div>
    <h1>Job board</h1>
    @foreach ($jobs as $job)
        <div> job title:{{ $job["title"] }} Salary:{{ $job["salary"] }}</div>
    @endforeach
</div>

