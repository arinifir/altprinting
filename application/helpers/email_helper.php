<?php 
class Email_helper {

    public function __construct()
    {
        get_instance();
    }

    public function config_email()
    {
        $this->load->library('email');
        $config = array();
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.googlemail.com';
        $config['smtp_user'] = 'altprinting3@gmail.com';
        $config['smtp_pass'] = 'avenger12345678';
        $config['smtp_port'] = 465;
        $config['mailtype'] = 'html';
        $config['charset'] = 'utf-8';
        $this->email->initialize($config);

        $this->email->set_newline("\r\n");
    }
    
    public function test()
    {
        return 'ini helper email';
    }
}

    

?>