<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Home;
use App\Models\Companies;
use App\Models\Products;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function postIndex(Request $request){

        DB::beginTransaction();
        
        try{
            $company = $request->input('company_id');
            $keyword = $request->input('keyword');
            $model = new Home();
            $companies = $model->getCompanies();
            $query = Companies::query();
            $query = $model->getList($query);
            
            if(!empty($company)) {
                $query->where('company_id', 'LIKE', $company);
            }
            if(!empty($keyword)) {
                $query->where('product_name', 'LIKE', "%{$keyword}%");
            }
            $items = $query->get();
            DB::commit();    
        } catch(\Exception $e){
            DB::rollback();
            return back();
        }
        
        return view('home', compact('items', 'keyword', 'company','companies'));
    }

    public function delete($id){

        DB::beginTransaction();
        
        try{
            $delTable = Products::find($id);
            $delTable->delete();
            DB::commit();    
        } catch(\Exception $e){
            DB::rollback();
            return back();
        }
        return redirect('home');
    }
}
