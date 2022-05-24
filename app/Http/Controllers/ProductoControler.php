<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Marca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductoControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo "aqui va ir el catalogo del producto";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //seleccionar categorias y marcas
        $marcas = Marca::all();
        $categorias = Categoria::all();
        return view('productos.new')
                ->with('marcas', $marcas)
                ->with('categorias', $categorias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {   
        //definir reglas de validacion
        $reglas = [
            "nombre" => 'required|alpha',
            "desc" => 'required|min:10|max:50',
            "precio" => 'required|numeric',
            "marca" => 'required',
            "categoria" => 'required'
        ];
        //mensajes personalizados
        $mensajes =[
            "required" => "Campo obligatorio",
            "numeric" => "En este campo solo se permiten numeros",
            "alpha" => "En este campo solo se permiten letras",
            "min" => "En este campo no se permiten menos de 10 caracteres",
            "max" => "En este campo no se permiten más de 50 caracteres"
        ];
        //crear un objeto validador 
        $v = Validator::make($r->all() , $reglas , $mensajes);
        //validar datos: metodo fails()
        //retorna true en caso de validacion fallida
        //        false en cado de validacion correcta
        if($v->fails()){
            //si la validacion falla
            //mostrar mensaje de validacion
            return redirect('productos/create')
                ->withErrors($v)
                ->withInput();
        }else{
            //si la validacion es correcta
            $p = new Producto;
            //aginar valores a atributos del nuevo producto
            $p->nombre = $r->nombre;
            $p->desc = $r->desc;
            $p->precio = $r->precio;
            $p->marca_id = $r->marca;
            $p->categoria_id = $r->categoria;
            //grabar el nuevo producto
            $p->save();
            //redireccionar a la ruta : create
            return redirect('productos/create')
            ->with('mensaje', 'PRODUCTO REGISTRADO CORRECTAMENTE');
            };

        /*
        */
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show($producto)
    {
        echo "aqui va la informacion del producto cuyo id es: $producto ";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit($producto)
    {
        echo "aqui va a ir el formulario de edicion del producto cuyo id es : $producto ";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        //
    }
}
