<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class HomeController extends Controller
{
    private $visits;
    private $services_group;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->visits = \DB::select("SELECT * FROM dbo.VisitsToMaster(?,?,?,DEFAULT) ORDER BY service_provided",[
            'Mark',
            'Iridin',
            'Kofman'
        ]);
        $this->services_group = \DB::table('Services_group')->orderBy('id')->get()->all();

        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $role = Auth::getUser()->getAttribute('role');
        $money_per_day = \DB::select("SELECT dbo.CountMoneyPerDay()");

        return view('home', [
            'role' => $role,
            'welcome' => true,
            'money_per_day' => $money_per_day[0]
        ]);
    }

    public function about_visits_to_master() {

        return view('home', [
            'visits' => $this->visits,
            'about_visits_to_master' => true,
            'role' => 'master'
        ]);
    }

    public function service_provided() {

        return view('home', [
            'visits' => $this->visits,
            'change_visit_service_provided' => true,
            'role' => 'master'
        ]);
    }

    public function change_service_provided() {
        $this->validate(\request(), [
            'date_visit' => 'required',
            'time_visit' => 'required',
            'change_value' => 'required'
        ]);

        $date_visit = Input::get('date_visit');
        $time_visit = Input::get('time_visit');
        $change_value = Input::get('change_value');

        $response_change_service_provided = \DB::select("
        DECLARE @result NVARCHAR(50)
        EXECUTE dbo.ChangeServiceProvided ?, ?, ?, ?, ?, ?, @result = @result OUTPUT
        SELECT @result
        ", [
            'Iridin',
            'Mark',
            'Kofman',
            $date_visit,
            $time_visit,
            $change_value
        ]);

        return view('home', [
            'visits' => $this->visits,
            'change_visit_service_provided' => true,
            'role' => 'master',
            'response' => $response_change_service_provided[0]
        ]);
    }

    public function change_info() {

        return view('home', [
            'visits' => $this->visits,
            'change_info' => true,
            'role' => 'master'
        ]);
    }

    public function update_info_post() {
        $this->validate(\request(), [
            'date_visit' => 'required',
            'time_visit' => 'required',
            'new_date_visit' => 'required',
            'new_time_visit' => 'required'
        ]);

        $date_visit = Input::get('date_visit');
        $time_visit = Input::get('time_visit');
        $new_date_visit = Input::get('new_date_visit');
        $new_time_visit = Input::get('new_time_visit');

        $response = \DB::select("
        DECLARE @result NVARCHAR(50)
        EXECUTE dbo.UPD_Visits_FioEmployee_DT ?, ?, ?, ?, ?, ?, ?, 0, @result = @result OUTPUT
        SELECT @result", [
            'Iridin',
            'Mark',
            'Kofman',
            $date_visit,
            $time_visit,
            $new_date_visit,
            $new_time_visit
        ]);

        return view('home', [
            'visits' => $this->visits,
            'change_info' => true,
            'response' => $response[0],
            'role' => 'master'
        ]);
    }

    public function delete_info_post() {
        $this->validate(\request(), [
            'date_visit' => 'required',
            'time_visit' => 'required',
        ]);

        $date_visit = Input::get('date_visit');
        $time_visit = Input::get('time_visit');

        $response = \DB::select("
        DECLARE @result NVARCHAR(50)
        EXECUTE dbo.UPD_Visits_FioEmployee_DT ?, ?, ?, ?, ?, DEFAULT, DEFAULT, 1, @result = @result OUTPUT
        SELECT @result", [
            'Iridin',
            'Mark',
            'Kofman',
            $date_visit,
            $time_visit,
        ]);

        return view('home', [
            'visits' => $this->visits,
            'change_info' => true,
            'response' => $response[0],
            'role' => 'master'
        ]);
    }

    public function admin_visits_show() {
        $visits = \DB::select("SELECT * FROM Visits_ALL");

        return view('home', [
            'role' => 'administrator',
           'visits' => $visits,
            'visits_show' => true
        ]);
    }

    public function staff_schedule_show() {

        $staff_schedules = \DB::select("SELECT * FROM Staff_Schedule_FIO");

        return view('home', [
            'staff_schedules' => $staff_schedules,
            'role' => 'administrator',
            'staff_schedule_show' => true
        ]);
    }

    public function services_show() {

        $AllServicesInfo = \DB::table("dbo.AllServicesInfo")->get()->all();

        return view('home', [
            'AllServicesInfo' => $AllServicesInfo,
            'role' => 'administrator',
            'services_show' => true
        ]);
    }

    public function services_group_change() {

        return view('home', [
            'services_group' => $this->services_group,
            'role' => 'administrator',
            'services_group_change' => true
        ]);
    }

    public function services_group_change_post() {
        $name_sg_insert = Input::get('name_service_group_insert');
        $id_sg_delete = Input::get('id_service_group_delete');
        $name_sg_update = Input::get('name_service_group_update');
        $id_sg_update = Input::get('id_service_group_update');

        $insert = false;
        $update = false;
        $delete = false;

        if (!empty($name_sg_insert)) {
            \DB::select("
            DECLARE @result NVARCHAR(50)
            EXECUTE INS_Services_Group ?, @result = @result OUTPUT
            SELECT @result
            ", [
                $name_sg_insert,
            ]);
            $insert = true;
        } elseif (!empty($id_sg_delete)) {
            \DB::select("
            DECLARE @result NVARCHAR(50)
            EXECUTE DEL_Services_Group_PK ?, @result = @result OUTPUT
            SELECT @result
            ", [
                $id_sg_delete,
            ]);
            $delete = true;
        } elseif (!empty($id_sg_update)) {
            \DB::select("
            DECLARE @result NVARCHAR(50)
            EXECUTE UPD_Services_Group_PK ?, ?, @result = @result OUTPUT
            SELECT @result
            ", [
                $id_sg_update,
                $name_sg_update
            ]);
            $update = true;
        }

        return view('home', [
            'services_group' => $this->services_group,
            'role' => 'administrator',
            'services_group_change' => true,
            'insert' => $insert,
            'update' => $update,
            'delete' => $delete
        ]);
    }
}
