<?php 
  include ('validateCustomer.php');
?>
<html>
	<script language="JavaScript" type="text/javascript" src="../js/select.js"></script>
    <div style="margin-top:50px;margin-bottom:100px;">
    	<h2>Select your meals</h2>
<div class="col-md-5">
        <select style="width:100%;min-height:50%;" id="sbOne" multiple="multiple">
            <?php
                //grab information from the database and populate select menu
                require('../connect.php');
                $setPath = pg_query("Set search_path='foobox';");
                //Grab all meals that are active
                $getMeals = pg_query("Select * from meals where active=true;");
                while($row = pg_fetch_array($getMeals)){
                  echo '<option class="op" value="'.$row["id"]. '"">' .$row["name"].'</option>';
                }
            ?>
			
			
        </select>
        <button style="width:100%;" onclick="populateOnce('sbOne','sbTwo')" type="button" class="btn btn-primary" id="left" value="<">Select Meal</button>
		</div>
		<div class="col-md-5">
            <form action="submitOrderMeal.php" method="post">
                <select name="list[]" style="width:100%;min-height:50%;" id="sbTwo" multiple="multiple">
                </select>
                <button style="width:100%;" type="submit" class="btn btn-primary" id="left" value="<">ORDER</button>
            </form>
        <button style="width:100%;"onclick="populateOnce('sbTwo','sbOne')" type="button" class="btn btn-primary" id="left" value="<">Remove Selected</button>
		</div>
    </div>
    
  </html>