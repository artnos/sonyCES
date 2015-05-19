	$(document).ready(function(){	

		$("input[name='comfirm'] ").click(function() {
			
			if(	 $("input[name='comfirm']").prop('checked')	){
					comfirmOn();
			} else {
					comfirmOff()
			}
			alert('hi ' + $("input[name='comfirm']").value());
    	});
		
		var pageValid;
		var nameReg = new RegExp("^[a-zA-Z]{2,}$");
		var emailReg = new RegExp("^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$");
		var telephoneReg = new RegExp ("^(?:\+\d{1,3}|0\d{1,3}|00\d{1,2})?(?:\s?\(\d+\))?(?:[-\/\s.]|\d)+$");
		
		$("input[name='submit']").click(function() {
		  pageValid = true;
		  
		  alert('click');
		  //validate content
		  var printLog;
		  
		  if(	nameReg.test( $("input[name='fName']").val() )	!= true 	){
		  pageValid = false;
		  printLog = 'Please Enter a Valid First Name<br/>';
		  } else {
		  printLog = '';
		  }
		  
		  if(	nameReg.test( $("input[name='lName']").val() )	!= true 	){
		  pageValid = false;
		  printLog += 'Please Enter a Valid Last Name<br/>';
		  }
		  
		  if(	emailReg.test( $("input[name='eName']").val() )	!= true 	){
		  pageValid = false;
		  printLog += 'Please Enter a Valid E-Mail<br/>';
		  }  
		  
		  if(	telephone.test( $("input[name='telephone']").val() )	!= true 	){
		  pageValid = false;
		  printLog += 'Please Enter a Valid Telephone Number<br/>';
		  }  
		
		  /*
		  printLog += $("input[name='outlet']").val() + ' ';
		  printLog += $("input[name='comfirm']:checkbox:checked").val() + ' ';
		  printLog += $("input:radio[name='day']:checked").val() + ' ';
		  printLog += $( "select#time option:selected").val() + ' ';
          */

		  $('#log').html(printLog)
		  
		  
		  //if(pageValid) { return true;  }else { return false; } 
		   return false;
		  
		});

	}); //end of document ready

function comfirmOn(){
	$('.option').fadeIn();
	$("input[name='day'][value='January 7th 2014']").prop("checked", true)
	$('[name=time]').val("2:00pm");
}

function comfirmOff(){
	$('.option').hide();
	$("input[name='day'][value='January 7th 2014']").prop("checked", false)
	$('[name=time]').val("none");
}
	
	