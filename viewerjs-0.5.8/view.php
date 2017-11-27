
<?php
// We'll be outputting a PDF
//header('Content-Type: application/vnd.openxmlformats-officedocument.presentationml.presentation');

// It will be called downloaded.pdf
//header('Content-Disposition: inline; filename="sa.pptx"');

// The PDF source is in original.pdf
//readfile('sa.pptx');
if(isset($_REQUEST['h']))
{
	$f=file_get_contents("http://localhost/url/viewerjs-0.5.8/sample.doc");
	//print_r($f);
	
	echo '<a href="ViewerJS/#../$f">dddd</a>';
}
?>


<!DOCTYPE html>
<html>
<head>
 
  <script src="jquery.js"></script>

</head>

<body><a href="ViewerJS/#../yii.pdf">Click</a> <br />


<a href="ViewerJS/#../sample.doc">Click</a>
<a href="?h">Click</a>
<br />
<!--<iframe src="http://docs.google.com/gview?url=http://localhost/url/viewerjs-0.5.8/sample.doc&embedded=true" style="width:600px; height:500px;" frameborder="0"></iframe>
-->

<style>
   #outerContainer .visibleMediumView
   {
	   display:none!important;
   }
   
</style>

 </body>
</html>
<script>
 $(document).ready(function(e) {
    $("#secondaryDownload").hide();
	$("#secondaryPrint").hide();
});
</script>
