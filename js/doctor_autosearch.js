					$(document).ready(function(){

					$("#doctor_autosearch_textbox").keyup(function() 
					{
					var searchbox = $(this).val();
					var dataString = 'doctor_searchword='+ searchbox;

					if(searchbox=='')
					{
					}
					else
					{

					$.ajax({
					type: "POST",
					url: "doctor_autosearch.php",
					data: dataString,
					cache: false,
					success: function(html)
					{

					$("#display_doctor").html(html).show();
						
						
						}




					});
					}return false;    


					});
					});

					jQuery(function($){
					   $("#doctor_autosearch_textbox").Watermark("Please Enter your Location");
					   });