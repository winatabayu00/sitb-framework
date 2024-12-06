<?php

namespace App\Mediator\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mediator\Models\TerdugaTB;
use Illuminate\Http\Request;

class TerdugaTBController extends Controller
{
    private $title = "Data Terduga TB";
    private $menuActive = "tb_terduga";
    private $submnActive = "";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // get Data.
        $suspects = TerdugaTB::with('pasien')->paginate(10);

        $statusLabels = [
            1 => 'Baru',
            2 => 'Kambuh',
            3 => 'Diobati setelah gagal kategori 1',
            4 => 'Diobati setelah gagal kategori 2',
            5 => 'Diobati setelah putus berobat',
            6 => 'Diobati setelah gagal pengobatan lini 2',
            7 => 'Pernah diobati tidak diketahui hasilnya',
            8 => 'Tidak diketahui',
            9 => 'Lain-lain',
            10 => 'Diobati setelah gagal',
        ];


        $statusKriteriaTB = [
            1 => 'TB SO',
            2 => 'TB RO',
        ];


        return view('pages.terduga-tb.main', [
            'title' => $this->title,
            'menuActive' => $this->menuActive,
            'submnActive' => $this->submnActive,
            'suspects' => $suspects,
            'statusLabels' => $statusLabels,
            'statusKriteriaTB' => $statusKriteriaTB,

        ]);
    }


    public function create(){

        // Input Data
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Example data (replace with a query to fetch data from the database)
        $suspect = [
            'id' => $id,
            'name' => 'John Doe',
            'address' => 'Jakarta',
            'status' => 'Terduga',
        ];

        return response()->json($suspect); // For demonstration
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Example delete logic (replace with actual database operations)
        return response()->json(['message' => "Suspect with ID $id deleted successfully"]);
    }
}
