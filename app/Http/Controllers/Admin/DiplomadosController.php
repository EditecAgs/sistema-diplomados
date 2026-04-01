<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\InscriptionStatus;

use Illuminate\Support\Facades\Auth;


class DiplomadosController extends Controller
{
    public function asics(){
        $inscriptions = Inscription::with(['state', 'municipality'])
        ->whereDoesntHave('status')
        ->get();

        $aceptadas = Inscription::with(['state', 'municipality', 'status'])
        ->whereHas('status', fn($q) => $q->where('status', 'aceptado'))
        ->get();

        $rechazadas = Inscription::with(['state', 'municipality', 'status'])
        ->whereHas('status', fn($q) => $q->where('status', 'rechazado'))
        ->get();

        $requests  = Inscription::count();
        $aceptados  = InscriptionStatus::where('status', 'aceptado')->count();
        $rechazados = InscriptionStatus::where('status', 'rechazado')->count();

        return view('admin.pages.diplomados.asics.index', compact(
            'inscriptions', 'requests', 'aceptados', 'rechazados', 'aceptadas', 'rechazadas'
        ));
    }

    public function download_cv($id){
        $inscription = Inscription::findOrFail($id);
        if (!$inscription->cv_path || !Storage::disk('local')->exists($inscription->cv_path)) {
            abort(404, 'El archivo no existe');
        }
        return Storage::disk('local')->download($inscription->cv_path);
    }

    public function download_letter($id){
        $inscription = Inscription::findOrFail($id);
        if (!$inscription->commitment_letter_path || !Storage::disk('local')->exists($inscription->commitment_letter_path)) {
            abort(404, 'El archivo no existe');
        }
        return Storage::disk('local')->download($inscription->commitment_letter_path);
    }

    public function download_support($id){
        $inscription = Inscription::findOrFail($id);
        if (!$inscription->support_letter_path || !Storage::disk('local')->exists($inscription->support_letter_path)) {
            abort(404, 'El archivo no existe');
        }
        return Storage::disk('local')->download($inscription->support_letter_path);
    }

    public function accepted(Request $request, $id)
    {
        $request->validate([
            'motivo' => 'nullable|string|max:500',
        ]);

        try {
            InscriptionStatus::create([
                'id_inscription' => $id,
                'id_graduate'    => 1,
                'status'         => 'aceptado',
                'motivo'         => $request->motivo,
                'id_user'        => Auth::id(),
            ]);

            return redirect()->back()->with('success', 'La inscripción fue aceptada correctamente.');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Ocurrió un error al procesar la aceptación.');
        }
    }

    public function rejected(Request $request, $id)
    {
        $request->validate([
            'motivo' => 'nullable|string|max:500',
        ]);

        try {
            InscriptionStatus::create([
                'id_inscription' => $id,
                'id_graduate'    => 1,
                'status'         => 'rechazado',
                'motivo'         => $request->motivo,
                'id_user'        => Auth::id(),
        ]);

        return redirect()->back()->with('success', 'La inscripción fue rechazada.');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Ocurrió un error al procesar el rechazo.');
        }
    }
}
