$(document).ready(function(){
	$(".js-delete-car").on('click',function(){
		let url = $(this).data('url');
		let item = $(this).data('item');
		$('#modal div.modal-body').html('<p>' + item + '</p>');
		$("#delete").off();//remove Listeners from object
		$('#modal').modal('show').one('click', '#delete', function (e) {
			window.location = url;
		});
	});

	$(".js-edit-car").on('click',function(){
		let url = $(this).data('url');
		$('#modal div.modal-body').load(url,function(){
			$('#modal').modal('show').one('click', '#delete', function (e) {
				window.location = url;
			});
		});
	});

})