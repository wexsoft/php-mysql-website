$(document).ready(function() {


	$('#main_content div').hide();
	$('#main_content .admin').show();
	$('#navbar .admin').addClass('active');

	//bind buttons
	$('#navbar li').unbind().bind('click', function(){
		$('#navbar li').removeClass('active');
		$(this).addClass('active');
		$('#main_content div').hide();
		var divName = $(this).attr('div');
		$('.'+divName).show();
	});

	//stop buttons from changing location
	$('button').unbind().bind('click', function(e){
		e.preventDefault();
		e.stopPropagation();
	})

});

function validate(form){
	var inputs = $(form +' input');
	var i;

	for(i = 0; i< inputs.length; i++){
		if(inputs[i].val() == ''){
			alert('Fill in all fields!');
			return;
		}
	}
}

function bindEvents(){
  $('.row').on('click',function(e){
    var target = $(e.currentTarget);
    $('#details').toggle();
    $('#mask').toggle();
    $('#details').find('#Name').val(target.find('#Name').text());
  });
}