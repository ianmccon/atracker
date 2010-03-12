$('password_div').hide();

Event.observe('change_password', 'submit', function(e)
{
	Event.stop(e);
});

$('password_button').observe('click', change_password);

function change_password(){
	$('change_password').request({
		method: 'post',
		onComplete: function(r){
			new Effect.Fade('password_div', {duration:.25});
			overlay();
			response_msg(r.responseText);
		}
	});
}