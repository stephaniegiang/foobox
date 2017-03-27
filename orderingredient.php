<html>
	<script language="JavaScript" type="text/javascript" src="../js/select.js"	></script>
    <div style="margin-top:50px;margin-bottom:100px;">
    	<h2> Select your ingredients</h2>
        <select style="width:45%; min-height:50%;" id="sbOne" multiple="multiple">
          <?php
            require('../connect.php');
            $setPath = pg_query("Set search_path='foobox';");
            $getIngredients = pg_query("Select * from Ingredient;");
            while($row = pg_fetch_array($getIngredients)){
              echo '<option class="op" value="'.$row["id"]. '"">' .$row["name"].'</option>';
            }
          ?>
        </select>
        <form action="orderingTheIngredient.php" method="post">
          <select name="list[]" style="width:45%; min-height:50%;" id="sbTwo" multiple="multiple"></select>
          <div class="text-center" style="margin-top:20px">
            <button name="add-item" id="add-item" type="submit" class="btn btn-primary"><strong>Order Ingredients</strong></button>
          </div>
        </form>

        <br />
        <div style="margin:0 auto; text-align:center;" class="btn-group" role="group">
          <button onclick="populateOnce('sbOne','sbTwo')"type="button" class="btn btn-default" id="left" value="<">></button>
          <button onclick="populateOnce('sbTwo','sbOne')"type="button" class="btn btn-default" id="left" value="<"><</button>
        </div>

    </div>
  </html>