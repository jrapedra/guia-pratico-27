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

	$("#fabricante").on('change',altera_modelo);
	altera_modelo();
})

var altera_modelo = function(){
		let fabricante_selected = $("#fabricante").val();
		$("#modelo option").removeClass('js-show').addClass('hidden');
		$('#modelo [data-parent="'+fabricante_selected+'"]').removeClass('hidden').addClass('js-show');
		/*let firstVisibleValue = $('#modelo').find("option:not(:hidden)").val();
		console.log(firstVisibleValue);
		$('#modelo').val(firstVisibleValue);*/
		$("#modelo option.js-show:first").attr('selected','selected');
		/*let firstVisibleValue = $("#modelo option .js-show").val();
		$('#modelo').val(firstVisibleValue);

		$('.id_100 option[value=val2]').attr('selected','selected');*/
	}