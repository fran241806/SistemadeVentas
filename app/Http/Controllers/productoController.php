<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateproductoRequest;
use App\Http\Requests\UpdateproductoRequest;
use App\Repositories\productoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\categoria;


class productoController extends AppBaseController
{
    /** @var  productoRepository */
    private $productoRepository;

    public function __construct(productoRepository $productoRepo)
    {
        $this->productoRepository = $productoRepo;
    }

    /**
     * Display a listing of the producto.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->productoRepository->pushCriteria(new RequestCriteria($request));
        $productos = $this->productoRepository->all();

        return view('productos.index')
            ->with('productos', $productos);
    }

    /**
     * Show the form for creating a new producto.
     *
     * @return Response
     */
    public function create()
    {
        $categorias = categoria::pluck('tipo','id');
        return view('productos.create',compact('categorias'));
    }

    /**
     * Store a newly created producto in storage.
     *
     * @param CreateproductoRequest $request
     *
     * @return Response
     */
    public function store(CreateproductoRequest $request)
    {
        $input = $request->all();

        $producto = $this->productoRepository->create($input);

        Flash::success('Producto saved successfully.');

        return redirect(route('productos.index'));
    }

    /**
     * Display the specified producto.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $producto = $this->productoRepository->findWithoutFail($id);

        if (empty($producto)) {
            Flash::error('Producto not found');

            return redirect(route('productos.index'));
        }

        
        return view('productos.show')->with('producto', $producto);
    }

    /**
     * Show the form for editing the specified producto.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $producto = $this->productoRepository->findWithoutFail($id);

        if (empty($producto)) {
            Flash::error('Producto not found');

            return redirect(route('productos.index'));
        }
        $categorias = categoria::pluck('tipo','id');
        return view('productos.edit',compact('categorias'))->with('producto', $producto);
    }

    /**
     * Update the specified producto in storage.
     *
     * @param  int              $id
     * @param UpdateproductoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateproductoRequest $request)
    {
        $producto = $this->productoRepository->findWithoutFail($id);

        if (empty($producto)) {
            Flash::error('Producto not found');

            return redirect(route('productos.index'));
        }

        $producto = $this->productoRepository->update($request->all(), $id);

        Flash::success('Producto updated successfully.');

        return redirect(route('productos.index'));
    }

    /**
     * Remove the specified producto from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $producto = $this->productoRepository->findWithoutFail($id);

        if (empty($producto)) {
            Flash::error('Producto not found');

            return redirect(route('productos.index'));
        }

        $this->productoRepository->delete($id);

        Flash::success('Producto deleted successfully.');

        return redirect(route('productos.index'));
    }
}
