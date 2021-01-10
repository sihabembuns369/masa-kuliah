<?php
defined('BASEPATH') or exit('No direct script access allowed');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

class Api extends CI_Controller
{
        function _construct()
        {
                parent::__construct();
        }

        public function get_buku()
        {
                $data = $this->M_api->mget_buku();
                // $this->load->view('welcome_message');
                echo json_encode($data);
        }

        public function login()
        {
                $x = $_REQUEST['x'];
                $z = $_REQUEST['z'];

                $data = $this->M_api->login($x, $z);
                if (is_array($data)) {
                        if (count($data) > 0) {
                                foreach ($data as $k) {
                                        $nama = $k->nama;
                                }
                                echo ("1|$nama");
                        } else {
                                echo ("0|akun tidak di temukan");
                        }
                } else {
                        echo ("0|akun tidak di temukan");
                }
        }

        public function bukuJSON()
        {
                $dtJSON = '{"data": [xxx]}';
                $dtisi = "";
                $data = $this->M_api->bukuJSON();
                // $this->load->view('welcome_message');
                foreach ($data as $k) {
                        $kode = $k->Kode_Buku;
                        $judul = $k->Judul;
                        $isbn = $k->ISBN;
                        $tt = $k->Tahun_Terbit;
                        $rak = $k->Rak;
                        $nmp = $k->Nama_Pengarang;
                        $nmr = $k->Nama_Penerbit;

                        $tomboledit = "<button type='button' class='btn btn-warning btn-sm' data-toggle='modal' data-target='.bs-example-modal-lg' data-kode='" . $kode . "' onclick='edit(this)'><i class='mdi mdi-lead-pencil'></i></button><button type='button' class='btn btn-danger btn-sm' onclick='hapus(" . $kode . ");'><i class='mdi mdi-delete' ></i></button>";

                        $dtisi .= '["' . $kode . '","' . $judul . '","' . $nmp . '","' . $nmr . '","' . $isbn . '","' . $tt . '","' . $rak . '","' . $tomboledit . '"],';
                }
                $dtisifix = rtrim($dtisi, ",");
                $data = str_replace("xxx", $dtisifix, $dtJSON);
                echo $data;
        }

        public function pengarangJSON()
        {
                $data = $this->M_api->mpengarangJSON();
                echo json_encode($data);
        }
        public function penerbitJSON()
        {
                $data = $this->M_api->mpenerbitJSON();
                echo json_encode($data);
        }
        public function tambahbuku()
        {
                $kode = $this->input->post("kd");
                $judul = $this->input->post("jd");
                $pengarang = $this->input->post("png");
                $penerbit = $this->input->post("pnr");
                $isbn = $this->input->post("isbn");
                $tahun = $this->input->post("th");
                $rak = $this->input->post("rak");

                $operasi = $this->M_api->minputbuku($kode, $judul, $pengarang, $penerbit, $isbn, $tahun, $rak);
                echo $operasi;

                // $data = [
                //         'id_users' => '1', //untuk id user login
                //         'id_daftar_skill' => $kode,
                //         'presentase' => $kode
                //     ];

                //     if ($this->Model_sihab->tambah_skil($data) == 1) {
                //         redirect('index.php/Sihab?ket=sukses');
                //     } else {
                //         redirect('index.php/Sihab?ket=eror');
                //     }

        }
        public function hapusbuku()
        {
                $kode = $this->input->post("kode2");
                // w
                $operasi = $this->M_api->mhapusbuku($kode);
                echo $operasi;

                // $data = [
                //         'id_users' => '1', //untuk id user login
                //         'id_daftar_skill' => $kode,
                //         'presentase' => $kode
                //     ];

                //     if ($this->Model_sihab->tambah_skil($data) == 1) {
                //         redirect('index.php/Sihab?ket=sukses');
                //     } else {
                //         redirect('index.php/Sihab?ket=eror');
                //     }

        }

        public function updatedata()
        {
                $kode = $this->input->post("kd");
                $judul = $this->input->post("jd");
                $pengarang = $this->input->post("png");
                $penerbit = $this->input->post("pnr");
                $isbn = $this->input->post("isbn");
                $tahun = $this->input->post("th");
                $rak = $this->input->post("rak");

                $operasi = $this->M_api->mupdatedata($kode, $judul, $pengarang, $penerbit, $isbn, $tahun, $rak);
                echo $operasi;
        }

        function filterbuku()
        {
                $kode = $this->input->post("kd");
                $dt = $this->M_api->mfilterbuku($kode);
                $dtkirim = "";
                if (is_array($dt)) {
                        foreach ($dt as $x) {
                                $dtkirim = "1|" . $x->Judul . "|" . $x->ID_Pengarang . "|" . $x->ID_Penerbit . "|" . $x->ISBN . "|" . $x->Tahun_Terbit . "|" . $x->Rak;
                        }
                } else {
                        $dtkirim = "0|";
                }
                echo $dtkirim;
        }
}
