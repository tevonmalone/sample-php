<html>

   <head>
      <title>Add New Record in MySQL Database</title>
   </head>

   <body>
      <?php
         if(isset($_POST['add'])) {
            $dbhost = 'localhost:3036';
            $dbuser = 'root';
            $dbpass = 'rootpassword';
            $conn = mysql_connect($dbhost, $dbuser, $dbpass);
         
            if(! $conn ) {
               die('Could not connect: ' . mysql_error());
            }
 
            $tutorial_title = $_POST['tutorial_title'];
            $tutorial_author = $_POST['tutorial_author'];
            $submission_date = $_POST['submission_date'];
            
            mysql_select_db("defaultdb", $conn);
            $sql="INSERT INTO tutorials_tbl (tutorial_title, tutorial_author, submission_date)
            VALUES
            ('$_POST[tutorial_title]','$_POST[tutorial_author]','$_POST[submission_date]')";

            if (!mysql_query($sql,$con))
            {
             die('Error: ' . mysql_error());
            }
            echo "1 record added";
            mysql_close($conn);         
            
         } else {
      ?>
   
      <form method = "post" action = "<?php $_PHP_SELF ?>">
         <table width = "600" border = "0" cellspacing = "1" cellpadding = "2">
            <tr>
               <td width = "250">Tutorial Title</td>
               <td>
                  <input name = "tutorial_title" type = "text" id = "tutorial_title">
               </td>
            </tr>
         
            <tr>
               <td width = "250">Tutorial Author</td>
               <td>
                  <input name = "tutorial_author" type = "text" id = "tutorial_author">
               </td>
            </tr>
         
            <tr>
               <td width = "250">Submission Date [   yyyy-mm-dd ]</td>
               <td>
                  <input name = "submission_date" type = "text" id = "submission_date">
               </td>
            </tr>
      
            <tr>
               <td width = "250"> </td>
               <td> </td>
            </tr>
         
            <tr>
               <td width = "250"> </td>
               <td>
                  <input name = "add" type = "submit" id = "add"  value = "Add Tutorial">
               </td>
            </tr>
         </table>
      </form>
   <?php
      }
   ?>
   </body>
</html>
