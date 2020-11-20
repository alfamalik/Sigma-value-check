<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reject extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
    }


    public function reject_plain()
    {
        if (!$this->session->userdata('username')) {
            redirect('');
        }
        $data['title'] = 'Reject Plain';
        $data['user'] = $this->Admin_model->getUser('username', $this->session->userdata('username'));
        $data['total_susu'] = $this->security->xss_clean($this->Admin_model->countTotalSusuDiagramByTahun('plain', '2018'));
        $data['total_susu_perbulan'] = $this->Admin_model->getTotalSusuPerBulanByTahun('plain', '2018');
        $data['persenan_reject_produksi'] = $this->Admin_model->getPersenanSusuByTahun('plain', '2018');
        $data['c_chart'] = $this->Admin_model->getLineChartSusuByTahun('plain', '2018');
        $data['bocor_susu'] = $this->Admin_model->getBocorSusuByTahun('plain', '2018');
        $data['sigma'] = $this->Admin_model->getNilaiSigmaByTahun('plain', '2018');
        $data['tahuns'] = $this->Admin_model->getTahun('plain');
        $data['susu'] = xss_clean($this->Admin_model->getSusuByTahun('plain', '2018'));
        $data['total_susu_table'] = $this->security->xss_clean($this->Admin_model->countTotalSusuByTahun('plain', '2018'));
        if (!empty($this->input->post('tahun'))) {
            $data['total_susu'] = $this->security->xss_clean($this->Admin_model->countTotalSusuDiagramByTahun('plain', $this->input->post('tahun')));
            $data['total_susu_perbulan'] = $this->Admin_model->getTotalSusuPerBulanByTahun('plain', $this->input->post('tahun'));
            $data['persenan_reject_produksi'] = $this->Admin_model->getPersenanSusuByTahun('plain', $this->input->post('tahun'));
            $data['c_chart'] = $this->Admin_model->getLineChartSusuByTahun('plain', $this->input->post('tahun'));
            $data['bocor_susu'] = $this->Admin_model->getBocorSusuByTahun('plain', $this->input->post('tahun'));
            $data['susu'] = xss_clean($this->Admin_model->getSusuByTahun('plain', $this->input->post('tahun')));
            $data['total_susu_table'] = $this->security->xss_clean($this->Admin_model->countTotalSusuByTahun('plain', $this->input->post('tahun')));
            $data['sigma'] = $this->Admin_model->getNilaiSigmaByTahun('plain', $this->input->post('tahun'));
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
        $this->load->view('admin/reject_plain', $data);
    }

    public function reject_chocolate()
    {
        if (!$this->session->userdata('username')) {
            redirect('');
        }

        $data['title'] = 'Reject Chocolate';
        $data['user'] = $this->Admin_model->getUser('username', $this->session->userdata('username'));
        $data['total_susu'] = $this->security->xss_clean($this->Admin_model->countTotalSusuDiagramByTahun('chocolate', '2018'));
        $data['total_susu_perbulan'] = $this->Admin_model->getTotalSusuPerBulanByTahun('chocolate', '2018');
        $data['persenan_reject_produksi'] = $this->Admin_model->getPersenanSusuByTahun('chocolate', '2018');
        $data['c_chart'] = $this->Admin_model->getLineChartSusuByTahun('chocolate', '2018');
        $data['bocor_susu'] = $this->Admin_model->getBocorSusuByTahun('chocolate', '2018');
        $data['sigma'] = $this->Admin_model->getNilaiSigmaByTahun('chocolate', '2018');
        $data['tahuns'] = $this->Admin_model->getTahun('chocolate');
        $data['susu'] = xss_clean($this->Admin_model->getSusuByTahun('chocolate', '2018'));
        $data['total_susu_table'] = $this->security->xss_clean($this->Admin_model->countTotalSusuByTahun('chocolate', '2018'));
        if (!empty($this->input->post('tahun'))) {
            $data['total_susu'] = $this->security->xss_clean($this->Admin_model->countTotalSusuDiagramByTahun('chocolate', $this->input->post('tahun')));
            $data['total_susu_perbulan'] = $this->Admin_model->getTotalSusuPerBulanByTahun('chocolate', $this->input->post('tahun'));
            $data['persenan_reject_produksi'] = $this->Admin_model->getPersenanSusuByTahun('chocolate', $this->input->post('tahun'));
            $data['c_chart'] = $this->Admin_model->getLineChartSusuByTahun('chocolate', $this->input->post('tahun'));
            $data['bocor_susu'] = $this->Admin_model->getBocorSusuByTahun('chocolate', $this->input->post('tahun'));
            $data['susu'] = xss_clean($this->Admin_model->getSusuByTahun('chocolate', $this->input->post('tahun')));
            $data['total_susu_table'] = $this->security->xss_clean($this->Admin_model->countTotalSusuByTahun('chocolate', $this->input->post('tahun')));
            $data['sigma'] = $this->Admin_model->getNilaiSigmaByTahun('chocolate', $this->input->post('tahun'));
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
        $this->load->view('admin/reject_chocolate', $data);
    }

    public function reject_nonfat()
    {
        if (!$this->session->userdata('username')) {
            redirect('');
        }

        $data['title'] = 'Reject Nonfat';
        $data['user'] = $this->Admin_model->getUser('username', $this->session->userdata('username'));
        $data['total_susu'] = $this->security->xss_clean($this->Admin_model->countTotalSusuDiagramByTahun('not_fat', '2018'));
        $data['total_susu_perbulan'] = $this->Admin_model->getTotalSusuPerBulanByTahun('not_fat', '2018');
        $data['persenan_reject_produksi'] = $this->Admin_model->getPersenanSusuByTahun('not_fat', '2018');
        $data['c_chart'] = $this->Admin_model->getLineChartSusuByTahun('not_fat', '2018');
        $data['bocor_susu'] = $this->Admin_model->getBocorSusuByTahun('not_fat', '2018');
        $data['sigma'] = $this->Admin_model->getNilaiSigmaByTahun('not_fat', '2018');
        $data['tahuns'] = $this->Admin_model->getTahun('not_fat');
        $data['susu'] = xss_clean($this->Admin_model->getSusuByTahun('not_fat', '2018'));
        $data['total_susu_table'] = $this->security->xss_clean($this->Admin_model->countTotalSusuByTahun('not_fat', '2018'));
        if (!empty($this->input->post('tahun'))) {
            $data['total_susu'] = $this->security->xss_clean($this->Admin_model->countTotalSusuDiagramByTahun('not_fat', $this->input->post('tahun')));
            $data['total_susu_perbulan'] = $this->Admin_model->getTotalSusuPerBulanByTahun('not_fat', $this->input->post('tahun'));
            $data['persenan_reject_produksi'] = $this->Admin_model->getPersenanSusuByTahun('not_fat', $this->input->post('tahun'));
            $data['c_chart'] = $this->Admin_model->getLineChartSusuByTahun('not_fat', $this->input->post('tahun'));
            $data['bocor_susu'] = $this->Admin_model->getBocorSusuByTahun('not_fat', $this->input->post('tahun'));
            $data['susu'] = xss_clean($this->Admin_model->getSusuByTahun('not_fat', $this->input->post('tahun')));
            $data['total_susu_table'] = $this->security->xss_clean($this->Admin_model->countTotalSusuByTahun('not_fat', $this->input->post('tahun')));
            $data['sigma'] = $this->Admin_model->getNilaiSigmaByTahun('not_fat', $this->input->post('tahun'));
        } else {
            $data['tahun'] = $this->session->userdata('tahun');
            $this->session->unset_userdata('tahun');
            $tahun = [
                'tahun' => $this->input->post('tahun')
            ];
            $this->session->set_userdata($tahun);
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/reject_nonfat', $data);
    }
}
