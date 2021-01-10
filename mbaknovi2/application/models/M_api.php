<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_api extends CI_Model {
       
	
	// public function mget_buku()
	// {
    //     $sql = "SELECT * FROM buku ";
    //     $querySQL = $this->db->query($sql);
    //     if($querySQL){
    //         return $querySQL->result();
    //     }else{
    //         return 0;
    //     }
    // }
    
    public function login($x,$z)
	{
        $sql = "SELECT * FROM login WHERE username = '$x' AND password = '$z' ";
        $querySQL = $this->db->query($sql);
        if($querySQL){
            return $querySQL->result();
        }else{
            return 0;
        }
    }
    public function bukuJSON()
	{
        $sql = "SELECT * FROM buku_view ";
        $querySQL = $this->db->query($sql);
        if($querySQL){
            return $querySQL->result();
        }else{
            return 0;
        }
    }

    public function mpengarangJSON()
	{
        $sql = "SELECT * FROM pengarang ";
        $querySQL = $this->db->query($sql);
        if($querySQL){
            return $querySQL->result();
        }else{
            return 0;
        }
    }

    public function mpenerbitJSON()
	{
        $sql = "SELECT * FROM penerbit ";
        $querySQL = $this->db->query($sql);
        if($querySQL){
            return $querySQL->result() ;
        }else{
            return 0;
        }
    }

    public function minputbuku($kode, $judul, $pengarang, $penerbit,$isbn,$tahun,$rak)
	{
        $sql = "INSERT INTO  buku VALUES('$kode', '$judul', '$pengarang', '$penerbit' , '$isbn' , '$tahun' , '$rak') ";
        $querySQL = $this->db->query($sql);
        if($querySQL){
            return 1;
        }else{
            return 0;
        }
    }
    
    public function mhapusbuku($kode)
	{
        $sql = "DELETE FROM  buku WHERE Kode_Buku='$kode' ";
        $querySQL = $this->db->query($sql);
        if($querySQL){
            return 1;
        }else{
            return 0;
        }
    }
    public function mupdatedata($kode, $judul, $pengarang, $penerbit,$isbn,$tahun,$rak)
	{
        $sql = "UPDATE buku SET Judul='$judul',ID_Pengarang='$pengarang',ID_Penerbit='$penerbit',ISBN='$isbn',Tahun_Terbit='$tahun',Rak='$rak' WHERE Kode_Buku='$kode'";
        // $sql ="UPDATE `buku` SET `Judul`=$judul,`ID_Pengarang`=$pengarang,`ID_Penerbit`=$penerbit,`ISBN`=$isbn,`Tahun_Terbit`=$tahun,`Rak`=$rak WHERE Kode_Buku='$kode'";
        $querySQL = $this->db->query($sql);
        if($querySQL){
            return 1;
        }else{
            return 0;
        }
    }

    function mfilterbuku($kode){
        $sql = "SELECT * FROM buku WHERE Kode_Buku='$kode'";
        $querySQL = $this->db->query($sql);
        if($querySQL){
            return $querySQL->result();
        }else{return 0;}
    }
   
}
?>