<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use PDF;

class ProyectoController extends Controller
{
    public function getPDF(){
         
       $proyectos = Proyecto::all();                            //Proyecto -> Modelo           
       $pdf = PDF::loadView('PDF_Example',compact('proyectos'));
       return $pdf->stream('ejemplo.pdf');  

    }
    

    public function index(): Renderable
    {
        $proyectos = Proyecto::paginate(10);
        return view('projects.index', compact('proyectos'));
    }

  
    public function create(): Renderable
    {
        $project = new Proyecto();
        $title = __('Crear proyecto');
        $action = route('projects.store');
        $buttonText = __('Crear proyecto');
        return view('projects.form', compact('project', 'title', 'action', 'buttonText'));
    }


    public function store(Request $request): RedirectResponse
    {
        
        $request->validate([
            'NombreProyecto' => 'required|string|max:100',
            'fuenteFondos' => 'required|string|max:1000',
            'MontoPlanificado' => 'required|decimal:2',
            'MontoPatrocinado' => 'required|decimal:2',
            'MontoFondosPropios' => 'required|decimal:2',
        ]);
        
        Proyecto::create([
            'NombreProyecto' => $request->string('NombreProyecto'),
            'fuenteFondos' => $request->string('fuenteFondos'),
            'MontoPlanificado' => $request->string('MontoPlanificado'),
            'MontoPatrocinado' => $request->string('MontoPatrocinado'),
            'MontoFondosPropios' => $request->string('MontoFondosPropios'),
        ]);
        return redirect()->route('projects.index');
    }

    public function show(Proyecto $project): Renderable
    {
        $title = __('Ver Proyecto');
        $project->load('user:id,name');
        return view('projects.show', compact('project','title'));
    }

    public function edit(Proyecto $project): Renderable
    {
        $title = __('Editar proyecto');
        $action = route('projects.update', $project);
        $buttonText = __('Actualizar proyecto');
        $method = 'PUT';
        return view('projects.form', compact('project', 'title', 'action', 'buttonText', 'method'));
    }

    public function update(Request $request, Proyecto $project): RedirectResponse
    {
        $request->validate([
            'NombreProyecto' => 'required|string|max:100',
            'fuenteFondos' => 'required|string|max:1000',
            'MontoPlanificado' => 'required|decimal:2',
            'MontoPatrocinado' => 'required|decimal:2',
            'MontoFondosPropios' => 'required|decimal:2',
        ]);
        $project->update([
            'NombreProyecto' => $request->string('NombreProyecto'),
            'fuenteFondos' => $request->string('fuenteFondos'),
            'MontoPlanificado' => $request->string('MontoPlanificado'),
            'MontoPatrocinado' => $request->string('MontoPatrocinado'),
            'MontoFondosPropios' => $request->string('MontoFondosPropios'),
        ]);
        return redirect()->route('projects.index');
    }

    public function destroy(Proyecto $project): RedirectResponse
    {
        $project->delete();
        return redirect()->route('projects.index');
    }
}
