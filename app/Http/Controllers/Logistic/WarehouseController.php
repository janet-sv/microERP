<?php

namespace App\Http\Controllers\Logistic;

use Illuminate\Http\Request;
use App\Http\Requests\Logistic\WarehouseRequest;
use App\Http\Controllers\Controller;
use App\Models\Logistic\Warehouse\Warehouse;

class WarehouseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $warehouses = Warehouse::get();

        $data = [
            'title' => 'Almacenes',
            'warehouses' => $warehouses,
        ];

        return view('logistic.pages.warehouse.index', $data);
    }

    public function create()
    {
        return view('logistic.pages.warehouse.create');
    }

    public function store(WarehouseRequest $request)
    {
        $message = null;
        try {
            $nameUpper = strtoupper($request['name']);

            $warehouse = Warehouse::
                                where('name', $nameUpper)
                                ->first();

            $message = 'El nombre del almacén ya existe';

            if ($warehouse) {
                return redirect()->route('logistic.warehouse.create')->with('message', $message)->withInput();
            }

            $newWarehouse = new Warehouse();
            $newWarehouse->name = $nameUpper;
            $newWarehouse->description = $request['description'];
            $newWarehouse->save();

            $message = 'El almacén se registró correctamente';

            return redirect()->route('logistic.warehouse.index')->with('message', $message);

        } catch (Exception $e) {
            $message = 'Ocurrió un error inesperado';
            return redirect()->route('logistic.warehouse.index')->with('message', $message);
        }
    }

    public function edit($id) {
        $warehouse = Warehouse::find($id);

        if ($warehouse) {
            $data = [
                'category' => $warehouse,
            ];

            return view('logistic.pages.warehouse.edit', $data);
        }

        return view('logistic.pages.warehouse.index');
    }

    public function update($id, WarehouseRequest $request)
    {
        $message = null;
        try {

            $nameUpper = strtoupper($request['name']);

            $warehouse = Warehouse::
                                    where('name', $nameUpper)
                                    ->where('id', '<>', $id)
                                    ->first();

            $message = 'El nombre del almacén ya está asignado';

            if ($warehouse) {
                return redirect()->route('logistic.warehouse.edit', $id)->with('message', $message)->withInput();
            }

            $warehouse = Warehouse::find($id);

            if ($warehouse) {
                $warehouse->name = $nameUpper;
                $warehouse->description = $request['description'];
                $warehouse->save();

                $message = 'El almacén se actualizó correctamente';

                return redirect()->route('logistic.warehouse.index')->with('message', $message);
            }

            $message = 'Ocurrió un error inesperado';
            return redirect()->route('logistic.warehouse.index')->with('message', $message);

        } catch (Exception $e) {
            $message = 'Ocurrió un error inesperado';
            return redirect()->route('logistic.warehouse.index')->with('message', $message);
        }
    }
}
