@extends('layouts.app')

@section('content')


    <div class="row justify-content-center mt-3">
        <div class="col-md-8">
            <a href="{{ route('home.create') }}" class="btn btn-outline-primary mb-3"> <i class="fa fa-plus-circle"></i> Add
                Task</a>
            <div class="card">
                <div class="card-header">Task List</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Subject</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Action</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($tasks as $task)
                                <tr>
                                    <td>{{ $task->subject }}</td>
                                    <td>{{ $task->description }}</td>

                                    @if ($task->statue == '0')
                                        <td>
                                            <p class="badge bg-warning" style="color : #fff;">Pending</p>
                                        </td>
                                        @else

                                        <td>
                                            <p class="badge bg-success " style="color : #fff;">Resolved</p>

                                        </td>

                                    @endif





                                    <td class="d-flex">
                                        <a href="{{ route('home.edit', $task->id) }}"
                                            class="btn btn-outline-dark btn-sm ">
                                            <i class="fa fa-pencil"></i> Edit
                                        </a>

                                        <form action="{{ route('home.destroy' , $task->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm "
                                                onclick="return confirm('Are you sure to delete this page?');"
                                                >
                                                <i class="fa fa-trash"></i> Delete
                                            </button>
                                        </form>



                                    </td>
                                    <td>{{ $task->created_at }}</td>
                                    <td>{{ $task->updated_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>



                </div>
            </div>
        </div>
    </div>
@endsection
