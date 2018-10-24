@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                  Welcome!
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                  <p> Welcome to a Laravel mySQL PHP application on Azure </p>
                    <!-- New Task Form -->

                </div>

                @if (count($tasks) > 0)
                    <div class="panel panel-default">

                        <div class="panel-body">
                            <table class="table table-striped task-table">
                                <thead>
                                    <th colspan="3">Shipping Requests</th>
                                    <th>&nbsp;</th>
                                </thead>
                                <tbody>
                                    @foreach ($tasks as $task)
                                      <tr>
                                            <td class="table-text"><div>{{ $task->name }}</div></td>
                                            <td> <alert class="alert-sm {{$task->arrived ? 'alert-success' : 'hidden'}}"/> Arrived! </td>
                                                <td> <alert class="alert-sm {{$task->approved ? 'alert-primary' : 'hidden'}}"/> Approved! </td>

                                            <!-- Task Delete Button -->

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Current Tasks -->

        </div>
    </div>
@endsection
