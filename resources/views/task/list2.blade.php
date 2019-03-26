@foreach ($tasks as $task)
    <p> 할 일: {{ $task['name'] }}, 기 한: {{ $task['due_date'] }} </p>
@endforeach