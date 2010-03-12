// [Layout Navigation Sub Routines]--------------->


function showhide_div(div_id){
	if($(div_id).visible() == true){
		//new Effect.SlideUp(div_id);
		$(div_id).hide();
	}else{
		//new Effect.SlideDown(div_id);
		$(div_id).show();
	}
}

function showhide_bubble(div_id){
	if($(div_id).visible() == true){
		//new Effect.SlideUp(div_id);
		$(div_id).hide();
	}else{
		//new Effect.SlideDown(div_id);
		$(div_id).show();
	}
}

//logout function
function logout(){
	if(confirm('You are about to log out. All unsaved changes will be lost. Do you want to log out now?')){
		return true;
	}else{
		return false;
	}
}

function response_msg(msg,msg_class){
	response_container = $('response_container');
	response_container.addClassName(msg_class);
	response_container.innerHTML = msg;
	if(!$('response_animation').visible()){
		new Effect.SlideDown('response_animation');
		new Effect.SlideUp('response_animation', {delay:10});
	}
}

function overlay() {

	el = document.getElementById("overlay");

	el.style.visibility = (el.style.visibility == "visible") ? "hidden" : "visible";

}

function show_form_box(div_id){
	if(!$(div_id).visible()){
		overlay();
		new Effect.Appear(div_id);
	}
}

function hide_form_box(div_id){
	
	if($(div_id).visible()){
		new Effect.Fade(div_id, {duration: .25});
		overlay();
	}
}

