<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->model('Alert_model', 'alert');
  }

  public function index()
  {
    if ($this->session->userdata('email')) {
      redirect('profile');
    }
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'trim|required');
    if ($this->form_validation->run() == false) {
      $data['title'] = 'projekBIS Login';
      $this->load->view('templates/authHeader', $data);
      $this->load->view('auth/login');
      $this->load->view('templates/authFooter');
    } else {
      $this->_login();
    }
  }

  private function _login()
  {
    // ambil dari form
    $email = $this->input->post('email');
    $password = $this->input->post('password');

    // select * from tbl_user where email = $email
    $user = $this->db->get_where('tbl_user', ['email' => $email])->row_array();

    if ($user) {
      // usernya ada
      if ($user['is_active'] == 1) {
        // usernya aktif
        if (password_verify($password, $user['password'])) {
          // password benar
          // memasukkan email & role_id ke dalam array $data
          $data = [
            'email' => $user['email'],
            'role_id' => $user['role_id'] // menentukan menu
          ];
          // simpan array kedalam session
          $this->session->set_userdata($data);

          // cek privilege user atau admin
          if ($user['role_id'] == 1) {
            redirect('admin');
          } else {
            redirect('profile');
          }
        } else {
          // password salah
          $message = 'Wrong Password!';
        }
      } else {
        // usernya belom aktif
        $message = 'User Not Activated';
      }
    } else {
      // usernya ga ada
      $message = 'User Not Registered';
    }
    $alert = 'danger';
    $redirect = 'auth';
    $this->alert->alertResult($alert, $message, $redirect);
  }

  public function registration()
  {
    if ($this->session->userdata('email')) {
      redirect('profile');
    }
    // formValidationSetRule
    $this->form_validation->set_rules('fullName', 'Name', 'required|trim');
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tbl_user.email]', [
      'is_unique' => 'This email is already taken'
    ]);
    $this->form_validation->set_rules(
      'password1',
      'Password',
      'required|trim|min_length[3]|matches[password2]',
      [
        'matches' => "password don't match",
        'min_length' => 'password too short'
      ]
    );
    $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
    // .formValidationSetRule 

    // cekFormValidation
    if ($this->form_validation->run() == false) {
      $data['title'] = 'projekBIS Registration';
      $this->load->view('templates/authHeader', $data);
      $this->load->view('auth/registration');
      $this->load->view('templates/authFooter');
    } else {
      // insertNewUser
      $email = $this->input->post('email', true);
      $data = [
        'username' => htmlspecialchars($this->input->post('fullName', true)),
        'email' => htmlspecialchars($email),
        'image' => 'default.png',
        'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
        'role_id' => 2,
        'is_active' => 0,
        'date_created' => time()
      ];

      // siapkan token
      $token = base64_encode(random_bytes(8));

      $user_token = [
        'email' => $email,
        'token' => $token,
        'date_created' => time()
      ];
      // insert user baru
      $this->db->insert('tbl_user', $data);
      // insert token user baru
      $this->db->insert('tbl_user_token', $user_token);

      // kirim link aktivasi ke email
      $this->_sendEmail($token, 'verify');

      $alert = 'success';
      $message = 'Registration Successful! Please Activate Your Account!';
      $redirect = 'auth';
      $this->alert->alertResult($alert, $message, $redirect);

      echo 'data berhasil ditambahkan!';
      // .insertNewUser
    }
  }

  public function _sendEmail($token, $type)
  {
    $config = [
      'protocol' => 'smtp',
      'smtp_host' => 'ssl://smtp.googlemail.com',
      'smtp_user' => 'ivan.firmansyah1080@gmail.com',
      'smtp_pass' => 'blu4Viper',
      'smtp_port' => 465,
      'mailtype' => 'html',
      'chartset' => 'utf-8',
      'newline' => "\r\n"
    ];

    $this->email->initialize($config);

    $this->email->from('ivan.firmansyah1080@gmail.com', 'Ivan');
    $this->email->to($this->input->post('email'));

    if ($type == 'verify') {
      $this->email->subject('Accoutn Verification');
      $this->email->message('Click this link to activate your account : <a href="' . base_url() . 'auth/verify?email='
        . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a>');
    } else if ($type == 'forgot') {
      $this->email->subject('Reset Password');
      $this->email->message('Click this link to reset your password : <a href="' . base_url() . 'auth/resetpassword?email='
        . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
    }

    if ($this->email->send()) {
      return true;
    } else {
      echo $this->email->print_debugger();
      die;
    }
  }

  public function verify()
  {
    // ambil email dan token dari url
    $email = $this->input->get('email');
    $token = $this->input->get('token');

    // cek user where email = $email
    $user = $this->db->get_where('tbl_user', ['email' => $email])->row_array();
    //  ada ga
    if ($user) {
      // cek token where token = $token
      $user_token = $this->db->get_where('tbl_user_token', ['token' => $token])->row_array();
      // ada ga
      if ($user_token) {
        // aktivasi masih dalam waktu < 120 detik
        if (time() - $user_token['date_created'] < (120)) {
          // update tbl_user set is_active = 1 where email = $email
          $this->db->set('is_active', 1);
          $this->db->where('email', $email);
          $this->db->update('tbl_user');

          // delete from tbl_user_token where email = $ email
          $this->db->delete('tbl_user_token', ['email' => $email]);

          $message = $email . ' has been activated! Please Login';
          $alert = 'success';
          // aktivasi lewat dari waktu 120 detik
        } else {
          // delete user di tbl_uer dan token di tbl_user_token
          $this->db->delete('tbl_user', ['email' => $email]);
          $this->db->delete('tbl_user_token', ['email' => $email]);

          $message = 'Activation Failed! Token Expired';
          $alert = 'warning';
        }
        // kalo token ga ada
      } else {
        $message = 'Activation Failed! Wrong Token';
        $alert = 'warning';
      }
      // kalo email ga ada
    } else {
      $message = 'Actiovation Failed! Wrong Email';
      $alert = 'warning';
    }
    $redirect = 'auth';
    $this->alert->alertResult($alert, $message, $redirect);
  }

  public function logout()
  {
    $this->session->unset_userdata('email');
    $this->session->unset_userdata('role_id');

    $alert = 'secondary';
    $message = 'You have been logged out!';
    $redirect = 'auth';
    $this->alert->alertResult($alert, $message, $redirect);
  }

  public function blocked()
  {
    $data['title'] = '403 Forbidden';
    $data['tbl_user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
    $this->load->view('templates/authHeader', $data);
    $this->load->view('auth/blocked', $data);
    $this->load->view('templates/authFooter');
  }

  public function forgotPassword()
  {

    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

    if ($this->form_validation->run() == false) {
      $data['title'] = 'Forgot Password';
      $this->load->view('templates/authHeader', $data);
      $this->load->view('auth/forgotpassword');
      $this->load->view('templates/authFooter');
    } else {
      $email = $this->input->post('email');
      $user = $this->db->get_where('tbl_user', ['email' => $email, 'is_active' => 1])->row_array();

      if ($user) {
        $token = base64_encode(random_bytes(8));
        $user_token = [
          'email' => $email,
          'token' => $token,
          'date_created' => time()
        ];

        $this->db->insert('tbl_user_token', $user_token);
        $this->_sendEmail($token, 'forgot');
        $message = 'Please check your email to reset your password';
        $alert = 'success';
      } else {
        $message = 'Email is not registered or activated';
        $alert = 'danger';
      }
      $redirect = 'auth/forgotpassword';
      $this->alert->alertResult($alert, $message, $redirect);
    }
  }
  public function resetPassword()
  {
    $email = $this->input->get('email');
    $token = $this->input->get('token');

    $user = $this->db->get_where('tbl_user', ['email' => $email])->row_array();

    if ($user) {
      $user_token = $this->db->get_where('tbl_user_token', ['token' => $token])->row_array();
      if ($user_token) {
        $this->session->set_userdata('reset_email', $email);
        $this->changePassword();
      } else {
        $message = ' Reset password failed! Wrong Token';
      }
    } else {
      $message = 'Reset password failed! Wrong Email';
    }
    $alert = 'danger';
    $redirect = 'auth';
    $this->alert->alertResult($alert, $message, $redirect);
  }
  public function changePassword()
  {
    if (!$this->session->userdata('reset_email')) {
      redirect('auth');
    }

    $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[3]|matches[password2]');
    $this->form_validation->set_rules('password2', 'Password', 'trim|required|min_length[3]|matches[password1]');

    if ($this->form_validation->run() == false) {
      $data['title'] = 'Change Password';
      $this->load->view('templates/authHeader', $data);
      $this->load->view('auth/changepassword');
      $this->load->view('templates/authFooter');
    } else {
      $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);

      $email = $this->session->userdata('reset_email');

      $this->db->set('password', $password);
      $this->db->where('email', $email);
      $this->db->update('tbl_user');

      $this->session->unset_userdata('reset_email');

      $alert = 'success';
      $message = 'Password has been changed! Please Login';
      $redirect = 'auth';
      $this->alert->alertResult($alert, $message, $redirect);
    }
  }
}
