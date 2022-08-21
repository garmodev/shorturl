<?php

namespace App\Http\Controllers;
use App\Models\ShortURL;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ShortURLController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $shorturl = ShortURL::latest()->get();
        return view('shorturl',compact('shorturl'));
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

        $request->validate(
            [
                'old_url' => 'required'
            ],
            [
                'old_url.required'=>"กรุณาป้อนข้อมูล",
            ]
        );
         $input['status'] = 1 ;
         $input['old_url'] = $request->old_url;
         $input['new_url'] = Str::random(10);
         $input['number_clicks'] = 0;

         ShortURL::create($input);

         return redirect()->back()->with('success', "success");

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
    public function edit($url)
    {
        $count = ShortURL::select('number_clicks')
        ->where('new_url', $url)->get();
        $find = ShortURL::where('new_url', $url)
        ->where('status',1)->first();

        if($find){

                ShortURL::find($find->id)->update([
                'number_clicks' => $find->number_clicks+1

            ]);
            return redirect($find->old_url);

        }else{
            return redirect('/block')->with('error', "error");

            // return redirect()->url('block')->with('error', "error");
            // return view('shorturl')->with('error', "error");


        }
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

        $request->validate([

            'status' => 'required',

        ],

        [
            'status.required'=>"กรุณาป้อนข้อมูล",

        ]



        );
        ShortURL::find($id)->update([

            'status' => $request->status,

        ]);


        return redirect()->back()->with('success', "แก้ไขข้อมูลลสำเร็จ");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = ShortURL::find($id);
        $data->delete();

        return redirect()->back()->with('delete', "ลบข้อมูลเรียบร้อย");
    }
}
