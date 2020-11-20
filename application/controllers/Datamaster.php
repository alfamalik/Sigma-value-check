<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Datamaster extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
    }

    private function rulesAddSusu()
    {
        return [
            [
                'field' => 'bulan',
                'label' => ' ',
                'rules' => 'required',
            ],
            [
                'field' => 'total_produksi_susu',
                'label' => ' ',
                'rules' => 'required|numeric',
            ],
            [
                'field' => 'bocor_atas',
                'label' => ' ',
                'rules' => 'required|numeric',
            ],
            [
                'field' => 'bocor_bawah',
                'label' => ' ',
                'rules' => 'required|numeric',
            ],
            [
                'field' => 'bocor_tutup',
                'label' => ' ',
                'rules' => 'required|numeric',
            ],
            [
                'field' => 'total_reject_susu',
                'label' => ' ',
                'rules' => 'required|numeric',
            ]
        ];
    }

    private function rulesEditSusu()
    {
        return [
            [
                'field' => 'bulan_edit',
                'label' => ' ',
                'rules' => 'required',
            ],
            [
                'field' => 'total_produksi_susu_edit',
                'label' => ' ',
                'rules' => 'required|numeric',
            ],
            [
                'field' => 'bocor_atas_edit',
                'label' => ' ',
                'rules' => 'required|numeric',
            ],
            [
                'field' => 'bocor_bawah_edit',
                'label' => ' ',
                'rules' => 'required|numeric',
            ],
            [
                'field' => 'bocor_tutup_edit',
                'label' => ' ',
                'rules' => 'required|numeric',
            ],
            [
                'field' => 'total_reject_susu_edit',
                'label' => ' ',
                'rules' => 'required|numeric',
            ]
        ];
    }

    public function susu_plain()
    {
        if (!$this->session->userdata('username')) {
            redirect('');
        }

        $data['title'] = 'Data Susu Plain';
        $data['user'] = $this->Admin_model->getUser('username', $this->session->userdata('username'));
        $data['susu'] = xss_clean($this->Admin_model->getSusu('plain'));
        $data['total_susu'] = $this->security->xss_clean($this->Admin_model->countTotalSusu('plain'));
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/susu_plain', $data);
    }

    public function susu_chocolate()
    {
        if (!$this->session->userdata('username')) {
            redirect('');
        }

        $data['title'] = 'Data Susu Chocolate';
        $data['user'] = $this->Admin_model->getUser('username', $this->session->userdata('username'));
        $data['susu'] = xss_clean($this->Admin_model->getSusu('chocolate'));
        $data['total_susu'] = $this->security->xss_clean($this->Admin_model->countTotalSusu('chocolate'));
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/susu_chocolate', $data);
    }

    public function susu_nonfat()
    {
        if (!$this->session->userdata('username')) {
            redirect('');
        }

        $data['title'] = 'Data Susu Non-fat';
        $data['user'] = $this->Admin_model->getUser('username', $this->session->userdata('username'));
        $data['susu'] = xss_clean($this->Admin_model->getSusu('not_fat'));
        $data['total_susu'] = $this->security->xss_clean($this->Admin_model->countTotalSusu('not_fat'));
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/susu_nonfat', $data);
    }

    public function susu_all()
    {
        if (!$this->session->userdata('username')) {
            redirect('');
        }

        $data['title'] = 'Data Susu All';
        $data['user'] = $this->Admin_model->getUser('username', $this->session->userdata('username'));
        $data['susu'] = xss_clean($this->Admin_model->getSusu('v_total_susu'));
        $data['total_susu'] = $this->security->xss_clean($this->Admin_model->countTotalSusu('v_total_susu'));
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/susu_all', $data);
    }

    public function add_susu_plain()
    {
        $validation = $this->form_validation;
        $validation->set_rules($this->rulesAddSusu());
        if ($this->form_validation->run() == FALSE) {
            echo validation_errors();
        } else {
            $data = $this->Admin_model->addSusu('plain');
            echo json_encode($data);
        }
    }

    public function detail_susu_plain()
    {
        cekajax();
        $get = $this->input->get();
        $kondisi = array(
            'id' => $get["id"],
        );
        $tabel = "plain";
        $this->load->model('panggildata_model');
        $data = $this->panggildata_model->panggildata($tabel, $kondisi)->row_array();
        $result = array(
            "bulan" => $this->security->xss_clean($data['bulan']),
            "total_produksi_susu" => $this->security->xss_clean($data['total_produksi_susu']),
            "total_reject_susu" => $this->security->xss_clean($data['total_reject_susu']),
            "bocor_atas" => $this->security->xss_clean($data['bocor_atas']),
            "bocor_bawah" => $this->security->xss_clean($data['bocor_bawah']),
            "bocor_tutup" => $this->security->xss_clean($data['bocor_tutup']),
            "idd" => $this->security->xss_clean($data['id']),
        );
        echo '[' . json_encode($result) . ']';
    }

    public function edit_susu_plain()
    {
        $data = $this->Admin_model->editSusu('plain');
        echo json_encode($data);
    }

    public function delete_susu_plain()
    {
        $data = $this->Admin_model->deleteSusu('plain');
        echo json_encode($data);
    }

    public function add_susu_chocolate()
    {
        $validation = $this->form_validation;
        $validation->set_rules($this->rulesAddSusu());
        if ($this->form_validation->run() == FALSE) {
            echo validation_errors();
        } else {
            $data = $this->Admin_model->addSusu('chocolate');
            echo json_encode($data);
        }
    }

    public function detail_susu_chocolate()
    {
        cekajax();
        $get = $this->input->get();
        $kondisi = array(
            'id' => $get["id"],
        );
        $tabel = "chocolate";
        $this->load->model('panggildata_model');
        $data = $this->panggildata_model->panggildata($tabel, $kondisi)->row_array();
        $result = array(
            "bulan" => $this->security->xss_clean($data['bulan']),
            "total_produksi_susu" => $this->security->xss_clean($data['total_produksi_susu']),
            "total_reject_susu" => $this->security->xss_clean($data['total_reject_susu']),
            "bocor_atas" => $this->security->xss_clean($data['bocor_atas']),
            "bocor_bawah" => $this->security->xss_clean($data['bocor_bawah']),
            "bocor_tutup" => $this->security->xss_clean($data['bocor_tutup']),
            "idd" => $this->security->xss_clean($data['id']),
        );
        echo '[' . json_encode($result) . ']';
    }

    public function edit_susu_chocolate()
    {
        $data = $this->Admin_model->editSusu('chocolate');
        echo json_encode($data);
    }

    public function delete_susu_chocolate()
    {
        $data = $this->Admin_model->deleteSusu('chocolate');
        echo json_encode($data);
    }

    public function add_susu_nonfat()
    {
        $validation = $this->form_validation;
        $validation->set_rules($this->rulesAddSusu());
        if ($this->form_validation->run() == FALSE) {
            echo validation_errors();
        } else {
            $data = $this->Admin_model->addSusu('not_fat');
            echo json_encode($data);
        }
    }

    public function detail_susu_nonfat()
    {
        cekajax();
        $get = $this->input->get();
        $kondisi = array(
            'id' => $get["id"],
        );
        $tabel = "not_fat";
        $this->load->model('panggildata_model');
        $data = $this->panggildata_model->panggildata($tabel, $kondisi)->row_array();
        $result = array(
            "bulan" => $this->security->xss_clean($data['bulan']),
            "total_produksi_susu" => $this->security->xss_clean($data['total_produksi_susu']),
            "total_reject_susu" => $this->security->xss_clean($data['total_reject_susu']),
            "bocor_atas" => $this->security->xss_clean($data['bocor_atas']),
            "bocor_bawah" => $this->security->xss_clean($data['bocor_bawah']),
            "bocor_tutup" => $this->security->xss_clean($data['bocor_tutup']),
            "idd" => $this->security->xss_clean($data['id']),
        );
        echo '[' . json_encode($result) . ']';
    }

    public function edit_susu_nonfat()
    {
        $data = $this->Admin_model->editSusu('not_fat');
        echo json_encode($data);
    }

    public function delete_susu_nonfat()
    {
        $data = $this->Admin_model->deleteSusu('not_fat');
        echo json_encode($data);
    }
}
