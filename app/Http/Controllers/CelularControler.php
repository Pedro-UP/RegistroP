<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Celular;

class CelularControler extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $celulares = Celular::all();
        return view('celular.indexC')->with('celulares', $celulares);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('celular.createC');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'marca' => 'required', 'descripcion' => 'required', 'cantidad' => 'required', 'precio' => 'required', 'imagen' => 'required|image|mimes:jpg,png,svg,ico|max:40024'
        ]);

        $celulares = $request->all();

        if($request->hasFile('imagen')){
            $celulares['imagen']=$request->file('imagen')->store('imagen','public');
        }

        Celular::create($celulares);


        return redirect('/celulares');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $productoC=Celular::where('id', $id)->first();
            return view('detalles2', compact('productoC'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $celular = Celular::find($id);
        return view('celular.editC')->with('celular', $celular);
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
        $celular = Celular::find($id);
        $celular->marca = $request->get('marca');
        $celular->descripcion = $request->get('descripcion');
        $celular->cantidad = $request->get('cantidad');
        // $celular->precio = $request->get('precio');
         $celular->imagen = $request->get('imagen')->store('imagen','public');


        $celular->save();

        return redirect('/celulares');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $celular = Celular::find($id);
        $celular->delete();
        return redirect('/celulares');
    }

    //Carrito
    public function cart()
    {
        return view('cart');
    }

    public function addToCart($id)
    {
        $product = Celular::find($id);
        $cart = session()->get('cart');
        // if cart is empty then this the first product
        if (!$cart) {
            $cart = [
                $id => [
                    'descripcion' => $product->descripcion,
                    'quantity' => 1,
                    'precio' => $product->precio,
                    'marca' => $product->marca,
                    'imagen' => $product->imagen
                ]
            ];

            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart');
        }

        $cart[$id] = [
            'descripcion' => $product->descripcion,
            'quantity' => 1,
            'precio' => $product->precio,
            'marca' => $product->marca,
            'imagen' => $product->imagen
        ];

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
}
