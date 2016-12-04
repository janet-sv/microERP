<?php

namespace App\Http\Controllers\Logistic;

use Illuminate\Http\Request;
use App\Http\Requests\Logistic\SectionRequest;
use App\Http\Controllers\Controller;
use App\Models\Logistic\Section\Section;
use App\Models\Logistic\Warehouse\Warehouse;

class SectionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $sections = Section::get();

        $data = [
            'title' => 'Almacenes',
            'sections' => $sections,
        ];

        return view('logistic.pages.section.index', $data);
    }

    public function create()
    {
        $warehouses = Warehouse::get();

        $data = [
            'warehouses' => $warehouses,
        ];
        return view('logistic.pages.section.create', $data);
    }

    public function store(SectionRequest $request)
    {
        $message = null;
        try {
            $nameUpper = strtoupper($request['name']);

            $section = Section::
                                where('name', $nameUpper)
                                ->first();

            $message = 'El nombre del almacén ya existe';

            if ($section) {
                return redirect()->route('logistic.section.create')->with('message', $message)->withInput();
            }

            $newSection = new Section();
            $newSection->name = $nameUpper;
            $newSection->description = $request['description'];
            $newSection->id_warehouse = $request['warehouse'];
            $newSection->save();

            $message = 'El almacén se registró correctamente';

            return redirect()->route('logistic.section.index')->with('message', $message);

        } catch (Exception $e) {
            $message = 'Ocurrió un error inesperado';
            return redirect()->route('logistic.section.index')->with('message', $message);
        }
    }

    public function edit($id) {
        $section = Section::find($id);
        $warehouses = Warehouse::get();

        if ($section) {
            $data = [
                'section' => $section,
                'warehouses' => $warehouses,
            ];

            return view('logistic.pages.section.edit', $data);
        }

        return view('logistic.pages.section.index');
    }

    public function update($id, SectionRequest $request)
    {
        $message = null;
        try {

            $nameUpper = strtoupper($request['name']);

            $section = Section::
                                    where('name', $nameUpper)
                                    ->where('id', '<>', $id)
                                    ->first();

            $message = 'El nombre del almacén ya está asignado';

            if ($section) {
                return redirect()->route('logistic.section.edit', $id)->with('message', $message)->withInput();
            }

            $section = Section::find($id);

            if ($section) {
                $section->name = $nameUpper;
                $section->description = $request['description'];
                $section->save();

                $message = 'El almacén se actualizó correctamente';

                return redirect()->route('logistic.section.index')->with('message', $message);
            }

            $message = 'Ocurrió un error inesperado';
            return redirect()->route('logistic.section.index')->with('message', $message);

        } catch (Exception $e) {
            $message = 'Ocurrió un error inesperado';
            return redirect()->route('logistic.section.index')->with('message', $message);
        }
    }
}
