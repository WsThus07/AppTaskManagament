@extends('admin.layout')

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


</div>
<table class="table table-hover my-0">
<thead>
    <tr>
<th><div id="th">#id</div></th>
<th><div id="th">Name</div></th>
<th><div id="th">Description</div></th>
<th><div id="th">status</div></th>
<th><div id="th">start Date</div></th>
<th><div id="th">end Date</div></th>
<th><div id="th">Assigned to</div></th>
<th><div id="th">Created at</div></th>


    </tr>
</thead>

    <tbody>
        @foreach ($project_tasks as $data )


        <tr>
          <td>{{ $data->id }}</td>
          <td>{{ $data->name }}</td>
          <td>{{ $data->description }}</td>
          <td><span class="badge bg-success">{{ $data->status }}</span></td>
          <td>{{ $data->start_date }}</td>
          <td>{{ $data->end_date }}</td>
          <td>{{ $data->FullName}}</td>
          <td>{{ $data->created_at}}</td>

        </tr>
        @endforeach
        <!-- Add more rows for additional tasks -->
      </tbody>


</table>
</div>
</div>
    </div>

    </div>

@endsection
