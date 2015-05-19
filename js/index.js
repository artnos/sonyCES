//comfirm On add tuesday.

$(document).ready(function(){	
		$( "#whereWhen, #form, #contact, #stayConnected,#legal" ).hide();
		$('#header span:first-child').animate({
			opacity: 1,
			left: "0",
		  }, 500);
		  
		 $('#header span:nth-child(2)').animate({
			opacity: 1,
			left: "0",
		  }, 750);
		  
		 $('#header span:nth-child(3)').animate({
			opacity: 1,
			left: "0",
		  }, 1000, function(){
			
			//container, contact, stayConnected
			var staggerTime = 0;
			
			$("#whereWhen").fadeIn(staggerTime+ 1000)				
			$("#form").fadeIn(staggerTime+ 1250)				
			$("#contact").fadeIn(staggerTime+ 1500)				
			$("#stayConnected").fadeIn(staggerTime+ 1750)	
			$("#legal").fadeIn(staggerTime+ 1750)			
		
		  
			  
		});//end of header span animation 3
		
		
		$("input[name='comfirm'] ").click(function() {
			if(	 $("input[name='comfirm']").prop('checked')	){
			
			$('#time').find('option').remove().end();
			showTime('January 7th 2014');
			//select the first one.
			comfirmOn(); 
			} else { comfirmOff()	}
    	});
		
		var optionID = $("#time");
		var dayChecked;
		//Format like this: <option value="1:00pm" <?php print $pm100 ?>>1:00 p.m.</option>
	
		var jan7 = {
		"times":  [	{ "value":"10:00am","name":"10:00 a.m." },
					{ "value":"10:30am","name":"10:30 a.m." },
					{ "value":"11:00am","name":"11:00 a.m." },
					{ "value":"11:30am","name":"11:30 a.m." },
					{ "value":"12:00pm","name":"12:00 p.m." },
					{ "value":"12:30pm","name":"12:30 p.m." },
					{ "value":"1:00pm","name":"1:00 p.m." },
					{ "value":"1:30pm","name":"1:30 p.m." },
					{ "value":"2:00pm","name":"2:00 p.m." },
					{ "value":"2:30pm","name":"2:30 p.m." },
					{ "value":"3:00pm","name":"3:00 p.m." },
					{ "value":"3:30pm","name":"3:30 p.m." },
					{ "value":"4:00pm","name":"4:00 p.m." },
					{ "value":"4:30pm","name":"4:30 p.m." },
					{ "value":"5:00pm","name":"5:00 p.m." }	
				]
			};
		
		var jan8 = {
		"times":  [	{ "value":"9:00am",	"name":"9:00 a.m." },
					{ "value":"9:30am",	"name":"9:30 a.m." },
					{ "value":"10:00am","name":"10:00 a.m." },
					{ "value":"10:30am","name":"10:30 a.m." },
					{ "value":"11:00am","name":"11:00 a.m." },
					{ "value":"11:30am","name":"11:30 a.m." },
					{ "value":"12:00pm","name":"12:00 p.m." },
					{ "value":"12:30pm","name":"12:30 p.m." },
					{ "value":"1:00pm","name":"1:00 p.m." },
					{ "value":"1:30pm","name":"1:30 p.m." },
					{ "value":"2:00pm","name":"2:00 p.m." },
					{ "value":"2:30pm","name":"2:30 p.m." },
					{ "value":"3:00pm","name":"3:00 p.m." },
					{ "value":"3:30pm","name":"3:30 p.m." },
					{ "value":"4:00pm","name":"4:00 p.m." },
					{ "value":"4:30pm","name":"4:30 p.m." },
					{ "value":"5:00pm","name":"5:00 p.m." }	
					]
		};
		
		var jan9 = {
		"times":  [	{ "value":"9:00am",	"name":"9:00 a.m." },
					{ "value":"9:30am",	"name":"9:30 a.m." },
					{ "value":"10:00am","name":"10:00 a.m." },
					{ "value":"10:30am","name":"10:30 a.m." },
					{ "value":"11:00am","name":"11:00 a.m." },
					{ "value":"11:30am","name":"11:30 a.m." },
					{ "value":"12:00pm","name":"12:00 p.m." },
					{ "value":"12:30pm","name":"12:30 p.m." },
					{ "value":"1:00pm", "name":"1:00 p.m." },
					{ "value":"1:30pm", "name":"1:30 p.m." },
					{ "value":"2:00pm", "name":"2:00 p.m." },
					{ "value":"2:30pm", "name":"2:30 p.m." },
					{ "value":"3:00pm", "name":"3:00 p.m." },
					{ "value":"3:30pm", "name":"3:30 p.m." },
					{ "value":"4:00pm", "name":"4:00 p.m." },
					{ "value":"4:30pm", "name":"4:30 p.m." },
					{ "value":"5:00pm", "name":"5:00 p.m." }	
					]
		};
		
				
		var jan10 = {
			"times":  [	{ "value":"9:00am",	"name":"9:00 a.m." }	,
						{ "value":"9:30am",	"name":"9:30 a.m." }	,
						{ "value":"10:00am","name":"10:00 a.m." }	,
						{ "value":"10:30am","name":"10:30 a.m." }	,
						{ "value":"11:00am","name":"11:00 a.m." }	,
						{ "value":"11:30am","name":"11:30 a.m." }	,
						{ "value":"12:00pm","name":"12:00 p.m." }	
						]
			};
				
				
				
		$("input[name='day'] ").click(function() {
			
			if ( $("input[name='comfirm'] ").prop('checked') != true){
				$("input[name='comfirm']").prop('checked', true);	
			}
			
			$('#time').find('option').remove().end();
			
		   dayChecked = $("input:radio[name='day']:checked").val();
		   showTime(dayChecked)
    	});
		
		function showTime(daySelected){
			switch(daySelected){
			case "January 7th 2014":
			  $.each(jan7.times, function() {	optionID.append($("<option />").val(this.value).text(this.name)); 	});
			  break;
			case "January 8th 2014":
			  $.each(jan8.times, function() {	optionID.append($("<option />").val(this.value).text(this.name)); 	});
			  break;
			case "January 9th 2014":
			  $.each(jan9.times, function() {	optionID.append($("<option />").val(this.value).text(this.name)); 	});
			  break;
			case "January 10th 2014":
			  $.each(jan10.times, function() {	optionID.append($("<option />").val(this.value).text(this.name)); 	});
			  break;
			}
		}
		
		
		var pageValid;
		var nameReg = new RegExp("^[a-zA-Z]{2,}$");
		var emailReg = new RegExp("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$")		
		var telephoneReg = new RegExp("^[A-Za-z]*, $");
		//^[A-Za-z]*, $  //no characters
		///[\d()\-+]/
		var logArray = new Array();

		$("button[name='submit']").click(function() {
		  pageValid = true;
		  printLog = '';
		  
		  //clear array
		  logArray.length = 0;
		  //validate content
		  //var printLog;
		  
		  //$(this).text().replace(/ /g,'');//remove all white space
		  // $.trim(	formFName.val()	)  //front and back white space

		
		  $("input[name='fName']").val( 
		  $.trim($("input[name='fName']").val())  
		  ) 
		  
		  if(	nameReg.test( $("input[name='fName']").val() )	!= true 	){
		  pageValid = false;
		  logArray.push('First Name is Required');
		  cssError(	$("input[name='fName']")	);
		  } else {
		  cssClear(	$("input[name='fName']")	);
		  }
		  
		  $("input[name='lName']").val( 
		  $.trim($("input[name='lName']").val())  
		  ) 
		  if(	nameReg.test( $("input[name='lName']").val())	!= true 	){
		  pageValid = false;
		  logArray.push('Last Name is Required');
		  cssError(	$("input[name='lName']")	);
		  } else {
		  cssClear(	$("input[name='lName']")	);
		  }
		  
		  $("input[name='eMail']").val( 
		  $.trim($("input[name='eMail']").val())  
		  ) 
		  if(	emailReg.test( $("input[name='eMail']").val() )	!= true 	){
		  pageValid = false;
		  logArray.push('E-Mail is Required');
		  cssError(	$("input[name='eMail']")	);
		  } else {
		  cssClear(	$("input[name='eMail']")	);
		  } 
		  
		 /*
		  if(	telephoneReg.test( $("input[name='telephone']").val() )	!= true 	){
		  pageValid = false;
		  } 
		  */
		   
		  //I have to fix this with numbers +()
		  if(	 $("input[name='telephone']").val() == '' 	){
		  pageValid = false;
		  logArray.push('Telephone Number is Required');
		  cssError(		$("input[name='telephone']")	);
		  } else {
		  cssClear(		$("input[name='telephone']")	);
		  } 
		  
		  if(	 $("input[name='outlet']").val() == '' 	){
		  pageValid = false;
		  logArray.push('Outlet is Required');
		  cssError(		$("input[name='outlet']")	);
		  } else {
		  cssClear(		$("input[name='outlet']")	);
		  } 
		  
		  /*
		  printLog +=  $("input[name='outlet']").val() + ' :outlet<br/>';
		  printLog += $("input:radio[name='day']:checked").val() + ' :day<br/>';
	      */
		  
		  $('#log2').html("")
		  if(  $("input[name='comfirm']:checkbox:checked").val() == "yes" &&  
		  $( "select#time option:selected").val()  == 'none' )
		  	{
				 pageValid = false; 
				 $('#log2').html("If you want a booth tour please select a time.")
				 $('#log2').hide().fadeIn();
			}
		  
		  for(var i = 0; i < logArray.length; i++) {
			 printLog +=  logArray [i] + "   ";
			 //if i is an odd number
			 if(i % 2 != 0){ printLog += "<br/>";  }
			 else if(i != logArray.length -1){ printLog += " - "; } 
	      }

   
		  $('#log').html(printLog)
	      $('#log').hide().fadeIn();

		  return false;
			
		  if(pageValid) {return true;} else {return false; } 
		   //return false;
		}); //end of submit click
	}); //end of document ready

