@extends('layout.page')

@section('content')
<div class="card" style="min-width: 280px;">
    <div class="card-body">
        @include('inc.messages')
        <h2 class="h4">Task Trash List 
        </h2>
        <hr />
        
        <div class="table-responsive">
            <table class="table table-hover align-middle mt-3" id="myTable">
                <thead>
                    <tr>
                        <th scope="col" style="width: 0;">#</th>
                        <th scope="col" style="width: 40%;">Task</th>
                        <th scope="col">Status</th>
                        <th scope="col">Date Deleted</th>
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
                                <td class="text-nowrap">{{ date('F d,Y h:i:s a',strtotime($task->task_deleted_at)) }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
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
      