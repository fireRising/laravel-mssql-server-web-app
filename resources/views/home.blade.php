@extends('layouts.app')

@section('contents')
<div class="container">
    <div class="row">
        @if ($role === 'administrator')
            <div class="col-md-2 col-md-offset-2">
                <div class="sidebar-nav">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a href="/home" class="nav-link">Start Page</a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/visits/show" class="nav-link">List of all visits</a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/staff_schedule/show" class="nav-link">Staff Schedule</a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/services/show" class="nav-link">List of services</a>
                        </li>
                        <li class="nav-item">
                            <a class="text-muted">Tables</a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/services_group/change" class="nav-link">Services Group</a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">Services</a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">Visits</a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">Positions</a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">Customers</a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">SGP</a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">Employees</a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">Staff Schedule</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link disabled">Settings</a>
                        </li>
                    </ul>
                </div>
            </div>

            @if (isset($welcome))
                <div class="col-md-10 col-md-offset-2">
                    <p class="text-success">ROOT RIGHTS</p>
                    @include('layouts.welcome')
                    @foreach($money_per_day as $value)
                        <p class="text-warning">Today expected profit is {{$value}} RUB</p>
                    @endforeach
                </div>
            @endif

            @if (isset($visits_show))
                <div class="col-md-10 col-md-offset-2">
                    <h2>List of all visits</h2>
                    <table class="table table-hover">
                        <thead class="thead-inverse">
                        <tr>
                            <th>#</th>
                            <th>Customer last name</th>
                            <th>Customer first name</th>
                            <th>Customer phone</th>
                            <th>Service name</th>
                            <th>Master last name</th>
                            <th>Master first name</th>
                            <th>Date visit</th>
                            <th>Time visit</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i = 0;
                        ?>
                        @foreach($visits as $visit)
                            <?php
                            $i++;
                            ?>
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$visit->CL}}</td>
                                <td>{{$visit->CF}}</td>
                                <td>{{$visit->phone}}</td>
                                <td>{{$visit->name}}</td>
                                <td>{{$visit->EL}}</td>
                                <td>{{$visit->EF}}</td>
                                <td>{{$visit->date_visit}}</td>
                                <td>{{$visit->time_visit}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif

            @if (isset($staff_schedule_show))
                <div class="col-md-10 col-md-offset-2">
                    <h2>Staff Schedule</h2>
                    <table class="table table-hover">
                        <thead class="thead-inverse">
                        <tr>
                            <th>#</th>
                            <th>Last name</th>
                            <th>First name</th>
                            <th>Middle name</th>
                            <th>Phone</th>
                            <th>Day of week</th>
                            <th>Start time</th>
                            <th>End time</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i = 0;
                        ?>
                        @foreach($staff_schedules as $staff_schedule)
                            <?php
                            $i++;
                            ?>
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$staff_schedule->last_name}}</td>
                                <td>{{$staff_schedule->first_name}}</td>
                                <td>{{$staff_schedule->middle_name}}</td>
                                <td>{{$staff_schedule->phone}}</td>
                                <td>{{$staff_schedule->day_of_week}}</td>
                                <td>{{$staff_schedule->start_time}}</td>
                                <td>{{$staff_schedule->end_time}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif

            @if(isset($services_show))
                <div class="col-md-10 col-md-offset-2">
                    <h2>Services</h2>
                    <table class="table table-hover">
                        <thead class="thead-inverse">
                        <tr>
                            <th>#</th>
                            <th>Group</th>
                            <th>Service</th>
                            <th>RUB</th>
                            <th>USD</th>
                            <th>Short Description</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i = 0;
                        ?>
                        @foreach($AllServicesInfo as $serviceInfo)
                            <?php
                            $i++;
                            ?>
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$serviceInfo->Group}}</td>
                                <td>{{$serviceInfo->Service}}</td>
                                <td>{{$serviceInfo->RUB}}</td>
                                <td>{{$serviceInfo->USD}}</td>
                                <td>{{$serviceInfo->Description}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif

            @if(isset($services_group_change))
                <div class="col-md-10 col-md-offset-2">
                    @include('layouts.upd_del_ins')
                    <h2>Services Group</h2>
                    <table class="table table-hover">
                        <thead class="thead-inverse">
                        <tr>
                            <th>id</th>
                            <th>Name group</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($services_group as $service_group)
                            <tr>
                                <td>{{$service_group->id}}</td>
                                <td>{{$service_group->name}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <br>
                    <p class="text-info">Insert service group</p>
                    <form method="post" action="/admin/services_group/change">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="nameServiceGroup">Name</label>
                            <input type="text" class="form-control" id="nameServiceGroup" name="name_service_group_insert" placeholder="name service group">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>

                        @include('layouts.errors')
                    </form>
                    <br><br>
                    <p class="text-info">Update service group</p>
                    <form method="post" action="/admin/services_group/change">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="idServiceGroup">id</label>
                            <input type="number" class="form-control" id="idServiceGroup" name="id_service_group_update" placeholder="id service group">
                        </div>
                        <div class="form-group">
                            <label for="nameServiceGroup">Name</label>
                            <input type="text" class="form-control" id="nameServiceGroup" name="name_service_group_update" placeholder="name service group">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>

                        @include('layouts.errors')
                    </form>
                    <br><br>
                    <p class="text-info">Delete service group</p>
                    <form method="post" action="/admin/services_group/change">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="idServiceGroup">id</label>
                            <input type="number" class="form-control" id="idServiceGroup" name="id_service_group_delete" placeholder="id service group">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>

                        @include('layouts.errors')
                    </form>

                </div>
            @endif
        @elseif ($role === 'master')
            <div class="col-md-2 col-md-offset-2">
                <div class="sidebar-nav">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a href="/home" class="nav-link">Start Page</a>
                        </li>
                        <li class="nav-item">
                            <a href="/visits/about" class="nav-link">List of visits</a>
                        </li>
                        <li class="nav-item">
                            <a href="/visits/service_provided" class="nav-link">Service provided</a>
                        </li>
                        <li class="nav-item">
                            <a href="/visits/change" class="nav-link">Change visit info</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link disabled">Settings</a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link"></a>
                        </li>
                    </ul>
                </div>
            </div>
            @if (!isset($about_visits_to_master) && !isset($change_visit_service_provided) && !isset($change_info))
                <div class="col-md-10 col-md-offset-2">
                    @include('layouts.welcome')
                </div>
            @elseif (isset($about_visits_to_master))
                <div class="col-md-10 col-md-offset-2">
                @include('table_visit')
                </div>
            @elseif (isset($change_visit_service_provided))
                <div class="col-md-10 col-md-offset-2">
                    @include('layouts.response')
                    @include('table_visit')

                    <form method="post" action="/visits/service_provided/change">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="dateVisit">Date visit</label>
                            <input type="date" class="form-control" id="dateVisit" name="date_visit" placeholder="Date Visit">
                        </div>
                        <div class="form-group">
                            <label for="timeVisit">Time visit</label>
                            <input type="time" class="form-control" id="timeVisit" name="time_visit" placeholder="Time Visit">
                        </div>
                        <div class="form-group">
                            <label for="changeValue">New value</label><br>
                            <select class="selectpicker" id="changeValue" name="change_value">
                                <optgroup label="Select">
                                    <option>Yes</option>
                                    <option>No</option>
                                </optgroup>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>

                        @include('layouts.errors')

                    </form>
                </div>
            @endif
            @if(isset($change_info))
                <div class="col-md-10 col-md-offset-2">
                    @include('layouts.response')
                    @include('table_visit')
                    <br>
                    <p class="text-primary">If you want to change time or date</p>
                    <form method="post" action="/visits/update">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="dateVisit">Date visit</label>
                            <input type="date" class="form-control" id="dateVisit" name="date_visit" placeholder="Date Visit">
                        </div>
                        <div class="form-group">
                            <label for="timeVisit">Time visit</label>
                            <input type="time" class="form-control" id="timeVisit" name="time_visit" placeholder="Time Visit">
                        </div>
                        <div class="form-group">
                            <label for="newDateVisit">New date visit</label>
                            <input type="date" class="form-control" id="newDateVisit" name="new_date_visit" placeholder="Date Visit">
                        </div>
                        <div class="form-group">
                            <label for="newTimeVisit">New time visit</label>
                            <input type="time" class="form-control" id="newTimeVisit" name="new_time_visit" placeholder="Time Visit">
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>

                        @include('layouts.errors')
                    </form>
                    <br><br>
                    <p class="text-primary">If you want to delete visit</p>
                    <form method="post" action="/visits/delete">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="dateVisit">Date visit</label>
                            <input type="date" class="form-control" id="dateVisit" name="date_visit" placeholder="Date Visit">
                        </div>
                        <div class="form-group">
                            <label for="timeVisit">Time visit</label>
                            <input type="time" class="form-control" id="timeVisit" name="time_visit" placeholder="Time Visit">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>

                        @include('layouts.errors')
                    </form>
                </div>

            @endif
        @elseif ($role === 'customer')
            <div class="col-md-2 col-md-offset-2">
                <div class="sidebar-nav">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a href="/visit/create" class="nav-link">Enroll to the master</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link disabled">Settings</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-10 col-md-offset-2">
                @include('layouts.welcome')
            </div>
        @endif
    </div>
</div>
@endsection
