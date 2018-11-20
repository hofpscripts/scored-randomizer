<?php
include 'header.php';

function getStringBetween($str,$from,$to)
{
    $sub = substr($str, strpos($str,$from)+strlen($from),strlen($str));
    return substr($sub,0,strpos($sub,$to));
}
function placeExt($placing) {
if(is_numeric($placing)){
	if($placing == 11 || $placing == 12 || $placing == 13) {
		$ext = "th";
	}
	else {
		$placing = substr($placing, -1);
		switch($placing) {
			case 1: $ext = "st"; break;
			case 2: $ext = "nd"; break;
			case 3: $ext = "rd"; break;
			case 0: default: $ext = "th"; break;
		}
	}}
	return $ext;
}
 
//include 'inc/checkuser.php';
?>
<h1 class="text-center">Scored Randomizer</h1>

<?php
//$get = mysqli_query($dblink,"SELECT * FROM events WHERE id ='{$_POST['thisShow']}'");
//$s = mysqli_fetch_array($get);
  $showe = TRUE;

  $eventName = addslashes($_POST['showName']);
  $date = $_POST['date'];
  $host = $_POST['host'];
  $notes = $_POST['notes'];
 //$$if(isset($_POST['noEntries'])){
  $showe = TRUE; //}else{
  //$showe = FALSE;
  //}
  $lnbr = '
';
//echo $randomizer;//
	$allEntries = $_POST['allEntries'];
	
$allClasses = explode("\r\n\r\n",$allEntries); // split by blank lines (2 line breaks)

	echo '  <div class="form-group">
      <label for="textArea" class="col-lg-2 control-label"></label>
      <div class="col-lg-10">
        <textarea class="form-control input-sm" name="allEntries" id= cols="100" rows="20">';
	 
	 echo 'Event Name: ' .stripslashes($eventName).$lnbr;
  echo $date.$lnbr;
  echo 'Hosted by ' .$host.$lnbr.$lnbr;
  if(!empty($_POST['notes'])){
  echo $_POST['notes'].$lnbr;
  }
  
  
  echo $lnbf.$lnbr.$lnbr;
	foreach($allClasses as $class) {
		$thisClass = explode("\r\n",$class); // split by line (1 line break)
	   if(empty($thisClass[0])) { // Check if the first row is empty.
            $className = addslashes(htmlspecialchars(trim($thisClass[1]))); // Set the classname as the 1st row.
            $classEntries = array_slice($thisClass, 2); // Define new array with only the horses in it.
        }
        else {
            $className = addslashes(trim($thisClass[0])); // Set the classname as the 0th row.
            $classEntries = array_slice($thisClass, 1); // Define new array with only the horses in it.
        }
		
		
		$numEntries = count($classEntries); // Count the number of entries in the class.
        
        if($numEntries == 0) {
continue;
}

if($showe == TRUE){
        $entries = ' (' .$numEntries. ' entries)';
        }
  //where the magic happens!

        
       // $num = getStringBetween($className,'[',']');

        $className = $className;
        include 'single.php';
        
      
//if($_POST['type'] == '3DE'){
//include 'inc/rand/3de.php';}else{
//include 'inc/rand/basic.php';}            

}// end for each class or level
echo '</textarea></div>
<p><b>[<a href="index.php">Run Another Show</a>]</b></p>';

} // end form submit
else {
	?>
	<div class="row">
<div class="col-sm-6">
<h4>Class List Format</h4>
<p>Class Name<br />
Horse<br />
Horse<br />
<br />
Class Name<br />
Horse<br />
Horse<br /></p>
</div>
<div class="col-sm-6">
<h4>Disciplines</h4>
<ul>
	<li>Dressage</ll>
<li>Western Dressage</li>
<li>Eventing</li>
</ul>
</div></div>
    <form method="post" accept-charset="utf-8" action="<?php $_SERVER['PHP_SELF']; ?>" class="form-horizontal">
 
      <fieldset>
 <div class="form-group">
      <label for="name" class="col-lg-2 control-label">Event Name</label>
      <div class="col-lg-10">
     <input type="text" class="form-control input-sm" name="showName"/>
    
    </div></div>
     
      <div class="form-group">
      <label for="name" class="col-lg-2 control-label">Date</label>
      <div class="col-lg-10">
      <input type="text" class="form-control input-sm" placeholder="Full Date Recommended" name="date"/>
    </div></div>
        <div class="form-group">
      <label for="name" class="col-lg-2 control-label">Hosted By</label>
      <div class="col-lg-10">
      <input type="text" class="form-control input-sm" name="host"/>
    </div></div>
	

 <div class="form-group">
      <label for="name" class="col-lg-2 control-label">Additional Information</label>
      <div class="col-lg-10">
     <textarea class="form-control input-sm" rows="10" cols="30" name="noted" id="textArea"></textarea>
    </div></div>
     
	
    <div class="form-group">
      <label for="textArea" class="col-lg-2 control-label">Entries</label>
      <div class="col-lg-10">
        <textarea class="form-control input-sm" rows="20" cols="100" name="allEntries" id="textArea"></textarea><br/>
        <span class="help-block">Paste all of your entries in the box above. Make sure to leave a blank line between each class (even empty ones)! You can also delete empty ones.</span>
      </div>
</div>
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <input type="reset" class="btn btn-default" value="Clear">
        <input type="submit" class="btn btn-primary" name="gorand" value="Randomize">
      </div>
</div>
    </fieldset>
</form>
    </div></div>
    <?php
	
}

include 'footer.php';
?>