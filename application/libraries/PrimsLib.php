<?php

class Primslib
{
    function notify($title, $message, $type, $icon)
    {
        $pesan = "$.notify({
            icon: 'flaticon-$icon',
            title: '$title',
            message: '$message',
        },{
            type: '$type',
            placement: {
                from: 'top',
                align: 'center'
            },
            time: 1000,
        });";
        return $pesan;
    }

    function sweetalert($message, $type)
    {
        $pesan = 'swal("' . $message . '", {
            icon: "' . $type . '",
            buttons : {
                confirm : {
                    className: "btn btn-success"
                }
            },
            delay : 1000
        });';
    }

    public function autonumber($id_terakhir, $panjang_kode, $panjang_angka)
    {

        // mengambil nilai kode ex: USR0015 hasil USR
        $kode = substr($id_terakhir, 0, $panjang_kode);

        // mengambil nilai angka
        // ex: USR0015 hasilnya 0015
        $angka = substr($id_terakhir, $panjang_kode, $panjang_angka);

        // menambahkan nilai angka dengan 1
        // kemudian memberikan string 0 agar panjang string angka menjadi 4
        // ex: angka baru = 6 maka ditambahkan strig 0 tiga kali
        // sehingga menjadi 0006
        $angka_baru = str_repeat("0", $panjang_angka - strlen($angka + 1)) . ($angka + 1);

        // menggabungkan kode dengan nilang angka baru
        $id_baru = $kode . $angka_baru;

        return $id_baru;
    }

    function month($month, $format = "mmmm")
    {
        if ($format == "mmmm") {
            $fm = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
        } elseif ($format == "mmm") {
            $fm = array("Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des");
        }
        return $fm[$month - 1];
    }

    function day($day, $format = "dddd")
    {
        if ($format == "dddd") {
            $fd = array("Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu", "Minggu");
        } elseif ($format == "ddd") {
            $fd = array("Sen", "Sel", "Rab", "Kam", "Jum", "Sab", "Min");
        }
        return $fd[$day - 1];
    }

    function selectforsidebar()
    {
        $ci = &get_instance();
        $ci->load->model('m_matkul');
        $arraysort = array();
        $nim = $ci->session->userdata('id');
        $kode_golongan = $ci->m_crud->edit(array('nim' => $nim), 'mahasiswa')->row()->kode_golongan;
        $today = new DateTime(date('Y-m-d H:i:s'));

        $select_presensi = $ci->m_crud->selectforarraysort('presensi', $kode_golongan, $nim);
        $presensi = $select_presensi->result_array();

        $select_tugas = $ci->m_crud->selectforarraysort('tugas', $kode_golongan, $nim);
        $tugas = $select_tugas->result_array();

        $select_quiz = $ci->m_crud->selectforarraysort('quiz', $kode_golongan, $nim);
        $quiz = $select_quiz->result_array();

        $select_materi = $ci->m_crud->selectforarraysort('materi', $kode_golongan, $nim);
        $materi = $select_materi->result_array();

        $select_matkul = $ci->m_matkul->getMatkulByProdi();
        for ($m = 0; $m < count($select_matkul); $m++) {
            $select_pertemuan = $ci->m_matkul->getPertemuanByMatkul($select_matkul[$m]['kode_mk']);
            for ($k = 0; $k < count($select_pertemuan); $k++) {
                // Validasi apakah bisa diakses pada pertemuan atau tidak
                if ($k > 0) {
                    $validasi_ptm = $ci->m_crud->edit(array('nim' => $nim, 'kode_pertemuan' => $select_pertemuan[$k - 1]['kode_pertemuan']), 'detail_pertemuan')->result_array();
                }

                if ($k > 0) {
                    if (count($validasi_ptm) > 0) {
                        $valid_ptm = "0";
                    } else {
                        $valid_ptm = "1";
                    }
                } else {
                    $valid_ptm = "0";
                }
                // End of validasi
                // var_dump($presensi);
                if ($select_presensi->num_rows() > 0) {
                    $batas_presensi = $select_presensi->num_rows() + count($arraysort);
                    $penanda_presensi = 0;
                    for ($i = 0; $i < count($presensi); $i++) {
                        $kode_pertemuan = $ci->m_crud->edit(array('kode_presensi' => $presensi[$i]['kode_presensi']), 'presensi')->row()->kode_pertemuan;
                        if ($select_pertemuan[$k]['kode_pertemuan'] == $kode_pertemuan) {
                            $arr = count($arraysort);
                            $arraysort[$arr]['pertemuan'] = $kode_pertemuan;
                            $arraysort[$arr]['kode'] = $presensi[$i]['kode_presensi'];
                            $arraysort[$arr]['link'] = 'mhs/presensi/detail';
                            $arraysort[$arr]['akhir'] = $presensi[$i]['akhir_presensi'];
                            $arraysort[$arr]['judul'] = $presensi[$i]['judul_presensi'];
                            $arraysort[$arr]['warna'] = 'success';
                            $arraysort[$arr]['icon'] = 'fa-clipboard-check';
                            $arraysort[$arr]['ptm'] = $valid_ptm;
                            $awal = new DateTime($presensi[$i]['mulai_presensi']);
                            if ($today > $awal) {
                                // var_dump($today);
                                // var_dump($awal);
                                // die;
                                $arraysort[$arr]['status'] = '1';
                            } else {
                                $arraysort[$arr]['status'] = '0';
                            }
                        }

                        $penanda_presensi++;
                    }
                }


                if ($select_tugas->num_rows() > 0) {
                    $batas_tugas = $select_tugas->num_rows() + count($arraysort);
                    $penanda_tugas = 0;
                    for ($i = 0; $i < count($tugas); $i++) {
                        $kode_pertemuan = $ci->m_crud->edit(array('kode_tugas' => $tugas[$i]['kode_tugas']), 'tugas')->row()->kode_pertemuan;
                        if ($select_pertemuan[$k]['kode_pertemuan'] == $kode_pertemuan) {
                            $arr = count($arraysort);
                            $arraysort[$arr]['pertemuan'] = $kode_pertemuan;
                            $arraysort[$arr]['kode'] = $tugas[$i]['kode_tugas'];
                            $arraysort[$arr]['link'] = 'mhs/tugas/detail';
                            $arraysort[$arr]['akhir'] = $tugas[$i]['akhir_tugas'];
                            $arraysort[$arr]['judul'] = $tugas[$i]['judul_tugas'];
                            $arraysort[$arr]['warna'] = 'info';
                            $arraysort[$arr]['icon'] = 'fa-file-word';
                            $arraysort[$arr]['ptm'] = $valid_ptm;
                            $awal = new DateTime($tugas[$i]['mulai_tugas']);
                            if ($today > $awal) {
                                $arraysort[$arr]['status'] = '1';
                            } else {
                                $arraysort[$arr]['status'] = '0';
                            }

                            // echo $select_matkul[$m]['kode_mk'] . ' - ' . $select_pertemuan[$k]['kode_pertemuan'] . ' - ' . $tugas[$penanda_tugas]['kode_tugas'] . 
                            // ' - ' . $kode_pertemuan . ' - ' . $tugas[$penanda_tugas]['judul_tugas'] .'<br>';
                        }

                        $penanda_tugas++;
                    }
                }


                if ($select_quiz->num_rows() > 0) {
                    $batas_quiz = $select_quiz->num_rows() + count($arraysort);
                    $penanda_quiz = 0;
                    for ($i = 0; $i < count($quiz); $i++) {
                        $kode_pertemuan = $ci->m_crud->edit(array('kode_quiz' => $quiz[$i]['kode_quiz']), 'quiz')->row()->kode_pertemuan;
                        if ($select_pertemuan[$k]['kode_pertemuan'] == $kode_pertemuan) {
                            $arr = count($arraysort);
                            $arraysort[$arr]['pertemuan'] = $kode_pertemuan;
                            $arraysort[$arr]['kode'] = $quiz[$i]['kode_quiz'];
                            $arraysort[$arr]['link'] = 'mhs/quiz/detail';
                            $arraysort[$arr]['akhir'] = $quiz[$i]['akhir_quiz'];
                            $arraysort[$arr]['judul'] = $quiz[$i]['judul_quiz'];
                            $arraysort[$arr]['warna'] = 'secondary';
                            $arraysort[$arr]['icon'] = 'fa-tasks';
                            $arraysort[$arr]['ptm'] = $valid_ptm;
                            $awal = new DateTime($quiz[$i]['mulai_quiz']);
                            if ($today > $awal) {
                                $arraysort[$arr]['status'] = '1';
                            } else {
                                $arraysort[$arr]['status'] = '0';
                            }
                        }

                        $penanda_quiz++;
                    }
                }

                if ($select_materi->num_rows() > 0) {
                    $batas_materi = $select_materi->num_rows() + count($arraysort);
                    $penanda_materi = 0;
                    for ($i = 0; $i < count($materi); $i++) {
                        $kode_pertemuan = $ci->m_crud->edit(array('kode_materi' => $materi[$i]['kode_materi']), 'materi')->row()->kode_pertemuan;
                        if ($select_pertemuan[$k]['kode_pertemuan'] == $kode_pertemuan) {
                            $arr = count($arraysort);
                            $arraysort[$arr]['pertemuan'] = $kode_pertemuan;
                            $arraysort[$arr]['kode'] = $materi[$i]['kode_materi'];
                            $arraysort[$arr]['link'] = 'mhs/materi/detail';
                            $arraysort[$arr]['akhir'] = $materi[$i]['akhir_materi'];
                            $arraysort[$arr]['judul'] = $materi[$i]['judul_materi'];
                            $arraysort[$arr]['warna'] = 'danger';
                            $arraysort[$arr]['icon'] = 'fa-file-pdf';
                            $arraysort[$arr]['ptm'] = $valid_ptm;
                            $awal = new DateTime($materi[$i]['mulai_materi']);
                            if ($today > $awal) {
                                $arraysort[$arr]['status'] = '1';
                            } else {
                                $arraysort[$arr]['status'] = '0';
                            }
                        }

                        $penanda_materi++;
                    }
                }
            }
        }

        usort($arraysort, function ($element1, $element2) {
            $datetime1 = strtotime($element1['akhir']);
            $datetime2 = strtotime($element2['akhir']);
            return $datetime1 - $datetime2;
        });
        // print_r($arraysort);

        // for($j=0; $j < count($arraysort); $j++){
        //     echo $arraysort[$j]['pertemuan'] . ' - ' . $arraysort[$j]['kode'] . ' - ' . $arraysort[$j]['link'] . ' - ' . $arraysort[$j]['judul'] . ' - ' . $arraysort[$j]['akhir'] . ' - ' . $arraysort[$j]['ptm'] .'<br>';
        // }

        // print_r($select_matkul);

        return $arraysort;
    }

    function selectvalidasisidebar()
    {
        $ci = &get_instance();
        $arrayvalidasi = array();
        $nim = $ci->session->userdata('id');
        $select_detpresensi = $ci->m_crud->edit(array('nim' => $nim), 'detail_presensi');
        $det_presensi = $select_detpresensi->result_array();

        if ($select_detpresensi->num_rows() > 0) {
            $batas_detpresensi = $select_detpresensi->num_rows() + count($arrayvalidasi);
            $penanda_detpresensi = 0;
            for ($i = count($arrayvalidasi); $i < $batas_detpresensi; $i++) {
                $arrayvalidasi[$i]['kode'] = $det_presensi[$penanda_detpresensi]['kode_presensi'];
                $penanda_detpresensi++;
            }
        }

        $select_dettugas = $ci->m_crud->edit(array('nim' => $nim), 'detail_tugas');
        $det_tugas = $select_dettugas->result_array();

        if ($select_dettugas->num_rows() > 0) {
            $batas_dettugas = $select_dettugas->num_rows() + count($arrayvalidasi);
            $penanda_dettugas = 0;
            for ($i = count($arrayvalidasi); $i < $batas_dettugas; $i++) {
                $arrayvalidasi[$i]['kode'] = $det_tugas[$penanda_dettugas]['kode_tugas'];
                $penanda_dettugas++;
            }
        }

        $select_detmateri = $ci->m_crud->edit(array('nim' => $nim), 'detail_materi');
        $det_materi = $select_detmateri->result_array();

        if ($select_detmateri->num_rows() > 0) {
            $batas_detmateri = $select_detmateri->num_rows() + count($arrayvalidasi);
            $penanda_detmateri = 0;
            for ($i = count($arrayvalidasi); $i < $batas_detmateri; $i++) {
                $arrayvalidasi[$i]['kode'] = $det_materi[$penanda_detmateri]['kode_materi'];
                $penanda_detmateri++;
            }
        }

        $select_detquiz = $ci->m_crud->edit(array('nim' => $nim), 'attempt_quiz');
        $det_quiz = $select_detquiz->result_array();

        if ($select_detquiz->num_rows() > 0) {
            $batas_detquiz = $select_detquiz->num_rows() + count($arrayvalidasi);
            $penanda_detquiz = 0;
            for ($i = count($arrayvalidasi); $i < $batas_detquiz; $i++) {
                $arrayvalidasi[$i]['kode'] = $det_quiz[$penanda_detquiz]['kode_quiz'];
                $penanda_detquiz++;
            }
        }

        return $arrayvalidasi;
    }

    function upload_file($file, $name, $format, $size)
    {
        $ci = &get_instance();
        if ($name != '') {
            $config['upload_path'] = './assets/files/' . $file;
            $config['allowed_types'] = $format;
            $config['max_size'] = $size;
            // $config['max_width']  = '2048';
            // $config['max_height']  = '2048';
            $config['encrypt_name'] = TRUE;

            $ci->load->library('upload', $config);

            if (!$ci->upload->do_upload($file)) {
                $error = array(
                    'error' => $ci->upload->display_errors(),
                    'promo' => $ci->model_promo->getAll('promo')->result(),
                    'custom' => $ci->lang->line('Pengunggahan file' . $file . 'Gagal!')
                );
                echo $ci->load->view('admin/templates/header', array(), TRUE);
                echo $ci->load->view('admin/templates/sidebar', array(), TRUE);
                echo $ci->load->view('admin/promo/index', $error, TRUE);
                echo $ci->load->view('admin/templates/footer', array(), TRUE);
                exit;
            } else {
                return $file = $ci->upload->data('file_name');
            }
        }
    }

    function upload_image($file, $name, $format, $size)
    {
        $ci = &get_instance();
        if ($name != '') {
            $config['upload_path'] = './assets/images/produk/';
            $config['allowed_types'] = $format;
            $config['max_size'] = $size;
            // $config['max_width']  = '2048';
            // $config['max_height']  = '2048';
            // $config['encrypt_name'] = TRUE;

            $ci->load->library('upload', $config);

            if (!$ci->upload->do_upload($file)) {
                $error = array(
                    'error' => $ci->upload->display_errors(),
                    'paket' => $ci->m_data_paket->getAll('paket')->result(),
                    'custom' => $ci->lang->line('Pengunggahan file' . $file . 'Gagal!')
                );
                var_dump($error);
                die;
                exit;
            } else {
                return $file = $ci->upload->data('file_name');
            }
        }
    }
    
    function upload_image_paket($file, $name, $format, $size)
    {
        $ci = &get_instance();
        if ($name != '') {
            $config['upload_path'] = './assets/images/paket/';
            $config['allowed_types'] = $format;
            $config['max_size'] = $size;
            // $config['max_width']  = '2048';
            // $config['max_height']  = '2048';
            // $config['encrypt_name'] = TRUE;

            $ci->load->library('upload', $config);

            if (!$ci->upload->do_upload($file)) {
                $error = array(
                    'error' => $ci->upload->display_errors(),
                    'paket' => $ci->m_data_paket->getAll('paket')->result(),
                    'custom' => $ci->lang->line('Pengunggahan file' . $file . 'Gagal!')
                );
                var_dump($error);
                die;
                exit;
            } else {
                return $file = $ci->upload->data('file_name');
            }
        }
    }
}
