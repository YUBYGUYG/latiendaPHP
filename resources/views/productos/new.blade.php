@extends('layouts.menu')

@section('contenido')
@if(session('Mensajito'))
<div class="row">
    <p>{{session('Mensajito')}}</p>
</div>
@endif
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
            <strong>{{$errors->first('nombre')}}</strong>   
            </div>
        </div>
        <div class="row">
            <div class="col s8 input-field">
                <textarea name="descripcion" id="descripcion" class="materialize-textarea">
                </textarea>
                <label for="descripcion">Descripción</label>
                <strong>{{$errors->first('descripcion')}}</strong> 
            </div>
        </div>
        <div class="row">
            <div class="col s8 input-field">
                <input 
                type="text"
                id="precio"
                name="precio">
                <label for="precio">Precio</label>
                <strong>{{$errors->first('precio')}}</strong> 
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
            </div>
            <strong>{{$errors->first('imagen')}}</strong> 
        </div>
                <div class="row">
                    <div class="col s8 input-field">
                        <select name="marca" id="marca">
                            <option value="">Seleccione la marca</option>
                            @foreach($marcas as $marca)
                            <option value="{{ $marca->id }}">{{ $marca->nombre }}</option>
                            @endforeach
                        </select>
                        <label>Seleccione marca</label>
                        <strong>{{$errors->first('marca')}}</strong> 
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col s8 input field">
                        <select name="categoria" id="categoria">
                            <option value="">Seleccione la categoría</option>
                            @foreach($categorias as $categoria)
                            <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                            @endforeach
                        </select>
                        <label>Seleccione categoría</label>
                        <strong>{{$errors->first('categoria')}}</strong> 
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