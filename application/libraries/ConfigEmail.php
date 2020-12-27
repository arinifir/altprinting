<?php 
class ConfigEmail {
    function email_config()
    {
        $ci =& get_instance();
        
        $ci->load->library('email');
        $config = array();
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.googlemail.com';
        $config['smtp_user'] = 'altprinting3@gmail.com';
        $config['smtp_pass'] = 'avenger12345678';
        $config['smtp_port'] = 465;
        $config['mailtype'] = 'html';
        $config['charset'] = 'utf-8';
        $ci->email->initialize($config);

        $ci->email->set_newline("\r\n");
    }
}
?>