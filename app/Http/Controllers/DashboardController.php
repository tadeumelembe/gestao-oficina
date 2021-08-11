<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobCard;
use App\Models\Car;
use App\Models\Consumivel;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function totalJobcards()
    {
     
            $data = array();
    
            $data['jobs']['total'] = JobCard::count();
            $data['jobs']['lastMonth'] = JobCard::whereMonth('created_at', date('m', strtotime("-1 month")))
            ->whereYear('created_at', date('Y'))->count();

            $data['jobs']['thisMonth'] = JobCard::whereMonth('created_at', date('m'))
            ->whereYear('created_at', date('Y'))->count();

            $data['jobs']['pending'] = JobCard::where('status','Pendente')->count();
            $data['jobs']['running'] = JobCard::where('status','Em Curso')->count();
            $data['jobs']['closed'] = JobCard::where('status','Fechado')->count();

            $data['cars'] = Car::distinct()->count(["matricula"]);
            //$data['cars']['thisMonth'] = Car::distinct()->whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->count("matricula");
    
            $data['totalExpenses'] = Consumivel::sum('custo');

            $data['revenue']['total'] = JobCard::sum('valor');
            $data['revenue']['lastMonth'] = JobCard::whereMonth('created_at', date('m', strtotime("-1 month")))
            ->whereYear('created_at', date('Y'))->sum('valor');
            $data['revenue']['thisMonth'] = JobCard::whereMonth('created_at', date('m'))
            ->whereYear('created_at', date('Y'))->sum('valor');

            


    
    
            return response()->json([
                'success' => true,
                'data' => $data
            ]);
    }
}
