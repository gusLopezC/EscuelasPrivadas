<?php

namespace App\Http\Controllers\User\Escuelas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Collection;

use App\Escuelas;
use App\PhotosEscuelas;
use App\EscuelasNivel;
use App\PricingSchool;
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
        if (!$request->file('image')) {
            return redirect()->back()->withInput()->withErrors(['name' => 'Se requieren al menos 3 imagenes para guardar su registro']);
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
            'state' => $request->state,
            'pais' => $request->pais,
            'coordenadasGoogle' => $coordenandas,
            'description' => $request->description,
            'phone' => $request->phone,
            'website' => $request->website,
            'emailcontacto' => $request->emailcontacto,
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
        } else {
            return redirect()->back()->withInput()->withErrors(['name' => 'The name is required']);
        }

        $precios = array_combine($request->pricetitle, $request->price);

        foreach ($precios as $precio => $value) {
            $precios = PricingSchool::create([
                'description'  => $precio,
                'precio'  => $value,
                'school_id' => $escuela->id
            ]);
        }

        $EscuelasNivel = new EscuelasNivel();

        $EscuelasNivel->escuela_id = $escuela->id;
        foreach ($request->niveleducativo as $niveleducativo) {

            if ($niveleducativo == 'guarderia') {
                $EscuelasNivel->guarderia = true;
            }
            if ($niveleducativo == 'preescolar') {
                $EscuelasNivel->preescolar = true;
            }
            if ($niveleducativo == 'primarias') {
                $EscuelasNivel->primarias = true;
            }
            if ($niveleducativo == 'secundarias') {
                $EscuelasNivel->secundarias = true;
            }
            if ($niveleducativo == 'preparatorias') {
                $EscuelasNivel->preparatorias = true;
            }
            if ($niveleducativo == 'universidades') {
                $EscuelasNivel->universidades = true;
            }
            if ($niveleducativo == 'otras') {
                $EscuelasNivel->otras = true;
            }
        }
        $EscuelasNivel->save();


        return redirect()->back();
    }

    protected function validator($request)
    {

        return Validator::make($request->all(), [
            'name' => 'required',
            'categoria' => 'required',
            'address' => 'required',
            'description' => 'required',
            'phone' => 'required',
            'emailcontacto' => 'required',

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
    public function edit($slug)
    {
        //
        $escuela = Escuelas::where('slug', '=', $slug)
            ->where('user_id', '=', Auth::user()->id)
            ->with('getPhotos')
            ->with('getPrincing')
            ->first();

        $EscuelasNivel = EscuelasNivel::where('escuela_id', '=', $escuela->id)->first();

        $escuela->redsocial = json_decode($escuela->redsocial, true);
        $escuela->services = json_decode($escuela->services, true);
        $escuela->coordenadasGoogle = explode(',', $escuela->coordenadasGoogle);

        // return $escuela;

        return view('user.adminSchool.editSchool', compact('escuela', 'EscuelasNivel'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Escuelas $escuela,  Request $request)
    {        //


        $v =  $this->validator($request);

        if ($v->fails()) {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }


        $coordenandas = $request->latitude . ',' .  $request->longitude;
        $redsocial_json = json_encode($request->redsocial);
        $services_json = json_encode($request->services);


        if ($escuela->name ==  $request->get('name')) {
            return 'No cambio';
        } else {
            $escuela->name = $request->get('name');
            $slug = SlugService::createSlug(Escuelas::class, 'slug', $request->get('name'), ['unique' => true]);
            $escuela->slug = $slug;
        }
        $escuela->categoria = $request->get('categoria');
        $escuela->address = $request->get('address');
        $escuela->state = $request->get('state');
        $escuela->ciudad = $request->get('ciudad');
        $escuela->pais = $request->get('pais');
        $escuela->coordenadasGoogle = $coordenandas;
        $escuela->description =  $request->get('description');
        $escuela->phone =  $request->get('phone');
        $escuela->website =  $request->get('website');
        $escuela->emailcontacto =  $request->get('emailcontacto');
        $escuela->redsocial =  $redsocial_json;
        $escuela->services =  $services_json;
        $escuela->save();

        alert()->success('Actualizado correctamente');
        return redirect()->route('dashboard');
    }

    public function updateNivel(EscuelasNivel $EscuelasNivel, Request $request)
    {
        $EscuelasNivel->guarderia = 0;
        $EscuelasNivel->preescolar = 0;
        $EscuelasNivel->primarias = 0;
        $EscuelasNivel->preparatorias = 0;
        $EscuelasNivel->universidades = 0;
        $EscuelasNivel->otras = 0;

        if ($request->guarderia) {
            $EscuelasNivel->guarderia =  $request->get('guarderia');
        }
        if ($request->preescolar) {
            $EscuelasNivel->preescolar =  $request->get('preescolar');
        }
        if ($request->primarias) {
            $EscuelasNivel->primarias =  $request->get('primarias');
        }
        if ($request->secundarias) {
            $EscuelasNivel->secundarias =  $request->get('secundarias');
        }
        if ($request->preparatorias) {
            $EscuelasNivel->preparatorias =  $request->get('preparatorias');
        }
        if ($request->universidades) {
            $EscuelasNivel->universidades =  $request->get('universidades');
        }
        if ($request->otras) {
            $EscuelasNivel->otras =  $request->get('otras');
        }
        $EscuelasNivel->save();
        alert()->success('Actualizado correctamente');
        return redirect()->route('dashboard');
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
        $photosEscuela = PhotosEscuelas::where('escuela_id', '=', $id)->get();

        foreach ($photosEscuela as $photo) {
            # code...
            if (Storage::disk('s3')->exists('/images/escuelas/' . $photo->photo)) {
                Storage::disk('s3')->delete('/images/escuelas/' . $photo->photo);
            }
            $photosEscuela->each->delete();
        }

        $escuela = Escuelas::destroy($id);

        Alert::success('Escuela eliminada', '');

        return redirect()->back();
    }

    public function destroyPhotos(PhotosEscuelas $photo)
    {
        return $photo;

        if (Storage::disk('s3')->exists('/images/escuelas/' . $photo->photo)) {
            Storage::disk('s3')->delete('/images/escuelas/' . $photo->photo);
        }

        $photo->delete();

        alert()->success('Imagen eliminado correctamente');
        return back()->withInput();
    }
}
