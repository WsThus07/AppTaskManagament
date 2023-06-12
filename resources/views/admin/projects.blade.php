@extends("admin.layout")


@section('content')

<div class="container-fluid p-0">
    <div class="h1_AddTsk">
        <div class="h1">
            <h1 class="h3 mb-3">Table of <strong>Projects</strong> </h1>
        </div>

    </div>
    <div class="row cnt-cnt">




<div class="col-12 col-lg-8 col-xxl-9 d- ">
<div class="card flex-fill crd">
<div class="card-header">

<h5 class="card-title mb-0">All my Projects</h5>
</div>
<div class="search_container">

<form>
    <label for="status">Search by Status:</label>
    <select  id="status" name="status">
      <option value="all">All</option>
      <option value="Done">Done</option>
      <option value="inprogress">In Progress</option>
      <option value="not yet">Pending</option>
    </select>
    <button type="submit"id="search-button"><i class="align-middle" data-feather="search"></i></button>
  </form>
</div>
<table class="table table-hover my-0">
<thead>
    <tr>


<th><div id="th">Name</div></th>
<th><div id="th">Description</div></th>
<th><div id="th">Start Date</div></th>
<th><div id="th">End Date</div></th>
<th><div id="th">Status</div></th>
<th><div id="th">Priority</div></th>
<th><div id="th">Manager</div></th>
<th><div id="th">Actions</div></th>
    </tr>
</thead>
<tbody>
    @foreach ($projectData as $data )
    <tr>

        <td>{{ $data->name }}</td>
        <td>{{ $data->description }}</td>
        <td>{{ $data->start_date }}</td>
        <td>{{ $data->end_date }}</td>
        <td><span class="badge {{ $data->status == 'Done' ? 'bg-success' : ($data->status == 'In Progress' ? 'bg-primary' : 'bg-warning') }}">{{ $data->status }}</span></td>
        <td><span class="badge {{ $data->priority == 'high' ? 'bg-danger' : ($data->priority == 'Medium' ? 'bg-warning' : 'bg-success') }}">{{ $data->priority }}</span></td>

        <td>{{ $data->FullName }}</td>

        <td>


                <a class="actions" href="{{ route('projects.destroy', $data->id) }}" onclick="event.preventDefault(); confirmDelete('{{ $data->id }}')"><i class="align-middle me-1" data-feather="delete"></i>
                </a>
                <form id="delete-form-{{ $data->id }}" action="{{ route('projects.destroy', $data->id) }}" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="confirm" value="yes">
                </form>

                    <a class="actions" href="{{ route('admin.viewTasks') }}"><i class="align-middle me-1" data-feather="eye"></i></a>
            <a class="actions"  href="{{ route('projects.edit',$data->id) }}"><i class="align-middle me-1" data-feather="edit"></i></a>

        </td>
         </tr>
         @endforeach
</tbody>

</table>
</div>
</div>
    </div>

    </div>
    <script>
        function confirmDelete(projectId) {
            if (confirm('Are you sure you want to delete this project?')) {
                document.getElementById('delete-form-' + projectId).submit();
            }
        }
    </script>

    @endsection




