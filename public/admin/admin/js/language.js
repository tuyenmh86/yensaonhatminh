function changelangBackend(e){

	var lang = e.getAttribute('data-lang'),

		token =  $('meta[name="csrf-token"]').attr('content');

	$('#lang-display-backend').html(lang);
    
	$.ajax({
		url:"/back-language",
		type:"POST",
		data:{locate:lang, _token:token},
		datatype:'json',
		complete: function(data){

			window.location.reload(true);
			
		}
	});

}

function changelangFrontend(e){

	var lang = e.getAttribute('data-lang'),

		token =  $('meta[name="csrf-token"]').attr('content');

	$('#lang-display').html(lang);

	$.ajax({
		url:"/language",
		type:"POST",
		data:{locate:lang, _token:token},
		datatype:'json',
		complete: function(data){

			window.location.reload(true);
			
		}
	});

}