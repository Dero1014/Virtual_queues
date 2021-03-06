<!-- SIGNUP PAGE -->

<?php
include '../header/header.php';

// can't access if you are already loged in
if (isset($_SESSION["username"])) {
    header("Location: ../index.php?error=youarelogedin");
}
?>

<!-- SIGNUP REGISTRATION FORUM -->
<div class="registerContainer">
    <p>Registartion form</p> <br>
    <form action="../includes/registration.inc.php" method="post">

        <input type="text" name="regUserName" placeholder="Username" class="inputClass"><br>
        <input type="password" name="regUserPass" placeholder="Password" class="inputClass"><br>
        <input type="text" name="regUserEmail" placeholder="Email" class="inputClass"><br>
       
        Company:<input type="checkbox" onclick="checkCheckBox()" name="regUserCompany" class="inputClass" id="compCheck"><br>
        <input type="text" style="display:none" name="regCompName" placeholder="Company Name" class="inputClass" id="cname"><br>
        <input type="text" style="display:none" name="regCompDesc" placeholder="Company Desc" class="inputClass" id="cdesc"><br>
       
        <input type="submit" name="submitReg" value="Register" class="loginButton">
    </form>

</div>

<!-- ERROR MESSAGES -->
<?php
// Shows error messages depending on the error submited
if (isset($_GET['signup'])) {
    if ($_GET['signup'] == "invalidemail") {
        echo "<p>Email is invalid</p>";
    }
    if ($_GET['signup'] == "userexists") {
        echo "<p>User already exists</p>";
    }
    if ($_GET['signup'] == "invalidinput") {
        echo "<p>You entered invalid input</p>";
    }
    if ($_GET['signup'] == "empty") {
        echo "<p>You didn't fill up the form</p>";
    }
    if ($_GET['signup'] == "success") {
        echo "<p>You have signed up!</p>";
    }
}
?>

<!-- SCRIPT FOR SHOWING AND HIDING INFORMATION ABOUT COMPANY REGISTRATION -->
<script>
    function checkCheckBox() {
        var checkbox = document.getElementById("compCheck");
        var compName = document.getElementById("cname");
        var compDesc = document.getElementById("cdesc");
        if (checkbox.checked == true) {
            compName.style.display = "block";
            compDesc.style.display = "block";
        } else {
            compName.style.display = "none";
            compDesc.style.display = "none";
        }
    }
</script>

</body>

</html>

