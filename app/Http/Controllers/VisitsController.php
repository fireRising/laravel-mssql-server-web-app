<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Visit;
use Illuminate\Support\Facades\Input;

class VisitsController extends Controller
{
    public function create() {
        $AllServicesInfo = \DB::table("dbo.AllServicesInfo")->get()->all();
        return view('visits.create', [
            'AllServicesInfo' => $AllServicesInfo,
            'showFreeMasters' => false
        ]);
    }

    public function showFreeMasters() {
        $this->validate(\request(), [
            'group_services' => 'required',
            'name_services' => 'required',
            'date_visit' => 'required',
            'time_visit' => 'required'
        ]);
        $service_group = Input::get('group_services');
        $service_name = Input::get('name_services');
        $date_visit = Input::get('date_visit');
        $time_visit = Input::get('time_visit');

        \Cache::delete('service_group');
        \Cache::delete('service_name');
        \Cache::delete('date_visit');
        \Cache::delete('time_visit');
        \Cache::add('service_group', $service_group, 5);
        \Cache::add('service_name', $service_name, 5);
        \Cache::add('date_visit', $date_visit, 5);
        \Cache::add('time_visit', $time_visit, 5);

        $freeMasters = \DB::select("SELECT DISTINCT first_name, last_name, middle_name FROM dbo.GetFreeMasters(?,?,?,?)", [
            $service_group,
            $service_name,
            $date_visit,
            $time_visit
        ]);

        return view('visits.create', [
            'freeMasters' => $freeMasters,
            'showFreeMasters' => true
        ]);
    }

    public function post() {

        $this->validate(\request(), [
            'first_name_customer' => 'required',
            'last_name_customer' => 'required',
            'phone_customer' => 'required',
            'last_name_master' => 'required',
            'first_name_master' => 'required',
            'middle_name_master' => 'required'
        ]);

        $first_name_customer = Input::get('first_name_customer');
        $last_name_customer = Input::get('last_name_customer');
        $middle_name_customer = Input::get('middle_name_customer');
        $phone_customer = Input::get('phone_customer');
        $address_customer = Input::get('address_customer');
        $last_name_master = Input::get('last_name_master');
        $first_name_master = Input::get('first_name_master');
        $middle_name_master = Input::get('middle_name_master');


        $response_make_visit = \DB::select("
        DECLARE @result_visit NVARCHAR(50)
        EXECUTE dbo.MakeVisit ?,?,?,?,?,?,?,?,?,?,?,?, @result = @result_visit OUTPUT
        SELECT @result_visit
        ", [
            $last_name_customer,
            $first_name_customer,
            $middle_name_customer,
            $phone_customer,
            $address_customer,
            \Cache::get('service_group'),
            \Cache::get('service_name'),
            $last_name_master,
            $middle_name_master,
            $first_name_master,
            \Cache::get('date_visit'),
            \Cache::get('time_visit')
        ]);

        return view('services.index', ['response' => $response_make_visit[0]]);
    }
}
