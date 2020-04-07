<?php

namespace App\Http\Controllers\User\Escuelas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Collection;

use App\Escuelas;
use App\PhotosEscuelas;
use App\EscuelasNivel;
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

        $collection = collect(['escuela_id' => 1]);

        foreach ($request->niveleducativo as $niveleducativo) {

            if ($niveleducativo == 'guarderia') {
                $collection->put('guarderia', true);
            }
            if ($niveleducativo == 'preescolar') {
                $collection->put('preescolar', true);
            }
            if ($niveleducativo == 'primarias') {
                $collection->put('primarias', true);
            }
            if ($niveleducativo == 'secundarias') {
                $collection->put('secundarias', true);
            }
            if ($niveleducativo == 'preparatorias') {
                $collection->put('preparatorias', true);
            }
            if ($niveleducativo == 'universidades') {
                $collection->put('universidades', true);
            }
            if ($niveleducativo == 'otras') {
                $collection->put('otras', true);
            }
        }

        // $EscuelasNivel = EscuelasNivel::insert($collection);

        return $collection;



        $userid = User::find(Auth::user()->id);
        $slug = SlugService::createSlug(Escuelas::class, 'slug', $request->name, ['unique' => true]);

        $v =  $this->validator($request);

        if ($v->fails()) {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        $coordenandas = $request->latitude . ',' .  $request->longitude;
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



        if ($image = $request->file('image')) {
            foreach ($image as $file) {
                $filename = time() . '-' . $file->getClientOriginalName();
                $filePath = '/images/escuelas/' . $filename;

                Storage::disk('s3')->put($filePath, file_get_contents($file));
                PhotosEscuelas::create([
                    'photo' => $filename,
                    'escuela_id' =>  $escuela->id

                ]);
            }
        }

        return redirect()->back();
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
