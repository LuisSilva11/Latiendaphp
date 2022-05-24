@extends('layouts.menu')

@section('contenido')
@if(session('mensaje'))
    <div class="row">
        <div class="input-field col s8">
        {{  session('mensaje')  }}
        </div>
    </div>
@endif
<div class="row">
    <h1 class="blue-grey-text text-darken-2">
        Nuevo producto 
    </h1>
</div>
<div class="row">
    <form class="col s8" method="POST" action="{{ route('productos.store') }}">
        @csrf
        <div class="row" >
            <div class="input-field col s8">
                <input  id="nombre" name="nombre" type="text" value="{{  old('nombre')  }}">
                <label for="nombre">Nombre del producto</label>
                <span class="blue-grey-text text-darken-2">{{  $errors->first('nombre')  }}</span>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s8">
                <textarea class="materialize-textarea" id="desc" name="desc">{{  old('desc')  }}</textarea>
                <label for="desc">Descripción</label>
                <span class="blue-grey-text text-darken-2">{{  $errors->first('desc')  }}</span>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s8">
                <input id="precio" name="precio" type="text" value="{{  old('precio')  }}">
                <label for="precio">Precio</label>
                <span class="blue-grey-text text-darken-2">{{  $errors->first('precio')  }}</span>
            </div>
        </div>
        <div class="row">
            <div class="col s8 input-field">
                <select name="marca" id="marca">
                    <option value="" >Elija marca</option>
                    @foreach($marcas as $marca)
                        <option value="{{ $marca->id }}">
                            {{  $marca->nombre  }}
                        </option>
                    @endforeach
                </select>
                <label for="marca">Marca</label>
                <span>{{  $errors->first('marca')  }}</span>
            </div>
        </div>
        <div class="row">
            <div class="col s8 input-field">
                <select name="categoria" id="categoria">
                    <option value="categoria">Elija Categoria</option>
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}">
                            {{  $categoria->nombre  }}
                        </option>
                    @endforeach
                </select>
                <label for="marca">Categoria</label>
                <span>{{  $errors->first('categoria')  }}</span>
            </div>
        </div>
        <div class="row">
            <div class="file-field input-field col s8">
                <div class="btn">
                    <span>Imagen del producto</span>
                    <input type="file" name="imagen">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                </div>
            </div>
        </div>
        
        <div class="row">
            <button class="btn waves-effect waves-light " type="submit" name="action">
                Guardar
            </button>
        </div>
    </form>
</div>
@endsection