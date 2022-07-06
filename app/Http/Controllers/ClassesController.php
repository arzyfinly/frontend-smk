<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use Http;
class ClassesController extends Controller
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
        ])->get('http://localhost/PA/backend-smk/public/api'.'/classes')->json();
        $classes = json_decode(json_encode($data))->classes;
        // dd($classes);
        if($request->ajax()){
            return DataTables::of($classes)
                            ->addColumn('name', function($row){
                                return $row->name;
                            })
                            ->addColumn('description', function($row){
                                return $row->description;
                            })
                            ->addColumn('major', function($row){
                                return $row->major;
                            })
                            ->addColumn('num_student', function($row){
                                return $row->num_of_students;
                            })
                            ->addIndexColumn()
                            ->make(true);
            }
            return view('admin.master.classes.index', compact('classes'));
        // $data = Http::withHeaders([
        //     'Authorization' => 'Bearer '.substr($request->Header('cookie'),'6',strpos(substr($request->Header('cookie'),'6'), ";")),
        //     'ContentType' => 'application/json', 
        //     'Accept' => 'application/json',
        //     ])->get('http://localhost/PA/backend-smk/public/api/classes')->json();            
        //     $classes = json_decode(json_encode($data));
        //     // dd($classes);

        //     $i = 1;

        // return view('admin.master.kelas.index', compact(
        //     'classes', 'i',
        // ));
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
