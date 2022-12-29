<?php

class StudentController extends CI_Controller{
    public function index(){
        //setiap ingin menggunakan view harus menggunakan load terlebih dahulu
        $this ->load->model('Student'); //memanggil data dari database
        $data['st'] = $this -> Student ->getData()->result(); //mengambil data dari database
        //get_data di atas adalah nama dari funtion dari model
        //nama yang ada dalam array otomatis menjadi variable yang akan dipanggil di view nya nanti
        $this -> load -> view('templates/header');
        $this -> load -> view('dashboard', $data);
        $this -> load -> view('templates/footer');
        //disini kita melemparkan data dari variable data dan nanti dipanggil nya bukan dipangil lagi data nya tapi kita memanggil variable yang ada dalam array
    } 

    public function inputData(){
        //dibawah ini codingan untuk menampung data dari inputan kita
        $nisn = $this -> input -> post('nisn');
        $age = $this -> input -> post('age');
        $name = $this -> input -> post('name');
        $address = $this -> input -> post('address');


        $input = array(
            'nisn' => $nisn,
            'umur' => $age,
            'nama' => $name,
            'alamat' => $address
        );

        $this->Student->input_data($input, 'tb_ci');
        $this->session->set_flashdata('success', 'Berhasil Memasukan Data');
        redirect ('StudentController/index');
    }

    public function delete($id){
        $this->Student->delete($id);
        $this->session->set_flashdata('success', 'Data Berhasil Di hapus');
        redirect ('StudentController/index');
    }

    public function edit($id){
        $data['s'] = $this->Student->edit($id)->result();
        $this -> load -> view('templates/header');
        $this -> load -> view('formEdit', $data);
        $this -> load -> view('templates/footer');
    }

    public function update($id)
    {
        $nisn = $this -> input -> post('nisn');
        $age = $this -> input -> post('age');
        $name = $this -> input -> post('name');
        $address = $this -> input -> post('address');

        $update = array(
            'nisn' => $nisn,
            'umur' => $age,
            'nama' => $name,
            'alamat' => $address
        );
        
        $this->Student->update_data($update, 'tb_ci', $id);
        $this->session->set_flashdata('success', 'Data Berhasil Di update');
        redirect ('StudentController/index');
        
    }
}