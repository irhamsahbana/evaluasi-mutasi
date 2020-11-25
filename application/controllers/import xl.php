public function doImportTalentaPegawai()
    {
        $this->load->library(array('PHPExcel', 'PHPExcel/IOFactory'));

        $fileName = $_FILES['file_nilai_talenta_pegawai']['name'];

        $config['upload_path'] = './assets/user/administrator_induk';
        $config['file_name'] = $fileName;
        $config['allowed_types'] = 'xls|xlsx|csv|ods|ots';
        $config['max_size'] = 10000;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('file_nilai_talenta_pegawai')) {
            $this->session->set_flashdata('alert_danger', 'File nilai talenta pegawai gagal diimpor!');
            redirect('AdministratorInduk/tampilanDaftarTalenta');
        } else {
            $media = $this->upload->data();
            $inputFileName = './assets/user/administrator_induk/' . $media['file_name'];

            try {
                $inputFileType = IOFactory::identify($inputFileName);
                $objReader = IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($inputFileName);
            } catch (Exception $e) {
                die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME) . '": ' . $e->getMessage());
            }

            $sheet = $objPHPExcel->getSheet(0);
            $highestRow = $sheet->getHighestRow();
            $highestColumn = $sheet->getHighestColumn();

            for ($row = 2; $row <= $highestRow; $row++) {
                $rowData = $sheet->rangeToArray(
                    'A' . $row . ':' . $highestColumn . $row,
                    NULL,
                    TRUE,
                    FALSE
                );

                $pegawai_tidak_ada = 0;
                $cell_kosong = 0;
                $nilai_ada = 0;

                $nip                = trim($rowData[0][0]);
                $tahun_talenta      = trim($rowData[0][1]);
                $semester_talenta   = trim($rowData[0][2]);
                $nilai_talenta      = trim($rowData[0][3]);
                $cek_pegawai = $this->db->query("SELECT nip FROM tb_pegawai WHERE nip = '$nip'");
                $cek_talenta = $this->db->query("SELECT nip FROM tb_nilai_talenta_pegawai WHERE nip = '$nip' AND tahun_talenta = '$tahun_talenta' AND semester_talenta = '$semester_talenta'");

                if ((!empty($nip)) && (!empty($tahun_talenta)) && (!empty($semester_talenta)) && (!empty($nilai_talenta)) ){
                    if($cek_pegawai->num_rows() == 0) { 
                        $pegawai_tidak_ada++;
                    } else {
                        if($cek_talenta->num_rows() > 0){
                            $nilai_ada++;
                        } else {
                            $data = array(
                                "nip"                   => trim($rowData[0][0]),
                                "tahun_talenta"         => trim($rowData[0][1]),
                                "semester_talenta"      => trim($rowData[0][2]),
                                "nilai_talenta"         => trim($rowData[0][3]),
                            );
                            $this->db->insert("tb_nilai_talenta_pegawai", $data);
                        }
                    }
                } else {
                    $cell_kosong++;
                }
            }
            $fileName_ = str_replace(" ", "_", $fileName);
            unlink('./assets/user/administrator_induk/' . $fileName_);
            unlink('./assets/user/administrator_induk/' . $fileName);
            $this->session->set_flashdata('alert_success', 'Nilai talenta pegawai berhasil diimpor!'.' ('. 'Cell kosong = '.$cell_kosong.', pegawai tidak ada di database = '.$pegawai_tidak_ada.', nilai talenta telah ada = '.$nilai_ada.')');

            $baris = 2;
            $barisData = $sheet->rangeToArray('A' . $baris . ':' . $highestColumn . $baris, NULL, TRUE, FALSE);
            $urisTahun = $barisData[0][1];
            $urisSemester = $barisData[0][2];
            redirect('AdministratorInduk/tampilanNilaiTalentaPegawai/' . $urisTahun . '/' . $urisSemester);
        }
    }