function comfirmOn(){
	$("input[name='day'][value='January 7th 2014']").prop("checked", true)
}

function comfirmOff(){
	$('#time').find('option').remove().end(); //clear selects
	
	//uncheck days .each
	$("input[name='day'][value='January 7th 2014']").prop("checked", false)
	$("input[name='day'][value='January 8th 2014']").prop("checked", false)
	$("input[name='day'][value='January 9th 2014']").prop("checked", false)
	$("input[name='day'][value='January 10th 2014']").prop("checked", false)

	$('[name=time]').val("none");
}

function cssError(input){ 	input.css('border','solid 2px red') }
function cssClear(input){	input.css('border','')	}


// #############################################
(function($) {
	$(document).ready(function() {
		window.pulse_image = $('#customBG');
		window.pulse_continue_loop = true;
		PulseAnimation();
		
	});
})(jQuery);

// #############################################
function PulseAnimation()
{
	var minOpacity = .5;
	var fadeOutDuration = 5650;
	var fadeInDuration = 5650;
	
	window.pulse_image.animate({
		opacity: minOpacity
	}, fadeOutDuration, function() {
		window.pulse_image.animate({
			opacity: 1
		}, fadeInDuration, function() {
			if(window.pulse_continue_loop) {
				PulseAnimation();
			}
		})
	});
}
	