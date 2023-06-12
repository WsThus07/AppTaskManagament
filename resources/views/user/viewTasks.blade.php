@extends('user.layout')

@section('content')

<div class="container-fluid p-0">
    <div class="h1_AddTsk">
        <div class="h1">
            <h1 class="h3 mb-3">Table of <strong>Tasks</strong> </h1>
        </div>
    </div>
    <div class="row cnt-cnt">




<div class="col-12 col-lg-8 col-xxl-9 d-">
<div class="card flex-fill crd ">
<div class="card-header">

<h5 class="card-title mb-0">Tasks of {{-- $user_tasks[0]->project_name --}} assigned to you :</h5>
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
<th><div id="th">status</div></th>
<th><div id="th">priority</div></th>
<th><div id="th">start Date</div></th>
<th><div id="th">end Date</div></th>
<th><div id="th">Actions</div></th>
    </tr>
</thead>
<tbody>
   @foreach ($user_tasks as $data )


        <tr>

          <td>{{ $data->name }}</td>
          <td>{{ $data->description }}</td>
          <td><span class="badge {{ $data->status == 'Done' ? 'bg-success' : ($data->status == 'In Progress' ? 'bg-primary' : 'bg-warning') }}">{{ $data->status }}</span></td>
<td><span class="badge {{ $data->priority == 'High' ? 'bg-danger' : ($data->priority == 'Medium' ? 'bg-warning' : 'bg-success') }}">{{ $data->priority }}</span></td>
>
          <td>{{ $data->start_date }}</td>
          <td>{{ $data->end_date }}</td>

          <td>

                    <a class="actions" href="{{ route('Ptasks.edit',$data->id) }}"><i class="align-middle me-1" data-feather="edit"></i></a>
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



          function toggleButtonPriority(button) {

            if (button.textContent === "Actived") {
              button.textContent = "Desactived";
              button.classList.remove("btn-success");
                button.classList.add("btn-danger");
            } else {
              button.textContent = "Actived";
              button.classList.remove("btn-danger");
                button.classList.add("btn-success");
            }
          }

</script>

@endsection
