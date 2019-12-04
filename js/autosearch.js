					$(document).ready(function(){

					$("#demo3").keyup(function() 
					{
					var searchbox = $(this).val();
					var dataString = 'searchword='+ searchbox;

					if(searchbox=='')
					{
					}
					else
					{

					$.ajax({
					type: "POST",
					url: "autosearch.php",
					data: dataString,
					cache: false,
					success: function(html)
					{

					$("#display").html(html).show();
						
						
						}




					});
					}return false;    


					});
					});

					jQuery(function($){
					   $("#demo3").Watermark("Please Enter Product Name");
					   });