<body>
	<?php $this->load->view('header'); ?>
	<?php
		if($this->session->flashdata('msg_type') !== null){
			$this->load->view('errors');
			$this->session->unset_userdata('msg_type');
		}
		else{
			$this->load->view($content);
		}
	?>
	<?php $this->load->view('footer'); ?>
</body>