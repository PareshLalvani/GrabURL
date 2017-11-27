<?php //error_reporting(0);
include('simple_html_dom.php');
include('GrabzItClient.class.php');

 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

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

input[type=submit] {
    width: 10%;
    background-color: #4CAF50;
    color: white;
    padding: 5px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}

div {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}


table {
    border-collapse: collapse;
    width: 70%;
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


.green
{
	background:blue!important;
	color:white;
	display:inline-block;
}

#scrshot img
{
	width:100px;
	height:100px;
	//transition:all 2s;
	cursor:pointer;
}

#scrshot img:hover
{
	position:fixed;
	width:100%;
	height:100%;
	top:0px;
    //right:150px;
	left:70px;
	bottom:0px;
	z-index:999;
}
</style>



</head>

<body>
<div>
  <form action="" method="post">
    
    <input type="url" id="" name="urlfirst" placeholder="Enter Url" required="required">

     <input type="text" id="" name="keyword" placeholder="Enter Keyword">

   
  
    <input type="submit" name="sub" value="Go">
    
    
  </form>
  
</div>

<?php

 if(isset($_REQUEST['sub']))
 {
	 $furl=$_REQUEST['urlfirst'];
	 $key=$_REQUEST['keyword'];
	 $status=array("title"=>"","mtitle"=>"","mdesc"=>"","h1"=>"","h2"=>"");

 if (filter_var($furl, FILTER_VALIDATE_URL) === FALSE) {
    echo '<span style="color:red">Invalid Url</span> <br />';
	echo '<span>url is like http://www.example.com</span> <br />';
     }

   else
      {
	
$file_headers = @get_headers($furl);
if(!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') {
    echo '<span style="color:red">Url not exist</span>';
}
else {
    //echo '<span style="color:green">Url exist</span>';


$grabzIt = new GrabzItClient("ZjJhODFjZDcyYWQ0NGJiYmEyMTI3OGYyNmU5NWViNGM=", "P3AIPy8/fjNNUyguPz8/cD8/ZT9xPz8SPz8/P0s/Pz8=");
 

$grabzIt->SetImageOptions($furl,'',1024,768,200,200);
//$grabzIt->URLToImage($furl);
$grabzIt->SaveTo("test.jpg"); 	








     $html = file_get_html($furl);
	   
$links = array();
foreach($html->find('a') as $a) {
 $links[] = $a->href;
 
}
//print_r($links);
 $title = array();
foreach($html->find('title') as $title) {
 $sitetitle[] = $title->plaintext;
 
}

 


foreach($html->find('h1') as $header) {
 $headlines1[] = $header->plaintext;
 
}

foreach($html->find('h2') as $header) {
 $headlines2[] = $header->plaintext;
 
}

foreach($html->find('h3') as $header) {
 $headlines3[] = $header->plaintext;
 
}


foreach($html->find('h4') as $header) {
 $headlines4[] = $header->plaintext;
 
}

foreach($html->find('h5') as $header) {
 $headlines5[] = $header->plaintext;
 
}
foreach($html->find('h6') as $header) {
 $headlines6[] = $header->plaintext;
 
}
$meta = array();
foreach($html->find('meta') as $met) {
 if($met->name=='title')
 {
	 $metatitle[]=$met->content;
 }
 
}

$meta = array();
foreach($html->find('meta') as $met) {
 if($met->name=='description')
 {
	 $metadesc[]=$met->content;
 }
 
}

$meta = array();
foreach($html->find('meta') as $met) {
 if($met->name=='keywords')
 {
	 $metakey[]=$met->content;
 }
 
}


foreach($html->find('p') as $par) {
 $paragraph[] = $par->plaintext;
 
}

foreach($html->find('ul li') as $u) {
 $ul[] = $u->plaintext;
 
}


foreach($html->find('ol li') as $o) {
 $ol[] = $o->plaintext;
 
}

	 
	  ?>
	 
<br /><br /><br />	 
<table>

 
  <tr>
   <th>Status</th>
    <th></th>
    <th>Content</th>
    <th>Keyword Found?</th>
    
  </tr>
  
  <tr>
   <td><span style="color:green">Ok..</span></td>
  <th>Url Status</th>
  <td style="color:green">OK!!!</td>
  <td>-</td>
  </tr>
  
  <tr>
   <td>
    <?php if(empty($status['title'])){?><span style="color:red">NotOk..</span> <?php } ?>
   
   </td>
   
  <th>Page Title</th>
  
  <td><?php if(!empty($sitetitle[0])){if(!empty($key)) { if(!stristr($key,",")) { echo preg_replace("/\w*?$key\w*/i", "<b style='color:green'>$0</b>", $sitetitle[0]);} else { echo highlight($sitetitle[0], str_replace(","," ",$key),'title'); }  }  else {echo $sitetitle[0]; } } else { echo exist('No Page Title'); } ?></td>
  <td><?php if(!empty($key) && !empty($sitetitle[0])){ keyword($key,$sitetitle[0],'title');} ?></td>
  </tr>
  
  <tr>
  <td> <?php if(empty($status['mtitle'])){?><span style="color:red">NotOk..</span> <?php } ?></td>
  <th>Meta Title</th>
  <td><?php if(!empty($metatitle[0])){if(!empty($key)) { if(!stristr($key,",")) { echo preg_replace("/\w*?$key\w*/i", "<b style='color:green'>$0</b>", $metatitle[0]);} else { echo highlight($metatitle[0], str_replace(","," ",$key),'mtitle'); }  }  else {echo $metatitle[0]; } } else { echo exist('No Meta Title'); } ?></td>
  <td><?php if(!empty($key) && !empty($metatitle[0])){ keyword($key,$metatitle[0],'mtitle');} ?></td>
  </tr>
  
   <tr>
   <td> <?php if(empty($status['mdesc'])){?><span style="color:red">NotOk..</span> <?php } ?></td>
  <th>Meta Description</th>
  <td><?php if(!empty($metadesc[0])){if(!empty($key)) { if(!stristr($key,",")) { echo preg_replace("/\w*?$key\w*/i", "<b style='color:green'>$0</b>", $metadesc[0]);} else { echo highlight($metadesc[0], str_replace(","," ",$key),'mdesc'); }  }  else {echo $metadesc[0]; } } else { echo exist('No Meta Description'); } ?></td>
  <td><?php if(!empty($key) && !empty($metadesc[0])){ keyword($key,$metadesc[0],'mdesc');} ?></td>
  </tr>

   <tr>
   <td></td>
  <th>Meta Keyword</th>
  <td><?php if(!empty($metakey[0])){if(!empty($key)) { if(!stristr($key,",")) { echo preg_replace("/\w*?$key\w*/i", "<b style='color:green'>$0</b>", $metakey[0]);} else { echo highlight($metakey[0], str_replace(","," ",$key)); }  }  else {echo $metakey[0]; } } else { echo exist('No Meta Keyword'); } ?></td>
  <td><?php if(!empty($key) && !empty($metakey[0])){ keyword($key,$metakey[0]);} ?></td>
  </tr>
  
  
   <tr>
   <td> <?php if(empty($status['h1'])){?><span style="color:red">NotOk..</span> <?php } ?></td>
  <th>First H1</th>
  <td><?php if(!empty($headlines1[0])){if(!empty($key)) { if(!stristr($key,",")) { echo preg_replace("/\w*?$key\w*/i", "<b style='color:green'>$0</b>", $headlines1[0]);} else { echo highlight($headlines1[0], str_replace(","," ",$key),'h1'); }  }  else {echo $headlines1[0]; } } else { echo exist('No H1 Tag'); } ?></td>
  <td><?php if(!empty($key) && !empty($headlines1[0])){ keyword($key,$headlines1[0],'h1');} ?></td>
  </tr>
  
  
   <tr>
   <td> <?php if(empty($status['h2'])){?><span style="color:red">NotOk..</span> <?php } ?></td>
  <th>First H2</th>
  <td><?php if(!empty($headlines2[0])){if(!empty($key)) { if(!stristr($key,",")) { echo preg_replace("/\w*?$key\w*/i", "<b style='color:green'>$0</b>", $headlines2[0]);} else { echo highlight($headlines2[0], str_replace(","," ",$key),'h2'); }  }  else {echo $headlines2[0]; } } else { echo exist('No H2 Tag'); } ?></td>
  <td><?php if(!empty($key) && !empty($headlines2[0])){ keyword($key,$headlines2[0],'h2');} ?></td>
  </tr>
  
  
  
   <tr>
   <td></td>
  <th>First H3</th>
  <td><?php if(!empty($headlines3[0])){if(!empty($key)) { if(!stristr($key,",")) { echo preg_replace("/\w*?$key\w*/i", "<b style='color:green'>$0</b>", $headlines3[0]);} else { echo highlight($headlines3[0], str_replace(","," ",$key)); }  }  else {echo $headlines3[0]; } } else { echo exist('No H3 Tag'); } ?></td>
  <td><?php if(!empty($key) && !empty($headlines3[0])){ keyword($key,$headlines3[0]);} ?></td>
  </tr>
  
  
   <tr>
   <td></td>
  <th>First H4</th>
  <td><?php if(!empty($headlines4[0])){if(!empty($key)) { if(!stristr($key,",")) { echo preg_replace("/\w*?$key\w*/i", "<b style='color:green'>$0</b>", $headlines4[0]);} else { echo highlight($headlines4[0], str_replace(","," ",$key)); }  }  else {echo $headlines4[0]; } } else { echo exist('No H4 Tag'); } ?></td>
  <td><?php if(!empty($key) && !empty($headlines4[0])){ keyword($key,$headlines4[0]);} ?></td>
  </tr>
  
  
   <tr>
   <td></td>
  <th>First H5</th>
  <td><?php if(!empty($headlines5[0])){if(!empty($key)) { if(!stristr($key,",")) { echo preg_replace("/\w*?$key\w*/i", "<b style='color:green'>$0</b>", $headlines5[0]);} else { echo highlight($headlines5[0], str_replace(","," ",$key)); }  }  else {echo $headlines5[0]; } } else { echo exist('No H5 Tag'); } ?></td>
  <td><?php if(!empty($key) && !empty($headlines5[0]) ){ keyword($key,$headlines5[0]);} ?></td>
  </tr>
  
  <tr>
  <td></td>
  <th>First H6</th>
  <td><?php if(!empty($headlines6[0])){if(!empty($key)) { if(!stristr($key,",")) { echo preg_replace("/\w*?$key\w*/i", "<b style='color:green'>$0</b>", $headlines6[0]);} else { echo highlight($headlines6[0], str_replace(","," ",$key)); }  }  else {echo $headlines6[0]; } } else { echo exist('No H6 Tag'); } ?></td>
  <td><?php if(!empty($key) && !empty($headlines6[0])){ keyword($key,$headlines5[0]);} ?></td>
  </tr>
  
  
  
  
  
  <tr>
  <td></td>
  <th>First Paragraph</th>
  <td><?php if(!empty($paragraph[0])){if(!empty($key)) { if(!stristr($key,",")) { echo preg_replace("/\w*?$key\w*/i", "<b style='color:green'>$0</b>", $paragraph[0]);} else { echo highlight($paragraph[0], str_replace(","," ",$key)); }  }  else {echo $paragraph[0]; } } else { echo exist('No Paragraph Tag'); } ?></td>
  <td><?php if(!empty($key) && !empty($paragraph[0])){ keyword($key,$paragraph[0]);} ?></td>
  </tr>
  
  
  
   <tr>
   <td></td>
  <th>First Hyperlink</th>
  <td><?php if(!empty($links[0])){if(!empty($key)) { if(!stristr($key,",")) { echo preg_replace("/\w*?$key\w*/i", "<b style='color:green'>$0</b>", $links[0]);} else { echo highlight($links[0], str_replace(","," ",$key)); }  }  else {echo $links[0]; } } else { echo exist('No Link Tag'); } ?></td>
  <td><?php if(!empty($key) && !empty($links[0])){ keyword($key,$links[0]);} ?></td>
  </tr>
  
  
  
  
  
   <tr>
   <td></td>
  <th>Second Hyperlink</th>
  <td><?php if(!empty($links[1])){if(!empty($key)) { if(!stristr($key,",")) { echo preg_replace("/\w*?$key\w*/i", "<b style='color:green'>$0</b>", $links[1]);} else { echo highlight($links[1], str_replace(","," ",$key)); }  }  else {echo $links[1]; } } else { echo exist('No Second Link Tag'); } ?></td>
  <td><?php if(!empty($key) && !empty($links[1])){ keyword($key,$links[1]);} ?></td>
  </tr>
  
  
  
   <tr>
   <td></td>
  <th>Third Hyperlink</th>
  <td><?php if(!empty($links[2])){if(!empty($key)) { if(!stristr($key,",")) { echo preg_replace("/\w*?$key\w*/i", "<b style='color:green'>$0</b>", $links[2]);} else { echo highlight($links[2], str_replace(","," ",$key)); }  }  else {echo $links[2]; } } else { echo exist('No Third Link Tag'); } ?></td>
  <td><?php if(!empty($key) && !empty($links[2])){ keyword($key,$links[2]);} ?></td>
  </tr>
  
  <tr>
  <td></td>
   <th>Page ScreenShot</th>
   <td id="scrshot"><img src="test.jpg" /></td>
  
  </tr>
  
  
</table>
<?php
	 
	 
	 
	 
	 
	 }

}	



 







 

 
 
 
 
 
 
  
 
 
 
 
 




	 
 }
 
 


function exist($param)
{
	return " $param ";
}

function keyword($key,$cont,$tag='')
{
if(!stristr($key,","))
{ 
  if(stristr($cont,$key))
  {
	  if($tag=='h1' || $tag=='title' || $tag=='mtitle')
	  {
		  if(strlen($cont)!=160)
		  {
			 echo '<span style="color:red">length is '.strlen($cont).'</span><span> (require length is 160 characters) </span>'; 
		  }
		  else
		  {
			  if($tag=='h1')
			  {
				  $status['h1']='ok';
				  
			  }
			  if($tag=='title')
			  {
				  $status['title']='ok';
			  }
			  
			  if($tag=='mtitle')
			  {
				  $status['mtitle']='ok';
			  }
		  }
	  }
	  
	  if($tag=='h2' || $tag=='mdesc' )
	  {
		  if(str_word_count($cont) != 50)
		  {
			  echo '<span style="color:red">word is '.str_word_count($cont).'</span><span> (require Word is 50) </span>';
		  }
		  
		  else
		  {
			   if($tag=='h2')
			  {
				  $status['h2']='ok';
			  }
			  if($tag=='mdesc')
			  {
				  $status['mdesc']='ok';
			  }
			  
		  }
	  }
  }
  
  else
  {
	   echo '<span style="color:red">Keywords Not Found</span>';
  }
  
}
else
{
  $keyarray=explode(",",$key);
  $flag=0;
  foreach($keyarray as $ka)
  {
	  if(stristr($cont,$ka))
	  {
		  
		  $flag=1;
		  
	  }
	  
	  else
	  {
		  $nfound[]=$ka;
	  }
	 
  }
  
  if($flag==0)
  {
	  echo '<span style="color:red">Keywords Not Found</span>';
  }
  if($flag==1)
  {
	  
	  
	  if(!empty($nfound))
	  {
		  foreach($nfound as $nf)
		  {
			   echo '<span style="color:red">'.$nf.' Not Found</span>,';
		  }
	  }
	  
	  //echo '<span style="color:green">Keyword Found</span>';
	  if($tag=='h1' || $tag=='title' || $tag=='mtitle')
	  {
		  if(strlen($cont)!=160)
		  {
			 echo '<span style="color:red">length is '.strlen($cont).'</span><span> (require length is 160 characters) </span>'; 
		  }
		  else
		  {
			  if($tag=='h1')
			  {
				  $status['h1']='ok';
				  
			  }
			  if($tag=='title')
			  {
				  $status['title']='ok';
			  }
			  
			  if($tag=='mtitle')
			  {
				  $status['mtitle']='ok';
			  }
		  }
	  }
	  
	  if($tag=='h2' || $tag=='mdesc' )
	  {
		  if(str_word_count($cont) != 50)
		  {
			  echo '<span style="color:red">word is '.str_word_count($cont).'</span><span> (require Word is 50) </span>';
		  }
		  
		  else
		  {
			   if($tag=='h2')
			  {
				  $status['h2']='ok';
			  }
			  if($tag=='mdesc')
			  {
				  $status['mdesc']='ok';
			  }
			  
		  }
	  }
  }
}
  
  
  
  
  
  
  
  

	  
 }
  
  
  function highlight($text, $words,$tag='' ) {
	  //echo $words;exit;
    preg_match_all('~\w+~', $words, $m);
    if(!$m)
        return $text;
    $re = '~\\b(' . implode('|', $m[0]) . ')\\b~i';
    return preg_replace($re, '<b style="color:green">$0</b>', $text);
}

   


?>
</body>
</html>











