<?php

namespace App\Http\Controllers;

//dependencias de los modelos
use App\Models\Producto; 
use App\Models\Categoria;
use App\Models\Marca;
//dependencia para el validador
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;




class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo "aquí va la lista de productos";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //seleccionar marcas
        $marcas = Marca::all();
        //seleccionar categorias
        $categorias = Categoria::all();
        //mostrar la vista con las marcas y categorias
        return view('productos.new')
        ->with('categorias', $categorias)
        ->with('marcas', $marcas);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validacion
        //1.Establecer las reglas de validación a aplicar
        //para la 'input data' (O sea, el nombre de producto, el precio, la descripción, la marca, la categoría, etc.)
        $reglas=[ //aplicamos reglas de validación para un campo
            "nombre"=>'required|alpha|unique:productos,nombre', 
            "descripcion"=>'required|min:10|max:20',
            "precio"=>'required|numeric',
            "imagen"=>'required|image',
            "categoria"=>'required',
            "marca"=>'required'
        ];
        $mensajes=[
            "required"=>"Campo obligatorio",
            "alpha"=>"Sólo ingresar letras",
            "numeric"=>"Sólo ingresar números",
            "image"=>"Debe ser un archivo imagen",
            "min"=>"Mínimo 10 caracteres",
            "max"=>"Máximo 20 caracteres"
        ];

        //2.Crear objeto validador
        $v=Validator::make($request->all(), $reglas, $mensajes);

        //3.Validar
        //método fails retorna:
        //true: si la validación falla
        //false: si los datos son válidos
        if($v->fails()){
            //validacíón incorrecta
            //mostrar la vista new
            //levando los errores
            return redirect('productos/create')
                ->withErrors($v);
        }else{
            //validación correcta
            //crear el objeto uploadedFile
            $archivo = $request->imagen;
            //capturar nombre "original" del archivo
            //desde el cliente
            $nombre_archivo=$archivo->getClientOriginalName();
            var_dump($nombre_archivo);
            //mover archivo a la carpeta "public/img"
            $ruta=public_path(); //ubica o devuelve toda la ruta de la carpeta public del proyecto
            var_dump($ruta);
            $archivo->move("$ruta/img", $nombre_archivo);
            //registrar producto 
            $producto=new Producto;
            $producto->nombre= $request->nombre;
            $producto->descripcion=$request->descripcion;
            $producto->precio=$request->precio;
            $producto->imagen=$nombre_archivo;
            $producto->marca_id=$request->marca;
            $producto->categoria_id=$request->categoria;
            $producto->save();
            //redireccionar al formulario
            //llevando un mensaje de éxito
            return redirect('productos/create')
            ->with('Mensajito',"PRODUCTO REGISTRADO");
        }
        //die(var_dump($v->fails()));


        //acceder a los datos del formulario 
        //utilizando el objeto $request
        /*echo "<pre>";
        var_dump($request->imagen());
        echo "</pre>";*/

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($producto)
    {
        echo "aquí va el detalle de producto con id: $producto";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($producto)
    {
        echo "aquí va el form para editar el producto con id: $producto";
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
