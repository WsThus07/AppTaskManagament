@extends('manager.layout')

@section('content')

<div class="container-fluid p-0">
    <div class="mb-3">
        <h1 class="h3 d-inline align-middle">Edit Task</h1>
    </div>
    <div class="row cnt-cnt">


        <div class="col-md-8 col-xl-9">
            <div class="card ">
                <div class="card-header">

                    <h5 class="card-title mb-0">Update Task</h5>
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
                                <form id="profile-form"  action="{{ route('projects_tasks.update',$task->id) }}" method="POST">
                                  @csrf
                                  @method('PUT')
                                    <div class="form-group">
                                      <label for="task-Name">Task Name</label>
                                      <input type="text" id="task-Name" name="name" value="{{ $task->name }}" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="task-Description">Task Description</label>
                                        <textarea id="task-Description" name="description"  class="form-control">{{ $task->description }}</textarea>
                                      </div>
                                    <div class="form-group">
                                      <label for="start-date">Start Date</label>
                                      <input type="date" id="start-date" name="start_date" value="{{ $task->start_date }}" class="form-control" >
                                    </div>
                                    <div class="form-group">
                                        <label for="end-date">End Date</label>
                                        <input type="date" id="start-date" name="end_date" value="{{ $task->end_date }}" class="form-control" >
                                      </div>
                                      <!---->
                                      <div class="form-group">
                                        <label for="task-Description">Task Priority</label>
                                        <select id="Assigned-to" name="priority">
                                          <option value="Meduim">Medium</option>
                                          <option value="Low">Low</option>
                                          <option value="High">High</option>
                                        </select>
                                      </div>
                                      <!---->
                                        <input id="status" type="hidden" name="status" value="{{ $task->status }}" class="form-control"></textarea>

                                    <div class="form-group">
                                      <label for="Assigned-to">Assigned To</label>

                                      <div class="custom-select">
                                        <select id="Assigned-to" name="user_id">
                                        @foreach ($users as $val )
                                        <option value="{{ $val->id }}">{{ $val->FullName }}</option>
                                        @endforeach
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
