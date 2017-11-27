<?php 

 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<style>
input {
    width: 20%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=button] {
    width: 10%;
    background-color: #4CAF50;
    color: white;
    padding: 5px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=button]:hover {
    background-color: #45a049;
}

div {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}


table {
    border-collapse: collapse;
    width: 100%;
	margin:auto;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: #60928A;
    color: white;
}
td
{
	width:560px!important;
}


</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>


</head>

<body>
<div id="form">
  
    
    <textarea  cols="60" rows="20" name="urlfirst" id="furl" placeholder="Enter comment" required="required">
 </textarea>
     
  
    <input type="button" name="sub" id="btn" value="Go">
    
    
  
  
</div>

<br />
<div id="table"></div>
<div id="table2"></div>
<div id="content" style="display:none"></div>





</body>
</html>

<script>

 $(document).ready(function(e) {
   	
		
		
		
		$(document).on('click','#btn',function(){
			 //alert("hello");return false;
		var furl=$("#furl").val();
		//alert(furl);
		$("#content").html(furl);
		//$("#content").show();
		//return false;
		var commentactor=[];
		var commentbody=[];
		var commenttime=[];
		
		i = 0;
		j=0;
		k=0;
		$(".UFICommentActorName").each(function(){
       
	    //alert($(this).text());
	     commentactor[i++]=($(this).text());
		
    });
	//return false;
	
	
	
	  $(".UFICommentBody").each(function(){
         //alert(($(this).text()));
		 //myString = myString.replace(/\D/g,'');
		
		 commentbody[j++]=($(this).text());
		
    });
	//return false;
	
	
		  $(".livetimestamp").each(function(){
        // alert(($(this).text()));
		 commenttime[k++]=($(this).text());
		
    });
	
	var regmobile=/^[789]\d{9}$/;
	$("#form").fadeOut();
	var table= $("#table2").append("<table><thead><tr><th>Comment Author</th><th>Comment Content</th></tr></thead>");
	 
	
	for(var x=0,y=0,z=0;x < commentactor.length,y < commentbody.length,z < commenttime.length;x++,y++,z++)
	{
		var st=commentbody[y].replace(/\D/g,'');
		
		var res=st.match(regmobile);
		//var res=st;
		if(res!=null)
		{
			//var res2=res.replace(/,/g,"");
		var table=table.append("<tbody><tr><td>"+commentactor[x]+"</td><td>"+res+"</td></tr></tbody>");
		}
	}
	
	
		
		
		});
	
	
});

</script>



