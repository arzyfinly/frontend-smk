<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Http;
use DataTables;

class CounselingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Http::withHeaders([
            'Authorization' => 'Bearer '.substr($request->Header('cookie'),'6' , strpos(substr($request->Header('cookie'),'6'), ";")),
            'ContentType' => 'application/json',
            'Accept' => 'application/json',
        ])->get('http://localhost/PA/backend-smk/public/api'.'/counselings')->json();
        $counselings = json_decode(json_encode($data))->counselings;
        // dd($counselings);
        if($request->ajax()){
            return DataTables::of($counselings)
                            ->addColumn('name', function($row){
                                return $row->student->name;
                            })
                            ->addColumn('time', function($row){
                                return $row->time;
                            })
                            ->addColumn('date', function($row){
                                return $row->date_counseling;
                            })
                            ->addColumn('status', function($row){
                                if($row->status == 'ongoing'){
                                    $haw = '<a class="badge badge-info text-white">Pending</a>';
                                    return $haw;
                                }else{
                                    $haw = '<a class="badge badge-success text-white">Selesai</a>';
                                    return $haw;
                                };
                            })
                            ->addColumn('action', function($row){
                                
                                $btn = '<a href="javascript:void(0)" data-toggle="tooltip" onclick="updateItem(this)" data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm"><span><i class="fas fa-pen-square"></i></span></a>';
                                $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip" onclick="deleteItem(this)"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm"><span><i class="fas fa-trash"></i></a>';
                                
                                return $btn;
                            })
                            ->rawColumns(['status'],['action'])
                            ->addIndexColumn()
                            ->make(true);
            }
            // dd($counselings);
            return view('admin.counselings.index', compact('counselings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.counselings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
