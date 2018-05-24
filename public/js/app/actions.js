$(function() {

	var BUTTON;
	var TARGET;
	var FORM;
	var SERIALIZE;
	var POST_URL;
	
	$(document).on('click','.ajax-post',function()
	{	
		BUTTON 		= 	$(this);
		TARGET		=	BUTTON.data('target-form');
		FORM 		= 	$(TARGET);
		SERIALIZED 	= 	FORM.serializeArray();
		POST_URL 	= 	FORM.attr('action');

		BUTTON.addClass('disabled');

		
		var data = new FormData();
		for(var x in SERIALIZED)
		{
			data.append(SERIALIZED[x].name, SERIALIZED[x].value);
		}

		var file_inputs = FORM.find('input[type="file"]');
		for(i=0; i < file_inputs.length;i++)
		{
			var fi = $(file_inputs[i]);
			data.append(fi.attr('name'),  fi.prop('files')[0]);
			var count = 0;
		}

		$.ajax({
			type: 'post', 
			url: POST_URL, 
			data: data, 
			cache: false, 
			contentType: false, 
			processData: false, 
			datatype: 'json', 
			success: function (response)
	   		{
	   			responder(response)
	    	}
	    }); 

	});
	
	
	var responder = function(data) 
	{
		if (data.status == 'failed') {
			$(data.target).removeClass('alert');
			$(data.target).removeClass('alert-success');
			
			$(data.target).addClass('alert');
			$(data.target).addClass('alert-danger');
			
			$(data.target).html(data.message);
			setTimeout(function(){
				BUTTON.removeClass('disabled')
			},500);
		} else {
			switch (data.action) {
			case 'redirect':
				if (data.redirect_url == '') {
					if (data.message.length > 0) {
						
						$(data.target).removeClass('alert');
						$(data.target).removeClass('alert-danger');
						
						$(data.target).addClass('alert');
						$(data.target).addClass('alert-success');
						
						$(data.target).html(data.message);
						
						setTimeout(function(){
							location.reload();
						},1000);
					} else {
						setTimeout(function(){
							location.reload();
						},1000);
					}
				} else {
					if (data.message.length > 0) {
						
						$(data.target).removeClass('alert');
						$(data.target).removeClass('alert-danger');
						
						$(data.target).addClass('alert');
						$(data.target).addClass('alert-success');
						
						$(data.target).html(data.message);
						
						setTimeout(function(){
							window.location.href = data.redirect_url;
						},1000);
						
					} else {
						setTimeout(function(){
							window.location.href = data.redirect_url;
						},1000);
					}
					
				}
				break;
			case 'append':
				$(data.target).append(data.html);
				break;
			case 'prepend':
				$(data.target).prepend(data.html);
				break;
			case 'remove':
				$(data.target).remove();
				break;
			}
		}
		
	}
	
});