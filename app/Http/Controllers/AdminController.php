<?php

namespace App\Http\Controllers;

use App\User;
use App\Store;
use App\Audit;
use App\Territorry;
use App\Zone;
use App\Town;
use App\Zonetown;
use App\Dailyvisit;
use App\Option;
use App\Doctor;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Session;
use DB;
use File;
use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use App\SSP;
use Carbon\Carbon;

class AdminController extends Controller
{

    public function dashboard(Request $request){
        return view('index');
    }

    public function login(){
        return view('login');
    }

    public function postlogin(Request $request)
    {   
        $input = Input::all();
        $name = $input['name'];
        $password = $input['password'];
        if (Auth::attempt(['name' => $name, 'password' => $password])) {
            if(Auth::user()->role_id==1){
                return redirect()->intended('admin/dashboard');
            }
            
        }
        else{
            return redirect()->intended('login');
        }

        
    }

    public function store(){
        $zones = Zone::all();
        $territorries = Territorry::all();
        $towns = Town::all();
    	return view('store')->with('zones',$zones)->with('territorries',$territorries)->with('towns',$towns);
    }

    


    public function getstorelist(Request $request){
        $where = " WHERE 1=1";
        if ($request->input('date')){
            $where .= " AND date='".$request->input('date')."'";
        }

        if(Auth::user()->type==2){
            $where .= " AND stores.territorry_id='".Auth::user()->territorry_id."'";
        }
        if(Auth::user()->type==4){
            $where .= " AND stores.zone_id='".Auth::user()->zone_id."'";
        }

        if ($request->input('store_code')){
            $where .= " AND store_code='".$request->input('store_code')."'";
        }

        if ($request->input('store_name')){
            $where .= " AND store_name='".$request->input('store_name')."'";
        }

        if ($request->input('plot_no')){
            $where .= " AND plot_no='".$request->input('plot_no')."'";
        }

        if ($request->input('mobilenumber')){
            $where .= " AND mobilenumber='".$request->input('mobilenumber')."'";
        }

        if ($request->input('town_id')){
            $where .= " AND stores.town_id='".$request->input('town_id')."'";
        }

        if ($request->input('zone_id')){
            $where .= " AND stores.zone_id='".$request->input('zone_id')."'";
        }

        if ($request->input('territorry_id')){
            $where .= " AND stores.territorry_id='".$request->input('territorry_id')."'";
        }

        if ($request->input('bdo_name')){
            $where .= " AND bdo_name='".$request->input('bdo_name')."'";
        }

        
        $table = 
            "(
                SELECT stores.*,zones.name as zone, territorries.name territorry, towns.name as town from stores INNER JOIN zones ON stores.zone_id=zones.id INNER JOIN territorries ON stores.territorry_id = territorries.id INNER JOIN towns on stores.town_id = towns.id".$where." order by stores.id desc
            ) testtable";


        $primaryKey = 'id';



        $columns = array(

            array( 'db' => 'id',  'dt' => 'id' ),

            array( 'db' => 'date', 'dt' => 'date' ),

            array( 'db' => 'store_code', 'dt' => 'store_code' ),

            array( 'db' => 'store_name',  'dt' => 'store_name' ),

            array( 'db' => 'plot_no',  'dt' => 'plot_no' ),

            array( 'db' => 'mobilenumber',  'dt' => 'mobilenumber' ),

            array( 'db' => 'town',  'dt' => 'town' ),

            array( 'db' => 'photo_link',  'dt' => 'photo_link' ),

            array( 'db' => 'gps_coordinates',  'dt' => 'gps_coordinates' ),

            array( 'db' => 'zone',  'dt' => 'zone' ),

            array( 'db' => 'territorry',  'dt' => 'territorry' ),

            array( 'db' => 'bdo_name',  'dt' => 'bdo_name' ),

            array( 'db' => 'created_at',  'dt' => 'timestamp' ),

            array(

                'db'        => 'created_at',

                'dt'        => 'created_at',

                'formatter' => function( $d, $row ) {

                    return date( 'jS M y', strtotime($d));

                }
            )
        );
        if($_SERVER['HTTP_HOST']=='localhost'){
            $sql_details = array(

                'user' => 'root',

                'pass' => '123456',

                'db'   => 'unilever',

                'host' => 'localhost'

            );
        }
        else{
            $sql_details = array(

                'user' => 'dcptrack_unileve',

                'pass' => 'r5hEYz!rDVOH',

                'db'   => 'dcptrack_unilever',

                'host' => 'dcptracker.com'

            );
        }
        

