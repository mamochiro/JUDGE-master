<?php

require_once('../functions.php');
connectdb();
if(!loggedin())
  header("Location: login.php");
else
  include('header.php');

?>

<script language="JavaScript">
function chkdel(){if(confirm('Want to Enroll this subject?')){
	return true;
}else{
	return false;
}
}
</script>


</ul>
</div><!--/.nav-collapse -->
</div>
</div>
</div>

<?php
    $query = "SELECT `username` FROM `users`  WHERE sl ='".$_SESSION['sl']."'";
    $result = mysql_query($query);

    while($row = mysql_fetch_array($result,MYSQLI_NUM)) {
       $username =  "$row[0]";
    }
     // echo $username ;
     echo "<p align = 'right'><font size = '5'>คุณเข้าสู่ระบบในชื่อ
     <a href='profile.php?username=$username'> $username </a><a href='../logout.php'>(LogOut)</a></font></p>" ;


?>
<div class="container">

  <tbody>
<form action="enroll.php" method="post">
      <div class="tile is-parent">
        <article class="tile is-child notification is-info">
          <p class="title">Enroll Subject</p>
          <label class="label">
          <font  color="#000000" size="4">Subject Name </font>
          </label>
          <select class="input" name="subject_id">
            <?php

            $query = "SELECT `subject_id`, `subject_name` FROM `subject` WHERE subject_id NOT IN (SELECT subject_id FROM regis WHERE student_id ='".$_SESSION['sl']."')";
            //$query = "SELECT subject_id,subject_name FROM subject WHERE teacher_id !='".$_SESSION['sl']."'";


            $subject_id ;
            $result = mysql_query($query);
           /* $fields = mysql_fetch_array($result);
           $_SESSION['subject_id'] = $fields['subject_id'];*/
           while($row = mysql_fetch_array($result,MYSQLI_NUM)) {
            echo "<option value='$row[0]'>";
            echo "$row[0]";
            $subject_id=$row[0] ;
            echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
            echo "$row[1]";
            echo "</option>";
            echo "<div class='control is-grouped'>";
            echo "<p class='control' >";
            echo "</div>";
            echo "</div>";

          }
            echo "</select>";

          ?>
          <br><br><br>
        <div class="control is-grouped">
          <p class="control">
            <button class="button is-primary" onclick="return chkdel();">Submit</button>
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          </p>
          </form>
          <form action="subject.php" method="post">
          <p class="control">
            <button class="button is-danger">Cancel</button>
          </p>
          </form>
        </div>
      </tbody>
    </table>
  </article>
</div>

</div> <!-- /container -->

<?php
include('footer.php');
?>
