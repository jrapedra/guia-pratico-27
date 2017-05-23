$(document).ready(function(){
	$(".js-delete").on("click",function(){
		let url = $(this).data("url");
		let item = $(this).data("item");
		$('.modal-body').html('<p>' + item + '</p>');
		$('#modal-delete').modal('show').one('click', '#delete', function (e) {
			window.location = url;
        });
	})
})