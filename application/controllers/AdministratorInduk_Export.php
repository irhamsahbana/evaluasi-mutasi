<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

class AdministratorInduk_Export extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Makassar');

        if ($this->session->userdata('status') != 'login') {
            redirect('Login');
        }

        if ($this->session->userdata('role') != 'admin_induk') {

            if ($this->session->userdata('role') == 'admin_unit'){
                redirect('AdministratorUnit');
            }
            if ($this->session->userdata('role') == 'approval_committee') {
                redirect('ApprovalCommittee');
            }

        } else {
            $this->load->library(array('PHPExcel', 'PHPExcel/IOFactory', 'PHPExcel/Writer/Excel2007'));
        }
    }

    public function doExportToExcel($id_usulan)
    {
        $where = array('id_usulan' => $id_usulan);

        $data_usulan_pegawai['usulan_pegawai'] = $this->Crud->gw('tb_usulan_evaluasi_pegawai', $where);
        $data['surat'] = $this->Crud->gw('tb_usulan_evaluasi', $where);
        $data['approval'] = $this->M_AdministratorInduk->rincianApprovalUsulan($where);

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        //Styling Begin
            $spreadsheet->getActiveSheet()->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
            $spreadsheet->getActiveSheet()->getPageSetup()->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A4);
            $spreadsheet->getDefaultStyle()->getFont()->setName('Arial');
            $spreadsheet->getDefaultStyle()->getFont()->setSize(10);

            $sheet->getStyle('B1')->getFont()->setSize(8);
            $sheet->getStyle('B2')->getFont()->setSize(8);
            $sheet->getStyle('J7')->getFont()->setSize(8);
            $sheet->mergeCells('A4:K4');
            $sheet->mergeCells('A5:K5');

            //Header Begin
                $sheet->getStyle('A4:A5')->getFont()->setSize(11)->setBold(true);
                $sheet->getStyle('A4:A5')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $sheet->getStyle('A4:A5')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);


                $sheet->getStyle('A7:K9')->getFont()->setBold(true);
                $sheet->getStyle('A7:K9')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $sheet->getStyle('A7:K9')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

                $sheet->mergeCells('A7:A9');
                $sheet->mergeCells('B7:B9');
                $sheet->mergeCells('C7:C9');
                $sheet->mergeCells('D7:D9');
                $sheet->mergeCells('E7:E9');

                $sheet->mergeCells('F7:H7');

                $sheet->mergeCells('F8:F9');
                $sheet->mergeCells('G8:G9');
                $sheet->mergeCells('H8:H9');

                $sheet->mergeCells('I7:I9');
                $sheet->mergeCells('J7:J9');
                $sheet->mergeCells('K7:K9');

                //column's width Begin
                $sheet->getColumnDimension('A')->setWidth(3.5);
                $sheet->getColumnDimension('B')->setWidth(24);
                $sheet->getColumnDimension('C')->setWidth(46);
                $sheet->getColumnDimension('D')->setWidth(11);
                $sheet->getColumnDimension('E')->setWidth(13.5);
                $sheet->getColumnDimension('F')->setWidth(5);
                $sheet->getColumnDimension('G')->setWidth(5);
                $sheet->getColumnDimension('H')->setWidth(5);
                $sheet->getColumnDimension('I')->setWidth(46);
                $sheet->getColumnDimension('J')->setWidth(7.5);
                $sheet->getColumnDimension('K')->setWidth(18);
                //column's width End

                //Header Title Wrap Text Begin
                $sheet->getStyle('D7')->getAlignment()->setWrapText(true);
                $sheet->getStyle('E7')->getAlignment()->setWrapText(true);
                $sheet->getStyle('J7')->getAlignment()->setWrapText(true);

                $sheet->getStyle('F8')->getAlignment()->setWrapText(true);
                $sheet->getStyle('G8')->getAlignment()->setWrapText(true);
                $sheet->getStyle('H8')->getAlignment()->setWrapText(true);
                //Header Title Wrap Text End

                //Border Header Begin
                $styleArray = [
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        ],
                    ],
                ];

                $sheet->getStyle('A7:K9')->applyFromArray($styleArray);
                //Border Header Begin
            //Header End
        //Styling End

        //Header Begin
            $sheet->setCellValue('B1', 'PT PLN (PERSERO)');
            $sheet->setCellValue('B2', 'WILAYAH SULSELRABAR');
            $sheet->setCellValue('A4', 'LEMBAR EVALUASI MUTASI PEGAWAI');

            foreach($data['surat'] as $no_surat){
                $sheet->setCellValue('A5', 'Nomor : '.$no_surat->no_surat);
            }

            $sheet->setCellValue('A7', 'No');
            $sheet->setCellValue('B7', 'Nama / No.Induk');
            $sheet->setCellValue('C7', 'Sebutan Jabatan / Kelas Unit');
            $sheet->setCellValue('D7', 'Grade / Sejak');
            $sheet->setCellValue('E7', 'Pendidikan Terakhir');

            $sheet->setCellValue('F7', 'Nilai Talenta');
            foreach($data['surat'] as $h){
                $sheet->setCellValue('F8', $h->tahun_1.' ('.$h->semester_1.')');
                $sheet->setCellValue('G8', $h->tahun_2.' ('.$h->semester_2.')');
                $sheet->setCellValue('H8', $h->tahun_3.' ('.$h->semester_3.')');
            }
            $sheet->setCellValue('I7', 'Jabatan Baru / Kelas Unit');
            $sheet->setCellValue('J7', 'Lama di jabatan Terakhir');
            $sheet->setCellValue('K7', 'Ket.');
        //Header End

        //Content Begin
            $no = 1;
            $baris = 10;
            foreach($data_usulan_pegawai['usulan_pegawai'] as $p){
                $baris_bawah = $baris+1;

                $sheet->setCellValue('A'.$baris, $no++);
                $sheet->setCellValue('B'.$baris, $p->nama_usulan);
                $sheet->setCellValue('B'.$baris_bawah, $p->nip_usulan);
                $sheet->setCellValue('C'.$baris, $p->jabatan_skg);
                $sheet->setCellValue('D'.$baris, $p->grade_skg);
                $sheet->setCellValue('D'.$baris_bawah, $p->tgl_grade_skg);
                $sheet->setCellValue('E'.$baris, $p->pendidikan_terakhir);
                $sheet->setCellValue('F'.$baris, $p->n_talenta_1);
                $sheet->setCellValue('G'.$baris, $p->n_talenta_2);
                $sheet->setCellValue('H'.$baris, $p->n_talenta_3);
                $sheet->setCellValue('I'.$baris, $p->jabatan_usulan);
                $sheet->setCellValue('J'.$baris, $p->lama_jabatan_skg);
                $sheet->setCellValue('K'.$baris, $p->keterangan);

                $sheet->mergeCells('A'.$baris.':A'.$baris_bawah);
                $sheet->mergeCells('C'.$baris.':C'.$baris_bawah);
                $sheet->mergeCells('E'.$baris.':E'.$baris_bawah);
                $sheet->mergeCells('F'.$baris.':F'.$baris_bawah);
                $sheet->mergeCells('G'.$baris.':G'.$baris_bawah);
                $sheet->mergeCells('H'.$baris.':H'.$baris_bawah);
                $sheet->mergeCells('I'.$baris.':I'.$baris_bawah);
                $sheet->mergeCells('J'.$baris.':J'.$baris_bawah);
                $sheet->mergeCells('K'.$baris.':K'.$baris_bawah);

                $sheet->getRowDimension($baris_bawah)->setRowHeight(138);
                $sheet->getStyle('B'.$baris)->getAlignment()->setWrapText(true);
                $sheet->getStyle('C'.$baris)->getAlignment()->setWrapText(true);
                $sheet->getStyle('I'.$baris)->getAlignment()->setWrapText(true);
                $sheet->getStyle('J'.$baris)->getAlignment()->setWrapText(true);

                $sheet->getStyle('A'.$baris.':K'.$baris_bawah)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP);
                $sheet->getStyle('A'.$baris)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $sheet->getStyle('D'.$baris.':H'.$baris)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $sheet->getStyle('J'.$baris)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

                //Border Content Begin
                $styleArray = [
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        ],
                    ],
                ];

                $sheet->getStyle('A'.$baris.':K'.$baris_bawah)->applyFromArray($styleArray);
                //Border Content End
                $baris += 2;
            }
        //Content End

        $baris_wkt = $baris+1;
        $baris_tim = $baris+2;
        $baris_apr = $baris+4;
        foreach($data['surat'] as $ket){
            $sheet->setCellValue('A'.$baris_wkt, $ket->lokasi_surat.', '.date_indo($ket->tgl_surat));
            $sheet->setCellValue('A'.$baris_tim, $ket->tim_approval);
        }

        $no_apr = 1;
        foreach($data['approval'] as $apr){
            $titik_ttd = $baris_apr+4;
            $sheet->setCellValue('A'.$baris_apr, $no_apr.'. '.$apr->nama_pegawai.' ('.$apr->posisi.')');
            $sheet->setCellValue('A'.$titik_ttd, '..............................................');
            $no_apr++;
            $baris_apr += 6;
        }


        $filename = 'Lembar_Evaluasi_Mutasi_-_';
        
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
        header('Cache-Control: max-age=0');

        ob_end_clean();
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
        die;
    }
}