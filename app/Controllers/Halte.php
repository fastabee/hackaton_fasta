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

class Halte extends BaseController
{
    protected $ModelHalte;


    public function __construct()
    {
        $this->ModelHalte = new ModelHalte();
    }

    public function index()
    {

        $data = array(
            'body' => 'datamaster/halte',
            'halte' => $this->ModelHalte->getHalte()
        );

        return view('template', $data);
    }

    public function insert()
    {
        $nama_halte = $this->request->getPost('nama_halte');
        $latitude = $this->request->getPost('latitude');
        $longtitude = $this->request->getPost('longtitude');

        $data = array(
            'nama_halte' => $nama_halte,
            'latitude' => $latitude,
            'longtitude' => $longtitude
        );
        $this->ModelHalte->insertHalte($data);
        session()->setFlashData('sukses', 'Berhasil Input Data');
        return redirect()->to(base_url('datamaster/halte'));
    }


    public function update()
    {

        $idnya = $this->request->getPost('idnya');
        $nama_halte = $this->request->getPost('nama_halte');
        $latitude = $this->request->getPost('latitude');
        $longtitude = $this->request->getPost('longtitude');

        $data = array(
            'nama_halte' => $nama_halte,
            'latitude' => $latitude,
            'longtitude' => $longtitude
        );
        $this->ModelHalte->update($idnya, $data);
        session()->setFlashData('sukses', 'Berhasil Input Data');
        return redirect()->to(base_url('datamaster/halte'));
    }

    public function delete()
    {
        $idnya = $this->request->getPost('idnya');
        $data = array(
            'deleted' => 1
        );
        $this->ModelHalte->update($idnya, $data);
        session()->setFlashData('sukses', 'Berhasil Input Data');
        return redirect()->to(base_url('datamaster/halte'));
    }

    public function import()
    {
        $file = $this->request->getFile('file');


        $spreadsheet = IOFactory::load($file->getPathname());
        $sheet = $spreadsheet->getActiveSheet();
        $rows = $sheet->toArray();


        $db = Database::connect();


        for ($i = 1; $i < count($rows); $i++) {
            $nama_halte = addslashes($rows[$i][0]);
            $latitude = addslashes($rows[$i][1]);
            $longtitude = addslashes($rows[$i][2]);



            $sql = "INSERT INTO halte (nama_halte, latitude, longtitude) 
                    VALUES ('$nama_halte', '$latitude', '$longtitude')";

            $db->query($sql);
        }

        session()->setFlashdata('sukses', 'Data Berhasil Di Simpan');
        return redirect()->to(base_url('datamaster/halte'));
    }
}
