@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>

            </div>
            @if (count($tasks) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Arrivals
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table ">
                            <thead>
                                <th  colspan="3">Shipping Requests</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                @foreach ($tasks as $task)
                                @if ($task->approved)
                                    <tr class="{{ $task->arrived? 'success' : 'active' }}">
                                        <td class="table-text"  colspan="3"><div>{{ $task->name }}</div></td>
                                      </tr>
                                      <tr>
                                        <!-- Task Delete Button -->
                                        <td>
    <form action="{{ url('task/arrived/'.$task->id) }}" method="POST">
        {{ csrf_field() }}

        <button type="submit" class="btn {{$task->arrived ? 'hidden' : 'btn-success'}}">
            <i class="fa {{$task->arrived ? 'fa-check-square-o' : 'fa-square-o'}}"> </i>Arrived
        </button>

    </form>
</td>
                                    </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
