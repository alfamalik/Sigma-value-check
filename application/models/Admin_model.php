<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function getUser($user)
    {
        return $this->db->get_where('users', [$user])->row_array();
    }

    public function getSusu($table)
    {
        return $this->db->get($table)->result_array();
    }

    public function countTotalSusu($table)
    {
        return $this->db->select_sum('total_produksi_susu')->select_sum('bocor_atas')->select_sum('bocor_bawah')->select_sum('bocor_tutup')->select_sum('bocor_atas')->select_sum('total_reject_susu')->get($table)->row_array();
    }

    public function getSusuBytahun($table, $where = null)
    {
        return $this->db->get_where($table, ['tahun' => $where])->result_array();
    }

    public function countTotalSusuByTahun($table, $where = null)
    {
        return $this->db->select_sum('total_produksi_susu')->select_sum('bocor_atas')->select_sum('bocor_bawah')->select_sum('bocor_tutup')->select_sum('bocor_atas')->select_sum('total_reject_susu')->get_where($table, ['tahun' => $where])->row_array();
    }

    public function countTotalSusuAdmin($table)
    {
        return $this->db->select_sum('total_produksi_susu')->select_sum('bocor_atas')->select_sum('bocor_bawah')->select_sum('bocor_tutup')->select_sum('bocor_atas')->select_sum('total_reject_susu')->get($table)->row_array();
    }

    public function countTotalSusuDiagramByTahun($table, $where = null)
    {
        $query = $this->db->select_sum('total_produksi_susu')->select_sum('bocor_atas')->select_sum('bocor_bawah')->select_sum('bocor_tutup')->select_sum('bocor_atas')->select_sum('total_reject_susu')->get_where($table, ['tahun' => $where]);
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $data) {
                $result[] = $data;
            }
        }
        return $result;
    }

    public function getSemuaTotalSusuPerBulanByTahun($where = null)
    {
        $query = $this->db->get_where("v_total_susu", ['tahun' => $where]);

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $data) {
                $result[] = $data;
            }
        }
        return $result;
    }

    public function getTotalSusuPerBulanByTahun($table, $where = null)
    {
        $query = $this->db->select('total_produksi_susu')->select('total_reject_susu')->get_where($table, ['tahun' => $where]);

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $data) {
                $result[] = $data;
            }
        }
        return $result;
    }

    public function getSemuaPersenanSusuByTahun($where = null)
    {
        $query = $this->db->query("SELECT sum(total_reject_susu)/sum(total_produksi_susu)*100 as persenan_reject, 100-sum(total_reject_susu)/sum(total_produksi_susu)*100 as persenan_produksi FROM v_total_susu WHERE tahun = $where");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $data) {
                $result[] = $data;
            }
        }
        return $result;
    }

    public function getPersenanSusuByTahun($table, $where)
    {
        $query = $this->db->query("SELECT (sum(total_reject_susu)/sum(total_produksi_susu)*100) as persenan_reject, (100 - (sum(total_reject_susu)/sum(total_produksi_susu)*100)) as persenan_produksi FROM $table WHERE tahun = $where;");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $data) {
                $result[] = $data;
            }
        }
        return $result;
    }

    public function getBocorSusuByTahun($table, $where)
    {
        $query = $this->db->select('bocor_atas')->select('bocor_bawah')->select('bocor_tutup')->get_where($table, ['tahun' => $where]);

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $data) {
                $result[] = $data;
            }
        }
        return $result;
    }

    public function getLineChartSusuByTahun($table, $where)
    {
        $query = $this->db->query("SELECT sum(bocor_atas)/count(bulan) as cl_bocor_atas, round(sum(bocor_atas)/count(bulan),0)+3*sqrt(round(sum(bocor_atas)/count(bulan), 0)) as ucl_bocor_atas, round(sum(bocor_atas)/count(bulan),0)-3*sqrt(round(sum(bocor_atas)/count(bulan), 0)) as lcl_bocor_atas, sum(bocor_bawah)/count(bulan) as cl_bocor_bawah, round(sum(bocor_bawah)/count(bulan),0)+3*sqrt(round(sum(bocor_bawah)/count(bulan),0)) as ucl_bocor_bawah,round(sum(bocor_bawah)/count(bulan),0)-3*sqrt(round(sum(bocor_bawah)/count(bulan),0)) as lcl_bocor_bawah, sum(bocor_tutup)/count(bulan) as cl_bocor_tutup, round(sum(bocor_tutup)/count(bulan),0)+3*sqrt(round(sum(bocor_tutup)/count(bulan),0)) as ucl_bocor_tutup,round(sum(bocor_tutup)/count(bulan),0)-3*sqrt(round(sum(bocor_tutup)/count(bulan),0)) as lcl_bocor_tutup FROM $table  WHERE tahun = $where");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $data) {
                $result[] = $data;
            }
        }
        return $result;
    }

    public function getNilaiSigmaByTahun($table, $where)
    {
        $query = $this->db->select_sum('total_produksi_susu')->select_sum('bocor_atas')->select_sum('bocor_bawah')->select_sum('bocor_tutup')->select_sum('bocor_atas')->select_sum('total_reject_susu')->get_where($table, ['tahun' => $where])->row_array();
        $tingkat_kegagalan = $query['total_reject_susu'] / $query['total_produksi_susu'];
        $dpo = $tingkat_kegagalan / 3;
        $dpmo = $dpo * 1000000;
        $querysigma = $this->db->get_where('sigma', ['dpmo' => round($dpmo)]);
        if ($querysigma->num_rows() > 0) {
            $dpmosigma = $querysigma->row_array();
            $result = $dpmosigma['nilai_sigma'];
        } else {
            $query1 = $this->db->limit(1)->get_where('sigma', ['dpmo <' => round($dpmo)])->row_array();
            $query2 = $this->db->limit(1)->order_by('dpmo', 'ASC')->get_where('sigma', ['dpmo >' => round($dpmo)])->row_array();

            $result = $query2['nilai_sigma'] + (round($dpmo) - $query1['dpmo']) / ($query2['dpmo'] - $query1['dpmo']) * ($query1['nilai_sigma'] - $query2['nilai_sigma']);
        }

        return round($result, 4);
    }

    public function getTahun($table)
    {
        return $this->db->group_by('tahun')->get($table)->result_array();
    }

    public function addSusu($table)
    {
        $data = [
            'bulan' => $this->input->post('bulan'),
            'tahun' => $this->input->post('tahun'),
            'total_produksi_susu' => $this->input->post('total_produksi_susu'),
            'bocor_atas' => $this->input->post('bocor_atas'),
            'bocor_bawah' => $this->input->post('bocor_bawah'),
            'bocor_tutup' => $this->input->post('bocor_tutup'),
            'total_reject_susu' => $this->input->post('total_reject_susu')
        ];
        $result = $this->db->insert($table, $data);
        return $result;
    }

    public function editSusu($table)
    {
        $id = $this->input->post('id');
        $total_produksi_susu = $this->input->post('total_produksi_susu');
        $total_reject_susu = $this->input->post('total_reject_susu');
        $bocor_atas = $this->input->post('bocor_atas');
        $bocor_bawah = $this->input->post('bocor_bawah');
        $bocor_tutup = $this->input->post('bocor_tutup');

        $this->db->set('total_produksi_susu', $total_produksi_susu);
        $this->db->set('total_reject_susu', $total_reject_susu);
        $this->db->set('bocor_atas', $bocor_atas);
        $this->db->set('bocor_bawah', $bocor_bawah);
        $this->db->set('bocor_tutup', $bocor_tutup);
        $this->db->where('id', $id);
        $result = $this->db->update($table);
        return $result;
    }

    function deleteSusu($table)
    {
        $id = $this->input->post('id');
        $this->db->where('id', $id);
        $result = $this->db->delete($table);
        return $result;
    }
}
