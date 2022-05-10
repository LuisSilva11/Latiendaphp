@extends('layouts.menu')

@section('contenido')
<div class="row">
    <h1 class="blue-grey-text text-darken-2">
        Nuevo producto 
    </h1>
</div>
<div class="row">
    <form class="col s8" method="POST" action="">
        <div class="row" >
            <div class="input-field col s8">
                <input  id="nombre" name="nombre" type="text">
                <label for="nombre">Nombre del producto</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s8">
                <textarea class="materialize-textarea" id="desc" name="desc"></textarea>
                <label for="desc">Descripción</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s8">
                <input id="precio" name="precio" type="text">
                <label for="precio">Precio</label>
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