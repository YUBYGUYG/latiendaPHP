@extends('layouts.menu')

@section('contenido')
<div class="row">
    <h1 class="purple lighten-2">Nuevo producto: </h1>
</div>
<div class="row">
    <form action="{{ route('productos.store') }}" class="col s8"
    method="post" enctype="multipart/form-data">
    @csrf
        <div class="row">
            <div class="col s8 input-field">
                <input
                 type="text"
                 id="nombre"
                 name="nombre"
                 placeholder="nombre de producto" />
            <label for="nombre">Nombre de producto</label>     
            </div>
        </div>
        <div class="row">
            <div class="col s8 input-field">
                <textarea name="desc" id="desc" class="materialize-textarea">
                </textarea>
                <label for="desc">Descripción</label>
            </div>
        </div>
        <div class="row">
            <div class="col s8 input-field">
                <input 
                type="text"
                id="precio"
                name="precio">
                <label for="precio">Precio</label>
            </div>
        </div>
        <div class="row">
            <div class="col s8 file-field input-field">
                <div class="btn">
                    <span>Imagen de producto...</span>
                    <input type="file" name="imagen">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                </div>
                <div class="row">
                    <div class="col s8 input-field">
                        <select name="marca" id="marca">
                            @foreach($marcas as $marca)
                            <option value="{{ $marca->id }}">{{ $marca->nombre }}</option>
                            @endforeach
                        </select>
                        <label>Seleccione marca</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col s8 input field">
                        <select name="categoria" id="categoria">
                            @foreach($categorias as $categoria)
                            <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                            @endforeach
                        </select>
                        <label>Seleccione categoría</label>
                    </div>
                </div>
                <div class="row">
                <button class="btn waves-effect waves-light" type="submit">Guardar producto
  </button>
</div>
            </div>
        </div>
    </form>
</div>  

@endsection