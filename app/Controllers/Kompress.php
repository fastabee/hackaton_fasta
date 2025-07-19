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
use PhpOffice\PhpSpreadsheet\Calculation\MathTrig\Random;
use App\Models\ModelKompress;

class Kompress  extends BaseController
{
    protected $ModelHalte;
    protected $RuteModel;
    protected $KompressModel;


    public function __construct()
    {
        $this->ModelHalte = new ModelHalte();
        $this->RuteModel = new ModelRute();
        $this->KompressModel = new ModelKompress();
    }

    public function index()
    {
        $data = array(
            'body' => 'kompress',

        );
        return view('template', $data);
    }


    public function insert()
    {
        date_default_timezone_set('Asia/Jakarta');

        $original_name = $this->request->getPost('original_name');
        $original_size = $this->request->getPost('original_size');
        $original_file = $this->request->getFile('original_image');

        $compressed_name = $this->request->getPost('compressed_name');
        $compressed_size = $this->request->getPost('compressed_size');
        $compressed_file = $this->request->getFile('compressed_file');

        if ($compressed_file && $compressed_file->isValid() && !$compressed_file->hasMoved()) {
            $compressed_name_file = $compressed_file->getName();
            $compressed_file->move(ROOTPATH . 'public/foto_kompress', $compressed_name_file);
        }

        if ($original_file && $original_file->isValid() && !$original_file->hasMoved()) {
            $original_name_file = $original_file->getName();
            $original_file->move(ROOTPATH . 'public/foto_kompress', $original_name_file);
        }

        $kode_gambar = 'gambar' .  $original_size . date('YMDHIS');
        $data = array(
            'kodegambar' => $kode_gambar,
            'nama_gambar' => $original_name,
            'ukuran' => $original_size,
            'status' => 0
        );

        $data2 = array(
            'kodegambar' => $kode_gambar,
            'nama_gambar' => $compressed_name,
            'ukuran' => $compressed_size,
            'status' => 1
        );

        $this->KompressModel->insert($data);
        $this->KompressModel->insert($data2);
        session()->setFlashdata('sukses', 'Berhasil tambahkan Data');
        return redirect()->to('kompress/images');
    }

    public function riwayat()
    {
        $data = array(
            'kompress' => $this->KompressModel->getKompress(),
            'body' => 'riwayat_kompress'
        );
        return view('template', $data);
    }
}
