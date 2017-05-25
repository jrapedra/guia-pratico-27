<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct(){
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('session', 'form_validation', 'email'));
	}

	public function index()
	{
		$data['myCarousel'] = array
								(
								array
									(
									'imgUrl' 	=> 'http://localhost/guia-pratico-27/assets/images/rent-a-car-1.jpg',
									'caption' 	=> 'A sua principal escolha para viajar e descobrir um novo mundo...'
									),
								array
									(
									'imgUrl' 	=> 'http://localhost/guia-pratico-27/assets/images/rent-a-car-2.jpg',
									'caption' 	=> 'Todas as despesas incluídas nos preços afixados!'
									),
								array
									(
									'imgUrl' 	=> 'http://localhost/guia-pratico-27/assets/images/rent-a-car-3.jpg',
									'caption' 	=> 'A nossa frota é a mais moderna do mercado'
									)
								);
		$data['myHeading'] = array
									(
									'titulo' 	=> 'Heading',
									'descricao'	=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias, expedita, saepe, vero rerum deleniti beatae veniam harum neque nemo praesentium cum alias asperiores commodi.',
									'id'		=> '1'
									);
		$data['myWidgets'] = array
								(
								array
									(
									'titulo' 	=> 'Destaque 1',
									'descricao'	=> 'O Lorem Ipsum é um texto modelo da indústria tipográfica e de impressão. O Lorem Ipsum tem vindo a ser o texto padrão usado por estas indústrias desde o ano de 1500, quando uma misturou os caracteres de um texto para criar um espécime de livro.',
									'id'		=> '1'
									),
								array
									(
									'titulo' 	=> 'Destaque 2',
									'descricao'	=> 'O Lorem Ipsum é um texto modelo da indústria tipográfica e de impressão. O Lorem Ipsum tem vindo a ser o texto padrão usado por estas indústrias desde o ano de 1500, quando uma misturou os caracteres de um texto para criar um espécime de livro.',
									'id'		=> '2'
									),
								array
									(
									'titulo' 	=> 'Destaque 3',
									'descricao'	=> 'O Lorem Ipsum é um texto modelo da indústria tipográfica e de impressão. O Lorem Ipsum tem vindo a ser o texto padrão usado por estas indústrias desde o ano de 1500, quando uma misturou os caracteres de um texto para criar um espécime de livro.',
									'id'		=> '3'
									)
								);
		$data['active_menu'] = 'home';
		$data['content'] = 'home/index';
		$this->load->view('init', $data);
	}

	public function about()
	{
		$data['active_menu'] = 'about';
		$data['content'] = 'about/index';
		$data['myMission'] = array
									(
									'titulo' 	=> 'Missão',
									'descricao'	=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias, expedita, saepe, vero rerum deleniti beatae veniam harum neque nemo praesentium cum alias asperiores commodi.'
									);
		$data['myObjectives'] = array
									(
									'titulo' 	=> 'Objectivos',
									'descricao'	=> 'Panel content.'
									);
		$data['myDates'] = array
									(
									'titulo' 	=> 'Datas',
									'descricao'	=> 'Panel content.'
									);
		$data['myHistory'] = array
									(
									'titulo' 	=> 'História',
									'descricao'	=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias, expedita, saepe, vero rerum deleniti beatae veniam harum neque nemo praesentium cum alias asperiores commodi.'
									);
		$this->load->view('init', $data);
	}

	public function contact()
	{
		$data['active_menu'] = 'contact';
		$data['content'] = 'contact/index';

        //set validation rules
        $this->form_validation->set_rules('name', 'Nome', 'trim|required|callback_name_validation');
        $this->form_validation->set_rules('email', 'E-mail', 'trim|required|callback_email_validation');
        $this->form_validation->set_rules('subject', 'Assunto', 'required');
        $this->form_validation->set_rules('message', 'Mensagem', 'required');

        //run validation on form input
        if ($this->form_validation->run() == FALSE)
        {
            //validation fails
            $this->load->view('init', $data);
        }
        else
        {
            //get the form data
            $name = $this->input->post('name');
            $from_email = $this->input->post('email');
            $subject = $this->input->post('subject');
            $message = $this->input->post('message');

            //set to_email id to which you want to receive mails
            $to_email = 'guia.pratico.27@gmail.com';

            //configure email settings
            $config['protocol'] = 'smtp';
            $config['smtp_host'] = 'ssl://smtp.gmail.com';
            $config['smtp_port'] = '465';
            $config['smtp_user'] = 'guia.pratico.27@gmail.com';
            $config['smtp_pass'] = 'Qwe123!_';
            $config['mailtype'] = 'html';
            $config['charset'] = 'iso-8859-1';
            $config['wordwrap'] = TRUE;
            $config['newline'] = "\r\n"; //use double quotes
            //$this->load->library('email', $config);
            $this->email->initialize($config);

            //send mail
            $this->email->from($from_email, $name);
            $this->email->to($to_email);
            $this->email->subject($subject);
            $this->email->message($message);
            if ($this->email->send())
            {
                // mail sent
                $this->session->set_flashdata('msg_type','alert-success');
                $this->session->set_flashdata('msg_error','O seu e-mail foi enviado com sucesso. Obrigado!');
				$data['active_menu'] = 'contact';
				$data['content'] = 'contact/index';
                $this->load->view('init', $data);
            }
            else
            {
                //error
                $this->session->set_flashdata('msg-type','alert-danger');
                $this->session->set_flashdata('msg-error','Existe um erro no envio do e-mail! Por favor tente novamente. Obrigado!');
                redirect('welcome/contact/index');
            }
        }
	}

    public function name_validation($str)
    {
        if (!preg_match("/^[a-zA-Z ]+$/", $str))
        {
            $this->form_validation->set_message('name_validation', 'O campo %s deverá conter apenas letras e espaços');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

    public function email_validation($str)
    {
        if (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str))
        {
            $this->form_validation->set_message('email_validation', 'O campo %s está mal formatado');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

}