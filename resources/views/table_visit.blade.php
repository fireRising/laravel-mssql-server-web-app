
    <h2>List of visits</h2>
    <table class="table table-hover">
        <thead class="thead-inverse">
        <tr>
            <th>#</th>
            <th>Service</th>
            <th>First name</th>
            <th>Last name</th>
            <th>Middle name</th>
            <th>Date visit</th>
            <th>Time visit</th>
            <th>Service Provided</th>
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
                <td>{{$visit->name}}</td>
                <td>{{$visit->first_name}}</td>
                <td>{{$visit->last_name}}</td>
                <td>{{$visit->middle_name}}</td>
                <td>{{$visit->date_visit}}</td>
                <td>{{$visit->time_visit}}</td>
                <td>{{$visit->service_provided}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
