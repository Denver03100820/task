@extends('layout.page')

@section('content')
<div class="card" style="min-width: 280px;">
    <div class="card-body">
        @include('inc.messages')
        <h2 class="h4">Task List 
            <a href={{ url('add_task') }} class="btn  btn-success flex-shrink-0 mb-2" >
                <i class="fa fa-plus"></i>
                <span class="d-none d-md-inline"> &nbsp; Task</span>
            </a>
        </h2>
        <hr />
        
        <div class="table-responsive">
            <table class="table table-hover align-middle mt-3" id="myTable">
                <thead>
                    <tr>
                        <th scope="col" style="width: 0;">#</th>
                        <th scope="col" style="width: 40%;">Task</th>
                        <th scope="col">Status</th>
                        <th scope="col">Date Created</th>
                        <th scope="col" class="text-center" style="width: 0;">Actions</th>
                    </tr>
                </thead>
                <tbody id="taksList">
                    @if (count($task) > 0)
                        @foreach ($task as $key => $task)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td class="text-nowrap">
                                    <label><strong>Code:</strong>&nbsp; {{ $task->task_code }}</label><br>
                                    <label><strong>Description:</strong>&nbsp; {{ $task->task_code }}</label>
                                </td>
                                <td class="text-nowrap">{{ $task->status->status_description }}</td>
                                <td class="text-nowrap">{{ $task->task_created_at }}</td>
                                <td class="text-nowrap">
                                    <span class="d-flex">
                                        <a href={{ url('task/'.$task->id) }} class="btn text-warning">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <a href={{ url('delete_task/'.$task->id) }}  class="btn text-danger" >
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
      