@extends('user.layout')
@section('content')
<div class="container-fluid p-0">
  <div class="h1_AddTsk">
    <div class="h1">
      <h1 class="h3 mb-3">Edit Status <strong>Task</strong> </h1>
    </div>
  </div>
  <div class="row cnt-cnt">
    <div class="col-12 col-lg-8 col-xxl-9 d-">
      <div class="card flex-fill crd">
        <div class="card-header">
          <h5 class="card-title mb-0">Tasks</h5>
        </div>
        <div class="search_container"></div>
        <form action="{{ route('Ptasks.update', $task->id) }}" method="POST">
          @csrf
          @method('PUT')
          <table class="table table-hover my-0">
            <thead>
              <tr>
                <th><div id="th">Name</div></th>
                <th><div id="th">Description</div></th>
                <th><div id="th">Status</div></th>
                <th><div id="th">Start Date</div></th>
                <th><div id="th">End Date</div></th>
                <th><div id="th">Actions</div></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><input type="text" id="Taskname" name="Taskname" value="{{ $task->name }}" class="form-control" readonly></td>
                <td><textarea id="Description" name="Description" class="form-control" readonly>{{ $task->description }}</textarea></td>
                <td>
                  <select name="status" class="form-control custom-select" onchange="changeOptionBackground(this)">
                    <option value="Done" class="bg-success">Done</option>
                    <option value="In Progress">In Progress</option>
                    <option value="Not Yet" class="bg-danger">Not Yet</option>
                  </select>
                </td>
                <td><input type="date" id="startdate" name="startdate" value="{{ $task->start_date }}" class="form-control" readonly></td>
                <td><input type="date" id="endate" name="endate" value="{{ $task->end_date }}" class="form-control" readonly></td>
                <td>
                  <button type="submit" id="save-btn" class="btn btn-success"><i class="align-middle me-1" data-feather="check"></i></button>
                </td>
              </tr>
            </tbody>
          </table>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
  function changeOptionBackground(selectElement) {
    var selectedOption = selectElement.options[selectElement.selectedIndex];
    var selectedValue = selectedOption.value;
    var optionClass = "";

    if (selectedValue === "Done") {
      optionClass = "bg-success";
    } else if (selectedValue === "Not Yet") {
      optionClass = "bg-danger";
    } else if (selectedValue === "In Progress") {
      optionClass = "bg-warning";
    }

    selectElement.className = "form-control custom-select " + optionClass;
  }
</script>
@endsection
