<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatedetalleVentaRequest;
use App\Http\Requests\UpdatedetalleVentaRequest;
use App\Repositories\detalleVentaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\producto;
use App\Models\cliente;


class detalleVentaController extends AppBaseController
{
    /** @var  detalleVentaRepository */
    private $detalleVentaRepository;

    public function __construct(detalleVentaRepository $detalleVentaRepo)
    {
        $this->detalleVentaRepository = $detalleVentaRepo;
    }

    /**
     * Display a listing of the detalleVenta.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->detalleVentaRepository->pushCriteria(new RequestCriteria($request));
        $detalleVentas = $this->detalleVentaRepository->all();

        return view('detalle_ventas.index')
            ->with('detalleVentas', $detalleVentas);
    }

    /**
     * Show the form for creating a new detalleVenta.
     *
     * @return Response
     */
    public function create()
    {
        $clientes = cliente::pluck('nombre','id');
        $productos = producto::pluck('nombre','id');
        return view('detalle_ventas.create',compact('clientes'),compact('productos'));
    }

    /**
     * Store a newly created detalleVenta in storage.
     *
     * @param CreatedetalleVentaRequest $request
     *
     * @return Response
     */
    public function store(CreatedetalleVentaRequest $request)
    {
        $input = $request->all();

        $detalleVenta = $this->detalleVentaRepository->create($input);

        Flash::success('Detalle Venta saved successfully.');

        return redirect(route('detalleVentas.index'));
    }

    /**
     * Display the specified detalleVenta.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $detalleVenta = $this->detalleVentaRepository->findWithoutFail($id);

        if (empty($detalleVenta)) {
            Flash::error('Detalle Venta not found');

            return redirect(route('detalleVentas.index'));
        }

        return view('detalle_ventas.show')->with('detalleVenta', $detalleVenta);
    }

    /**
     * Show the form for editing the specified detalleVenta.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $detalleVenta = $this->detalleVentaRepository->findWithoutFail($id);

        if (empty($detalleVenta)) {
            Flash::error('Detalle Venta not found');

            return redirect(route('detalleVentas.index'));
        }

        return view('detalle_ventas.edit')->with('detalleVenta', $detalleVenta);
    }

    /**
     * Update the specified detalleVenta in storage.
     *
     * @param  int              $id
     * @param UpdatedetalleVentaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatedetalleVentaRequest $request)
    {
        $detalleVenta = $this->detalleVentaRepository->findWithoutFail($id);

        if (empty($detalleVenta)) {
            Flash::error('Detalle Venta not found');

            return redirect(route('detalleVentas.index'));
        }

        $detalleVenta = $this->detalleVentaRepository->update($request->all(), $id);

        Flash::success('Detalle Venta updated successfully.');

        return redirect(route('detalleVentas.index'));
    }

    /**
     * Remove the specified detalleVenta from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $detalleVenta = $this->detalleVentaRepository->findWithoutFail($id);

        if (empty($detalleVenta)) {
            Flash::error('Detalle Venta not found');

            return redirect(route('detalleVentas.index'));
        }

        $this->detalleVentaRepository->delete($id);

        Flash::success('Detalle Venta deleted successfully.');

        return redirect(route('detalleVentas.index'));
    }
}
