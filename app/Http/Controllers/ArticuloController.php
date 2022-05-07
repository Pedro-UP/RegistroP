<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;

class ArticuloController extends Controller
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
        $articulos = Articulo::all();
        return view('articulo.index')->with('articulos', $articulos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articulo.create');
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

        $articulos = $request->all();

        if ($request->hasFile('imagen')) {
            $articulos['imagen'] = $request->file('imagen')->store('imagen', 'public');
        }

        Articulo::create($articulos);

        return redirect('/articulos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $productoA = Articulo::where('id', $id)->first();
        return view('detalles', compact('productoA'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $articulo = Articulo::find($id);
        return view('articulo.edit')->with('articulo', $articulo);
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
        $articulo = Articulo::find($id);
        $articulo->marca = $request->get('marca');
        $articulo->descripcion = $request->get('descripcion');
        $articulo->cantidad = $request->get('cantidad');
        $articulo->precio = $request->get('precio');

        $articulo->save();

        return redirect('/articulos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $articulo = Articulo::find($id);
        $articulo->delete();
        return redirect('/articulos');
    }

    //Carrito

    public function cart()
    {
        return view('cart');
    }

    public function addToCart($id)
    {
        $product = Articulo::find($id);
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
