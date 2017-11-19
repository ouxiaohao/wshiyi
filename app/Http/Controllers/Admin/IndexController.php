<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Support\Facades\DB;

class IndexController extends AdminBaseController
{
    public function index()
    {
        $signature = DB::table('signature')
            ->orderBy('created_time','desc')
            ->value('content');
        return view('admin.index.index',['signature'=>$signature]);
    }
}