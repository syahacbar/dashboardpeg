<?php
/**
*	App Name	: Admin Template Dashboard Codeigniter 4	
*	Developed by: Agus Prawoto Hadi
*	Website		: https://jagowebdev.com
*	Year		: 2021-2022
*/

namespace App\Controllers\Builtin;
use App\Models\Builtin\UserModel;
use \Config\App;

class User extends \App\Controllers\BaseController
{
	protected $model;
	protected $moduleURL;
	
	public function __construct() {
		
		parent::__construct();
		
		$this->model = new UserModel;	
		$this->formValidation =  \Config\Services::validation();
		$this->data['site_title'] = 'Halaman Profil';
		
		$this->addJs($this->config->baseURL . 'public/vendors/bootstrap-datepicker/js/bootstrap-datepicker.min.js');
		$this->addJs($this->config->baseURL . 'public/themes/modern/js/date-picker.js');
		$this->addJs($this->config->baseURL . 'public/themes/modern/builtin/js/user.js');
		$this->addJs($this->config->baseURL . 'public/themes/modern/builtin/js/image-upload.js');
		$this->addStyle($this->config->baseURL . 'public/vendors/bootstrap-datepicker/css/bootstrap-datepicker.min.css');
		
		$this->addJs ( $this->config->baseURL . 'public/vendors/jquery.select2/js/select2.full.min.js' );
		$this->addStyle ( $this->config->baseURL . 'public/vendors/jquery.select2/css/select2.min.css' );
		$this->addStyle ( $this->config->baseURL . 'public/vendors/jquery.select2/bootstrap-5-theme/select2-bootstrap-5-theme.min.css' );
		
		helper(['cookie', 'form']);
	}
	
	public function index()
	{
		$this->cekHakAkses('read_data');

		if ($this->request->getPost('delete')) 
		{
			$this->cekHakAkses('delete_data', 'user', 'id_user');
			
			$result = $this->model->deleteUser();
			if ($result) {
				$data['message'] = ['status' => 'ok', 'message' => 'Data user berhasil dihapus'];
			} else {
				$data['message'] = ['status' => 'warning', 'message' => 'Tidak ada data yang dihapus'];
			}
		}
		
		$data['title'] = 'Data User';		
		$this->view('builtin/user/result.php', array_merge($data, $this->data));
	}
	
	public function getDataDT() {
		
		$this->cekHakAkses('read_data');
		
		$num_users = $this->model->countAllUsers($this->whereOwn('id_user'));
		$user = $this->model->getListUsers($this->actionUser, $this->whereOwn('id_user'));
		
		$result['draw'] = $start = $this->request->getPost('draw') ?: 1;
		$result['recordsTotal'] = $num_users;
		$result['recordsFiltered'] = $user['total_filtered'];
		
		
		helper('html');
		$avatar_path = ROOTPATH . 'public/images/user/';
		
		foreach ($user['data'] as $key => &$val) {
			
			if ($val['avatar']) {
				if (file_exists($avatar_path . $val['avatar'])) {
					$avatar = $val['avatar'];
				} else {
					$avatar = 'default.png';
				}
				
			} else {
				$avatar = 'default.png';
			}
			
			$role = '';
			if ($val['judul_role']) {
				$split = explode(',', $val['judul_role']);
				foreach ($split as $judul_role) {
					$role .= '<span class="badge bg-secondary me-2">' . $judul_role . '</span>';
				}	
			}
			
			$val['judul_role'] = '<div style="white-space:break-spaces">' . $role . '</div>';
			
			$val['verified'] =  $val['verified'] == 1 ? 'Ya' : 'Tidak' ;
			$val['ignore_avatar'] = '<img src="'. $this->config->baseURL . 'public/images/user/' . $avatar . '">';
								
			$btn['edit'] = ['url' => $this->moduleURL . '/edit?id='. $val['id_user']];
			if ($this->actionUser['delete_data'] == 'own' || $this->actionUser['delete_data'] == 'all') {
				$btn['delete'] = ['url' => $this->moduleURL
												, 'id' =>  $val['id_user']
												, 'delete-title' => 'Hapus data user: <strong>'.$val['nama'].'</strong> ?'
											]
							;
			}
			$val['ignore_btn_action'] = btn_action($btn);
		}
					
		$result['data'] = $user['data'];
		echo json_encode($result); exit();
	}
	
	public function add() 
	{
		$this->cekHakAkses('create_data');
		
		$breadcrumb['Add'] = '';
		
		$this->setData();
		$data = $this->data;
		$data['title'] = 'Tambah ' . $this->currentModule['judul_module'];
		
		$error = false;
		if ($this->request->getPost('submit'))
		{
			$data['message'] = $this->saveData();
			
			if ($data['message']['status'] == 'ok') {
				$result = $this->model->getUserById($data['message']['id_user'], true);
			
				if (!$result) {
					$this->errorDataNotFound();
					return;
				} else {
					$data = array_merge($data, $result);
				}
			}
		}

		$this->view('builtin/user/form.php', $data);
	}
	
	public function edit()
	{
		$this->cekHakAkses('update_data', 'user', 'id_user');
		
		$this->setData();
		$data = $this->data;
		$data['title'] = 'Edit ' . $this->currentModule['judul_module'];
		$breadcrumb['Edit'] = '';
			
		// Submit
		$data['message'] = [];
		if ($this->request->getPost('submit')) 
		{
			$save_message = $this->saveData();
			$data = array_merge( $data, $save_message);
		}
		
		$result = $this->model->getUserById($this->request->getGet('id'), true);
		
		if (!$result) {
			$this->errorDataNotFound();
			return;
		} else {
			$data = array_merge($data, $result);
		}
		
		$this->view('builtin/user/form.php', $data);
	}
	
