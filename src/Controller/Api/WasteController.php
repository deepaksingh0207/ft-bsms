<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\WasteRequest;

use HTML,Form,Validator,Mail,Response,Session,Auth,DB,Redirect,Image,Password,Cookie,File,View,Hash,JsValidator,Notification,Storage,Schema,Helper;
use Excel,Config,FileUpload;

use App\Models\Waste;
use App\Models\User;
use App\Models\States;
use App\Models\Documnets;

class WasteController extends Controller
{
    /**========================================== Recycling aste ============================================ */
    public function index()
    {
//        $url = $request()->path();
        Session::put('current_menu', "waste");
        Session::put('tab_menu', "recycling-waste");
//        Session::put('url', $url);
        $data = [];

        return view('admin.waste.recycling.index', $data);
    }
    public function getAllWaste()
    {
//        $url = $request()->path();
        Session::put('current_menu', "waste");
        Session::put('tab_menu', "all-waste");
//        Session::put('url', $url);
        $data = [];

        return view('admin.waste.index', $data);
    }
    
    public function getGeneralWaste()
    {

        Session::put('current_menu', "waste");
        Session::put('tab_menu', "general-waste");
        $data = [];

        return view('admin.waste.general.general-waste', $data);
    }
    
    public function getTimberWaste()
    {

        Session::put('current_menu', "waste");
        Session::put('tab_menu', "general-waste");
        $data = [];

        return view('admin.waste.timber.timber-waste', $data);
    }
    
    public function getHazardousWaste()
    {

        Session::put('current_menu', "waste");
        Session::put('tab_menu', "general-waste");
        $data = [];

        return view('admin.waste.hazardous.hazardous-waste', $data);
    }

    public function actionAllWasteAjaxData(Request $req){
        $all_arr = [];
           
        $data['draw'] = $_POST['draw'];
        $page1 = $_POST['start'];

        $records = Waste::where([ ['waste.id', '!=', '0'],])->with(['getSite', 'getDivision']);
        if(isset($_POST['waste_type'])){
            $waste_type = $_POST['waste_type'];
             $records = Waste::where([ ['waste.id', '!=', '0'], ['waste.waste_type', '=', $waste_type],])->with(['getSite', 'getDivision']);
       
        }
        
        //get total record
        $data['recordsFiltered'] = $data['recordsTotal'] = $records->count();

        /*==search section ===*/
        if($_POST['search']['value'] != "" ){
            $records = $records->where(function($query){
				$query->orWhere('consumption', 'LIKE', "%".$_POST['search']['value']."%");
			});
            $data['recordsFiltered'] = $records->count();
        }
        /*== end of search section ===*/
        // dd($_POST["form"][0]["value"]);
		
        //search from the form data
		if(!empty($_POST["form"])){
			if(isset($_POST["form"][0]) && $_POST["form"][0]["name"] == "month" && !empty($_POST["form"][0]["value"]) ){
                $records = $records->where(function($query){
					$query->where('month',$_POST["form"][0]["value"]);
				});
            }
            if(isset($_POST["form"][1]) && $_POST["form"][1]["name"] == "year" && !empty($_POST["form"][1]["value"]) ){
				$records = $records->where(function($query){
					$query->where('year',$_POST["form"][1]["value"]);
				});
            }
            if(isset($_POST["form"][2]) && $_POST["form"][2]["name"] == "search_division_id" && !empty($_POST["form"][2]["value"]) ){
                $records = $records->where(function($query){
					$query->where('division_id',$_POST["form"][2]["value"]);
				});
            }
            if(isset($_POST["form"][3]) && $_POST["form"][3]["name"] == "search_site_id" && !empty($_POST["form"][3]["value"]) ){
				$records = $records->where(function($query){
					$query->where('site_id',$_POST["form"][3]["value"]);
				});
            }
			$data['recordsFiltered'] = $records->count();
		}
        
        $data['recordsFiltered'] = $data['recordsTotal'] = $records->count();
        
        /*== Order By ===*/
        $sort_column = $_POST['columns'][$_POST['order'][0]['column']]['data'];
        $sort = "ASC";
        if($_POST['order'][0]['dir'] == 'desc'){
            $sort = "DESC";
        }
        
        if($sort_column == 'division_id'){
            $sort_column = "division_id";
        } else if($sort_column == 'site_id'){
            $sort_column = "site_id";
        } else if($sort_column == 'consumption'){
            $sort_column = "consumption";
        } else if($sort_column == 'price'){
            $sort_column = "price";
        } else if($sort_column == 'carbon_emission'){
            $sort_column = "carbon_emission";
        } else if($sort_column == 'no_of_bin'){
            $sort_column = "bins";
        } else if($sort_column == 'bin_size'){
            $sort_column = "bin_size_id";
        } else if($sort_column == 'frequency'){
            $sort_column = "frequency_id";
        } else if($sort_column == 'rowcount' || $sort_column == 'action' ){
            $sort_column = "id";
        }
        else if($sort_column == 'first_name'){
            $sort_column = "first_name";
        }
        else{
            $sort_column = "id";
        }
        
        /*== End Order By ===*/
        if($_POST["length"] == "-1" ){
            $_POST["length"] = $records->count();
        }
        

        $records = $records->skip($page1)->take($_POST["length"])->orderBy($sort_column , $sort)->get();
        //dd($records);exit;
        $countrow = $page1 + 1;

        
        /*== assigne value to row ===*/
        foreach($records as $key => $record){
            $all_arr[$key]['rowcount'] = $countrow++;
            $all_arr[$key]['division_id'] = ($record->getDivision()->exists())?$record->getDivision->name:null;
            $all_arr[$key]['site_id'] = ($record->getSite()->exists())?$record->getSite->name:null;
            $all_arr[$key]['consumption'] = $record->consumption . ((!empty($record->unit))?" (<b>" . $record->unit . "</b>)":null);
            $all_arr[$key]['price'] = ((isset($record->price) && !empty($record->price))?"$".number_format((float)$record->price, 2, '.', ','):null);
            $all_arr[$key]['carbon_emission'] = $record->carbon_emission;
            $all_arr[$key]['month_year'] = Helper::getMonths()[$record->month] . "-" . $record->year;
            $all_arr[$key]['document'] = ($record->getDocuments()->exists())?"Yes":"No";
            
//            $all_arr[$key]['waste_type'] = ($record->getWasteType()->exists())?$record->getWasteType->name:null;
            $all_arr[$key]['waste_type'] = ($record->getWasteType()->exists())?ucfirst($record->getWasteType->name):null;
            $all_arr[$key]['no_of_bin'] = $record->bins;
            $all_arr[$key]['bin_size'] = ($record->getBinSize()->exists())?$record->getBinSize->name:null;
            $all_arr[$key]['frequency'] = ($record->getFrequency()->exists())?$record->getFrequency->name:null;
            
            $all_arr[$key]['created_at'] = (isset($record) && !empty($record->created_at))?date("Y/M/d", strtotime($record->created_at)):null;

            $action = '
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle btn-xs ladda-button record_action_'.$record->id.'" type="button" id="record_action_'.$record->id.'" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-style="expand-left"><span class="ladda-label">Action<span class="caret"></span></span></button>
                        <ul class="dropdown-menu animated zoomIn pull-right" role="menu" aria-labelledby="record_action_'.$record->id.'">
            ';
            $action .= '<li><a href="javascript:void(0);" class="edit-recycling-waste" data-id="'.$record->id.'"><i class="fa fa-edit"></i> Edit</a></li>';
            $action .= '<li><a href="javascript:void(0);" class="remove-recycling-waste" data-id="'.$record->id.'"><i class="fa fa-trash"></i> Remove</a></li>';
            
            $action .= '</ul></div>';
            
            $all_arr[$key]['action'] = $action;
        }
        

        $data['data'] = $all_arr;
        return Response::json($data);
    }

