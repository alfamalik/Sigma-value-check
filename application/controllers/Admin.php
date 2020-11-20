<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
    }

    public function index()
    {
        if (!$this->session->userdata('username')) {
            redirect('');
        }
        $data['title'] = 'Dashboard';
        $data['user'] = $this->Admin_model->getUser('username', $this->session->userdata('username'));
        $data['total_susu'] = $this->security->xss_clean($this->Admin_model->countTotalSusuByTahun('v_total_susu', '2018'));
        $data['sigma'] = $this->Admin_model->getNilaiSigmaByTahun('v_total_susu', '2018');
        $data['sigma_plain'] = $this->Admin_model->getNilaiSigmaByTahun('plain', '2018');
        $data['sigma_chocolate'] = $this->Admin_model->getNilaiSigmaByTahun('chocolate', '2018');
        $data['sigma_notfat'] = $this->Admin_model->getNilaiSigmaByTahun('not_fat', '2018');
        $data['total_susu_perbulan_plain'] = $this->Admin_model->getTotalSusuPerBulanByTahun('plain', '2018');
        $data['total_susu_perbulan_chocolate'] = $this->Admin_model->getTotalSusuPerBulanByTahun('chocolate', '2018');
        $data['total_susu_perbulan_notfat'] = $this->Admin_model->getTotalSusuPerBulanByTahun('not_fat', '2018');
        $data['persenan_reject_produksi'] = $this->Admin_model->getSemuaPersenanSusuByTahun('2018');
        $data['tahuns'] = $this->Admin_model->getTahun('v_total_susu');
        $data['susu'] = xss_clean($this->Admin_model->getSusuByTahun('v_total_susu', '2018'));
        $data['total_susu_table'] = $this->security->xss_clean($this->Admin_model->countTotalSusuByTahun('v_total_susu', '2018'));
        if (!empty($this->input->post('tahun'))) {
            $data['total_susu'] = $this->security->xss_clean($this->Admin_model->countTotalSusuByTahun('v_total_susu', $this->input->post('tahun')));
            $data['sigma_plain'] = $this->Admin_model->getNilaiSigmaByTahun('plain', $this->input->post('tahun'));
            $data['sigma_chocolate'] = $this->Admin_model->getNilaiSigmaByTahun('chocolate', $this->input->post('tahun'));
            $data['sigma_notfat'] = $this->Admin_model->getNilaiSigmaByTahun('not_fat', $this->input->post('tahun'));
            $data['total_susu_perbulan_plain'] = $this->Admin_model->getTotalSusuPerBulanByTahun('plain', $this->input->post('tahun'));
            $data['total_susu_perbulan_chocolate'] = $this->Admin_model->getTotalSusuPerBulanByTahun('chocolate', $this->input->post('tahun'));
            $data['total_susu_perbulan_notfat'] = $this->Admin_model->getTotalSusuPerBulanByTahun('not_fat', $this->input->post('tahun'));
            $data['persenan_reject_produksi'] = $this->Admin_model->getSemuaPersenanSusuByTahun($this->input->post('tahun'));
            $data['susu'] = xss_clean($this->Admin_model->getSusuByTahun('v_total_susu', $this->input->post('tahun')));
            $data['total_susu_table'] = $this->security->xss_clean($this->Admin_model->countTotalSusuByTahun('v_total_susu', $this->input->post('tahun')));
            $tahun = [
                'tahun' => $this->input->post('tahun')
            ];
            $this->session->set_userdata($tahun);
        } else {
            $data['tahun'] = $this->session->userdata('tahun');
            $this->session->unset_userdata('tahun');
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
    }

    public function page_404()
    {
        if (!$this->session->userdata('username')) {
            redirect('');
        }
        $data['title'] = '404 Not Found';
        $data['user'] = $this->Admin_model->getUser('username', $this->session->userdata('username'));
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/404page', $data);
    }
}
