@extends('layouts.app')

@section('content')


    <div class="row justify-content-center mt-3">
        <div class="col-md-8">

            <span class="left-arrow"><i class="fa fa-arrow-left"></i></span>
            <div class="card mt-4">
                <div class="card-header">Update Task</div>

                <div class="card-body">
                    <form action="{{ route('home.update' , $task->id) }}" method="post" autocomplete="off">

                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3 mt-3">
                            <label for="subject" class="text-muted">Subject*</label>
                            <input type="text" class="form-control" value="{{ $task->subject }}" name="subject" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="description" class="text-muted">Add a description*</label>
                            <textarea name="description"  class="form-control" required>
{{ $task->description }}
                            </textarea>
                        </div>

                        <div class="form-group ">
                            <label for="status" class="text-muted">Change Status</label>
                            <select name="status" id="status" required class="form-control">
                                <option value="0">Pending</option>
                                <option value="1">Resolved</option>
                            </select>
                        </div>

                        <button class="btn btn-primary mt-3 mb-3 mr-auto" type="submit"> <i class="fa fa-save"></i>
                            Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')

    <script>
        $(document).ready(
            function() {
                $(document).on('click', '.left-arrow', function(e) {
                    e.preventDefault();
                    window.history.back();
                });
            }
        )
    </script>
@endsection
