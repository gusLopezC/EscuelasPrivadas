<?php

namespace App\Http\Controllers;

use App\Comentarios;
use App\Escuelas;
use App\EscuelasNivel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactEmail;
use RealRashid\SweetAlert\Facades\Alert;

use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use SEO;


class publicController extends Controller
{
    //
    public function homeview()
    {
        $escuelas = Escuelas::select('id', 'slug', 'name', 'categoria', 'address', 'calification')
            ->orderBy('nivelpromo', 'desc')
            ->with('getPhotos')
            ->take(10)
            ->get();


        SEO::setTitle('SCHOOLA | Mejora tu escuela');
        SEO::setDescription('Consulta información sobre las características de las escuelas de México. Datos de contacto, información sobre desempeño, infraestructura, programas de apoyo y conoce las opiniones de otros padres de familia.');
        SEO::opengraph()->setUrl('http://schoola.com');
        SEO::setCanonical('https://schoola.com');
        SEO::opengraph()->addProperty('type', 'WebPage');
        SEOMeta::addKeyword(['escuela', 'evaluación', 'key3']);
        SEO::twitter()->setSite('@schoola');
        OpenGraph::addImage('http://image.url.com/cover.jpg');
        OpenGraph::addImage(['url' => 'http://image.url.com/cover.jpg', 'size' => 300]);
        OpenGraph::addImage('http://image.url.com/cover.jpg', ['height' => 300, 'width' => 300]);

        return view('welcome', compact('escuelas'));
        //

    }
    public function nosotrosview()
    {

        SEO::setTitle('SCHOOLA Nosotros | Mejora tu escuela');
        SEO::setDescription('Las familias, los líderes comunitarios y los formuladores de políticas recurren a SCHOLA para obtener la información escolar que necesitan para guiar a los niños hacia un gran futuro.');
        SEO::opengraph()->setUrl('http://schoola.com/nosotros');
        SEO::setCanonical('https://schoola.com/nosotros');
        SEO::opengraph()->addProperty('type', 'WebPage');
        SEOMeta::addKeyword(['escuela', 'evaluación', 'key3']);
        SEO::twitter()->setSite('@schoola');
        OpenGraph::addImage('http://image.url.com/cover.jpg');
        OpenGraph::addImage(['url' => 'http://image.url.com/cover.jpg', 'size' => 300]);
        OpenGraph::addImage('http://image.url.com/cover.jpg', ['height' => 300, 'width' => 300]);

        return view('public.nosotros');
        //
    }
    public function workschoolview()
    {
        SEO::setTitle('SCHOOLA Trabaja con nosotros | Mejora tu escuela');
        SEO::setDescription('Más padres recurren a SCHOLA que cualquier otra fuente para encontrar información sobre las escuelas y cómo apoyar el aprendizaje de sus hijos.');
        SEO::opengraph()->setUrl('http://schoola.com/workschool');
        SEO::setCanonical('https://schoola.com/workschool');
        SEO::opengraph()->addProperty('type', 'WebPage');
        SEOMeta::addKeyword(['escuela', 'evaluación', 'key3']);
        SEO::twitter()->setSite('@schoola');
        OpenGraph::addImage('http://image.url.com/cover.jpg');
        OpenGraph::addImage(['url' => 'http://image.url.com/cover.jpg', 'size' => 300]);
        OpenGraph::addImage('http://image.url.com/cover.jpg', ['height' => 300, 'width' => 300]);

        return view('public.workschool');
        //
    }
    public function contactview()
    {
        SEO::setTitle('SCHOOLA Contacto | Mejora tu escuela');
        SEO::setDescription('Echa un vistazo a nuestras preguntas frecuentes : ¡la respuesta que estás buscando ya puede estar allí!');
        SEO::opengraph()->setUrl('http://schoola.com/contact');
        SEO::setCanonical('https://schoola.com/contact');
        SEO::opengraph()->addProperty('type', 'WebPage');
        SEOMeta::addKeyword(['escuela', 'evaluación', 'key3']);
        SEO::twitter()->setSite('@schoola');
        OpenGraph::addImage('http://image.url.com/cover.jpg');
        OpenGraph::addImage(['url' => 'http://image.url.com/cover.jpg', 'size' => 300]);
        OpenGraph::addImage('http://image.url.com/cover.jpg', ['height' => 300, 'width' => 300]);

        return view('public.contact');
        //
    }

