<?php
namespace App\Controllers;

use App\Models\AuthModel;

class AuthController extends BaseController{

    public function _construct(){
        $this->model = new AuthModel();
    }

    public function registrasi(){
        $data = [
            'validation' => \Config\Services::validation()
        ];

        return view('auth/registrasi', $data);
    }    


public function simpanRegistrasi(){

    if ($this->validate($this->rulesRegistrasi())){
    // apabila sukses tevalidasi, simpan ke databases
    $this->model->save([
        'name'=>$this->request->getPost('name'),
        'email'=>$this->request->getPost('email'),
        'password'=>password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
        'role'=>'siswa',
    ]);

    /*
    set session flash (One TIme Session) sebagai pesan registrasiberhasil
    yang ditampung didalam variable 'registrasi_sukses'
    */

    session()->setFlashdata('registrasi_sukses', 'registrasi berhasil');

    /* Redirect tetap ke halaman registrasi , untuk enunjukan pesan registrasi berhasil */
    return redirect()->to('/registrasi');
    }else{
        /*apabila input tidak valid dengan peraturan rulesResgistrasi
        redirect kehalaman registrasi dengan inputn datanya, sehingga inputan
        yang sudah benar terinput tiak hilang
        */
 }
}
/*function registrasi*/
public function rulesRegistrasi(){

    $setRules = [
        'name' => [
            'rules' => 'required',
            'errors' => [
                'required'=> 'Nama harus diisi'
            ]
        ],
        'email' => [
            'rules' => 'required|valid_email|is_unique[users.email]',
            'errors' => [
                'required' => 'Email harus diisi',
                'valid_email'=> 'Email anda tidak valid',
                'is_unique' => 'Email {value} sudah ada'
            ]
        ],
        'password' => [
            'rules' => 'required|min_length[8]',
            'errors' => [
                'required' => 'Password harus diisi',
                'min_length' => 'password minimal {param} karakter'
            ]
        ],
        'konfirmasi_passsword' => [
            'rules' => 'required|matches[password]',
            'errors' => [
                'required' => 'Konfirmasi password harus diisi',
                'matches' => 'Konfirmasi password bedbeda dengan {param}',
            ]
        ]
    ];
    return $setrules;
}
}