<body>
	<?php $this->load->view('header'); ?>
	<?php
		if(!is_null($this->session->flashdata('msg_type'))){
			$this->load->view('errors');
			$this->session->unset_userdata('msg_type');
		}
		$this->load->view($content);
	?>
	<?php $this->load->view('footer'); ?>
</body>