	public function setData() {
		$this->data['roles'] = $this->model->getRoles();
		$this->data['action_user'] = $this->actionUser;
	}
	
	private function saveData() 
	{		
		$form_errors = $this->validateForm();
		$error = false;		
		
		if ($form_errors) {
			$data['status'] = 'error';
			$data['form_errors'] = $form_errors;
			$data['message'] = $form_errors;
			$error = true;
		}
		
		if (!$error) {				
			$data = $this->model->saveData($this->actionUser);
		}
		
		return $data;
	}
	
	private function validateForm() {
	
		$validation =  \Config\Services::validation();
		$validation->setRule('nama', 'Nama', 'trim|required');
		$validation->setRule('email', 'Nama', 'trim|required');
		$validation->setRule('username', 'Username', 'trim|required');
		
		if ($this->request->getPost('id')) {
			if ($this->request->getPost('email') != $this->request->getPost('email_lama')) {
				// echo 'sss'; die;
				if ($this->actionUser['update_data'] == 'all') 
				{
					$validation->setRules(
						['email' => [
								'label'  => 'Email',
								'rules'  => 'required|valid_email|is_unique[user.email]',
								'errors' => [
									'is_unique' => 'Email sudah digunakan'
									, 'valid_email' => 'Alamat email tidak valid'
								]
							]
						]
						
					);
				}
			}
		} else {
			$validation->setRule('password', 'Password', 'trim|required|min_length[3]');
			$validation->setRules(
				['email' => [
						'label'  => 'Email',
						'rules'  => 'required|valid_email|is_unique[user.email]',
						'errors' => [
							'is_unique' => 'Email sudah digunakan'
							, 'valid_email' => 'Alamat email tidak valid'
						]
					],
					'ulangi_password' => [
						'label'  => 'Ulangi Password',
						'rules'  => 'required|matches[password]',
						'errors' => [
							'required' => 'Ulangi password tidak boleh kosong'
							, 'matches' => 'Ulangi password tidak cocok dengan password'
						]
					]
				]
				
			);
		}
		
		$valid = $validation->withRequest($this->request)->run();
		$form_errors = $validation->getErrors();

		$file = $this->request->getFile('avatar');
		if ($file && $file->getName())
		{
			if ($file->isValid())
			{
				$type = $file->getMimeType();
				$allowed = ['image/png', 'image/jpeg', 'image/jpg'];
				
				if (!in_array($type, $allowed)) {
					$form_errors['avatar'] = 'Tipe file harus ' . join($allowed, ', ');
				}
				
				if ($file->getSize() > 300 * 1024) {
					$form_errors['avatar'] = 'Ukuran file maksimal 300Kb';
				}
				
				$info = \Config\Services::image()
						->withFile($file->getTempName())
						->getFile()
						->getProperties(true);
				
				if ($info['height'] < 100 || $info['width'] < 100) {
					$form_errors['avatar'] = 'Dimensi file minimal: 100px x 100px';
				}
				
			} else {
				$form_errors['avatar'] = $file->getErrorString().'('.$file->getError().')';
			}
		}
		
		return $form_errors;
	}
	
	public function edit_password()
	{
		$data['title'] = 'Edit Password';
		$breadcrumb['Edit Password'] = '';
		
		$form_errors = null;
		$this->data['status'] = '';
		
		if ($this->request->getPost('submit')) 
		{
			$result = $this->model->getUserById();
			$error = false;
			
			if ($result) {
				
				if (!password_verify($this->request->getPost('password_old'), $result['password'])) {
					$error = true;
					$this->data['message'] = ['status' => 'error', 'message' => 'Password lama tidak cocok'];
				}
			} else {
				$error = true;
				$this->data['message'] = ['status' => 'error', 'message' => 'Data user tidak ditemukan'];
			}
		
			if (!$error) {
		
				$this->formValidation->setRule('password_new', 'Password', 'trim|required');
				$this->formValidation->setRule('password_new_confirm', 'Confirm Password', 'trim|required|matches[password_new]');
					
				$this->formValidation->withRequest($this->request)->run();
				$errors = $this->formValidation->getErrors();
				
				$custom_validation = new \App\Libraries\FormValidation;
				$custom_validation->checkPassword('password_new', $this->request->getPost('password_new'));
			
				$form_errors = array_merge($custom_validation->getErrors(), $errors);
					
				if ($form_errors) {
					$this->data['message'] = ['status' => 'error', 'message' => $form_errors];
				} else {
					$update = $this->model->updatePassword();
					if ($update) {
						$this->data['message'] = ['status' => 'ok', 'message' => 'Password Anda berhasil diupdate'];
					} else {
						$this->data['message'] = ['status' => 'error', 'message' => 'Password Anda gagal diupdate... Mohon hubungi admin. Terima Kasih...'];
					}
				}
			}
		}
		
		$this->data['title'] = 'Edit Password';
		$this->data['form_errors'] = $form_errors;
		$this->data['user'] = $this->model->getUserById($this->user['id_user']);
		$this->view('builtin/user/form-edit-password.php', $this->data);
	}
}
