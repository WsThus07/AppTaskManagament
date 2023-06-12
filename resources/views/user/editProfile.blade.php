@extends('user.layout')

@section('content')

<div class="container-fluid p-0">
    <div class="mb-3">
        <h1 class="h3 d-inline align-middle">Profile</h1>
    </div>
    <div class="row">
        <div class="col-md-4 col-xl-3">
            <div class="card mb-3">
                <div class="card-header">
                    <h5 class="card-title mb-0">Profile Details</h5>
                </div>
                <div class="card-body text-center">
                    <img src="/img/avatars/avatar-4.jpg" alt="Wissal charraki" class="img-fluid rounded-circle mb-2" width="128" height="128" />
                    <h5 class="card-title mb-0">{{ $user->FullName }}</h5>
                    <div class="text-muted mb-2">{{ $user->role }}</div>
                </div>
                <!-- <hr class="my-0" />-->


            </div>
        </div>

        <div class="col-md-8 col-xl-9">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">edit Profile</h5>
                </div>
                <div class="card-body h-100">

                    <div class="d-flex align-items-start">
                        <div class="profile-section">
                           <hr/>
                          </div>
                    </div>

                    <div class="d-flex align-items-start">
                        <div class="flex-grow-1">
                            <div class="border text-sm text-muted p-2 mt-1">
                                <form id="profile-form" action="{{ route('profile.store') }}" method="POST">
                                    @csrf
                                   
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" id="name" name="FullName" value="{{ $user->FullName }}" class="form-control">
                                      </div>
                                      <div class="form-group">
                                        <label for="username">Job</label>
                                        <input type="text" id="job" name="job" value="{{ $user->job }}" class="form-control" >
                                      </div>
                                    <div class="form-group">
                                      <label for="email">Email</label>
                                      <input type="email" id="email" name="email" value="{{ $user->email }}" class="form-control" >
                                    </div>

                                    <div class="form-group">
                                      <label for="password">Password</label>
                                      <input type="text" id="password" name="password" value="{{ $user->password }}" class="form-control" >
                                    </div>
                                    <div class="form-group-button">

                                      <button type="submit" id="save-btn" onclick="saveChanges()" class="btn btn-success" >Save</button>
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