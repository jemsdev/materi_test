<?php

namespace App\Http\Controllers;

use App\Manage;
use App\Provinsi;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ManageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $manage = Manage::with('provinsi')->latest()->paginate(5);
  
        return view('manages.index',compact('manage'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function home(){
        $manage = Manage::with('provinsi')->orderBy('id','desc')->get();
        return view('welcome',compact('manage'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provinsi = Provinsi::all();
        return view('manages.create',compact('provinsi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'harga' => 'required',
            'alamat' => 'required',
            'provinsi' => 'required',
            'kota' => 'required',
            'gambar' => 'required',
        ]);
        
        $img = $request->file('gambar');
        $namaFile = Carbon::now()->timestamp . '_' . uniqid() . '.' . $img->getClientOriginalExtension();
        $img->move(public_path('upload/'),$namaFile);
            Manage::create([
                'nama' => $request->nama,
                'harga' => $request->harga, 
                'alamat' => $request->alamat,
                'provinsi_id' => $request->provinsi,
                'kota' => $request->kota,
                'gambar' => $namaFile
            ]);
   
        return redirect()->route('manages.index')
                        ->with('success','Manage Wisata created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Manage  $manage
     * @return \Illuminate\Http\Response
     */
    public function show(Manage $manage)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Manage  $manage
     * @return \Illuminate\Http\Response
     */
    public function edit(Manage $manage)
    {
        $provinsi = Provinsi::all();
        return view('manages.edit',compact('manage','provinsi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Manage  $manage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Manage $manage)
    {
        
        $request->validate([
            'nama' => 'required',
            'harga' => 'required',
            'alamat' => 'required',
            'provinsi' => 'required',
            'kota' => 'required',            
        ]);
        
        $img = $request->file('gambar');
        $manage = Manage::where('id',$manage->id)->first();
        if(empty($img)){
            Manage::where('id',$manage->id)->update([
                'nama' => $request->nama,
                'harga' => $request->harga, 
                'alamat' => $request->alamat,
                'provinsi_id' => $request->provinsi,
                'kota' => $request->kota,
                'gambar' => $manage->gambar
                ]);
                return redirect()->route('manages.index')
                                ->with('success','Manage Wisata updated successfully');
        }else{
            
            $namaFile = Carbon::now()->timestamp . '_' . uniqid() . '.' . $img->getClientOriginalExtension();
            $img->move(public_path('upload/'),$namaFile);
            Manage::where('id',$manage->id)->update([
                'nama' => $request->nama,
                'harga' => $request->harga, 
                'alamat' => $request->alamat,
                'provinsi_id' => $request->provinsi,
                'kota' => $request->kota,
                'gambar' => $namaFile
            ]); 
            return redirect()->route('manages.index')
                            ->with('success','Manage Wisata updated successfully');
        }
  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Manage  $manage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Manage $manage)
    {
        $manage->delete();
        $get = Manage::where('id',$manage->id)->first();
        $foto = $get->gambar;
        if(Empty($foto)){

        }else{
            unlink(public_path('\upload\\'.$gambar));            
        }

        return redirect()->route('manages.index')
                        ->with('success','Manage deleted successfully');
    }

    public function detail($id){
        $manage = Manage::where('id',$id)->first();
        return view('detail',compact('manage'));
    }
}
