<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Omnitags extends CI_Controller
{
    public $head = '_partials/head';

    // Di bawah ini adalah fungsi config
    public $file_type1 = 'png|jpg|jpeg';
    public $file_type2 = 'pdf';

    // Di bawah ini adalah bagian part dari views
    public $v_part1 = 'title';
    public $v_part2 = 'head';
    public $v_part3 = 'konten';
    public $v_part4 = 'phase';
    public $v_part5 = 'dekor';
    public $v_part4_msg0 = '<br><span class="h6"> (phase pre-alpha feature)</span>';
    public $v_part4_msg1 = '<br><span class="h6"> (phase alpha feature)</span>';
    public $v_part4_msg2 = '<br><span class="h6"> (phase beta feature)</span>';
    public $v_part4_msg3 = '<br><span class="h6"> (release candidate feature)</span>';
    public $v_part4_msg4 = '';  // feature released

    public $aliases;
    public $views;
    public $views_v1;
    public $views_v2;
    public $views_v3;
    public $views_v4;
    public $views_v5;
    public $views_v1_title;
    public $views_v2_title;
    public $views_v3_title;
    public $views_v4_title;
    public $views_v5_title;
    public $views_input;
    public $views_post;
    public $views_get;
    public $flashdatas;
    public $flashdata1_msg_1;
    public $flashdata1_msg_2;
    public $flashdata1_msg_3;
    public $flashdata1_msg_4;
    public $flashdata1_msg_5;
    public $flashdata1_msg_6;
    public $parts;

    public function declarew()
    {

        $jsonData1 = file_get_contents(site_url('assets/json/college_2_basdat_inventory.postman_environment.json'));
        $myData1 = json_decode($jsonData1, true)['values'];

        // Create variables dynamically
        foreach ($myData1 as $item) {
            $this->aliases[$item['key']] = $item['value']; // Variable variable to create dynamic variables
            $this->views_input[$item['key'] . '_input'] = 'txt_' . $item['value'];
            $this->views_post[$item['key']] = $this->input->post('txt_' . $item['value']);
            $this->views_get[$item['key']] = $this->input->get('txt_'.$item['value']);
        }

        $jsonData2 = file_get_contents(site_url('assets/json/college_2_basdat_inventory.postman_environment.json'));
        $myData2 = json_decode($jsonData2, true)['values'];

        // Create variables dynamically
        foreach ($myData2 as $item) {
            $this->views_v1[$item['key']] = '_contents/'. $item['key'].'/index';
            $this->views_v2[$item['key']] = '_contents/'. $item['key'].'/daftar';
            $this->views_v3[$item['key']] = '_contents/'. $item['key'].'/admin';
            $this->views_v4[$item['key']] = '_contents/'. $item['key'].'/laporan';
            $this->views_v5[$item['key']] = '_contents/'. $item['key'].'/print';

            $this->views_v1_title[$item['key']] = $item['value'];
            $this->views_v2_title[$item['key']] = 'Daftar ' . $item['value'];
            $this->views_v3_title[$item['key']] = 'Data ' . $item['value'];
            $this->views_v4_title[$item['key']] = 'Laporan ' . $item['value'];
            $this->views_v5_title[$item['key']] = 'Data ' . $item['value'];

            $this->flashdata1_msg_1[$item['key']] = 'Data ' . $item['value'] . ' berhasil disimpan!';
            $this->flashdata1_msg_2[$item['key']] = 'Data ' .  $item['value'] . ' gagal disimpan!';
            $this->flashdata1_msg_3[$item['key']] = 'Data ' .  $item['value'] . ' berhasil diubah!';
            $this->flashdata1_msg_4[$item['key']] = 'Data ' .  $item['value'] . ' gagal diubah!';
            $this->flashdata1_msg_5[$item['key']] = 'Data ' .  $item['value'] . ' berhasil dihapus!';
            $this->flashdata1_msg_6[$item['key']] = 'Data ' .  $item['value'] . ' gagal dihapus!';
        }

        $this->views = array(
            'v1' => '_layouts/template',
            'v1_title' => '',
            'v2' => 'login',
            'v2_title' => 'Login',
            'v3' => 'signup',
            'v3_title' => 'Sign Up',
            'v4' => 'no-level',
            'v4_title' => 'Anda tidak memiliki akses ke halaman ini!',
            'v5' => 'dashboard',
            'v5_title' => 'Dashboard',
            'v6' => 'home',
            'v6_title' => 'Selamat Datang',


            'tabel4_v9' => '_contents/tabel4/login',
            'tabel4_v9_title' => 'Login Sebagai ' . $this->aliases['tabel4_alias'],



            'tabel7_field3_upload_path' => './assets/img/tabel7/',
            'tabel7_field3_alt' => $this->input->post('txt' . $this->aliases['tabel7_field3']),
            'tabel7_field4_upload_path' => './assets/img/tabel7/',
            'tabel7_field4_alt' => $this->input->post('txt' . $this->aliases['tabel7_field4']),
            'tabel7_field5_upload_path' => './assets/img/tabel7/',
            'tabel7_field5_alt' => $this->input->post('txt' . $this->aliases['tabel7_field5']),



            'tabel8_v6' => '_contents/tabel8/konfirmasi',
            'tabel8_v6_title' => $this->aliases['tabel8_alias'] . ' Berhasil',
            'tabel8_v7' => '_contents/tabel8/cari',
            'tabel8_v7_title' => 'Daftar ' . $this->aliases['tabel8_alias'],



            'tabel9_field4_old' => $this->aliases['tabel9_field4'] . '_old',
            'tabel9_field4_old_post' => $this->input->post('old_' . $this->aliases['tabel9_field4'] . '_old'),



            'tabel12_field3_upload_path' => './assets/img/tabel12/',
            'tabel12_field3_alt' => $this->input->post('txt' . $this->aliases['tabel12_field3']),



            'tabel13_field4_upload_path' => './assets/img/tabel13/',
            'tabel13_field4_alt' => $this->input->post('txt' . $this->aliases['tabel13_field4']),
        );

        $this->flashdatas = array(
            // deklarasi flashdata
            // Flashdata di sini bertugas untuk menemani pengguna dalam perselancarannya di website ini
            // Elemen yang digunakan adalah toast atau popup di sudut kanan atas

            // Masing-masing modal akan dibagi 2
            // 2. Modal yang berhuungan dengan pesan akan diberi kode nomor (flashdata1'], flashdata2'], flasdata3'], dan seterusnya)
            // 1. Modal yang berhubungan dengan elemen akan diberi kode huruf (flashdata_a, flashdata_b, flasdata_c, dan seterusnya)

            // Jika flashdata memiliki pesan atau fungsi, maka akan ditambahakan _msg1 atau _func1
            // flashdata1_msg1'], flashdata_a_func1

            // Flashdata yang berhubungan dengan pesan

            // Authentication Flashdatas
            'v_flashdata1' => 'pesan',
            'v_flashdata1_msg1' => '',
            'v_flashdata1_msg2' => '',
            'v_flashdata_a' => 'panggil',
            'v_flashdata_a_func1' => '$("#element").toast("show")',

            // Pesan di bawah ini sudah boleh diubah
            'v6_flashdata1_msg1' => 'Selamat datang ' . $this->session->userdata($this->aliases['base_url'] . $this->aliases['tabel9_field6']) . ' ' . $this->session->userdata($this->aliases['base_url'] . $this->aliases['tabel9_field2']) . '!',
            'tabel8_v_flashdata1_msg2' => 'Ayo kita lanjutkan ke pemesanan, ' . $this->session->userdata($this->aliases['base_url'] . $this->aliases['tabel9_field6']) . ' ' . $this->session->userdata($this->aliases['base_url'] . $this->aliases['tabel9_field2']) . '!',

            'tabel4_v_flashdata1_msg_-1' => $this->aliases['tabel4_field4'] . ' salah!',
            'tabel4_v_flashdata1_msg_0' => $this->aliases['tabel4_field3'] . ' tidak tersedia!',
            'tabel9_v_flashdata1_msg_-1' => $this->aliases['tabel4_field4'] . ' salah!',
            'tabel9_v_flashdata1_msg_0' => $this->aliases['tabel4_field3'] . ' tidak tersedia!',


            // Data Manupulation Flashdatas
            'v_flashdata3' => 'pesan_tambah',
            'v_flashdata3_msg1' => '',
            'v_flashdata3_msg2' => '',
            'v_flashdata_c' => 'tambah',
            'v_flashdata_c_func1' => '$(".tambah").modal("show")',
            // 'tabel2_v_flashdata3_msg_1' => '',
            // 'tabel10_v_flashdata3_msg_1' => $this->aliases['tabel3_field4_alias'] . ' ' . $this->aliases['tabel3_alias'] . ' tidak bisa diupload',
            // 'tabel11_v_flashdata3_msg_1' => '',
            'tabel12_v_flashdata3_msg_1' => $this->aliases['tabel12_field3_alias'] . ' ' . $this->aliases['tabel12_alias'] . ' tidak bisa diupload',
            'tabel13_v_flashdata3_msg_1' => $this->aliases['tabel13_field4_alias'] . ' ' . $this->aliases['tabel13_alias'] . ' tidak bisa diupload',
            'tabel4_v_flashdata3_msg_1' => 'Konfirmasi ' . $this->aliases['tabel9_field4'] . ' tidak sesuai!',
            'tabel4_v_flashdata3_msg_2' => $this->aliases['tabel9_field3'] . 'telah digunakan!',
            'tabel9_v_flashdata3_msg_1' => 'Konfirmasi ' . $this->aliases['tabel9_field4'] . ' tidak sesuai!',
            'tabel9_v_flashdata3_msg_2' => $this->aliases['tabel9_field3'] . 'telah digunakan!',

            'v_flashdata4' => 'pesan_ubah',
            'v_flashdata4_msg1' => '',
            'v_flashdata4_msg2' => '',
            'v_flashdata_d' => 'ubah',
            'v_flashdata_d_func1' => '$(".ubah").modal("show")',
            // 'tabel2_v_flashdata4_msg_1' => '',
            'tabel4_v_flashdata4_msg_1' => 'Konfirmasi ' . $this->aliases['tabel9_field4'] . ' tidak sesuai!',
            'tabel4_v_flashdata4_msg_2' => $this->aliases['tabel9_field4'] . ' lama salah!',
            'tabel4_v_flashdata4_msg_3' => 'Akun tidak tersedia!',
            'tabel9_v_flashdata4_msg_1' => 'Konfirmasi ' . $this->aliases['tabel9_field4'] . ' tidak sesuai!',
            'tabel9_v_flashdata4_msg_2' => $this->aliases['tabel9_field4'] . ' lama salah!',
            'tabel9_v_flashdata4_msg_3' => 'Akun tidak tersedia!',
            // 'tabel10_v_flashdata4_msg_1' => $this->aliases['tabel3_field4_alias'] . ' ' . $this->aliases['tabel3_alias'] . ' tidak bisa diupload',
            // 'tabel11_v_flashdata4_msg_1' => '',
            'tabel12_v_flashdata4_msg_1' => $this->aliases['tabel12_field3_alias'] . ' ' . $this->aliases['tabel12_alias'] . ' tidak bisa diupload',
            'tabel13_v_flashdata4_msg_1' => $this->aliases['tabel13_field4_alias'] . ' ' . $this->aliases['tabel13_alias'] . ' tidak bisa diupload',

            'v_flashdata5' => 'pesan_lihat',
            'v_flashdata5_msg1' => '',
            'v_flashdata5_msg2' => '',
            'v_flashdata_e' => 'lihat',
            'v_flashdata_e_func1' => '$(".lihat").modal("show")',

            'v_flashdata6' => 'pesan_cari',
            'v_flashdata6_msg1' => '',
            'v_flashdata6_msg2' => '',
            'v_flashdata_f' => 'cari',
            'v_flashdata_f_func1' => '$(".cari").modal("show")',

            'v_flashdata7' => 'pesan_maintenance',
            'v_flashdata7_msg1' => '',
            'v_flashdata7_msg2' => '',
            'v_flashdata_g' => 'maintenance',
            'v_flashdata_g_func1' => '$(".maintenance").modal("show")',

            'v_flashdata8' => 'pesan_cleaning',
            'v_flashdata8_msg1' => '',
            'v_flashdata8_msg2' => '',
            'v_flashdata_h' => 'clean',
            'v_flashdata_h_func1' => '$(".clean").modal("show")',

            'v_flashdata11' => 'pesan_favicon',
            'v_flashdata11_msg1' => '',
            'v_flashdata11_msg2' => '',
            'v_flashdata_k' => 'favicon',
            'v_flashdata_k_func1' => '$(".favicon").modal("show")',
            'tabel7_v_flashdata11_msg_1' => $this->aliases['tabel7_field3_alias'] . ' tidak bisa diupload',

            'v_flashdata12' => 'pesan_logo',
            'v_flashdata12_msg1' => '',
            'v_flashdata12_msg2' => '',
            'v_flashdata_l' => 'logo',
            'v_flashdata_l_func1' => '$(".logo").modal("show")',
            'tabel7_v_flashdata12_msg_1' => $this->aliases['tabel7_field4_alias'] . ' tidak bisa diupload',

            'v_flashdata13' => 'pesan_foto',
            'v_flashdata13_msg1' => '',
            'v_flashdata13_msg2' => '',
            'v_flashdata_m' => 'foto',
            'v_flashdata_m_func1' => '$(".foto").modal("show")',
            'tabel7_v_flashdata13_msg_1' => $this->aliases['tabel7_field5_alias'] . ' tidak bisa diupload',

            'v_flashdata15' => 'pesan_event',
            'v_flashdata15_msg1' => '',
            'v_flashdata15_msg2' => '',
            'v_flashdata_o' => 'event',
            'v_flashdata_o_func1' => '$("#event").modal("show")',

            // Form Submission Flashdatas
            'v_flashdata2' => 'notifikasi',
            'v_flashdata2_msg1' => '',
            'v_flashdata2_msg2' => '',
            'v_flashdata_b' => 'modal',
            'v_flashdata_b_func1' => '$(".password").modal("show")',

            // Notification and alert Flashdatas
            'v_flashdata14' => 'pesan_quickTour',
            'v_flashdata14_msg1' => "Anda hanya akan mendapatkan quick tour ini sebanyak 2 kali",
            'v_flashdata14_msg2' => '',
            'v_flashdata_n' => 'quickTour',
            'v_flashdata_n_func1' => '$("#quickTour").modal("show")',

            // Special user interaction Flashdatas
            'v_flashdata9' => 'pesan_book',
            'v_flashdata9_msg1' => '',
            'v_flashdata9_msg2' => '',
            'v_flashdata_i' => 'book',
            'v_flashdata_i_func1' => '$(".book").modal("show")',


            // Semua yang menggunakan flashdata1: Menampilkan pesan
            'tabel7_v_flashdata1_msg_7' => $this->aliases['tabel7_field3_alias'] . ' berhasil diubah!',
            'tabel7_v_flashdata1_msg_8' => $this->aliases['tabel7_field3_alias'] . ' gagal diubah!',
            'tabel7_v_flashdata1_msg_9' => $this->aliases['tabel7_field4_alias'] . ' berhasil diubah!',
            'tabel7_v_flashdata1_msg_10' => $this->aliases['tabel7_field4_alias'] . ' gagal diubah!',
            'tabel7_v_flashdata1_msg_11' => $this->aliases['tabel7_field5_alias'] . ' berhasil diubah!',
            'tabel7_v_flashdata1_msg_12' => $this->aliases['tabel7_field5_alias'] . ' gagal diubah!',
            'tabel7_v_flashdata1_msg_13' => $this->aliases['tabel7_field12_alias'] . ' berhasil diubah!',
            'tabel7_v_flashdata1_msg_14' => $this->aliases['tabel7_field12_alias'] . ' gagal diubah!',

            'tabel8_v_flashdata1_msg_7' => 'Status ' . $this->aliases['tabel8_alias'] . ' berhasil diubah!',
            'tabel8_v_flashdata1_msg_8' => 'Status ' . $this->aliases['tabel8_alias'] . ' gagal diubah!',
        );
    }
}
