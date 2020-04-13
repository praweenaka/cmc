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
 
function getdtl() {
    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "addcomplains_data.php";
    url = url + "?Command=" + "getdt";
//    url = url + "&ls=" + "new";

    xmlHttp.onreadystatechange = assign_dt;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
}

function assign_dt() {
    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
    {
        document.getElementById('comments').innerHTML = xmlHttp.responseText;
        getdt2();
    }
}

function getdt2() {
    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "addcomplains_data.php";
    url = url + "?Command=" + "getdt2";
//    url = url + "&ls=" + "new";

    xmlHttp.onreadystatechange = assign_dt2;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
}



function assign_dt2() {

    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
    {

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("filebox");
        document.getElementById('filebox').innerHTML = XMLAddress1[0].childNodes[0].nodeValue;
    }

}



