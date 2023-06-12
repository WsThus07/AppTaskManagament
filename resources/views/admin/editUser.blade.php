@extends('admin.layout')

@section('content')<div class="container-fluid p-0">
    <div class="mb-3">
    <h1 class="h3 d-inline align-middle">Edit User</h1>
    </div>
    <div class="row cnt-cnt">
        <div class="col-md-8 col-xl-9">
            <div class="card ">
                <div class="card-header">

                    <h5 class="card-title mb-0">Update User</h5>
                </div>
                <div class="card-body h-100">

                    <div class="d-flex align-items-start">
                        <div class="profile-section">
                           Employee
                          </div>
                    </div>
                    <hr />
                    <div class="d-flex align-items-start">
                        <div class="flex-grow-1">
                            <div class="border text-sm text-muted p-2 mt-1">
                              <form id="profile-form"  method="POST" action="{{route('users.update',$user->id)}}"  >
                                @csrf
                                @method('PUT')
                                  <div class="form-group">
                                    <label for="FullName">FullName</label>
                                    <input type="text" id="FullName" name="FullName"  value="{{ $user->FullName }}" class="form-control" required>
                                  </div>
                                  <div class="form-group">
                                      <label for="email">Email</label>
                                      <input type="email" id="email" name="email" value="{{ $user->email }}" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                      <label for="phone">phone</label>
                                      <input type="text" id="phone" name="phone" value="{{ $user->phone }}" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                      <label for="Job">Job</label>
                                      <input type="text"  name="job" value="{{ $user->job }}" class="form-control" required>
                                    </div>
                                  <div class="form-group">
                                    <label for="Password">Password</label>
                                    <input type="text" name="password" value="{{ $user->password }}"  class="form-control" >
                                  </div>

                                  <div class="form-group">
                                    <label for="Role">Role</label>

                                    <div class="custom-select">
                                      <select id="Role" name="role" value="{{ $user->role }}" class="form-select mb-3">
                                        <option value="Admin">Admin</option>
                                        <option value="Manager">Manager</option>
                                        <option value="User">User</option>
                                      </select>
                                      <div class="custom-arrow"></div>
                                    </div>
                                  </div>
                                  <div class="form-group-button">
                                    <button type="submit" id="save-btn"  class="btn btn-success" >Save</button>
                                    <button type="button" id="cancel-btn" onclick="cancelChanges()" class="btn btn-secondary" >Cancel</button>
                                  </div>
                                </form>
                            </div>


                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>

</div>

@endsection
