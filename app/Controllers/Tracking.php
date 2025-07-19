<?php

namespace App\Controllers;

use Mpdf\Mpdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use Config\Database;
use App\Models\ModelHalte;
use App\Models\ModelRute;

class Tracking  extends BaseController
{
    protected $ModelHalte;
    protected $RuteModel;


    public function __construct()
    {
        $this->ModelHalte = new ModelHalte();
        $this->RuteModel = new ModelRute();
    }

    public function index()
    {
        $data = array(
            'body' => 'tracking',
            'halte' => $this->ModelHalte->getHalte(),
        );
        return view('template', $data);
    }

    public function trackingRute()
    {
        $halte1 = $this->request->getPost('halte_id');
        $halte2 = $this->request->getPost('halte_id2');

        $modelRute = new \App\Models\ModelRute();
        $modelHalte = new \App\Models\ModelHalte();


        $ruteGabung = $modelRute->getJoinedHalteRute();

        $jalur = array_column($ruteGabung, 'id');

        $pos1 = array_search($halte1, $jalur);
        $pos2 = array_search($halte2, $jalur);

        $hasil_rute = [];

        if ($pos1 !== false && $pos2 !== false) {
            if ($pos1 <= $pos2) {
                $subset = array_slice($ruteGabung, $pos1, $pos2 - $pos1 + 1);
            } else {
                $subset = array_reverse(array_slice($ruteGabung, $pos2, $pos1 - $pos2 + 1));
            }

            $hasil_rute = $subset;
        }

        return view('template', [
            'body' => 'tracking',
            'halte' => $modelHalte->findAll(),
            'hasil_rute' => $hasil_rute
        ]);
    }
}
