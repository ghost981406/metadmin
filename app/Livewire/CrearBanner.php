<?php

namespace App\Livewire;

use App\Models\Banner;
use Livewire\Component;
use Livewire\WithFileUploads;

class CrearBanner extends Component
{
    public $titulo;
    public $sub_titulo;
    public $imagen;

    use WithFileUploads;

    protected $rules = [
        'titulo' => 'required|string',
        'sub_titulo' => 'required|string',
        'imagen' => 'required|image'
    ];

    public function crearBanner()
    {
        $datos = $this->validate();

        //1ª almacenar imagen
        $imagen = $this->imagen->store('public/banners');
        $datos['imagen'] = str_replace('public/banners/','', $imagen);

        //Crear banner  
        Banner::create([
            'titulo' => $datos['titulo'],
            'sub_titulo' => $datos['sub_titulo'],
            'imagen' => $datos['imagen'],
            'user_id' => auth()->user()->id,
        ]);

        //Crear un mensaje
        session()->flash('mensaje', 'Banner agregado correctamente.');

        //Redireccionar al usuario
        return redirect()->route('dashboard.index');
    }

    public function render()
    {
        return view('livewire.banner.crear-banner');
    }
}
