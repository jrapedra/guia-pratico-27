<body>
	<?php
		$this->load->view('header');
		if($this->session->flashdata('msg_type') !== null){
			$this->load->view('errors');
			$this->session->unset_userdata('msg_type');
		}
		$this->load->view($content);
		$this->load->view('footer');
	?>
</body>