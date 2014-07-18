/**
 * @author vasu naman
 */

	
	 function uploadFile() {
        var fd = new FormData();
        fd.append("fileToUpload", document.getElementById('fileToUpload').files[0]);
        var xhr = new XMLHttpRequest();
        xhr.upload.addEventListener("progress", uploadProgress, false);
        xhr.addEventListener("load", uploadComplete, false);
        xhr.addEventListener("error", uploadFailed, false);
        xhr.addEventListener("abort", uploadCanceled, false);
        xhr.open("POST", "temp/index.php");
        xhr.send(fd);
      }

      function uploadProgress(evt) {
        if (evt.lengthComputable) {
          //var percentComplete = Math.round(evt.loaded * 100 / evt.total);
          //document.getElementById('progressNumber').innerHTML = percentComplete.toString() + '%';
        }
        else {
          document.getElementById('progressNumber').innerHTML = 'unable to compute';
        }
      }

      function uploadComplete(evt) {
        /* This event is raised when the server send back a response */
        //alert(evt.target.responseText);
        
        //position of the div where image will be added
        var addImagePosition;
        
        
        		//div where we want to add the uploaded image
        		var desiredDiv = $('.crop-picture');
        		desiredDiv.html('<img src="temp/'+evt.target.responseText+'" data-name="'+evt.target.responseText+'" class="img-responsive" id="cropbox" alt="logo" ">');
        	
				// enables the crop button	        	
        		$('#cropButton').css("display","block");
        		
        		//disables the upload button
        		$('#uploadButton').css("display","none");
        		
        		
        	//crop codes
        	//var c = {"x":10,"y":10,"x2":260,"y2":310,"w":100,"h":100};
		     $('#cropbox').Jcrop({
		      aspectRatio: 1,	
		      allowResize: false,
		      allowSelect: false,
		      setSelect: [0,0,300,300],
		      onSelect: updateCoords
		    });
        
        
      }

      function uploadFailed(evt) {
        alert("There was an error attempting to upload the file.");
      }

      function uploadCanceled(evt) {
        alert("The upload has been canceled by the user or the browser dropped the connection.");
      }

//crop codes


  function updateCoords(c)
  {
    $('#x').val(c.x);
    $('#y').val(c.y);
    $('#w').val(c.w);
    $('#h').val(c.h);
  };

  function checkCoords()
  {
    if (parseInt($('#w').val())) return true;
    alert('Please select a crop region then press submit.');
    return false;
  };
  

//jquery window.load event 

$( document ).ready(function() {
  	$('#cropButton').click(function(){
  		var height = $('.upload-modal img').height();
  		var width = $('.upload-modal img').width();
  		var imageName = $('.upload-modal img').data('name');
		var imgOrder = $('#upload-img-order').val();
		var pid = $('#pid').val();
  		
  		//getting the x and y cordinate of cropping tool
  		
  		var xCordinate = $('#x').val();
  		var yCordinate = $('#y').val();
  		
  		
  		uploadCropImage(height,width,imageName,imgOrder,pid,xCordinate,yCordinate);
  	});
  	
  	/*$('#video-update').click(function(){
  		youtTubeUrl = $('#youtubevideo').val();
  		
  		if(youtTubeUrl == ''){
  			alert('Please enter some you tube url');
  		}
  		else {
  			btn = $(this);
  			BasicAjaxCall('&url='+youtTubeUrl,'v-includes/functions/function.embedyoutube.php','POST',btn,'null');
  		}
  	});*/
});


	 function uploadCropImage(height, width, imageName, imgOrder, pid, xCordinate, yCordinate) {
	 	
	 	var data = '&width='+width+'&height='+height+'&imagename='+imageName+'&imgOrder='+imgOrder+'&pid='+pid+'&xcordinate='+xCordinate+'&ycordinate='+yCordinate;
        $.ajax({
            type: "POST",
            url:"v-includes/functions/function.savecropimage.php",
            data: data,
            beforeSend:function(){
                // this is where we append a loading image
                $('').html('');
              },
            success:function(result){
            	//div where we want to add the uploaded image
        		var desiredDiv = $('.crop-picture');
        		desiredDiv.html('<img src="'+result+'" class="img-responsive" id="cropbox" alt="logo" ">');
				//desables the crop button	        	
        		$('#cropButton').css("display","none");
        		console.log(result);
				location.reload();
                $("").html('');
                return false;
        }});
      }
      
      
      /*
       * basic function to make ajax call which handles the button loading state and the html appending in any place
       * if you are not working with a bootstrap button then just pass null into "btn" variable and use loading div
       * for the loading effect 
       * to follow how loading button works in bootstrap use this link http://getbootstrap.com/javascript/#buttons
       * 
       * you must have to pass either button or loading div in the function to operate it nicely
       */
      /*function BasicAjaxCall(data, url, requestType, btn, loadingDiv) {
        $.ajax({
            type: requestType,
            url: url,
            data: data,
            
            
            beforeSend:function(){
                // this is where we append a loading image
                if(btn == 'null') {
                	$(loadingDiv).css("display","block");
                }
                else {
                	btn.button('loading');
                }
                
              },
            success:function(result){
            	
        		console.log(result);
                
                // this is where we remove the loadin effect
                if(btn == 'null') {
                	$(loadingDiv).css("display","none");
                }
                else {
                	btn.button('reset');
                }
                
                //remove this line if you are using these codes
                if (result == '0') {
                	
					alert('The YouTube video you entered does not exist');                	
                } 
                else if(result == '1') {
                	alert('video updated');
                }
                return false;
        }});
      	
      }*/
