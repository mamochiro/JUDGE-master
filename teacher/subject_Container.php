<?php
/*
 * Codejudge
 * NANTIPAT TULLWATTANA SOFTWARE ENGINEER
 * Licensed under MIT License.
 *
 * The main page that lists all the problem
 */
require_once('../functions.php');
if(!loggedin())
  header("Location: login.php");
else
  include('header.php');

?>

<li><a href="subject_Container.php">subject_Container</a></li>
</ul>
</div><!--/.nav-collapse -->
</div>
</div>
</div>

<div class="container">
  <form action="event_Container.php" method="post" name='form1'>
  <br><br><br><br>
    <div class="tile is-parent">
      <article class="tile is-child notification is-info">
        <p class="title">My Subject</p>
       <a class="button is-primary" onclick='location.replace("subject_add.php")'>Build Subject</a>
        <table class="table">
          <thead>
            <tr>

              <th><abbr >Subject Name</abbr></th>
              <th><abbr >Subject No.</abbr></th>
              <th><abbr >Detail</abbr></th>

            </tr>
          </thead>

          <tbody>
            <?php 
            connectdb();
            $query = "SELECT subject_id,subject_name FROM subject  WHERE Teacher_id='".$_SESSION['sl']."'";

            $result = mysql_query($query);
           /* $fields = mysql_fetch_array($result);
            $_SESSION['subject_id'] = $fields['subject_id'];*/
            while($row = mysql_fetch_array($result,MYSQLI_NUM)) {
              echo "<tr>";
              echo "<td>".$row[0]."</td>";
              echo "<td>".$row[1]."</td>";
              echo "<td>";
              echo "<div class='control is-grouped'>";
              echo "<p class='control'>";
              echo "<form method='post' action='event_Container.php'>";
              /*echo "<button class='button is-success' >Enter</button> ";
              echo "<button class='button is-info'  onClick='JavaScript:fncSubmit('student_list')''>Student List</button> ";
              echo "<button class='button is-warning' onClick='JavaScript:fncSubmit('subject_Edit')''>Edit Subject</button> ";
              echo "<button class='button is-danger' onClick='JavaScript:fncSubmit('subject_Container')'>Delete Subject</button>";*/
              echo "</p>";
              echo "</div>";
              echo "</td>";
              echo "</tr>";
            }
            ?>
            
          </tbody>
        </table>  
      </article>
    </div>
  </form>
</div> <!-- /container -->

<?php
include('footer.php');
?>
