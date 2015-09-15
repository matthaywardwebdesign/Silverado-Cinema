<?php
  include "header.php";
  $movie = $_GET["movie"];
  $moviename = "";
  $moviecat = "";

  if ($movie == "aloha"){
    $moviename = "Aloha";
    $moviecat = "RC";
  }

  if ($movie == "insideout"){
    $moviename = "Inside Out";
    $moviecat = "CH";
  }

  if ($movie == "awalkinthewoods"){
    $moviename = "A Walk in the Woods";
    $moviecat = "AF";
  }

  if ($movie == "noescape"){
    $moviename = "No Escape";
    $moviecat = "AC";
  }

  $days = [];
  if ($moviecat == "AC"){
    $days = ["Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];
    Print "<script>var times = {'Wednesday':'9pm','Thursday':'9pm','Friday':'9pm','Saturday':'9pm','Sunday':'9pm'};</script>";
  }

  if ($moviecat == "AF"){
    $days = ["Monday", "Tuesday", "Saturday", "Sunday"];
    Print "<script>var times = {'Monday':'6pm', 'Tuesday': '6pm', 'Saturday':'3pm', 'Sunday':'3pm'};</script>";
  }

  if ($moviecat == "CH"){
    $days = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];
    Print "<script>var times = {'Monday':'9pm','Tuesday':'9pm','Wednesday':'1pm','Thursday':'1pm','Friday':'1pm','Saturday':'6pm','Sunday':'6pm'};</script>";
  }


  if ($moviecat == "CH"){
    $days = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];
    Print "<script>var times = {'Monday':'1pm','Tuesday':'1pm','Wednesday':'6pm','Thursday':'6pm','Friday':'6pm','Saturday':'12pm','Sunday':'12pm'};</script>";
  }

?>
<h1>Book Movie</h1>
<h3><?php Print $moviename; ?></h3>
<br><br>
<form action="http://titan.csit.rmit.edu.au/~e54061/wp/testbooking.php" method="post">
  <input type='hidden' class='input-field' name='movie' value='<?php Print $moviecat;?>' />
  <b>Day: </b>
  <select name='day' id='day'>
    <?php
      for ($i = 0; $i < count($days); $i++){
        Print "<option value='" . $days[$i] . "'>" . $days[$i] . "</option>";
      }
    ?>
  </select>
  <br><br>
  <b>Time: </b><input class='input-field' type='text' name='time' id='time' disabled/>
  <br><br>
  <h3>Seat Quantities</h3>
  <br><br>
  <b>Standard Adult: </b><input class='input-field' type='number' name='SA' min='0' value='0'/>
  <br><br>
  <b>Standard Concession: </b><input class='input-field' type='number' name='SP' min='0' value='0'/>
  <br><br>
  <b>Standard Child: </b><input class='input-field' type='number' name='SC' min='0' value='0'/>
  <br><br>
  <b>First Class Adult: </b><input class='input-field' type='number' name='FA' min='0' value='0'/>
  <br><br>
  <b>First Class Child: </b><input class='input-field' type='number' name='FC' min='0' value='0'/>
  <br><br>
  <b>Beanbag, one lonely person: </b><input class='input-field' type='number' name='B1' min='0' value='0'/>
  <br><br>
  <b>Beanbag, up to 2 people: </b><input class='input-field' type='number' name='B2' min='0' value='0'/>
  <br><br>
  <b>Beanbag, up to 3 children: </b><input class='input-field' type='number' name='B3' min='0' value='0'/>
  <br><br>
</form>
<script>
  $("#time").val(times["<?php Print $days[0];?>"]);
  $("#day").change(function() {
    $("#time").val(times[$("#day").val()]);
  });
</script>
<?php
  include "footer.php";
?>
