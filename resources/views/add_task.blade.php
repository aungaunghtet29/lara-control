@extends('layouts.app')

@section('content')


    <div class="row justify-content-center mt-3">
        <div class="col-md-8">

            <span class="left-arrow" ><i class="fa fa-arrow-left"></i></span>
            <div class="card mt-4">
                <div class="card-header">Create Task</div>

                <div class="card-body ">

                    <form action="{{ route('home.store') }}" method="post" autocomplete="off">

                        @csrf
                        <div class="form-group mb-3 mt-3">
                            <label for="subject" class="text-muted">Subject*</label>
                            <input type="text" class="form-control" name="subject" required>
                        </div>

                        <div class="form-group">
                            <label for="description" class="text-muted">Add a description*</label>
                            <textarea name="description" class="form-control" required></textarea>
                        </div>

                        <button class="btn btn-primary mt-3 mb-3 mr-auto" type="submit"> <i class="fa fa-save"></i> Save</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')

    <script>
        $(document).ready(
            function(){
                $(document).on('click' , '.left-arrow', function (e) {
                    e.preventDefault();
                    window.history.back();
                });
            }
        )
    </script>
@endsection

