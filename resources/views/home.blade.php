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
                        Departures
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table ">
                            <thead>
                                <th  colspan="3">Shipping Requests</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                @foreach ($tasks as $task)

                                  <tr class="{{ $task->approved? 'success' : 'active' }}">
                                        <td class="table-text"  colspan="3"><div>{{ $task->name }}</div></td>
                                      </tr>
                                      <tr>
                                        <!-- Task Delete Button -->
                                        <td>
                                            <form action="{{ url('task/'.$task->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" class="btn {{$task->approved ? 'hidden' : 'btn-danger'}}">
                                                    <i class="fa fa-btn fa-trash"></i> Reject
                                                </button>
                                            </form>
                                        </td>
                                        <td>
    <form action="{{ url('task/approved/'.$task->id) }}" method="POST">
        {{ csrf_field() }}

        <button type="submit" class="btn {{$task->approved ? 'hidden' : 'btn-primary'}}">
            <i class="fa {{$task->approved ? 'fa-check-square-o' : 'fa-square-o'}}"> </i>Approve
        </button>

    </form>
</td>

                                    </tr>
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
