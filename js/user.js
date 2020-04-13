document.getElementById("panel1").hidden = true;

function GetXmlHttpObject()
{
    var xmlHttp = null;
    try
    {
        // Firefox, Opera 8.0+, Safari
        xmlHttp = new XMLHttpRequest();
    } catch (e)
    {
        // Internet Explorer
        try
        {
            xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e)
        {
            xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
    }
    return xmlHttp;
}


// codes for log on button

function IsValiedData()
{
    if (document.getElementById('user_name').value == "")
    {
        document.getElementById("user_name").focus();
        document.getElementById("txterror").innerHTML = "Please Enter User Name";
        return false;
    } else if (document.getElementById('password').value == "") {
        document.getElementById("txterror").innerHTML = "Please Enter Password";
        document.getElementById("password").focus();
//        alert('sss');
        return false;
    } else {
        xmlHttp = GetXmlHttpObject();
        if (xmlHttp == null)
        {

            alert("Browser does not support HTTP Request");
            return;
        }

        var url = "CheckUsers.php";

        url = url + "?Command=" + "CheckUsers";
        url = url + "&UserName=" + document.getElementById('user_name').value;
        url = url + "&Password=" + document.getElementById('password').value;
        //alert(url);
        xmlHttp.onreadystatechange = CheckUsers;
        xmlHttp.open("GET", url, true);
        xmlHttp.send(null);

    }

}




// logon button stateChanged
function CheckUsers()

{
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
    {
        var val = xmlHttp.responseText;
        if (val == "ok") {
//           session_start();
            location.href = "index.php";
            

        } else if (val == "pw_wrn") {
            alert(xmlHttp.responseText);
            location.href = "logOut.php";
        } else if (val == "Invalied Connection") {
            alert(xmlHttp.responseText);
        } else {
            document.getElementById("").innerHTML = "Invalied UserName or Password";
        }
    }
}

function checkForm(form)
{
    if (form.username.value == "") {
        alert("Error: Username cannot be blank!");
        form.username.focus();
        return false;
    }
    re = /^\w+$/;
    if (!re.test(form.username.value)) {
        alert("Error: Username must contain only letters, numbers and underscores!");
        form.username.focus();
        return false;
    }

    if (form.pwd1.value != "" && form.pwd1.value == form.pwd2.value) {
        if (form.pwd1.value.length < 6) {
            alert("Error: Password must contain at least six characters!");
            form.pwd1.focus();
            return false;
        }
        if (form.pwd1.value == form.username.value) {
            alert("Error: Password must be different from Username!");
            form.pwd1.focus();
            return false;
        }
        re = /[0-9]/;
        if (!re.test(form.pwd1.value)) {
            alert("Error: password must contain at least one number (0-9)!");
            form.pwd1.focus();
            return false;
        }
        re = /[a-z]/;
        if (!re.test(form.pwd1.value)) {
            alert("Error: password must contain at least one lowercase letter (a-z)!");
            form.pwd1.focus();
            return false;
        }
        re = /[A-Z]/;
        if (!re.test(form.pwd1.value)) {
            alert("Error: password must contain at least one uppercase letter (A-Z)!");
            form.pwd1.focus();
            return false;
        }
    } else {
        alert("Error: Please check that you've entered and confirmed your password!");
        form.pwd1.focus();
        return false;
    }

    alert("You entered a valid password: " + form.pwd1.value);
    return true;
}

function swi()
{
    document.getElementById("panel1").hidden = false;
    document.getElementById("mmm").hidden = true;

}
function save_inv()
{


    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "CheckUsers.php";
    url = url + "?Command=" + "save_inv";
    url = url + "&user_name=" + document.getElementById("u_name").value;
    url = url + "&password=" + document.getElementById("pass").value;
    xmlHttp.onreadystatechange = passsuppresult_save_inv;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);




}


function passsuppresult_save_inv()

{
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
    {
        alert("User Created Successfully..!!");
// document.getElementById('panel1').innerHTML = "";
//        if (xmlHttp.responseText == "Saved") {alert("fdsf");
        location.href = "index.php";


//        }  


    }
}

function logout()
{
    //alert("ok");

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "CheckUsers.php";

    url = url + "?Command=" + "logout";

    xmlHttp.onreadystatechange = logout_state_Changed;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);

}

function logout_state_Changed()
{
    var XMLAddress1;
    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
    {
        location.href = "index.php";
    }

}



function lock_acc()
{


    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "CheckUsers.php";

    url = url + "?Command=" + "lock_acc";
    url = url + "&Calendar1=" + document.getElementById('Calendar1').value;

    xmlHttp.onreadystatechange = lock_acc_Changed;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);

}


function lock_acc_Changed()
{
    var XMLAddress1;



    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
    {

        //location.href="index.php";
        alert(xmlHttp.responseText);

    }

}


function updated()
{


    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "CheckUsers.php";

    url = url + "?Command=" + "updated";
    url = url + "&txtcashpay=" + document.getElementById('txtcashpay').value;
    url = url + "&txtchqPay=" + document.getElementById('txtchqPay').value;
    url = url + "&txtdep=" + document.getElementById('txtdep').value;
    url = url + "&txtJe=" + document.getElementById('txtJe').value;
    url = url + "&txtBt=" + document.getElementById('txtBt').value;
    url = url + "&txtRECCABOOK=" + document.getElementById('txtRECCABOOK').value;
    url = url + "&DTfrom=" + document.getElementById('DTfrom').value;
    url = url + "&DTTO=" + document.getElementById('DTTO').value;

    alert(url);

    xmlHttp.onreadystatechange = updated_Changed;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);

}


function updated_Changed()
{
    var XMLAddress1;



    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
    {

        //location.href="index.php";
        alert(xmlHttp.responseText);

    }

}
//////////////////////////////////////////////////////////////////////////////////////////////

function newuser()
{
    //alert("ok");

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }




    location.href = "logon_users.php";

}