    public function actionRecyclingWasteAjaxData(Request $req){
        $all_arr = [];
//        dd($req);
       
        $data['draw'] = $_POST['draw'];
        $page1 = $_POST['start'];

        $records = Waste::where([ ['waste.id', '!=', '0'], ['waste.waste_type', '=', '1'],])->with(['getSite', 'getDivision']);

        
        //get total record
        $data['recordsFiltered'] = $data['recordsTotal'] = $records->count();

        /*==search section ===*/
        if($_POST['search']['value'] != "" ){
            $records = $records->where(function($query){
				$query->orWhere('consumption', 'LIKE', "%".$_POST['search']['value']."%")
                ->orWhere('month', 'LIKE', "%".$_POST['search']['value']."%")
                ->orWhere('carbon_emission', 'LIKE', "%".$_POST['search']['value']."%")
                ->orWhere('year', 'LIKE', "%".$_POST['search']['value']."%");
			});
            $data['recordsFiltered'] = $records->count();
        }
        /*== end of search section ===*/
		
        //search from the form data
		if(!empty($_POST["form"])){
			if(isset($_POST["form"][0]) && $_POST["form"][0]["name"] == "month" && !empty($_POST["form"][0]["value"]) ){
                $records = $records->where(function($query){
					$query->where('month',$_POST["form"][0]["value"]);
				});
            }
            if(isset($_POST["form"][1]) && $_POST["form"][1]["name"] == "year" && !empty($_POST["form"][1]["value"]) ){
				$records = $records->where(function($query){
					$query->where('year',$_POST["form"][1]["value"]);
				});
            }
            if(isset($_POST["form"][2]) && $_POST["form"][2]["name"] == "search_division_id" && !empty($_POST["form"][2]["value"]) ){
                $records = $records->where(function($query){
					$query->where('division_id',$_POST["form"][2]["value"]);
				});
            }
            if(isset($_POST["form"][3]) && $_POST["form"][3]["name"] == "search_site_id" && !empty($_POST["form"][3]["value"]) ){
				$records = $records->where(function($query){
					$query->where('site_id',$_POST["form"][3]["value"]);
				});
            }
			$data['recordsFiltered'] = $records->count();
		}
        
        $data['recordsFiltered'] = $data['recordsTotal'] = $records->count();
        
        /*== Order By ===*/
        $sort_column = $_POST['columns'][$_POST['order'][0]['column']]['data'];
        $sort = "ASC";
        if($_POST['order'][0]['dir'] == 'desc'){
            $sort = "DESC";
        }
        
        if($sort_column == 'division_id'){
            $sort_column = "division_id";
        } else if($sort_column == 'site_id'){
            $sort_column = "site_id";
        } else if($sort_column == 'consumption'){
            $sort_column = "consumption";
        } else if($sort_column == 'price'){
            $sort_column = "price";
        } else if($sort_column == 'carbon_emission'){
            $sort_column = "carbon_emission";
        } else if($sort_column == 'no_of_bin'){
            $sort_column = "bins";
        } else if($sort_column == 'bin_size'){
            $sort_column = "bin_size_id";
        } else if($sort_column == 'frequency'){
            $sort_column = "frequency_id";
        } else if($sort_column == 'rowcount' || $sort_column == 'action' ){
            $sort_column = "id";
        }
        else if($sort_column == 'first_name'){
            $sort_column = "first_name";
        }
        else{
            $sort_column = "id";
        }
        
        /*== End Order By ===*/
        if($_POST["length"] == "-1" ){
            $_POST["length"] = $records->count();
        }
        

        $records = $records->skip($page1)->take($_POST["length"])->orderBy($sort_column , $sort)->get();
        //dd($records);exit;
        $countrow = $page1 + 1;

        
        /*== assigne value to row ===*/
        foreach($records as $key => $record){
            $all_arr[$key]['rowcount'] = $countrow++;
            $all_arr[$key]['division_id'] = ($record->getDivision()->exists())?$record->getDivision->name:null;
            $all_arr[$key]['site_id'] = ($record->getSite()->exists())?$record->getSite->name:null;
            $all_arr[$key]['consumption'] = $record->consumption . ((!empty($record->unit))?" (<b>" . $record->unit . "</b>)":null);
            $all_arr[$key]['price'] = ((isset($record->price) && !empty($record->price))?"$".number_format((float)$record->price, 2, '.', ','):null);
            $all_arr[$key]['carbon_emission'] = $record->carbon_emission;
            $all_arr[$key]['month_year'] = Helper::getMonths()[$record->month] . "-" . $record->year;
            $all_arr[$key]['document'] = ($record->getDocuments()->exists())?"Yes":"No";
            
            $all_arr[$key]['no_of_bin'] = $record->bins;
            $all_arr[$key]['bin_size'] = ($record->getBinSize()->exists())?$record->getBinSize->name:null;
            $all_arr[$key]['frequency'] = ($record->getFrequency()->exists())?$record->getFrequency->name:null;
            
            $all_arr[$key]['created_at'] = (isset($record) && !empty($record->created_at))?date("Y/M/d", strtotime($record->created_at)):null;

            $action = '
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle btn-xs ladda-button record_action_'.$record->id.'" type="button" id="record_action_'.$record->id.'" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-style="expand-left"><span class="ladda-label">Action<span class="caret"></span></span></button>
                        <ul class="dropdown-menu animated zoomIn pull-right" role="menu" aria-labelledby="record_action_'.$record->id.'">
            ';
            $action .= '<li><a href="javascript:void(0);" class="edit-recycling-waste" data-id="'.$record->id.'"><i class="fa fa-edit"></i> Edit</a></li>';
            $action .= '<li><a href="javascript:void(0);" class="remove-recycling-waste" data-id="'.$record->id.'"><i class="fa fa-trash"></i> Remove</a></li>';
            
            $action .= '</ul></div>';
            
            $all_arr[$key]['action'] = $action;
        }
        

        $data['data'] = $all_arr;
        return Response::json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function actionAddRecyclingWaste(Request $request)
    {
        $data = [];
        $data['title'] = "Create New Record";

        Session::put('current_menu', "waste");
                
        $data['state_types'] = ["Mills" => "Mills", "Trade Centres and RDC" => "Trade Centres and RDC"];
        $data['state_ids'] = ["" => "--Select--"];
        
        
        if(!empty($request->id) && $request->ajax()){
            $data['record'] = $record = Waste::find($request->id);
            
            
            if(!empty($record)){
                $data['title'] = "Edit Record";
            
                $req = new WasteRequest();

                $validator = JsValidator::make( array_merge([ 'consumption' => 'required', 'price' => 'required', 'carbon_emission' => 'required' ], $req->rules()) , $req->messages() ,[],'#edit-recycling-waste-form');
                $viewPage = View::make('admin.waste.recycling.edit-recycling', $data)->render();
                
                return Response::json([
                    'html' => $viewPage,'success'=> true, "validator_id" => $validator->selector, "validator_rules" => json_encode($validator->rules)
                ]);
            }
        }
        
        //return view('admin.waste.recycling.add-recycling', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function actionSaveRecyclingWaste(WasteRequest $request){
        $data = $response = [];
        if ($request->isMethod('post') && $request->ajax()){
            try{
                $validator = Validator::make($request->all(), $request->rules(), $request->messages());
                #check validation
                if ($validator->fails()){
                    return response()->json(['fail' => true,'errors' => $validator->errors()]);
                }
                else{
                    
                    //for update
                    if(!empty($request->input('id')) && $request->input('id') != NULL){
                        DB::beginTransaction();

                        try{
                            //Update
                            $model = Waste::find($request->id);
                            $request->merge([  "updated_at" => date("Y-m-d H:i:s")]);
                            if($model->update($request->all())){

                                //Insert document
                                if($request->hasFile("document")) {
                                    $files = array();
                                    
                                    foreach ($_FILES["document"] as $k => $l) {
                                        foreach ($l as $i => $v) {
                                            if (!array_key_exists($i, $files))
                                            $files[$i] = array();
                                            $files[$i][$k] = $v;
                                        }
                                    }
                                    
                                    foreach ($files as $file) {
                                        $handle = new FileUpload($file);
                                        if ($handle->uploaded) {
                                            $image_name                 = $handle->file_src_name_body."_".strtotime("now");
                                            $file_name_body             = str_replace(".", "", $image_name);
                                            $handle->file_new_name_body = $file_name_body;
                                            $handle->allowed            = ['application/*', 'image/*'];
                                            $destination                = storage_path('app/public/waste_doc');
                                            $handle->process($destination);
                                            $filename                 = $handle->file_dst_name;
                                            
                                            if ($handle->processed) {
                                                Documnets::create(['document' => $filename, 'types' => 'waste', 'type_id' => $model->id]);
                                            } 
                                            
                                        }
                                    }
                                }
                            }

                            DB::commit();

                            $response['success'] = true;
                            $response['success_message'] = "Record has been update successfully.";
                            Session::flash('success_msg', 'Record has been update successfully.');
                            $response['url'] = \URL::to("/admin/waste");
                            

                            
                            return response()->json($response);
                        }
                        catch(\Exception $e){
                            DB::rollback();
                            
                            return response()->json([
                                'error' => true,
                                'error_message' => "There is something wrong. Please contact administrator.".$e->getMessage()."===".$e->getLine(),
                            ]);
                        }
                    }
                    
                }
            }
            catch(\Exception $e){
                return response()->json([
                    'error' => true,
                    'error_message' => "There is something wrong. Please contact administrator.".$e->getMessage()."===".$e->getLine(),
                ]);
            }
        }
        return response()->json($response);
    }


    /**========================================== General waste ============================================ */
    public function actionGeneralWaste()
    {
        Session::put('current_menu', "waste");
        Session::put('tab_menu', "general-waste");
        $data = [];

        return view('admin.waste.general.general-waste', $data);
    }
    
    public function actionGeneralWasteAjaxData(Request $req){
        $all_arr = [];

        $data['draw'] = $_POST['draw'];
        $page1 = $_POST['start'];

        $records = Waste::where([ ['waste.id', '!=', '0'], ['waste.waste_type', '=', '2'],])->with(['getSite', 'getDivision']);

        
        //get total record
        $data['recordsFiltered'] = $data['recordsTotal'] = $records->count();

        /*==search section ===*/
        if($_POST['search']['value'] != "" ){
            $records = $records->where(function($query){
				$query->orWhere('consumption', 'LIKE', "%".$_POST['search']['value']."%");
			});
            $data['recordsFiltered'] = $records->count();
        }
        /*== end of search section ===*/
		
        //search from the form data
		if(!empty($_POST["form"])){
			if(isset($_POST["form"][0]) && $_POST["form"][0]["name"] == "month" && !empty($_POST["form"][0]["value"]) ){
                $records = $records->where(function($query){
					$query->where('month',$_POST["form"][0]["value"]);
				});
            }
            if(isset($_POST["form"][1]) && $_POST["form"][1]["name"] == "year" && !empty($_POST["form"][1]["value"]) ){
				$records = $records->where(function($query){
					$query->where('year',$_POST["form"][1]["value"]);
				});
            }
            if(isset($_POST["form"][2]) && $_POST["form"][2]["name"] == "search_division_id" && !empty($_POST["form"][2]["value"]) ){
                $records = $records->where(function($query){
					$query->where('division_id',$_POST["form"][2]["value"]);
				});
            }
            if(isset($_POST["form"][3]) && $_POST["form"][3]["name"] == "search_site_id" && !empty($_POST["form"][3]["value"]) ){
				$records = $records->where(function($query){
					$query->where('site_id',$_POST["form"][3]["value"]);
				});
            }
			$data['recordsFiltered'] = $records->count();
		}
        
        $data['recordsFiltered'] = $data['recordsTotal'] = $records->count();
        
        /*== Order By ===*/
        $sort_column = $_POST['columns'][$_POST['order'][0]['column']]['data'];
        $sort = "ASC";
        if($_POST['order'][0]['dir'] == 'desc'){
            $sort = "DESC";
        }
        
        if($sort_column == 'division_id'){
            $sort_column = "division_id";
        } else if($sort_column == 'site_id'){
            $sort_column = "site_id";
        } else if($sort_column == 'consumption'){
            $sort_column = "consumption";
        } else if($sort_column == 'price'){
            $sort_column = "price";
        } else if($sort_column == 'carbon_emission'){
            $sort_column = "carbon_emission";
        } else if($sort_column == 'no_of_bin'){
            $sort_column = "bins";
        } else if($sort_column == 'bin_size'){
            $sort_column = "bin_size_id";
        } else if($sort_column == 'frequency'){
            $sort_column = "frequency_id";
        } else if($sort_column == 'rowcount' || $sort_column == 'action' ){
            $sort_column = "id";
        }
        else if($sort_column == 'first_name'){
            $sort_column = "first_name";
        }
        else{
            $sort_column = "id";
        }
        
        /*== End Order By ===*/
        if($_POST["length"] == "-1" ){
            $_POST["length"] = $records->count();
        }
        

        $records = $records->skip($page1)->take($_POST["length"])->orderBy($sort_column , $sort)->get();
        //dd($records);exit;
        $countrow = $page1 + 1;

        
        /*== assigne value to row ===*/
        foreach($records as $key => $record){
            $all_arr[$key]['rowcount'] = $countrow++;
            $all_arr[$key]['division_id'] = ($record->getDivision()->exists())?$record->getDivision->name:null;
            $all_arr[$key]['site_id'] = ($record->getSite()->exists())?$record->getSite->name:null;
            $all_arr[$key]['consumption'] = $record->consumption . ((!empty($record->unit))?" (<b>" . $record->unit . "</b>)":null);
            $all_arr[$key]['price'] = ((isset($record->price) && !empty($record->price))?"$".number_format((float)$record->price, 2, '.', ','):null);
            $all_arr[$key]['carbon_emission'] = $record->carbon_emission;
            $all_arr[$key]['month_year'] = Helper::getMonths()[$record->month] . "-" . $record->year;
            $all_arr[$key]['document'] = ($record->getDocuments()->exists())?"Yes":"No";
            $all_arr[$key]['no_of_bin'] = $record->bins;
            $all_arr[$key]['bin_size'] = ($record->getBinSize()->exists())?$record->getBinSize->name:null;
            $all_arr[$key]['frequency'] = ($record->getFrequency()->exists())?$record->getFrequency->name:null;
            

            $all_arr[$key]['created_at'] = (isset($record) && !empty($record->created_at))?date("Y/M/d", strtotime($record->created_at)):null;

            $action = '
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle btn-xs ladda-button record_action_'.$record->id.'" type="button" id="record_action_'.$record->id.'" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-style="expand-left"><span class="ladda-label">Action<span class="caret"></span></span></button>
                        <ul class="dropdown-menu animated zoomIn pull-right" role="menu" aria-labelledby="record_action_'.$record->id.'">
            ';
            $action .= '<li><a href="javascript:void(0);" class="edit-general-waste" data-id="'.$record->id.'"><i class="fa fa-edit"></i> Edit</a></li>';
            $action .= '<li><a href="javascript:void(0);" class="remove-general-waste" data-id="'.$record->id.'"><i class="fa fa-trash"></i> Remove</a></li>';
            
            $action .= '</ul></div>';
            
            $all_arr[$key]['action'] = $action;
        }
        

        $data['data'] = $all_arr;
        return Response::json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function actionAddGeneralWaste(Request $request)
    {
        $data = [];
        $data['title'] = "Create New Record";

        Session::put('current_menu', "waste");
                
        $data['state_types'] = ["Mills" => "Mills", "Trade Centres and RDC" => "Trade Centres and RDC"];
        $data['state_ids'] = ["" => "--Select--"];
        
        
        if(!empty($request->id) && $request->ajax()){
            $data['record'] = $record = Waste::find($request->id);
            
            
            if(!empty($record)){
                $data['title'] = "Edit Record";
            
                $req = new WasteRequest();

                $validator = JsValidator::make( array_merge([ 'consumption' => 'required', 'price' => 'required', 'carbon_emission' => 'required' ], $req->rules()) , $req->messages() ,[],'#edit-general-waste-form');
                $viewPage = View::make('admin.waste.general.edit-general', $data)->render();
                
                return Response::json([
                    'html' => $viewPage,'success'=> true, "validator_id" => $validator->selector, "validator_rules" => json_encode($validator->rules)
                ]);
            }
        }
        
        //return view('admin.waste.general.add-general', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function actionSaveGeneralWaste(WasteRequest $request){
        $data = $response = [];
        if ($request->isMethod('post') && $request->ajax()){
            try{
                $validator = Validator::make($request->all(), $request->rules(), $request->messages());
                #check validation
                if ($validator->fails()){
                    return response()->json(['fail' => true,'errors' => $validator->errors()]);
                }
                else{
                    
                    //for update
                    if(!empty($request->input('id')) && $request->input('id') != NULL){
                        DB::beginTransaction();

                        try{
                            //Update
                            $model = Waste::find($request->id);
                            $request->merge([  "updated_at" => date("Y-m-d H:i:s")]);
                            if($model->update($request->all())){

                                //Insert document
                                if($request->hasFile("document")) {
                                    $files = array();
                                    
                                    foreach ($_FILES["document"] as $k => $l) {
                                        foreach ($l as $i => $v) {
                                            if (!array_key_exists($i, $files))
                                            $files[$i] = array();
                                            $files[$i][$k] = $v;
                                        }
                                    }
                                    
                                    foreach ($files as $file) {
                                        $handle = new FileUpload($file);
                                        if ($handle->uploaded) {
                                            $image_name                 = $handle->file_src_name_body."_".strtotime("now");
                                            $file_name_body             = str_replace(".", "", $image_name);
                                            $handle->file_new_name_body = $file_name_body;
                                            $handle->allowed            = ['application/*', 'image/*'];
                                            $destination                = storage_path('app/public/waste_doc');
                                            $handle->process($destination);
                                            $filename                 = $handle->file_dst_name;
                                            
                                            if ($handle->processed) {
                                                Documnets::create(['document' => $filename, 'types' => 'waste', 'type_id' => $model->id]);
                                            } 
                                            
                                        }
                                    }
                                }
                            }

                            DB::commit();

                            $response['success'] = true;
                            $response['success_message'] = "Record has been update successfully.";
                            Session::flash('success_msg', 'Record has been update successfully.');
                            $response['url'] = \URL::to("/admin/general-waste");
                            

                            
                            return response()->json($response);
                        }
                        catch(\Exception $e){
                            DB::rollback();
                            
                            return response()->json([
                                'error' => true,
                                'error_message' => "There is something wrong. Please contact administrator.".$e->getMessage()."===".$e->getLine(),
                            ]);
                        }
                    }
                    
                }
            }
            catch(\Exception $e){
                return response()->json([
                    'error' => true,
                    'error_message' => "There is something wrong. Please contact administrator.".$e->getMessage()."===".$e->getLine(),
                ]);
            }
        }
        return response()->json($response);
    }


    /**========================================== Timber waste ============================================ */
    public function actionTimberWaste()
    {
        Session::put('current_menu', "waste");
        Session::put('tab_menu', "timber-waste");
        $data = [];

        return view('admin.waste.timber.timber-waste', $data);
    }

    public function actionTimberWasteAjaxData(Request $req){
        $all_arr = [];

        $data['draw'] = $_POST['draw'];
        $page1 = $_POST['start'];

        $records = Waste::where([ ['waste.id', '!=', '0'], ['waste.waste_type', '=', '3'],])->with(['getSite', 'getDivision']);

        
        //get total record
        $data['recordsFiltered'] = $data['recordsTotal'] = $records->count();

        /*==search section ===*/
        if($_POST['search']['value'] != "" ){
            $records = $records->where(function($query){
				$query->orWhere('consumption', 'LIKE', "%".$_POST['search']['value']."%");
			});
            $data['recordsFiltered'] = $records->count();
        }
        /*== end of search section ===*/
		
        //search from the form data
		if(!empty($_POST["form"])){
			if(isset($_POST["form"][0]) && $_POST["form"][0]["name"] == "month" && !empty($_POST["form"][0]["value"]) ){
                $records = $records->where(function($query){
					$query->where('month',$_POST["form"][0]["value"]);
				});
            }
            if(isset($_POST["form"][1]) && $_POST["form"][1]["name"] == "year" && !empty($_POST["form"][1]["value"]) ){
				$records = $records->where(function($query){
					$query->where('year',$_POST["form"][1]["value"]);
				});
            }
            if(isset($_POST["form"][2]) && $_POST["form"][2]["name"] == "search_division_id" && !empty($_POST["form"][2]["value"]) ){
                $records = $records->where(function($query){
					$query->where('division_id',$_POST["form"][2]["value"]);
				});
            }
            if(isset($_POST["form"][3]) && $_POST["form"][3]["name"] == "search_site_id" && !empty($_POST["form"][3]["value"]) ){
				$records = $records->where(function($query){
					$query->where('site_id',$_POST["form"][3]["value"]);
				});
            }
			$data['recordsFiltered'] = $records->count();
		}
        
        $data['recordsFiltered'] = $data['recordsTotal'] = $records->count();
        
        /*== Order By ===*/
        $sort_column = $_POST['columns'][$_POST['order'][0]['column']]['data'];
        $sort = "ASC";
        if($_POST['order'][0]['dir'] == 'desc'){
            $sort = "DESC";
        }
        
        if($sort_column == 'division_id'){
            $sort_column = "division_id";
        } else if($sort_column == 'site_id'){
            $sort_column = "site_id";
        } else if($sort_column == 'consumption'){
            $sort_column = "consumption";
        } else if($sort_column == 'price'){
            $sort_column = "price";
        } else if($sort_column == 'carbon_emission'){
            $sort_column = "carbon_emission";
        } else if($sort_column == 'no_of_bin'){
            $sort_column = "bins";
        } else if($sort_column == 'bin_size'){
            $sort_column = "bin_size_id";
        } else if($sort_column == 'frequency'){
            $sort_column = "frequency_id";
        } else if($sort_column == 'rowcount' || $sort_column == 'action' ){
            $sort_column = "id";
        }
        else if($sort_column == 'first_name'){
            $sort_column = "first_name";
        }
        else{
            $sort_column = "id";
        }
        
        /*== End Order By ===*/
        if($_POST["length"] == "-1" ){
            $_POST["length"] = $records->count();
        }
        

        $records = $records->skip($page1)->take($_POST["length"])->orderBy($sort_column , $sort)->get();
        //dd($records);exit;
        $countrow = $page1 + 1;

        
        /*== assigne value to row ===*/
        foreach($records as $key => $record){
            $all_arr[$key]['rowcount'] = $countrow++;
            $all_arr[$key]['division_id'] = ($record->getDivision()->exists())?$record->getDivision->name:null;
            $all_arr[$key]['site_id'] = ($record->getSite()->exists())?$record->getSite->name:null;
            $all_arr[$key]['consumption'] = $record->consumption . ((!empty($record->unit))?" (<b>" . $record->unit . "</b>)":null);
            $all_arr[$key]['price'] = ((isset($record->price) && !empty($record->price))?"$".number_format((float)$record->price, 2, '.', ','):null);
            $all_arr[$key]['carbon_emission'] = $record->carbon_emission;
            $all_arr[$key]['month_year'] = Helper::getMonths()[$record->month] . "-" . $record->year;
            $all_arr[$key]['document'] = ($record->getDocuments()->exists())?"Yes":"No";
            $all_arr[$key]['no_of_bin'] = $record->bins;
            $all_arr[$key]['bin_size'] = ($record->getBinSize()->exists())?$record->getBinSize->name:null;
            $all_arr[$key]['frequency'] = ($record->getFrequency()->exists())?$record->getFrequency->name:null;
            $all_arr[$key]['created_at'] = (isset($record) && !empty($record->created_at))?date("Y/M/d", strtotime($record->created_at)):null;
            
            $action = '
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle btn-xs ladda-button record_action_'.$record->id.'" type="button" id="record_action_'.$record->id.'" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-style="expand-left"><span class="ladda-label">Action<span class="caret"></span></span></button>
                        <ul class="dropdown-menu animated zoomIn pull-right" role="menu" aria-labelledby="record_action_'.$record->id.'">
            ';
            $action .= '<li><a href="javascript:void(0);" class="edit-timber-waste" data-id="'.$record->id.'"><i class="fa fa-edit"></i> Edit</a></li>';
            $action .= '<li><a href="javascript:void(0);" class="remove-timber-waste" data-id="'.$record->id.'"><i class="fa fa-trash"></i> Remove</a></li>';
            
            $action .= '</ul></div>';
            
            $all_arr[$key]['action'] = $action;

        }
        

        $data['data'] = $all_arr;
        return Response::json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function actionAddTimberWaste(Request $request)
    {
        $data = [];
        $data['title'] = "Create New Record";

        Session::put('current_menu', "waste");
                
        $data['state_types'] = ["Mills" => "Mills", "Trade Centres and RDC" => "Trade Centres and RDC"];
        $data['state_ids'] = ["" => "--Select--"];
        
        
        if(!empty($request->id) && $request->ajax()){
            $data['record'] = $record = Waste::find($request->id);
            
            
            if(!empty($record)){
                $data['title'] = "Edit Record";
            
                $req = new WasteRequest();

                $validator = JsValidator::make( array_merge([ 'consumption' => 'required', 'price' => 'required', 'carbon_emission' => 'required' ], $req->rules()) , $req->messages() ,[],'#edit-timber-waste-form');
                $viewPage = View::make('admin.waste.timber.edit-timber', $data)->render();
                
                return Response::json([
                    'html' => $viewPage,'success'=> true, "validator_id" => $validator->selector, "validator_rules" => json_encode($validator->rules)
                ]);
            }
        }
        
        //return view('admin.waste.timber.add-timber', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function actionSaveTimberWaste(WasteRequest $request){
        $data = $response = [];
        if ($request->isMethod('post') && $request->ajax()){
            try{
                $validator = Validator::make($request->all(), $request->rules(), $request->messages());
                #check validation
                if ($validator->fails()){
                    return response()->json(['fail' => true,'errors' => $validator->errors()]);
                }
                else{
                    
                    //for update
                    if(!empty($request->input('id')) && $request->input('id') != NULL){
                        DB::beginTransaction();

                        try{
                            //Update
                            $model = Waste::find($request->id);
                            $request->merge([  "updated_at" => date("Y-m-d H:i:s")]);
                            if($model->update($request->all())){

                                //Insert document
                                if($request->hasFile("document")) {
                                    $files = array();
                                    
                                    foreach ($_FILES["document"] as $k => $l) {
                                        foreach ($l as $i => $v) {
                                            if (!array_key_exists($i, $files))
                                            $files[$i] = array();
                                            $files[$i][$k] = $v;
                                        }
                                    }
                                    
                                    foreach ($files as $file) {
                                        $handle = new FileUpload($file);
                                        if ($handle->uploaded) {
                                            $image_name                 = $handle->file_src_name_body."_".strtotime("now");
                                            $file_name_body             = str_replace(".", "", $image_name);
                                            $handle->file_new_name_body = $file_name_body;
                                            $handle->allowed            = ['application/*', 'image/*'];
                                            $destination                = storage_path('app/public/waste_doc');
                                            $handle->process($destination);
                                            $filename                 = $handle->file_dst_name;
                                            
                                            if ($handle->processed) {
                                                Documnets::create(['document' => $filename, 'types' => 'waste', 'type_id' => $model->id]);
                                            } 
                                            
                                        }
                                    }
                                }
                            }

                            DB::commit();

                            $response['success'] = true;
                            $response['success_message'] = "Record has been update successfully.";
                            Session::flash('success_msg', 'Record has been update successfully.');
                            $response['url'] = \URL::to("/admin/timber-waste");
                            

                            
                            return response()->json($response);
                        }
                        catch(\Exception $e){
                            DB::rollback();
                            
                            return response()->json([
                                'error' => true,
                                'error_message' => "There is something wrong. Please contact administrator.".$e->getMessage()."===".$e->getLine(),
                            ]);
                        }
                    }
                }
            }
            catch(\Exception $e){
                return response()->json([
                    'error' => true,
                    'error_message' => "There is something wrong. Please contact administrator.".$e->getMessage()."===".$e->getLine(),
                ]);
            }
        }
        return response()->json($response);
    }

    /**========================================== Hazardous waste ============================================ */
    public function actionHazardousWaste()
    {
        Session::put('current_menu', "waste");
        Session::put('tab_menu', "hazardous-waste");
        $data = [];

        return view('admin.waste.hazardous.hazardous-waste', $data);
    }

    public function actionHazardousWasteAjaxData(Request $req){
        $all_arr = [];

        $data['draw'] = $_POST['draw'];
        $page1 = $_POST['start'];

        $records = Waste::where([ ['waste.id', '!=', '0'], ['waste.waste_type', '=', '4'],])->with(['getSite', 'getDivision']);

        
        //get total record
        $data['recordsFiltered'] = $data['recordsTotal'] = $records->count();

        /*==search section ===*/
        if($_POST['search']['value'] != "" ){
            $records = $records->where(function($query){
				$query->orWhere('consumption', 'LIKE', "%".$_POST['search']['value']."%");
			});
            $data['recordsFiltered'] = $records->count();
        }
        /*== end of search section ===*/
		
        //search from the form data
		if(!empty($_POST["form"])){
			if(isset($_POST["form"][0]) && $_POST["form"][0]["name"] == "month" && !empty($_POST["form"][0]["value"]) ){
                $records = $records->where(function($query){
					$query->where('month',$_POST["form"][0]["value"]);
				});
            }
            if(isset($_POST["form"][1]) && $_POST["form"][1]["name"] == "year" && !empty($_POST["form"][1]["value"]) ){
				$records = $records->where(function($query){
					$query->where('year',$_POST["form"][1]["value"]);
				});
            }
            if(isset($_POST["form"][2]) && $_POST["form"][2]["name"] == "search_division_id" && !empty($_POST["form"][2]["value"]) ){
                $records = $records->where(function($query){
					$query->where('division_id',$_POST["form"][2]["value"]);
				});
            }
            if(isset($_POST["form"][3]) && $_POST["form"][3]["name"] == "search_site_id" && !empty($_POST["form"][3]["value"]) ){
				$records = $records->where(function($query){
					$query->where('site_id',$_POST["form"][3]["value"]);
				});
            }
			$data['recordsFiltered'] = $records->count();
		}
        
        $data['recordsFiltered'] = $data['recordsTotal'] = $records->count();
        
        /*== Order By ===*/
        $sort_column = $_POST['columns'][$_POST['order'][0]['column']]['data'];
        $sort = "ASC";
        if($_POST['order'][0]['dir'] == 'desc'){
            $sort = "DESC";
        }
        
        if($sort_column == 'division_id'){
            $sort_column = "division_id";
        } else if($sort_column == 'site_id'){
            $sort_column = "site_id";
        } else if($sort_column == 'consumption'){
            $sort_column = "consumption";
        } else if($sort_column == 'price'){
            $sort_column = "price";
        } else if($sort_column == 'carbon_emission'){
            $sort_column = "carbon_emission";
        } else if($sort_column == 'no_of_bin'){
            $sort_column = "bins";
        } else if($sort_column == 'bin_size'){
            $sort_column = "bin_size_id";
        } else if($sort_column == 'frequency'){
            $sort_column = "frequency_id";
        } else if($sort_column == 'rowcount' || $sort_column == 'action' ){
            $sort_column = "id";
        }
        else if($sort_column == 'first_name'){
            $sort_column = "first_name";
        }
        else{
            $sort_column = "id";
        }
        
        /*== End Order By ===*/
        if($_POST["length"] == "-1" ){
            $_POST["length"] = $records->count();
        }
        

        $records = $records->skip($page1)->take($_POST["length"])->orderBy($sort_column , $sort)->get();
        //dd($records);exit;
        $countrow = $page1 + 1;

        
        /*== assigne value to row ===*/
        foreach($records as $key => $record){
            $all_arr[$key]['rowcount'] = $countrow++;
            $all_arr[$key]['division_id'] = ($record->getDivision()->exists())?$record->getDivision->name:null;
            $all_arr[$key]['site_id'] = ($record->getSite()->exists())?$record->getSite->name:null;
            $all_arr[$key]['waste_company'] = $record->waste_company;
            $all_arr[$key]['consumption'] = $record->consumption . ((!empty($record->unit))?" (<b>" . $record->unit . "</b>)":null);
            $all_arr[$key]['price'] = ((isset($record->price) && !empty($record->price))?"$".number_format((float)$record->price, 2, '.', ','):null);
            $all_arr[$key]['carbon_emission'] = $record->carbon_emission;
            $all_arr[$key]['month_year'] = Helper::getMonths()[$record->month] . "-" . $record->year;
            $all_arr[$key]['document'] = ($record->getDocuments()->exists())?"Yes":"No";            
            $all_arr[$key]['no_of_bin'] = $record->bins;
            $all_arr[$key]['bin_size'] = ($record->getBinSize()->exists())?$record->getBinSize->name:null;
            $all_arr[$key]['frequency'] = ($record->getFrequency()->exists())?$record->getFrequency->name:null;
            $all_arr[$key]['created_at'] = (isset($record) && !empty($record->created_at))?date("Y/M/d", strtotime($record->created_at)):null;

            $action = '
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle btn-xs ladda-button record_action_'.$record->id.'" type="button" id="record_action_'.$record->id.'" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-style="expand-left"><span class="ladda-label">Action<span class="caret"></span></span></button>
                        <ul class="dropdown-menu animated zoomIn pull-right" role="menu" aria-labelledby="record_action_'.$record->id.'">
            ';
            $action .= '<li><a href="javascript:void(0);" class="edit-hazardous-waste" data-id="'.$record->id.'"><i class="fa fa-edit"></i> Edit</a></li>';
            $action .= '<li><a href="javascript:void(0);" class="remove-hazardous-waste" data-id="'.$record->id.'"><i class="fa fa-trash"></i> Remove</a></li>';
            
            $action .= '</ul></div>';
            
            $all_arr[$key]['action'] = $action;

        }
        

        $data['data'] = $all_arr;
        return Response::json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function actionAddHazardousWaste(Request $request)
    {
        $data = [];
        $data['title'] = "Create New Record";

        Session::put('current_menu', "waste");
                
        $data['state_types'] = ["Mills" => "Mills", "Trade Centres and RDC" => "Trade Centres and RDC"];
        $data['state_ids'] = ["" => "--Select--"];
        
        
        if(!empty($request->id) && $request->ajax()){
            $data['record'] = $record = Waste::find($request->id);
            
            
            if(!empty($record)){
                $data['title'] = "Edit Record";
            
                $req = new WasteRequest();

                $validator = JsValidator::make( array_merge([ 'consumption' => 'required', 'price' => 'required', 'waste_company' => 'required' , 'type' => 'required' , 'carbon_emission' => 'required' ], $req->rules()) , $req->messages() ,[],'#edit-hazardous-waste-form');
                $viewPage = View::make('admin.waste.hazardous.edit-hazardous', $data)->render();
                
                return Response::json([
                    'html' => $viewPage,'success'=> true, "validator_id" => $validator->selector, "validator_rules" => json_encode($validator->rules)
                ]);
            }
        }
        
        //return view('admin.waste.hazardous.add-hazardous', $data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function actionSaveHazardousWaste(WasteRequest $request){
        $data = $response = [];
        if ($request->isMethod('post') && $request->ajax()){
            try{
                $validator = Validator::make($request->all(), $request->rules(), $request->messages());
                #check validation
                if ($validator->fails()){
                    return response()->json(['fail' => true,'errors' => $validator->errors()]);
                }
                else{
                    
                    //for update
                    if(!empty($request->input('id')) && $request->input('id') != NULL){
                        DB::beginTransaction();

                        try{
                            //Update
                            $model = Waste::find($request->id);
                            $request->merge([  "updated_at" => date("Y-m-d H:i:s")]);
                            if($model->update($request->all())){

                                //Insert document
                                if($request->hasFile("document")) {
                                    $files = array();
                                    
                                    foreach ($_FILES["document"] as $k => $l) {
                                        foreach ($l as $i => $v) {
                                            if (!array_key_exists($i, $files))
                                            $files[$i] = array();
                                            $files[$i][$k] = $v;
                                        }
                                    }
                                    
                                    foreach ($files as $file) {
                                        $handle = new FileUpload($file);
                                        if ($handle->uploaded) {
                                            $image_name                 = $handle->file_src_name_body."_".strtotime("now");
                                            $file_name_body             = str_replace(".", "", $image_name);
                                            $handle->file_new_name_body = $file_name_body;
                                            $handle->allowed            = ['application/*', 'image/*'];
                                            $destination                = storage_path('app/public/waste_doc');
                                            $handle->process($destination);
                                            $filename                 = $handle->file_dst_name;
                                            
                                            if ($handle->processed) {
                                                Documnets::create(['document' => $filename, 'types' => 'waste', 'type_id' => $model->id]);
                                            } 
                                            
                                        }
                                    }
                                }
                            }

                            DB::commit();

                            $response['success'] = true;
                            $response['success_message'] = "Record has been update successfully.";
                            Session::flash('success_msg', 'Record has been update successfully.');
                            $response['url'] = \URL::to("/admin/hazardous-waste");
                            

                            
                            return response()->json($response);
                        }
                        catch(\Exception $e){
                            DB::rollback();
                            
                            return response()->json([
                                'error' => true,
                                'error_message' => "There is something wrong. Please contact administrator.".$e->getMessage()."===".$e->getLine(),
                            ]);
                        }
                    }
                }
            }
            catch(\Exception $e){
                return response()->json([
                    'error' => true,
                    'error_message' => "There is something wrong. Please contact administrator.".$e->getMessage()."===".$e->getLine(),
                ]);
            }
        }
        return response()->json($response);
    }

    /*
    * delete waste record /admin/delete-waste
    *Created By:Sibananda
    */
    public function actionDeleteWaste(Request $request){
        $data = $response = [];
        DB::beginTransaction();
        try{
           
            if(!empty($request->ids)){

                //delete documents
                $records = Documnets::whereIn('type_id', $request->ids)->where('types', 'waste')->get();
                $destination = storage_path('app/public/waste_doc');
                
                foreach($records as $record){
                    if(!empty($record) && !empty($record->document) && File::exists($destination.''.$record->document)){
                        $doc = $destination.''.$record->document;
                        unlink($doc);
                    }
                }

                Documnets::whereIn('type_id', $request->ids)->where('types', 'waste')->delete();

                //delete reord
                Waste::whereIn('id', $request->ids)->delete();

                DB::commit();

                $response['success'] = true;
                $response['success_message'] = "Data has been deleted successfully.";
            }
            return response()->json($response);
        }
        catch(\Exception $e){
            DB::rollback();
            return response()->json([
                'error' => true,
                'error_message' => "There is something wrong. Please contact administrator.".$e->getMessage(),
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function actionAddWaste(Request $request)
    {
        $data = [];
        $data['title'] = "Create New Record";

        Session::put('current_menu', "waste");
                
        $data['state_types'] = ["Mills" => "Mills", "Trade Centres and RDC" => "Trade Centres and RDC"];
        $data['state_ids'] = ["" => "--Select--"];
        
        return view('admin.waste.add-waste', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function actionSaveWaste(Request $request){
             
        $data = $response = [];
//        if ($request->isMethod('post') && $request->ajax()){
           if ($request->isMethod('post')) {
            
//            dd($request);  

            try{
              //  dd($request);
//                $validator = Validator::make($request->all(), $request->rules(), $request->messages());
//                  $validator = Validator::make($request->all());
                #check validation
                 
//                if ($validator->fails()){

//                    return response()->json(['fail' => true,'errors' => $validator->errors()]);
//                }else{
                  
                    DB::beginTransaction();
  
                    try{
                        //Insert
                        
                        
                        if(isset($request->EnergyItem['month']) && !empty($request->EnergyItem['month'])){
                            foreach($request->EnergyItem['month'] as $key => $month){
                                
                                $year = (isset($request->EnergyItem['year']) && isset($request->EnergyItem['year'][$key]) && !empty($request->EnergyItem['year'][$key]))?$request->EnergyItem['year'][$key]:null;

                                if(!empty($month) && !empty($year)){

                                    //if(Waste::where([ ['waste_type', '=', "recycling"], ['month', '=', $month], ['year', '=', $year],   ['site_id', '=', $request->site_id] ,  ['division_id', '=', $request->division_id]  ])->count() == 0){}
                                    
                                        $insert_data = [
                                            'bins' => (isset($request->EnergyItem['bins']) && isset($request->EnergyItem['bins'][$key]) && !empty($request->EnergyItem['bins'][$key]))?$request->EnergyItem['bins'][$key]:null,
                                            'bin_size_id' => (isset($request->EnergyItem['bin_size_id']) && isset($request->EnergyItem['bin_size_id'][$key]) && !empty($request->EnergyItem['bin_size_id'][$key]))?$request->EnergyItem['bin_size_id'][$key]:null,
                                            'frequency_id' => (isset($request->EnergyItem['frequency_id']) && isset($request->EnergyItem['frequency_id'][$key]) && !empty($request->EnergyItem['frequency_id'][$key]))?$request->EnergyItem['frequency_id'][$key]:null,
                                            'waste_company_id' => (isset($request->EnergyItem['waste_company_id']) && isset($request->EnergyItem['waste_company_id'][$key]) && !empty($request->EnergyItem['waste_company_id'][$key]))?$request->EnergyItem['waste_company_id'][$key]:null,

                                            
                                            'waste_type'       => (isset($request->EnergyItem['waste_type']) && isset($request->EnergyItem['waste_type'][$key]) && !empty($request->EnergyItem['waste_type'][$key]))?$request->EnergyItem['waste_type'][$key]:null,
                                            
                                            'division_id'          => $request->division_id,
                                            'site_id'             => $request->site_id,
                                            'month'             => $month,
                                            'year'              => $year,
                                            'consumption'       => (isset($request->EnergyItem['consumption']) && isset($request->EnergyItem['consumption'][$key]) && !empty($request->EnergyItem['consumption'][$key]))?$request->EnergyItem['consumption'][$key]:null,
                                            'price'             => (isset($request->EnergyItem['price']) && isset($request->EnergyItem['price'][$key]) && !empty($request->EnergyItem['price'][$key]))?$request->EnergyItem['price'][$key]:null,
                                            'carbon_emission'   => (isset($request->EnergyItem['carbon_emission']) && isset($request->EnergyItem['carbon_emission'][$key]) && !empty($request->EnergyItem['carbon_emission'][$key]))?$request->EnergyItem['carbon_emission'][$key]:null,
                                            'added_by'          => Auth::user()->id,
                                            "created_at"        => date("Y-m-d H:i:s"),
                                            'waste_company'   => (isset($request->EnergyItem['waste_company']) && isset($request->EnergyItem['waste_company'][$key]) && !empty($request->EnergyItem['waste_company'][$key]))?$request->EnergyItem['waste_company'][$key]:null,
                                            'unit'   => (isset($request->EnergyItem['unit']) && isset($request->EnergyItem['unit'][$key]) && !empty($request->EnergyItem['unit'][$key]))?$request->EnergyItem['unit'][$key]:null,

                                        ];

                                        

                                        $model = Waste::create($insert_data);
                                        

                                        //Insert document
                                        
                                        if($request->hasFile("document_$key")) {
                                            $files = array();
                                            
                                            foreach ($_FILES["document_$key"] as $k => $l) {
                                                foreach ($l as $i => $v) {
                                                    if (!array_key_exists($i, $files))
                                                    $files[$i] = array();
                                                    $files[$i][$k] = $v;
                                                }
                                            }
                                            
                                            foreach ($files as $file) {
                                                $handle = new FileUpload($file);
                                                if ($handle->uploaded) {
                                                    $image_name                 = $handle->file_src_name_body."_".strtotime("now");
                                                    $file_name_body             = str_replace(".", "", $image_name);
                                                    $handle->file_new_name_body = $file_name_body;
                                                    $handle->allowed            = ['application/*', 'image/*'];
                                                    $destination                = storage_path('app/public/waste_doc');
                                                    $handle->process($destination);
                                                    $filename                 = $handle->file_dst_name;
                                                    
                                                    if ($handle->processed) {
                                                        Documnets::create(['document' => $filename, 'types' => 'waste', 'type_id' => $model->id]);
                                                    } 
                                                    
                                                }
                                            }
                                        }
                                }

                            }
                        }

                        DB::commit();

                        $response['success'] = true;
                        $response['success_message'] = "Record has been added successfully.";
                        Session::flash('success_msg', 'Record has been added successfully.');
//                        $response['url'] = \URL::to("admin/add-waste");
//                        return response()->json($response);
                        return redirect()->route('add-waste');
                    }
                    catch(\Exception $e){
                        DB::rollback();
                        
                        return response()->json([
                            'error' => true,
                            'error_message' => "There is something wrong. Please contact administrator.".$e->getMessage(),
                        ]);
                    }
                    
//                }
            }
            catch(\Exception $e){
                return response()->json([
                    'error' => true,
                    'error_message' => "There is something wrong. Please contact administrator.".$e->getMessage()."===".$e->getLine(),
                ]);
            }
        }
        return response()->json($response);
    }
}
