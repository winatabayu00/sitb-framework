<?php

namespace App\Mediator\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mediator\Models\PermohonanLab;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class PermohonanLabController extends Controller
{
    private $title = "Data Permohonan Lab";
    private $menuActive = "pages.permohonan-lab";
    private $submnActive = "";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $permohonanLab = PermohonanLab::select('*')
            ->addSelect(DB::raw('(SELECT nama_pasien FROM tb_pasien WHERE tb_pasien.id_pasien = tb_permohonan_lab.pasien) as nama_pasien'))
            ->paginate(10);

        $statusLabels = PermohonanLab::statusLabels();

        $statusKriteriaTB = PermohonanLab::statusKriteria();

        return view($this->menuActive . '.main', [
            'title' => $this->title,
            'menuActive' => $this->menuActive,
            'submnActive' => $this->submnActive,
            'permohonanLab' => $permohonanLab,
            'statusLabels' => $statusLabels,
            'statusKriteriaTB' => $statusKriteriaTB,

        ]);
    }

    public function create()
    {

        // Input Data

    }

    /**
     * @param string $id
     * @return Application|Factory|View
     */
    public function show(string $id)
    {
        $suspect = [
            'id' => $id,
            'name' => 'John Doe',
            'address' => 'Jakarta',
            'status' => 'Terduga',
        ];

        return view($this->menuActive . '.main'); // For demonstration
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        // Example delete logic (replace with actual database operations)
        return back()->with('message', "Suspect with ID {$id} deleted successfully");
    }
}
