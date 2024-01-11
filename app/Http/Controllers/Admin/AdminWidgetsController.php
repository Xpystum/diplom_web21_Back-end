<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Widgets;
use Illuminate\Http\Request;

class AdminWidgetsController extends Controller
{
    public function index()
    {
        $widgets = Widgets::all();
        return response()->json($widgets);
    }

    public function update(Request $request, $id)
    {
        $widget = Widgets::findOrFail($id);
        $widget->position = $request->input('position');
        $widget->save();
        return response()->json($widget);
    }
}
