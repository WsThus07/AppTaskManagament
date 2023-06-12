@extends('admin.layout')
@section('content')
<div class="container-fluid p-0">
    <div class="mb-3">
    <h1 class="h3 d-inline align-middle">Add Project</h1>
    </div>
    <div class="row cnt-cnt">


        <div class="col-md-8 col-xl-9">
            <div class="card ">
                <div class="card-header">

                    <h5 class="card-title mb-0">New Project</h5>
                </div>
                <div class="card-body h-100">

                    <div class="d-flex align-items-start">
                        <div class="profile-section">
                           Project
                          </div>
                    </div>
                    <hr />
                    <div class="d-flex align-items-start">
                        <div class="flex-grow-1">
                            <div class="border text-sm text-muted p-2 mt-1">
                                <form id="profile-form" action="{{ route('projects.store') }}" method="POST">
                                  @csrf
                                    <div class="form-group">
                                      <label for="Name">Name</label>
                                      <input type="text" id="Name" name="name" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="Description">Description</label>
                                        <textarea id="Description" name="description" class="form-control"></textarea>
                                      </div>
                                    <div class="form-group">
                                      <label for="start_date">start Date</label>
                                      <input type="date" id="start_date" name="start_date" class="form-control" >
                                    </div>
                                    <div class="form-group">
                                        <label for="end_date">end Date</label>
                                        <input type="date" id="end_date" name="end_date" class="form-control" >
                                    </div>
                                    <div class="form-group">
                                        <label for="id_manager">Manager</label>

                                          <div class="custom-select">
                                            <select name="manager" class="form-select mb-3">
                                              @foreach ( $select_manager as $val1=>$data1 )
                                                <option value="{{ $data1 }}">{{$data1 }}</option>
                                                @endforeach
                                              </select>
                                            <div class="custom-arrow"></div>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                        <label for="priority">Priority</label>

                                          <div class="custom-select">
                                            <select name="priority" class="form-select mb-3">
                                                <option value="Low">Low</option>
                                                <option value="Meduim">Meduim</option>
                                                <option value="High">high</option>
                                              </select>
                                            <div class="custom-arrow"></div>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                        <label for="priority">Status</label>

                                          <div class="custom-select">
                                            <select name="status" class="form-select mb-3">
                                                <option value="Not yet">Not yet</option>
                                                <option value="Done">Done</option>
                                                <option value="In progress">In progress</option>
                                              </select>
                                            <div class="custom-arrow"></div>
                                          </div>
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
