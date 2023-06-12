@extends("manager.layout")

@section('content')

<div class="container-fluid p-0">
    <div class="h1_AddTsk">
        <div class="h1">
            <h1 class="h3 mb-3">Table of <strong>Employees</strong> </h1>
        </div>

    </div>
    <div class="row cnt-cnt">




<div class="col-12 col-lg-8 col-xxl-9 d-">
<div class="card flex-fill ">
<div class="card-header">

<h5 class="card-title mb-0">All Employees</h5>
</div>
<div class="search_container">
<input class="search__input" type="text" placeholder="Search user">
<button id="search-button"><i class="align-middle" data-feather="search"></i></button>
</div>


<table class="table table-hover my-0">
<thead>
    <tr>

<th><div id="th">User id</div></th>
<th><div id="th">FullName</div></th>
<th><div id="th">Email</div></th>
<th><div id="th">phone</div></th>
<th><div id="th">job</div></th>
<th><div id="th"> Role</div></th>
<th><div id="th">Password</div></th>

    </tr>
</thead>
<tbody>
    @foreach ($usersData as $user)
    <tr>

        <td>{{ $user->id }}</td>
        <td>{{ $user->FullName }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->phone }}</td>
        <td>{{ $user->job }}</td>
        <td>{{ $user->role }}</td>
        <td>{{ $user->password }}</td>

        
            </tr>
            @endforeach

</tbody>
</table>
</div>
</div>
    </div>

    </div>

@endsection
