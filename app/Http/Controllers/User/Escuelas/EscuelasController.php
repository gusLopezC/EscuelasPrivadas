<?php

namespace App\Http\Controllers\User\Escuelas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use \Cviebrock\EloquentSluggable\Services\SlugService;

use App\Escuelas;
use App\User;


class EscuelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('user.adminSchool.createSchool');
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

        $userid = User::find(Auth::user()->id);
        $slug = SlugService::createSlug(Escuelas::class, 'slug', $request->name, ['unique' => true]);

        $v =  $this->validator($request);

        if ($v->fails()) {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        $coordenandas = $request->latitude .','.  $request->longitude;
        $redsocial_json = json_encode($request->redsocial);
        $services_json = json_encode($request->services);

        $escuela = Escuelas::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'categoria' => $request->categoria,
            'address' => $request->address,
            'ciudad' => $request->ciudad,
            'pais' => $request->pais,
            'coordenadasGoogle' => $coordenandas,
            'description' => $request->description,
            'phone' => $request->phone,
            'website' => $request->website,
            'emalcontact' => $request->emalcontact,
            'redsocial' => $redsocial_json,
            'services' => $services_json,
            'user_id' => $userid->id
        ]);


    }

    protected function validator($request)
    {
        return Validator::make($request->all(), [
            'name' => 'required',
            'categoria' => 'required|',
            'niveleducativo' => 'required',
            'address' => 'required',
            'description' => 'required',
            'phone' => 'required',
            'website' => 'required',
            'emalcontact' => 'required',

        ]);
    }

    public function dropzoneStore(Request $request)
    {
        $image = $request->file('file');

        $imageName = time() . '.' . $image->extension();
        $image->move(public_path('images'), $imageName);

        return response()->json(['success' => $imageName]);
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
