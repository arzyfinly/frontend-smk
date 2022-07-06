<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Http;
use DataTables;

class ViolationController extends Controller
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
        ])->get('http://localhost/PA/backend-smk/public/api'.'/violations')->json();
        $violations = json_decode(json_encode($data))->violations;
        // dd($violations);
        if($request->ajax()){
            return DataTables::of($violations)
                            ->addColumn('name', function($row){
                                return $row->student->name;
                            })
                            ->addColumn('point', function($row){
                                return $row->point;
                            })
                            ->addColumn('suspended', function($row){
                                if($row->suspended == '1'){
                                    $haw = '<a class="badge badge-danger text-white">Skorsing</a>';
                                    return $haw;
                                }else{
                                    $haw = '<a class="badge badge-success text-white">Aman</a>';
                                    return $haw;
                                };
                            })
                            ->addColumn('action', function($row){

                                $btn = '<a href="javascript:void(0)" data-toggle="tooltip" onclick="updateItem(this)" data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm"><span><i class="fas fa-pen-square"></i></span></a>';
                                $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip" onclick="deleteItem(this)"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm"><span><i class="fas fa-trash"></i></a>';

                                 return $btn;
                            })
                            ->rawColumns(['suspended','action'])
                            ->addIndexColumn()
                            ->make(true);
            }
            // dd($violations);
            return view('admin.violations.index', compact('violations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
