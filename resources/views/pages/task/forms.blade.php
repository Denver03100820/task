@extends('layout.page')

@section('content')
<form class="py-2" method="POST" action={{ url($action) }}>
    @csrf
    <h3 class="text-uppercase">{{ $formDesc }}&nbsp;Task</h3>
    @include('inc.messages')
    <div class="mb-3">
        <label for="taskCode" class="form-label">Task Code:</label>
        <input type="text" class="form-control" id="taskCode" name="task_code" value="{{ $task->task_code ?? old('task_code') }}" placeholder="Code">
    </div>
    <div class="mb-3">
        <label for="taskDesc" class="form-label">Task Description:</label>
        <input type="text" class="form-control" id="taskDesc" name="task_description" value="{{ $task->task_description ?? old('task_description') }}" placeholder="Description">
    </div>

    @if ($formDesc == 'Edit')
        <div class="mb-3">
            <label for="taskStatus" class="form-label">Status:</label>
            <select class="form-control" name="task_status_id" id="taskStatus">
                <option>Choose..</option>

                @foreach ($status as $status)
                    <option value="{{ $status->id }}" {{ ( $status->id == $task->task_status_id) ? 'selected' : '' }}> {{ $status->status_description }} </option>
                @endforeach   
            </select>
        </div>
    @endif

    <div class="d-flex justify-content-between">
        <button type="submit" class="btn btn-primary btn-lg mt-3 mr-auto" type="submit">{{ $formDesc == 'Add' ? 'Submit' : 'Update' }}</button>
    </div>
</form>
@endsection