<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Home;
use App\Models\Companies;
use App\Models\Products;
use App\Models\Sales;
use Illuminate\Support\Facades\Log;


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
    public function index()
    {
        return view('home');
    }

    public function postIndex(Request $request){

        $company = $request->input('company_id');
        $keyword = $request->input('keyword');

        $query = Companies::query();

        $query->join('products','products.company_id','=','companies.id')
        ->get();

        $model = new Home();
        $companies = $model->getCompanies();

        if(!empty($company)) {
            $query->where('company_id', 'LIKE', $company);
        }

        if(!empty($keyword)) {
            $query->where('product_name', 'LIKE', "%{$keyword}%");
        }

        $items = $query->get();

        return view('home', compact('items', 'keyword', 'company','companies'));

    }

    public function delete($id){

        $delTable = Products::find($id);
        $delTable->delete();

        return redirect('home');

    }
}
