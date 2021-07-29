<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Document;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $file=Document::all();
        return view('Document.view',compact('file'));
    }
    public function index1()
    {
        $file=Document::all();
       foreach($file as $f)
       $f->file='hello';
        return response()->json([
            'Docs'=>$file,
            'Message'=>'Sccuess'
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Document.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data= new Document;
        if($request->file('file')){
         
            $filenameWithExt = $request->file('file')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('file')->getClientOriginalExtension();
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            $path = $request->file('file')->storeAs('public/cover_images', $fileNameToStore);
            $data->file=$fileNameToStore;
        }
        $data->title=$request->title;
        $data->description=$request->description;
        $data->save();
        return redirect()->back();
    }
       
    public function store1(Request $request)
    {
        $data= new Document;
        if($request->file('file')){
            $filenameWithExt = $request->file('file')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('file')->getClientOriginalExtension();
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            $path = $request->file('file')->storeAs('public/cover_images', $fileNameToStore);
            $data->file=$fileNameToStore;
    }
        $data->title="Hammad";
        $data->description="Good Boy";
        $data->save();
        //$imagedata = file_get_contents('/storage/cover_images/man_1596545243.jpg');
        //$imagedata = file_get_contents("/storage/cover_images/".$fileNameToStore);
        // $url = '/storage/cover_images/'.$fileNameToStore;
        // $json = json_decode($this->curl_get_contents($url));
        // $base64 = base64_encode(json_decode($url));

        
        $base64 = base64_encode(file_get_contents('storage/cover_images/'.$fileNameToStore));
        //error_log($files);
        return response()->json([
            'File'=>$base64,
            'Message'=>'Sucesss',
            'Type'=>$extension
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=Document::find($id);
        return view('Document.details',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function download($file)
    {
    return response()->download('storage/cover_images/'.$file);     
    }
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
