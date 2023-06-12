@extends("admin.layout")

@section('content')

<div class="container-fluid p-0">
    <div class="h1_AddTsk">
        <div class="h1">
            <h1 class="h3 mb-3">Table of <strong>Users</strong> </h1>
        </div>

    </div>
    <div class="row cnt-cnt">




<div class="col-12 col-lg-8 col-xxl-9 d-">
<div class="card flex-fill ">
<div class="card-header">

<h5 class="card-title mb-0">All Users</h5>
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
<th><div id="th">Actions</div></th>
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

        <td>
  <a class="actions" href="{{ route('users.edit',$user->id) }}"><i class="align-middle me-1" data-feather="edit"></i></a>
  <a class="actions" href="{{ route('users.destroy', $user->id) }}" onclick="event.preventDefault(); confirmDelete('{{ $user->id }}')"><i class="align-middle me-1" data-feather="delete"></i>
  </a>
  <form id="delete-form-{{ $user->id }}" action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: none;">
      @csrf
      @method('DELETE')
      <input type="hidden" name="confirm" value="yes">
  </form>

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
        function confirmDelete(userId) {
            if (confirm('Are you sure you want to delete this User?')) {
                document.getElementById('delete-form-' + userId).submit();
            }
        }
    </script>
@endsection
