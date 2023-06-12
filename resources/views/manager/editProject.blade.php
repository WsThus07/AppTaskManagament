@extends('manager.layout')

@section('content')

<div class="container-fluid p-0">
    <div class="mb-3">
        <h1 class="h3 d-inline align-middle">Project A</h1>
    </div>
    <div class="row cnt-cnt">


        <div class="col-md-8 col-xl-9">
            <div class="card ">
                <div class="card-header">

                    <h5 class="card-title mb-0">Edit Project</h5>
                </div>
                <div class="card-body h-100">

                    <div class="d-flex align-items-start">
                        <div class="profile-section">
                            <h2></h2>
                          </div>
                    </div>
                    <hr />
                    <div class="d-flex align-items-start">
                        <div class="flex-grow-1">
                            <div class="border text-sm text-muted p-2 mt-1">
                                <form id="profile-form">
                                    <div class="form-group">
                                      <label for="project-name">Project Name</label>
                                      <input type="text" id="project-name" name="project-name" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="project-Description">Project Description</label>
                                        <textarea id="project-Description" name="project-Description" class="form-control"></textarea>
                                      </div>
                                    <div class="form-group">
                                      <label for="start-date">Start Date</label>
                                      <input type="date" id="start-date" name="start-date" class="form-control" >
                                    </div>
                                    <div class="form-group">
                                        <label for="end-date">End Date</label>
                                        <input type="date" id="start-date" name="end-date" class="form-control" >
                                      </div>

                                    <div class="form-group-button">

                                      <button type="button" id="save-btn" onclick="saveChanges()" class="btn btn-success" >Save</button>
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
