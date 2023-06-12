@extends('manager.layout')

@section('content')

<div class="container-fluid p-0">
    <div class="h1_AddTsk">
        <div class="h1">
            <h1 class="h3 mb-3">Table of <strong>Tasks</strong> </h1>
        </div>

    </div>
    <div class="row cnt-cnt">




<div class="col-12 col-lg-8 col-xxl-9 d-">
<div class="card flex-fill card-table">
<div class="card-header">

<h5 class="card-title mb-0">Tasks</h5>
</div>
<div class="search_container">
<input class="search__input"  type="text" placeholder="Search task">
<a id="search-button"><i class="align-middle" data-feather="search"></i></a>

<a id="search-button" href="{{ route('projects_tasks.create_task',$id)}}"><i class="align-middle" data-feather="plus-square"></i> New task </a>
</div>
<table class="table table-hover my-0">
<thead>
    <tr>
<th><div id="th">#id</div></th>
<th><div id="th">Name</div></th>
<th><div id="th">Description</div></th>
<th><div id="th">status</div></th>
<th><div id="th">Priority</div></th>
<th><div id="th">start Date</div></th>
<th><div id="th">end Date</div></th>
<th><div id="th">Assigned to</div></th>
<th><div id="th">Actions</div></th>
    </tr>
</thead>

    <tbody>
      @foreach ($project_tasks as $task)
          
     
        <tr>
          <td>{{ $task->id }}</td>
          <td>{{ $task->name }}</td>
          <td>{{ $task->description }}</td>
          <td><span class="badge {{ $task->status == 'Done' ? 'bg-success' : ($task->status == 'In Progress' ? 'bg-primary' : 'bg-warning') }}">{{ $task->status }}</span></td>
        <td><span class="badge {{ $task->priority == 'High' ? 'bg-danger' : ($task->priority == 'Medium' ? 'bg-warning' : 'bg-success') }}">{{ $task->priority }}</span></td>
          <td>{{ $task->start_date }}</td>
          <td>{{ $task->end_date }}</td>
          <td>{{ $task->FullName }}</td>
          <td>
            <a class="actions" href="{{ route('projects_tasks.destroy', $task->id) }}" onclick="event.preventDefault(); confirmDelete('{{ $task->id }}')"><i class="align-middle me-1" data-feather="delete"></i>
            </a>
            <form id="delete-form-{{ $task->id }}" action="{{ route('projects_tasks.destroy', $task->id) }}" method="POST" style="display: none;">
                @csrf
                @method('DELETE')
                <input type="hidden" name="confirm" value="yes">
            </form>
                    <a class="actions" href="{{ route('projects_tasks.edit',$task->id) }}"><i class="align-middle me-1" data-feather="edit"></i></a>
          </td>
        </tr>
        @endforeach
       
        <!-- Add more rows for additional tasks -->
      </tbody>
</table>
</div>
</div>
    </div>

    </div>
    <script>
        function confirmDelete(taskId) {
            if (confirm('Are you sure you want to delete this task?')) {
                document.getElementById('delete-form-' + taskId).submit();
            }
        }
    </script>
@endsection
