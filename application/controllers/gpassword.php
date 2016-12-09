<?php
class Gpassword extends User_Controller
{
    public $data = array(
        'main_view' => 'gpassword',
    );

    public function index()
    {

        $peserta = (object) $this->input->post(null, true);

        // Validasi.
        if (! $this->gpassword->validate('form_rules')) {
            $this->load->view($this->layout, $this->data);
            return;
        }

        // Proses gnt password.
		if($this->gpassword->cekpswd($peserta)){
        if($this->gpassword->daftar($peserta)) {
            $this->session->set_flashdata('hasil', 'Password anda berhasil diganti');
			redirect('gpassword');
        } else {
            $this->session->set_flashdata('error', 'Maaf, ganti password gagal. Kami mengalami gangguan. ' . anchor('pendaftaran', 'ulangi', 'class="alert-link"') .' beberapa saat lagi.');
            redirect('gpassword');
        }
		}
		else{
			$this->session->set_flashdata('error', 'Password lama tidak sesuai.');
			redirect('gpassword');
		}
	}
}