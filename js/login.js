Event.observe('login_now', 'submit', function(e)
{
	Event.stop(e);
	login();
});

Event.observe('login_now')

Event.observe('retrieve_password', 'submit', function(e)
{
	Event.stop(e);
});

//$('login_button').observe('click', login);
$('password_button').observe('click', retrieve_password);

document.onLoad = $('err_effect').hide(), $('password_div').hide(); 

function my_callback(response){
	
	response=eval( "("+response.responseText+")");
	
	if(response.success == true){
		
		window.location="/atracker/dashboard/";
		
	}else{
		response_container = $('err');
		response_container.innerHTML = response.error;
		if(!$('err_effect').visible()){
			new Effect.SlideDown('err_effect');
			new Effect.SlideUp('err_effect', {delay:3});
		}
	}

}

function login(){
	
	$('login_now').request({
		method: 'post',
		onComplete: function(r)
		{
			my_callback(r);
			
		}
	});
}

function show_forgot_password(){
	if(!$('password_div').visible()){
		new Effect.Appear('password_div');
	}
}

function hide_forgot_password(){
	
	if($('password_div').visible()){
		new Effect.Fade('password_div', {duration: .25});
	}
}

function retrieve_password(){
	$('retrieve_password').request({
		method: 'post',
		onComplete: function(r){
			response_container = $('err');
			response_container.innerHTML = r.responseText;
			if(!$('err_effect').visible()){
				new Effect.Fade('password_div', {duration:.25});
				new Effect.SlideDown('err_effect');
				new Effect.SlideUp('err_effect', {delay:5});
			}
		}
	});
}