    public function contactsend(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'comments' => 'required',
        ];

        $this->validate($request, $rules);


        $objMensaje = new \stdClass();
        $objMensaje->name = $request->name;
        $objMensaje->email = $request->email;
        $objMensaje->comments = $request->comments;


        Mail::to("guslopezcallejas@gmail.com")->send(new ContactEmail($objMensaje));
        Alert::success('Mensaje enviado', 'Mensaje enviado correctamente');
        return redirect()->back();
    }
    public function termsAndConditionsview()
    {
        SEO::setTitle('SCHOOLA termsAndConditions | Mejora tu escuela');
        SEO::setDescription('SCHOOLA es una plataforma que busca promover la participación ciudadana para transformar la educación en México');
        SEO::opengraph()->setUrl('http://schoola.com/termsAndConditions');
        SEO::setCanonical('https://schoola.com/termsAndConditions');
        SEO::opengraph()->addProperty('type', 'WebPage');
        SEOMeta::addKeyword(['escuela', 'evaluación', 'key3']);
        SEO::twitter()->setSite('@schoola');
        OpenGraph::addImage('http://image.url.com/cover.jpg');
        OpenGraph::addImage(['url' => 'http://image.url.com/cover.jpg', 'size' => 300]);
        OpenGraph::addImage('http://image.url.com/cover.jpg', ['height' => 300, 'width' => 300]);

        return view('public.support.termsAndConditions');
        //
    }
    public function faqview()
    {
        SEO::setTitle('SCHOOLA Preguntas frecuentes | Mejora tu escuela');
        SEO::setDescription('SCHOOLA es una plataforma que busca promover la participación ciudadana para transformar la educación en México');
        SEO::opengraph()->setUrl('http://schoola.com/termsAndConditions');
        SEO::setCanonical('https://schoola.com/termsAndConditions');
        SEO::opengraph()->addProperty('type', 'WebPage');
        SEOMeta::addKeyword(['escuela', 'evaluación', 'key3']);
        SEO::twitter()->setSite('@schoola');
        OpenGraph::addImage('http://image.url.com/cover.jpg');
        OpenGraph::addImage(['url' => 'http://image.url.com/cover.jpg', 'size' => 300]);
        OpenGraph::addImage('http://image.url.com/cover.jpg', ['height' => 300, 'width' => 300]);

        return view('public.support.faq');
        //
    }

    /**
     *  Vistas detalladas
     */

    public function schoolShow($slug)
    {

        $escuela = Escuelas::where('slug', '=', $slug)
            ->with('getPhotos')
            ->with('getPrincing')
            ->with('getUser')
            ->with('getComentarios')
            ->get();

        $escuela = $escuela[0];


        $escuela->visitas = $escuela->visitas + 1;
        $escuela->save();
        $escuela->services = json_decode($escuela->services, true);
        $escuela->redsocial = json_decode($escuela->redsocial, true);
        $escuela->coordenadasGoogle = explode(',', $escuela->coordenadasGoogle);

        SEO::setTitle('SCHOOLA |' . $escuela->name);
        SEO::setDescription(strip_tags($escuela->description));
        SEO::opengraph()->setUrl('http://schoola.com/school' . $escuela->slug);
        SEO::setCanonical('https://schoola.com/school' . $escuela->slug);
        SEO::opengraph()->addProperty('type', 'WebPage');
        SEOMeta::addKeyword(['escuela', 'evaluación', 'key3']);
        SEO::twitter()->setSite('@schoola');
        OpenGraph::addImage('https://escuelasprivadas.s3.amazonaws.com/images/escuelas/'.$escuela->getPhotos[0]->photo);
        OpenGraph::addImage(['url' => 'https://escuelasprivadas.s3.amazonaws.com/images/escuelas/'.$escuela->getPhotos[0]->photo, 'size' => 300]);
        OpenGraph::addImage('https://escuelasprivadas.s3.amazonaws.com/images/escuelas/'.$escuela->getPhotos[0]->photo, ['height' => 300, 'width' => 300]);


        $EscuelasNivel = EscuelasNivel::where('escuela_id', '=', $escuela->id)->get();
        $comentarios = Comentarios::where('escuela_id', '=', $escuela->id)
            ->with('getPhotosComentario')
            ->with('getUser')
            ->take(10)
            ->get();


        return view('school.school', compact('escuela', 'comentarios', 'EscuelasNivel'));
    }
}
