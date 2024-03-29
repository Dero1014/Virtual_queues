<!-- Working page if the worker loged in -->

<!-- WELCOME TITLE -->
<?php
$wName = $worker->getWorkerName();
echo "<h1>Welcome $wName</h1> <br>";
?>

<!-- SERVICE SELECTION-->
<select id="selService" name="services">
    <option>-----</option>

    <?php

    $query = new SQL();
    $cTableName = 'COMPANY_' . str_replace(' ', '',$worker->getWorkerCompanyName());
    
    // select service
    $sql = "SELECT sName FROM $cTableName";
    $result = $query->getStmtAll($sql);

    for ($i=0; $i < sizeof($result); $i++) { 
        $sName = $result[$i][0];
        echo "<option  value='$sName'>$sName</option>";
    }

    ?>
</select>
<br>
<button id="next">NEXT</button>
<button id="servSelect" name="none">SELECT SERVICE</button>
<button id="drop" name="none">DROP</button>

<div id="cont">

</div>

<!-- Script to update companies services -->
<script>
    var selComp = document.getElementById("selService");
    var value;
    $(document).ready(function() {
        // SELECT SERVICE
        $("#servSelect").click(function() {
            value = selComp.value;
        });

        // refreshes who is in line every 0.1 seconds
        setInterval(function() {
            $("#cont").load("../includes/workerservicetable.inc.php", {
                servName: value
            });
        }, 100)

        
        $("#next").click(function() {
            $("#cont").load("../includes/workerservice.inc.php", {
                servName: value,
            });
        });
        
        $("#drop").click(function() {
            $("#cont").load("../includes/workerservice.inc.php", {
                servName: value,
                drop:"drop"
            });
        });

    });
</script>