<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index()
	{        
        $data['name']="Welcome";
        // echo "tes";
         $this->template->load('theme','home',$data);
    }

    public function form_user($confirm='')
	{        
        $data['title']="Form User";
        $data['confirm']=$confirm;

        $this->load->model('Moduser');
        $data['read_user']=$this->Moduser->read();  
         $this->template->load('theme','form/form_user',$data);
    }

    public function tes()
	{        
        $this->load->view('form/form_user.php');
    }

    public function save_form_user(){
        $data1['title']="Form user";
        $confirm='<div class="alert btn-success" role="alert">
        <a href="#" class="alert-link">Success</a>
      </div>';

       
        $name                    = $this->input->post('name');
        $previledge              = $this->input->post('previledge');
        $username                = $this->input->post('username');
        $password                = $this->input->post('password');
        $tgl_lahir               = $this->input->post('tgl_lahir');
       
       
        $data=array(
            'name'=>$name,
            'previledge'=>$previledge,
            'username'=>$username,
            'password'=>$password,
            'tgl_lahir'=>$tgl_lahir,
          
                );

        $this->load->model('Moduser');
        $this->Moduser->save($data);
        
        $this->form_user($confirm);
    }
    
  
     

	
}
