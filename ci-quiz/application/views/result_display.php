<!DOCTYPE html>
<html lang="en">
<body>

<div id="container">
	<h1>Answer the Qestions</h1>
    
    <?php $score =0; ?>
    
      <?php $array1= array(); ?>
      <?php $array2= array(); ?>    
      <?php $array3= array(); ?>
      <?php $array4= array(); ?>
      <?php $array5= array(); ?>
      <?php $array6= array(); ?>
      <?php $array7= array(); ?>
      <?php $array8= array(); ?>
      
         <?php foreach($checks as $checkans) { ?>
               <?php array_push($array1, $checkans); } ?>
               
               
        <?php foreach($results as $res) { ?>
               <?php array_push($array2, $res->answer); 
			         array_push($array3, $res->quizID); 
			         array_push($array4, $res->question); 
			         array_push($array5, $res->choice1); 
			         array_push($array6, $res->choice2); 
			         array_push($array7, $res->choice3); 
					 array_push($array8, $res->answer); 
			   } ?>
               
               
           <?php 
		       for ($x=0; $x <10; $x++) { ?>
 
    <form method="post" action="<?php echo base_url();?>index.php/welcome/index">  
  
    <br><br>
    
    <h2>Your Score: </h2>
      <h1><?=$score?>/5</h1>
    
    <input type="submit" value="Play Again!">
    
    </form>
    
</div>

</body>
</html>