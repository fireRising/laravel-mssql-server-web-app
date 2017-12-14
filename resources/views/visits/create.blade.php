@extends('layouts.app')
@section('contents')
    <div class="container">
        @if(!$showFreeMasters)
            <div class="row">
                <div class="col-md-12 col-md-offset-2">
                    <h2>Group Services</h2>
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
            </div>
            <br>
            <div class="col-md-6 col-md-offset-2">
                <form method="get" action="/visit">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="GroupServices">Group Services</label>
                        <input type="text" class="form-control" id="GroupServices" name="group_services" placeholder="Group Services">
                    </div>
                    <div class="form-group">
                        <label for="nameServices">Name Services</label>
                        <input type="text" class="form-control" id="nameServices" name="name_services" placeholder="Name Services">
                    </div>
                    <div class="form-group">
                        <label for="dateVisit">Date</label>
                        <input type="date" class="form-control" id="dateVisit" name="date_visit" placeholder="Date Visit">
                    </div>
                    <div class="form-group">
                        <label for="timeVisit">Time</label>
                        <input type="time" class="form-control" id="timeVisit" name="time_visit" placeholder="Time Visit">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>

                    @include('layouts.errors')

                </form>
            </div>
        @else
            <div class="row">
                <div class="col-md-12 col-md-offset-2">
                    <h2>Free Masters</h2>
                    <table class="table table-hover">
                        <thead class="thead-inverse">
                        <tr>
                            <th>#</th>
                            <th>Last Name</th>
                            <th>First Name</th>
                            <th>Middle Name</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        $i = 0;
                        ?>
                        @foreach($freeMasters as $freeMaster)
                            <?php
                            $i++;
                            ?>
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$freeMaster->last_name}}</td>
                                <td>{{$freeMaster->first_name}}</td>
                                <td>{{$freeMaster->middle_name}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <br>
            <div class="col-md-6 col-md-offset-2">
                <p class="text-muted">Make Visit easy! We want your contacts!</p>
                <form method="post" action="/visit">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="firstNameCustomer">First Name</label>
                        <input type="text" class="form-control" id="firstNameCustomer" name="first_name_customer" placeholder="First Name">
                    </div>

                    <div class="form-group">
                        <label for="lastNameCustomer">Last Name</label>
                        <input type="text" class="form-control" id="lastNameCustomer" name="last_name_customer" placeholder="Last Name">
                    </div>

                    <div class="form-group">
                        <label for="middleNameCustomer">Middle Name(Not Required)</label>
                        <input type="text" class="form-control" id="middleNameCustomer" name="middle_name_customer" placeholder="Middle Name">
                    </div>

                    <div class="form-group">
                        <label for="phoneCustomer">Phone</label>
                        <input type="tel" class="form-control" id="PhoneCustomer" name="phone_customer" placeholder="Phone Number">
                    </div>

                    <div class="form-group">
                        <label for="addressCustomer">Address(Not Required)</label>
                        <input type="text" class="form-control" id="addressCustomer" name="address_customer" placeholder="Address">
                    </div>

                    <div class="form-group">
                        <label for="lastNameMaster">Last Name Master</label>
                        <input type="text" class="form-control" id="lastNameMaster" name="last_name_master" placeholder="Last Name Master">
                    </div>

                    <div class="form-group">
                        <label for="firstNameMaster">First Name Master</label>
                        <input type="text" class="form-control" id="firstNameMaster" name="first_name_master" placeholder="First Name Master">
                    </div>

                    <div class="form-group">
                        <label for="middleNameMaster">Middle Name Master</label>
                        <input type="text" class="form-control" id="middleNameMaster" name="middle_name_master" placeholder="Middle Name Master">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>

                    @include('layouts.errors')

                </form>
            </div>
        @endif
    </div>
@endsection
