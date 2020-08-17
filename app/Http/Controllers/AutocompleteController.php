<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Datatables;
use App\Country;
use App\Addedcountry;
use DB;
class AutocompleteController extends Controller
{
    public function index()
    {
        return view('Task.index');
    }

    public function catchdata(Request $request)
    {
        if ($request->get('query')) {
            $query = $request->get('query');

            $data = DB::table('countries')
        ->where('country_name', 'LIKE', "%{$query}%")
        ->get();

            $result = '<ul class="dropdown-menu" style="display:block; position:relative">';

            foreach ($data as $key_row) {
                $result .= '<li><a href="#">'.$key_row->country_name.'</a></li>'.'<i>&nbsp;</i>'.'<input type="submit" name="submit" id="action" value="Add to table" class="btn btn-info btn-sm" />';
            }
            $result .= '</ul>';
            echo $result;
        }
    }
    public function fetch_data(Request $request)
    {
        if($request->ajax())
        {
            $data = DB::table('addedcountries')->orderBy('id','desc')->get();
            echo json_encode($data);
        }
    }
    public function add_data(Request $request)
    {
        if($request->ajax())
        {
            $data = array(
                'added_country_name' =>  $request->added_country_name
            );
            $id = DB::table('addedcountries')->insert($data);
            if($id > 0)
            {
                echo '<div class="alert alert-success">Data Inserted</div>';
            }
        } 
    }

    
}