        // require( 'public/Jquerydatatables/ssp.class.php' );
        require( 'app/ssp.class.php' );
        // echo json_encode(
        // dd($type);
        $result =  SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns);

        $start=$_REQUEST['start']+1;

        $idx=0;

        foreach($result['data'] as &$res){

            $res[0]=(string)$start;

            $start++;

            $idx++;

            // $res['post_content']=html_entity_decode($res['post_content']);

        }

        echo json_encode($result);

    }
    
    
    public function getDailyvisit(Request $request){

        $where = " WHERE 1=1";

        if(Auth::user()->type==2){
            $where .= " AND dailyvisits.territorry_id='".Auth::user()->territorry_id."'";
        }
        if(Auth::user()->type==4){
            $where .= " AND dailyvisits.zone_id='".Auth::user()->zone_id."'";
        }

        if ($request->input('date')){
            $where .= " AND date='".$request->input('date')."'";
        }

        if ($request->input('email')){
            $where .= " AND email='".$request->input('email')."'";
        }

        if ($request->input('bdo_id')){
            $where .= " AND bdo_id='".$request->input('bdo_id')."'";
        }

        if ($request->input('dentist_name')){
            $where .= " AND dentist_name='".$request->input('dentist_name')."'";
        }

        if ($request->input('chamber')){
            $where .= " AND chamber='".$request->input('chamber')."'";
        }

        if ($request->input('chamber_address')){
            $where .= " AND chamber_address='".$request->input('chamber_address')."'";
        }

        if ($request->input('zone_id')){
            $where .= " AND dailyvisits.zone_id='".$request->input('zone_id')."'";
        }

        if ($request->input('territorry_id')){
            $where .= " AND dailyvisits.territorry_id='".$request->input('territorry_id')."'";
        }

        

        if ($request->input('bdo_name')){
            $where .= " AND bdo_name='".$request->input('bdo_name')."'";
        }

        if ($request->input('bdo_number')){
            $where .= " AND bdo_number='".$request->input('bdo_number')."'";
        }
        
        $options = Option::all()->keyBy('id');

        $table = 
            "(
                SELECT dailyvisits.*,zones.name as zone, territorries.name territorry, users.name as bdoName, doctors.name as doctor_name, doctors.chamber as doctor_chamber, doctors.chamber_address as doctor_chamber_address, doctors.dentist_grade as grade from dailyvisits INNER JOIN zones ON dailyvisits.zone_id=zones.id INNER JOIN territorries ON dailyvisits.territorry_id = territorries.id INNER JOIN users ON dailyvisits.bdo_id = users.id INNER JOIN doctors ON dailyvisits.dentist_name = doctors.id ".$where." order by dailyvisits.id desc
            ) testtable";

        // dd($table);
        $primaryKey = 'id';



        $columns = array(

            array( 'db' => 'id',  'dt' => 'id' ),

            array( 'db' => 'date', 'dt' => 'date' ),

            array( 'db' => 'email', 'dt' => 'email' ),

            array( 'db' => 'visit_status',  'dt' => 'visit_status' ),

            array( 'db' => 'bdoName',  'dt' => 'bdoName' ),

            array( 'db' => 'visit_type',  'dt' => 'visit_type' ),

            array( 'db' => 'visit_cycle',  'dt' => 'visit_cycle' ),

            array( 'db' => 'sample',  'dt' => 'sample' ),

            array( 'db' => 'special_comp',  'dt' => 'special_comp' ),

            array( 'db' => 'sample_quantity',  'dt' => 'sample_quantity' ),

            array( 'db' => 'doctor_name',  'dt' => 'doctor_name' ),

            array( 'db' => 'grade',  'dt' => 'grade' ),

            array( 'db' => 'doctor_chamber',  'dt' => 'doctor_chamber' ),

            array( 'db' => 'doctor_chamber_address',  'dt' => 'doctor_chamber_address' ),
            
            array( 'db' => 'gps_coordinates',  'dt' => 'gps_coordinates' ),
            
            array( 'db' => 'photo_link',  'dt' => 'photo_link' ),
            
            array( 'db' => 'number_prescription',  'dt' => 'number_prescription' ),
            
            array( 'db' => 'product_benifit',  'dt' => 'product_benifit' ),
            
            array( 'db' => 'question',  'dt' => 'question' ),
            
            array( 'db' => 'feedback_photocode',  'dt' => 'feedback_photocode' ),
            
            array( 'db' => 'zone',  'dt' => 'zone' ),
            
            array( 'db' => 'territorry',  'dt' => 'territorry' ),

            array( 'db' => 'created_at',  'dt' => 'timestamp' ),

            array(

                'db'        => 'created_at',

                'dt'        => 'created_at',

                'formatter' => function( $d, $row ) {

                    return date( 'jS M y', strtotime($d));

                }
            )
        );
        if($_SERVER['HTTP_HOST']=='localhost'){
            $sql_details = array(

                'user' => 'root',

                'pass' => '123456',

                'db'   => 'unilever',

                'host' => 'localhost'

            );
        }
        else{
            $sql_details = array(

                'user' => 'dcptrack_unileve',

                'pass' => 'r5hEYz!rDVOH',

                'db'   => 'dcptrack_unilever',

                'host' => 'dcptracker.com'

            );
        }
        

        // require( 'public/Jquerydatatables/ssp.class.php' );
        require( 'app/ssp.class.php' );
        // echo json_encode(
        // dd($type);
        $result =  SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns);

        $start=$_REQUEST['start']+1;

        $idx=0;

        foreach($result['data'] as &$res){
            $res[0]=(string)$start;

            $start++;

            $idx++;

            $res['visit_status'] = $options[$res['visit_status']]['name'];
            $res['visit_type'] = $options[$res['visit_type']]['name'];
            $res['visit_cycle'] = $options[$res['visit_cycle']]['name'];
            $res['sample'] = $options[$res['sample']]['name'];
            $res['special_comp'] = $options[$res['special_comp']]['name'];
            $res['number_prescription'] = $options[$res['number_prescription']]['name'];
            $res['grade'] = $options[$res['grade']]['name'];
            $res['product_benifit'] = $options[$res['product_benifit']]['name'];

            // $res['visit_status'] = $options[$res['visit_status']]['name'];
            // $res['visit_status'] = $options[$res['visit_status']]['name'];
            // $res['visit_status'] = $options[$res['visit_status']]['name'];

            
        }

        echo json_encode($result);

    }
    public function dailyvisit(){
        $users = User::where('type','2')->get();
        $zones = Zone::all();
        $territorries = Territorry::all();
    	return view('dailyvisit')->with('users',$users)->with('zones',$zones)->with('territorries',$territorries);
    }


    public function storeedit($id){
        if(Auth::user()->type==2){
            $store = Store::where('id',$id)->where('territorry_id',Auth::user()->territorry_id)->first();
        }
        else if(Auth::user()->type==4){
            $store = Store::where('id',$id)->where('zone_id',Auth::user()->zone_id)->first();
        }
        else{
            $store = Store::where('id',$id)->first();
        }
        $zones = Zone::all();
        $territorries = Territorry::where('zone_id',$store->zone_id)->get();
        $towns = Town::whereHas('zonetowns', function ($query) use ($store){
                $query->where('zone_id', '=', $store->zone_id);
            })->get();
        return view('storeedit')->with('store',$store)->with('zones',$zones)->with('territorries',$territorries)->with('towns',$towns);
    }

    public function auditedit($id){
        if(Auth::user()->type==2){
            $audit = Audit::where('id',$id)->first();
            $checkStore = Store::where('id',$audit->store_id)->first();
            if($checkStore->territorry_id!=Auth::user()->territorry_id){
                return;
            }
        }
        else if(Auth::user()->type==4){
            $audit = Audit::where('id',$id)->first();
            $checkStore = Store::where('id',$audit->store_id)->first();
            if($checkStore->zone_id!=Auth::user()->zone_id){
                return;
            }
        }
        else{
            $audit = Audit::where('id',$id)->first();
        }
        $audit = Audit::where('id',$id)->first();
        $store = Store::where('id',$audit->store_id)->first();
        $storeList = Store::where('zone_id',$store->zone_id)->where('territorry_id',$store->territorry_id)->where('town_id',$store->town_id)->get();
        
        $zones = Zone::all();
        $territorries = Territorry::where('zone_id',$store->zone_id)->get();
        $towns = Town::whereHas('zonetowns', function ($query) use ($store){
                $query->where('zone_id', '=', $store->zone_id);
            })->get();
        return view('auditedit')->with('audit',$audit)->with('store',$store)->with('zones',$zones)->with('territorries',$territorries)->with('towns',$towns)->with('storeList',$storeList);
    }

    public function dailyvisitedit($id){
        if(Auth::user()->type==2){
            $dailyvisit = Dailyvisit::where('id',$id)->where('territorry_id',Auth::user()->territorry_id)->first();
        }
        else if(Auth::user()->type==4){
            $dailyvisit = Dailyvisit::where('id',$id)->where('zone_id',Auth::user()->zone_id)->first();
        }
        else{
            $dailyvisit = Dailyvisit::where('id',$id)->first();
        }
        $dailyvisit = Dailyvisit::where('id',$id)->first();
        $bdos = User::where('type','2')->get();
        $zones = Zone::all();
        $territorries = Territorry::where('zone_id',$dailyvisit->zone_id)->get();
        $options = Option::all();
        $doctors = Doctor::all();
        $currentDoctor = Doctor::where('id',$dailyvisit->dentist_name)->first();
        return view('dailyvisitedit')->with('dailyvisit',$dailyvisit)->with('bdos',$bdos)->with('zones',$zones)->with('territorries',$territorries)->with('options',$options)->with('doctors',$doctors)->with('currentDoctor',$currentDoctor);
    }

    public function audit(Request $request){
        $zones = Zone::all();
        $territorries = Territorry::all();
        $towns = Town::all();
        return view('audit')->with('zones',$zones)->with('territorries',$territorries)->with('towns',$towns);;
    }

    public function getDoctorInfo(Request $request){
        $doctor = Doctor::where('id',$request->input('id'))->first();
        return $doctor;
    }


    // public function getStores(Request $request){
    //     $stores = Store::orderBy('store_name', 'ASC')->where('zone_id',$request->input('zone_id'))->where('territorry_id',$request->input('territorry_id'))->where('town_id',$request->input('town_id'))->get();

    //     return response()->json($stores);
    // }

    public function getAudit(Request $request){

        $where = " WHERE 1=1";
        if(Auth::user()->type==2){
            $where .= " AND stores.territorry_id='".Auth::user()->territorry_id."'";
        }
        if(Auth::user()->type==4){
            $where .= " AND stores.zone_id='".Auth::user()->zone_id."'";
        }
        if ($request->input('date')){
            $where .= " AND date='".$request->input('date')."'";
        }

        if ($request->input('store_code')){
            $where .= " AND stores.store_code='".$request->input('store_code')."'";
        }

        if ($request->input('store_name')){
            $where .= " AND stores.store_name='".$request->input('store_name')."'";
        }

        if ($request->input('plot_no')){
            $where .= " AND stores.plot_no='".$request->input('plot_no')."'";
        }

        if ($request->input('mobilenumber')){
            $where .= " AND stores.mobilenumber='".$request->input('mobilenumber')."'";
        }

        if ($request->input('town_id')){
            $where .= " AND stores.town_id='".$request->input('town_id')."'";
        }

        if ($request->input('zone_id')){
            $where .= " AND stores.zone_id='".$request->input('zone_id')."'";
        }

        if ($request->input('territorry_id')){
            $where .= " AND stores.territorry_id='".$request->input('territorry_id')."'";
        }

        if ($request->input('oral_care')){
            $where .= " AND oral_care='".$request->input('oral_care')."'";
        }

        
        if ($request->input('within_coverage')){
            $where .= " AND within_coverage='".$request->input('within_coverage')."'";
        }

        if ($request->input('oral_care_availability')){
            $where .= " AND oral_care_availability='".$request->input('oral_care_availability')."'";
        }

        if ($request->input('sensetive_expert_professional')){
            $where .= " AND sensetive_expert_professional='".$request->input('sensetive_expert_professional')."'";
        }

        if ($request->input('sensetive_expert_gumcare')){
            $where .= " AND sensetive_expert_gumcare='".$request->input('sensetive_expert_gumcare')."'";
        }

        if ($request->input('sensetive_expert_fresh')){
            $where .= " AND sensetive_expert_fresh='".$request->input('sensetive_expert_fresh')."'";
        }

        if ($request->input('pepsodant')){
            $where .= " AND pepsodant='".$request->input('pepsodant')."'";
        }

        if ($request->input('mediplus')){
            $where .= " AND mediplus='".$request->input('mediplus')."'";
        }

        
        $table = 
            "(
                SELECT audits.*, stores.store_code, stores.store_name, stores.mobilenumber, stores.plot_no, zones.name as zone, territorries.name territorry, towns.name as town from audits INNER JOIN stores on audits.store_id = stores.id INNER JOIN zones ON stores.zone_id=zones.id INNER JOIN territorries ON stores.territorry_id = territorries.id INNER JOIN towns on stores.town_id = towns.id ".$where." order by audits.id desc
            ) testtable";


        $primaryKey = 'id';

        // dd($table);

        $columns = array(

            array( 'db' => 'id',  'dt' => 'id' ),

            array( 'db' => 'date', 'dt' => 'date' ),

            array( 'db' => 'store_code', 'dt' => 'store_code' ),

            array( 'db' => 'town',  'dt' => 'town' ),

            array( 'db' => 'store_name',  'dt' => 'store_name' ),

            array( 'db' => 'mobilenumber',  'dt' => 'mobilenumber' ),
            
            array( 'db' => 'plot_no',  'dt' => 'plot_no' ),

            
            array( 'db' => 'oral_care',  'dt' => 'oral_care' ),

            array( 'db' => 'within_coverage',  'dt' => 'within_coverage' ),

            array( 'db' => 'oral_care_availability',  'dt' => 'oral_care_availability' ),

            array( 'db' => 'sensetive_expert_professional',  'dt' => 'sensetive_expert_professional' ),

            array( 'db' => 'sensetive_expert_gumcare',  'dt' => 'sensetive_expert_gumcare' ),

            array( 'db' => 'sensetive_expert_fresh',  'dt' => 'sensetive_expert_fresh' ),

            array( 'db' => 'pepsodant',  'dt' => 'pepsodant' ),

            array( 'db' => 'mediplus',  'dt' => 'mediplus' ),

            array( 'db' => 'zone',  'dt' => 'zone' ),

            array( 'db' => 'territorry',  'dt' => 'territorry' ),

            array( 'db' => 'photo_link',  'dt' => 'photo_link' ),

            array( 'db' => 'gps_coordinates',  'dt' => 'gps_coordinates' ),

            array( 'db' => 'created_at',  'dt' => 'timestamp' ),
            
            array(

                'db'        => 'created_at',

                'dt'        => 'created_at',

                'formatter' => function( $d, $row ) {

                    return date( 'jS M y', strtotime($d));

                }
            )
        );
        if($_SERVER['HTTP_HOST']=='localhost'){
            $sql_details = array(

                'user' => 'root',

                'pass' => '123456',

                'db'   => 'unilever',

                'host' => 'localhost'

            );
        }
        else{
            $sql_details = array(

                'user' => 'dcptrack_unileve',

                'pass' => 'r5hEYz!rDVOH',

                'db'   => 'dcptrack_unilever',

                'host' => 'dcptracker.com'

            );
        }
        

        // require( 'public/Jquerydatatables/ssp.class.php' );
        require( 'app/ssp.class.php' );
        // echo json_encode(
        // dd($type);
        $result =  SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns);

        $start=$_REQUEST['start']+1;

        $idx=0;

        foreach($result['data'] as &$res){
            $res[0]=(string)$start;

            $start++;

            $idx++;

            if($res['oral_care']==1){
                $res['oral_care'] = "Yes";
            }
            else{
                $res['oral_care'] = "No";
            }
            if($res['within_coverage']==1){
                $res['within_coverage'] = "Yes";
            }
            else{
                $res['within_coverage'] = "No";
            }
            if($res['oral_care_availability']==1){
                $res['oral_care_availability'] = "Yes";
            }
            else{
                $res['oral_care_availability'] = "No";
            }
            if($res['sensetive_expert_professional']==1){
                $res['sensetive_expert_professional'] = "Yes";
            }
            else{
                $res['sensetive_expert_professional'] = "No";
            }
            if($res['sensetive_expert_gumcare']==1){
                $res['sensetive_expert_gumcare'] = "Yes";
            }
            else{
                $res['sensetive_expert_gumcare'] = "No";
            }
            if($res['sensetive_expert_fresh']==1){
                $res['sensetive_expert_fresh'] = "Yes";
            }
            else{
                $res['sensetive_expert_fresh'] = "No";
            }
            if($res['pepsodant']==1){
                $res['pepsodant'] = "Yes";
            }
            else{
                $res['pepsodant'] = "No";
            }
            if($res['mediplus']==1){
                $res['mediplus'] = "Yes";
            }
            else{
                $res['mediplus'] = "No";
            }

            // $res['post_content']=html_entity_decode($res['post_content']);

        }

        echo json_encode($result);

    }


    public function logout(){
        Session::flush();
        // Log out
        Auth::logout();
        return redirect()->intended('login');
    }


    public function userAdd(Request $request){
        $zones = Zone::all();
        $territorries = Territorry::all();
        return view('useradd')->with('zones',$zones)->with('territorries',$territorries);
    }

    public function userList(Request $request){
        return view('userlist');
    }

    public function userEdit($id){
        $user = User::where('id',$id)->first();
        $territorries = Territorry::all();
        $zones = Zone::all();
        return view('useredit')->with('zones',$zones)->with('territorries',$territorries)->with('user',$user);
    }

    public function userSave(Request $request){
        if($request->password!=$request->confirm_password){
            return Redirect::back()->withInput()->with('password_mismatch', "Passwords do not match");
        }
        $checkUser = User::where('name',$request->name)->get();
        if(count($checkUser)>0){
            return Redirect::back()->withInput()->with('password_mismatch', "Username already exists.");
        }
        
        if($request->file('photo_link')){
            $imageurl = uniqid().'.jpg';
            $destinationPath = "public/uploads/";
            $file = $request->file('photo_link');
            // $request->file('photo_link')->move($destinationPath,$imageurl);
            Image::make($file)->resize('640','480')->save($destinationPath.$imageurl);
        }
        $user = new User();
        $user->name = $request->name;
        if($request->file('photo_link')){
            $user->image = $destinationPath.$imageurl;
        }
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->password_real = $request->password;
        $user->type = $request->type;
        if($request->type==2){
            $user->zone_id = "0";
            $user->territorry_id = $request->territorry_id;
        }
        else if ($request->type==4){
            $user->zone_id = $request->zone_id;
            $user->territorry_id = "0";
        }
        else{
            $user->zone_id = "0";
            $user->territorry_id = "0";
        }
        $user->save();
        return redirect('admin/user/index');
    }

    public function updateuser(Request $request){
        $checkUser = User::where('name',$request->name)->where('id','!=',$request->id)->get();
        if(count($checkUser)>0){
            return Redirect::back()->withInput()->with('password_mismatch', "Username already exists.");
        }
        $user = User::find($request->id);

        if($request->file('photo_link')){
            $imageurl = uniqid().'.jpg';
            $destinationPath = "public/uploads/";
            $file = $request->file('photo_link');
            // $request->file('photo_link')->move($destinationPath,$imageurl);
            Image::make($file)->resize('640','480')->save($destinationPath.$imageurl);
        }
        $user->name = $request->name;
        if($request->file('photo_link')){
            $user->image = $destinationPath.$imageurl;
        }
        $user->email = $request->email;
        // $user->password = Hash::make($request->password);
        $user->type = $request->type;
        if($request->type==2){
            $user->zone_id = "0";
            $user->territorry_id = $request->territorry_id;
        }
        else if ($request->type==4){
            $user->zone_id = $request->zone_id;
            $user->territorry_id = "0";
        }
        else{
            $user->zone_id = "0";
            $user->territorry_id = "0";
        }
        $user->save();
        return redirect('admin/user/index');
    }

    public function getUsers(){
        
        $table = "users";

        $table = "(select users.id as id,users.name as name,users.email as email, users.type as type, territorries.name as territorry_name, zones.name as zone_name from users LEFT JOIN territorries ON users.territorry_id = territorries.id LEFT JOIN zones ON users.zone_id = zones.id) testtable";



        $primaryKey = 'id';

        // $table = "(".$query.") testtable";

        $primaryKey = 'id';
        $columns = array(
            array( 'db' => 'id',  'dt' => 'id' ),
            array( 'db' => 'name', 'dt' => 'name' ),
            array( 'db' => 'email', 'dt' => 'email' ),
            array( 'db' => 'type', 'dt' => 'type' ),
            array( 'db' => 'zone_name', 'dt' => 'zone_name' ),
            array( 'db' => 'territorry_name', 'dt' => 'territorry_name' )
        );
        // $sql_details = array(
        //     'user' => env('DB_USERNAME'),
        //     'pass' => env('DB_PASSWORD'),
        //     'db'   => env('DB_DATABASE'),
        //     'host' => env('DB_HOST')
        // );
        if($_SERVER['HTTP_HOST']=='localhost'){
            $sql_details = array(

                'user' => 'root',

                'pass' => '123456',

                'db'   => 'unilever',

                'host' => 'localhost'

            );
        }
        else{
            $sql_details = array(

                'user' => 'dcptrack_unileve',

                'pass' => 'r5hEYz!rDVOH',

                'db'   => 'dcptrack_unilever',

                'host' => 'dcptracker.com'

            );
        }
        require(app_path() . '/ssp.class.php');
        $result =  SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns);

        $result =  SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns);
        
        

        // );

        $start=$_REQUEST['start']+1;

        $idx=0;

        foreach($result['data'] as &$res){

            $res[0]=(string)$start;

            $start++;

            $idx++;

            // $res['post_content']=html_entity_decode($res['post_content']);

        }
        echo json_encode($result);


    }

    public function userDelete($id){
        $user = User::where('id',$id)->delete();
    }


    public function getTerritorries(Request $request){
        if($request->input('id')){
            $territorries = Territorry::where('zone_id',$request->input('id'))->get();
        }
        else{
            $territorries = Territorry::all();
        }
        return response()->json($territorries);
    }

    public function getTowns(Request $request){
        if($request->input('id')){
            // $towns = Town::with(['terrtowns' => function ($query) {
   //           $query->whereRaw('territorry_id=1');
            // }]);
            $towns = Town::whereHas('zonetowns', function ($query) use ($request){
                $query->where('zone_id', '=', $request->input('id'));
            })->get();

        }
        else{
            $towns = Town::all();
        }
        return response()->json($towns);
    }


    public function updatestore(Request $request){
        
        if($request->file('photo_link')){
            $imageurl = uniqid().'.jpg';
            $destinationPath = "https://dcptracker.com/uniliver_laravel/public/uploads/store_image/";
            $file = $request->file('photo_link');
            // $request->file('photo_link')->move($destinationPath,$imageurl);
            Image::make($file)->resize('800','600')->save($destinationPath.$imageurl);
        }
       
        $store = Store::find($request->input('id'));
        $store->date = $request->input('date');
        $store->zone_id = $request->input('dcp_zone');
        $store->territorry_id = $request->input('dcp_territory');
        $store->town_id = $request->input('town_id');
        $store->store_code = $request->input('store_code');
        $store->store_name = $request->input('store_name');
        $store->plot_no = $request->input('plot_no');
        // $store->floor_no = $request->input('floor_no');
        // $store->road_no = $request->input('road_no');
        // $store->block_no = $request->input('block_no');
        // $store->police_station = $request->input('police_station');
        // $store->postoffice = $request->input('postoffice');
        // $store->zip_code = $request->input('zip_code');
        $store->mobilenumber = $request->input('mobilenumber');
        // $store->district = $request->input('district');
        // $store->division = $request->input('division');
        $store->bdo_name = $request->input('bdo_name');
        $store->bds_name = $request->input('bds_name');
        if($request->file('photo_link')){
            $store->photo_link = $destinationPath.$imageurl;
        }
        $store->save();
        return redirect($request->segment(1).'/store');
    }


    public function updateaudit(Request $request){
        if($request->file('photo_link')){
            $imageurl = uniqid().'.jpg';
            $destinationPath = "public/uploads/audit_image/";
            $file = $request->file('photo_link');
            // $request->file('photo_link')->move($destinationPath,$imageurl);
            Image::make($file)->resize('800','600')->save($destinationPath.$imageurl);
        }
        
        $audit = Audit::find($request->input('id'));
        $audit->date = $request->input('date');
        $audit->store_id = $request->input('store_id');
        $audit->oral_care = $request->input('oral_care');
        $audit->within_coverage = $request->input('within_coverage');
        $audit->oral_care_availability = $request->input('oral_care_availability');
        $audit->remarks_coverage_gap = $request->input('remarks_coverage_gap');
        $audit->remarks_availability_gap = $request->input('remarks_availability_gap');
        $audit->sensetive_expert_professional = $request->input('sensetive_expert_professional');
        $audit->sensetive_expert_gumcare = $request->input('sensetive_expert_gumcare');
        $audit->sensetive_expert_fresh = $request->input('sensetive_expert_fresh');
        $audit->pepsodant = $request->input('pepsodant');
        $audit->mediplus = $request->input('mediplus');
        $audit->dentosafe = $request->input('dentosafe');
        $audit->sensodyne = $request->input('sensodyne');
        $audit->biodent = $request->input('biodent');
        $audit->apsol_oral_paste = $request->input('apsol_oral_paste');
        $audit->twin_lotus = $request->input('twin_lotus');
        $audit->medicatent = $request->input('medicatent');
        $audit->sensive_plus = $request->input('sensive_plus');
        $audit->other = $request->input('other');
        $audit->remarks = $request->input('remarks');
        if($request->file('photo_link')){
            $audit->photo_link = $destinationPath.$imageurl;
        }
        $audit->save();
        return redirect($request->segment(1).'/audit');
    }

    public function updatedailyvisit(Request $request){
        
        if($request->file('photo_link')){
            $imageurl = uniqid().'.jpg';
            $destinationPath = "public/uploads/store_image/";
            $file = $request->file('photo_link');
            // $request->file('photo_link')->move($destinationPath,$imageurl);
            Image::make($file)->resize('800','600')->save($destinationPath.$imageurl);
        }

        $dailyvisit = Dailyvisit::find($request->input('id'));
        $dailyvisit->email = $request->input('email');
        $dailyvisit->date = $request->input('date');
        $dailyvisit->visit_status = $request->input('visit_status');
        $dailyvisit->bdo_id = $request->input('bdo_id');
        $dailyvisit->visit_type = $request->input('visit_type');
        $dailyvisit->visit_cycle = $request->input('visit_cycle');
        $dailyvisit->sample = $request->input('sample');
        $dailyvisit->special_comp = $request->input('special_comp');
        $dailyvisit->sample_quantity = $request->input('sample_quantity');
        $dailyvisit->dentist_name = $request->input('dentist_name');
        

        $dailyvisit->number_prescription = $request->input('number_prescription');
        $dailyvisit->product_benifit = $request->input('product_benifit');
        $dailyvisit->presentation = $request->input('presentation');
        $dailyvisit->question = $request->input('question');
        $dailyvisit->zone_id = $request->input('dcp_zone');
        $dailyvisit->territorry_id = $request->input('dcp_territory');
        if($request->file('photo_link')){
            $dailyvisit->photo_link = $destinationPath.$imageurl;
        }
        // dd($dailyvisit);
        $dailyvisit->save();
        return redirect($request->segment(1).'/dailyvisit');
    }

    public function deleteaudit($id){
        $audit = Audit::where('id',$id)->delete();
    }

    public function deletestore($id){
        $store = Store::where('id',$id)->delete();
    }

    public function deleteoptions($id){
        $option = Option::where('id',$id)->delete();
    }


    public function optionsadd(){
        $zones = Zone::all();
        $grades = Option::where('type',"Dentist's Grade (Daily Visit)")->get();
        return view('optionsadd')->with('zones',$zones)->with('grades',$grades);
    }


    public function updateoption(Request $request){
        $option = Option::find($request->input('id'));
        $option->name = $request->input('name');
        
        $option->save();
        return redirect('admin/options');
    }


    public function saveoptions(Request $request){
        if($request->input('type')=="Dentist Add (Daily Visit)"){
            $doctor = new Doctor();
            $doctor->zone_id = $request->input('dcp_zone');
            $doctor->territorry_id = $request->input('dcp_territory');
            $doctor->name = $request->input('name');
            $doctor->dentist_grade = $request->input('dentist_grade');
            $doctor->chamber = $request->input('chamber');
            $doctor->chamber_address = $request->input('chamber_address');
            $doctor->save();
            return redirect('admin/doctors');
        }
        else{
            $count = Option::where('type',$request->input('type'))->count()+1;
            $option = new Option();
            $option->name = $request->input('name');
            $option->type = $request->input('type');
            $option->value = $count;
            $option->save();
            return redirect('admin/options');
        }
    }

    public function options(){
        return view('options');
    }

    public function doctors(){
        return view('doctors');
    }


    public function getDoctors(Request $request){

        // $where = " WHERE 1=1 AND options.type='Dentist\'s Grade (Daily Visit)'";
        // if ($request->input('type')){
        //     $where .= " AND type=\"".$request->input('type')."\"";
        // }

        $table = 
            "(
                SELECT doctors.*, users.phone_number as phone_number from doctors inner join users on doctors.user_id = users.id order by doctors.id desc
            ) testtable";

        // dd($table);
        $primaryKey = 'id';



        $columns = array(

            array( 'db' => 'id',  'dt' => 'id' ),

            array( 'db' => 'doctor_name', 'dt' => 'doctor_name' ),

            array( 'db' => 'designation', 'dt' => 'designation' ),

            array( 'db' => 'department', 'dt' => 'department' ),

            array( 'db' => 'specialization', 'dt' => 'specialization' ),

            array( 'db' => 'bmdc_number', 'dt' => 'bmdc_number' ),

            array( 'db' => 'chamber_name', 'dt' => 'chamber_name' ),

            array( 'db' => 'chamber_address', 'dt' => 'chamber_address' ),

            array( 'db' => 'education', 'dt' => 'education' ),

            array( 'db' => 'phone_number', 'dt' => 'phone_number' ),

            array( 'db' => 'online_consultation', 'dt' => 'online_consultation' ),

            array( 'db' => 'imagelink', 'dt' => 'imagelink' ),

            array( 'db' => 'online_consultation', 'dt' => 'online_consultation' ),

            array(

                'db'        => 'created_at',

                'dt'        => 'created_at',

                'formatter' => function( $d, $row ) {

                    return date( 'jS M y', strtotime($d));

                }
            )
        );
        if($_SERVER['HTTP_HOST']=='localhost'){
            $sql_details = array(

                'user' => 'root',

                'pass' => '',

                'db'   => 'ubl',

                'host' => 'localhost'

            );
        }
        else{
            $sql_details = array(

                'user' => 'dcptrack_unileve',

                'pass' => 'r5hEYz!rDVOH',

                'db'   => 'dcptrack_unilever',

                'host' => 'dcptracker.com'

            );
        }
        

        // require( 'public/Jquerydatatables/ssp.class.php' );
        require( 'app/ssp.class.php' );
        // echo json_encode(
        // dd($type);
        $result =  SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns);

        $start=$_REQUEST['start']+1;

        $idx=0;

        foreach($result['data'] as &$res){

            $res[0]=(string)$start;

            $start++;

            $idx++;

            // $res['post_content']=html_entity_decode($res['post_content']);

        }

        echo json_encode($result);

    }

    public function getOptions(Request $request){

        $where = " WHERE 1=1";
        if ($request->input('type')){
            $where .= " AND type=\"".$request->input('type')."\"";
        }

        $table = 
            "(
                SELECT *FROM options ".$where." order by options.id desc
            ) testtable";

        // dd($table);
        $primaryKey = 'id';



        $columns = array(

            array( 'db' => 'id',  'dt' => 'id' ),

            array( 'db' => 'name', 'dt' => 'name' ),

            array( 'db' => 'type', 'dt' => 'type' ),

            array(

                'db'        => 'created_at',

                'dt'        => 'created_at',

                'formatter' => function( $d, $row ) {

                    return date( 'jS M y', strtotime($d));

                }
            )
        );
        if($_SERVER['HTTP_HOST']=='localhost'){
            $sql_details = array(

                'user' => 'root',

                'pass' => '123456',

                'db'   => 'unilever',

                'host' => 'localhost'

            );
        }
        else{
            $sql_details = array(

                'user' => 'dcptrack_unileve',

                'pass' => 'r5hEYz!rDVOH',

                'db'   => 'dcptrack_unilever',

                'host' => 'dcptracker.com'

            );
        }
        

        // require( 'public/Jquerydatatables/ssp.class.php' );
        require( 'app/ssp.class.php' );
        // echo json_encode(
        // dd($type);
        $result =  SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns);

        $start=$_REQUEST['start']+1;

        $idx=0;

        foreach($result['data'] as &$res){

            $res[0]=(string)$start;

            $start++;

            $idx++;

            // $res['post_content']=html_entity_decode($res['post_content']);

        }

        echo json_encode($result);

    }


    public function optionsedit($id){
        $option = Option::where('id',$id)->first();
        return view('optionsedit')->with('option',$option);
    }

    public function doctoradd(Request $request){
        $departments = [1,2,3,4,5,6];
        return view('doctoradd')->with('departments',$departments);
    }

    public function saveDoctor(Request $request){
        // dd($request->input());
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone_number = $request->input('phone_number');
        $user->password = Hash::make($request->input('password'));
        $user->save();


        if($request->file()){
            $file = $request->file('photo_link');
            $file->move('../ubl_laravel/public/images/doctor/',$file->getClientOriginalName());
            $imageUrl = "../ubl_laravel/public/images/doctor/".$file->getClientOriginalName();
            $data['imagelink'] = $imageUrl;
        }

        $doctor = new Doctor();
        $doctor->user_id = $user->id;
        $doctor->doctor_name = $request->input('doctor_name');
        $doctor->designation = $request->input('designation');
        $doctor->department = $request->input('department');
        $doctor->specialization = $request->input('specialization');
        $doctor->bmdc_number = $request->input('bmdc_number');
        $doctor->chamber_name = $request->input('chamber_name');
        $doctor->chamber_address = $request->input('chamber_address');
        $doctor->education = $request->input('education');
        $doctor->location = $request->input('location');
        $doctor->imagelink = $imageUrl;
        $doctor->online_consultation = $request->input('online_consultation');
        $doctor->save();
        return redirect('admin/doctor/index');
    }

    public function doctorsedit($id){
        $doctor = Doctor::where('id',$id)->first();
        $user = User::where('id',$doctor['user_id'])->first();
        // dd($doctor);
        return view('doctorsedit')->with('doctor',$doctor)->with('user',$user);
    }
    

    public function updatedoctor(Request $request){
        $data = $request->input();
        $phone_number = $data['phone_number'];
        unset($data['_token']);
        unset($data['phone_number']);
        

        if($request->file()){
            $file = $request->file('photo_link');
            $file->move('../ubl_laravel/public/images/doctor/',$file->getClientOriginalName());
            $imageUrl = "http://localhost/ubl_laravel/public/images/doctor/".$file->getClientOriginalName();
            $data['imagelink'] = $imageUrl;
        }
        DB::table('doctors')
            ->where('id', $data['id'])
            ->update($data);
        $doctor = Doctor::where('id',$data['id'])->first();
        DB::table('users')
            ->where('id', $doctor['user_id'])
            ->update(['phone_number'=>$phone_number]);
        
        return redirect('admin/doctor/index');
    }


    public function deletedoctors($id){
        $doctor = Doctor::where('id',$id)->delete();
    }

    public function deletedailyvisit($id){
        $dailyvisit = Dailyvisit::where('id',$id)->delete();
    }
    

    public function dailyvisitdashboard(){
        $month = date('m');
        $year = date('Y');
        $query = "SELECT DAY(created_at) as day, COUNT(id) as daily_number FROM dailyvisits WHERE MONTH(created_at) = MONTH(CURRENT_DATE()) AND YEAR(created_at) = YEAR(CURRENT_DATE()) GROUP BY DAY(created_at)";
        $dailyvisits = DB::select($query);
        $i = 0;
        $days = "[";
        $number_per_day = "[";
        $max_visit = 0;
        foreach ($dailyvisits as $dailyvisit) {
            if($i>0){
                $days .= ", "; 
                $number_per_day .= ", "; 
            }
            $days .= $dailyvisit->day;
            $number_per_day .= $dailyvisit->daily_number;
            if($dailyvisit->daily_number>$max_visit){
                $max_visit = $dailyvisit->daily_number;
            }
            $i++;
        }
        $days .= "]";
        $number_per_day .= "]";
        $max_visit = $max_visit+10;

        $query = "SELECT COUNT(dailyvisits.id) as zone_number,zones.name as zone FROM dailyvisits INNER JOIN zones ON dailyvisits.zone_id=zones.id WHERE MONTH(dailyvisits.created_at) = MONTH(CURRENT_DATE()) AND YEAR(dailyvisits.created_at) = YEAR(CURRENT_DATE()) GROUP BY zone_id";
        $zoneVisits = DB::select($query);
        $i = 0;
        $zones = "[";
        $number_per_zone = "[";
        $max_zone = 0;
        foreach ($zoneVisits as $zoneVisit) {
            if($i>0){
                $zones .= ", "; 
                $number_per_zone .= ", "; 
            }
            $zones .= "'".$zoneVisit->zone."'";
            $number_per_zone .= $zoneVisit->zone_number;
            if($zoneVisit->zone_number>$max_zone){
                $max_zone = $zoneVisit->zone_number;
            }
            $i++;
        }
        $zones .= "]";
        $number_per_zone .= "]";
        $max_zone = $max_zone + 10;


        $chamberCount = Dailyvisit::where('visit_status',25)->whereMonth('created_at', '=', $month)->whereYear('created_at', '=', $year)->count();
        $instituteCount = Dailyvisit::where('visit_status',26)->whereMonth('created_at', '=', $month)->whereYear('created_at', '=', $year)->count();
        $options = Option::all()->keyBy('id');

        $cycle1Count = Dailyvisit::where('visit_cycle',31)->whereMonth('created_at', '=', $month)->whereYear('created_at', '=', $year)->count();


        $Agrade =DB::table('dailyvisits')
                ->join('doctors', 'dailyvisits.dentist_name', '=', 'doctors.id')
                ->where('doctors.dentist_grade',16)->whereMonth('dailyvisits.created_at', '=', $month)->whereYear('dailyvisits.created_at', '=', $year)
                ->count();

        $Bgrade =DB::table('dailyvisits')
                ->join('doctors', 'dailyvisits.dentist_name', '=', 'doctors.id')
                ->where('doctors.dentist_grade',17)->whereMonth('dailyvisits.created_at', '=', $month)->whereYear('dailyvisits.created_at', '=', $year)
                ->count();
        

        $query = "SELECT sum(case when oral_care = '1' then 1 else 0 end) AS num_yes,sum(case when oral_care = '2' then 1 else 0 end) AS num_no
        FROM audits WHERE MONTH(audits.created_at) = MONTH(CURRENT_DATE()) AND YEAR(audits.created_at) = YEAR(CURRENT_DATE())";
        $oral_care = DB::select($query);
        $oralCareLabel = "['Yes', 'No']";
        $oralCareData = "[".$oral_care[0]->num_yes." ,".$oral_care[0]->num_no."]";

        $query = "SELECT sum(case when within_coverage = '1' then 1 else 0 end) AS num_yes,sum(case when within_coverage = '2' then 1 else 0 end) AS num_no
        FROM audits WHERE MONTH(audits.created_at) = MONTH(CURRENT_DATE()) AND YEAR(audits.created_at) = YEAR(CURRENT_DATE())";
        $within_coverage = DB::select($query);
        $withinCoverageLabel = "['Yes', 'No']";
        $withinCoverageData = "[".$within_coverage[0]->num_yes." ,".$within_coverage[0]->num_no."]";

        $query = "SELECT sum(case when oral_care_availability = '1' then 1 else 0 end) AS num_yes,sum(case when oral_care_availability = '2' then 1 else 0 end) AS num_no
        FROM audits WHERE MONTH(audits.created_at) = MONTH(CURRENT_DATE()) AND YEAR(audits.created_at) = YEAR(CURRENT_DATE())";
        $oral_care_availability = DB::select($query);
        $availabilityLabel = "['Yes', 'No']";
        $availabilityData = "[".$oral_care_availability[0]->num_yes." ,".$oral_care_availability[0]->num_no."]";


        $sampleCount = Dailyvisit::whereMonth('created_at', '=', $month)->whereYear('created_at', '=', $year)->sum('sample_quantity');
        return view('dailyvisitdashboard')->with('days',$days)->with('number_per_day',$number_per_day)->with('max_visit',$max_visit)
                                          ->with('zones',$zones)->with('number_per_zone',$number_per_zone)->with('max_zone',$max_zone)
                                          ->with('chamberCount',$chamberCount)->with('instituteCount',$instituteCount)->with('options',$options)->with('cycle1Count',$cycle1Count)
                                          ->with('Agrade',$Agrade)->with('Bgrade',$Bgrade)
                                          ->with('oralCareLabel',$oralCareLabel)->with('oralCareData',$oralCareData)
                                          ->with('withinCoverageLabel',$withinCoverageLabel)->with('withinCoverageData',$withinCoverageData)
                                          ->with('availabilityLabel',$availabilityLabel)->with('availabilityData',$availabilityData)
                                          ->with('sampleCount',$sampleCount);
    }


    public function storedashboard(){

        $query = "SELECT sum(case when oral_care = '1' then 1 else 0 end) AS num_yes,sum(case when oral_care = '0' then 1 else 0 end) AS num_no
        FROM audits WHERE MONTH(audits.created_at) = MONTH(CURRENT_DATE()) AND YEAR(audits.created_at) = YEAR(CURRENT_DATE())";
        $oral_care = DB::select($query);
        $oralCareLabel = "['Yes', 'No']";
        $oralCareData = "[".$oral_care[0]->num_yes." ,".$oral_care[0]->num_no."]";

        $query = "SELECT sum(case when within_coverage = '1' then 1 else 0 end) AS num_yes,sum(case when within_coverage = '0' then 1 else 0 end) AS num_no
        FROM audits WHERE MONTH(audits.created_at) = MONTH(CURRENT_DATE()) AND YEAR(audits.created_at) = YEAR(CURRENT_DATE())";
        $within_coverage = DB::select($query);
        $withinCoverageLabel = "['Yes', 'No']";
        $withinCoverageData = "[".$within_coverage[0]->num_yes." ,".$within_coverage[0]->num_no."]";
        
        $query = "SELECT sum(case when oral_care_availability = '1' then 1 else 0 end) AS num_yes,sum(case when oral_care_availability = '0' then 1 else 0 end) AS num_no
        FROM audits WHERE MONTH(audits.created_at) = MONTH(CURRENT_DATE()) AND YEAR(audits.created_at) = YEAR(CURRENT_DATE())";
        $oral_care_availability = DB::select($query);
        $availabilityLabel = "['Yes', 'No']";
        $availabilityData = "[".$oral_care_availability[0]->num_yes." ,".$oral_care_availability[0]->num_no."]";

        return view('storedashboard')->with('oralCareLabel',$oralCareLabel)->with('oralCareData',$oralCareData)
                                          ->with('withinCoverageLabel',$withinCoverageLabel)->with('withinCoverageData',$withinCoverageData)
                                          ->with('availabilityLabel',$availabilityLabel)->with('availabilityData',$availabilityData);
    }
}
