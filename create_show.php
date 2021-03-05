<?php
    require_once('./header.php');
?>  
<h1>Add a show Page</h1>

<form method="POST" action="show_insert.php" >
    showName:<input type="text" name="showName" /><br />
    rating:<input type="text" name="rating" /><br />
    analysis:<input type="text" name="analysis" /><br />
    <input type="submit" value="Create Show" />
</form>


<?php
    require_once('./footer.php');
?>  
