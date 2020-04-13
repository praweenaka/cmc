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


function getdtl1() {
    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "complain_data.php";
    url = url + "?Command=" + "getdtt";
//    url = url + "&ls=" + "new";

    xmlHttp.onreadystatechange = assign_dt;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
}

function getdt() {

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "approvecomplain_data.php";
    url = url + "?Command=" + "getdt2";
//    url = url + "&ls=" + "new";

    xmlHttp.onreadystatechange = assign_dt1;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);

}

function approve(id) {
    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "approvecomplain_data.php";
    url = url + "?Command=" + "app";
    url = url + "&id=" + id;

    xmlHttp.onreadystatechange = appp;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
}

function appp() {
    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
    {
        alert("Approved");
    }
}


function assign_dt() {

    document.getElementById('commentss').innerHTML = xmlHttp.responseText;

}
function assign_dt1() {

    document.getElementById('commentss').innerHTML = xmlHttp.responseText;

}



function postlink(cdate, d) {

//    alert(cdate+"sasa"+d);
    var lat = parseFloat(cdate);
    var lng = parseFloat(d);
    var myLatLng = {lat: lat, lng: lng};

    var map = new google.maps.Map(document.getElementById('kk'), {
        zoom: 12,
        center: myLatLng
    });
    var marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        draggable: true,
        animation: google.maps.Animation.DROP,
    });

    function toggleBounce() {
        if (marker.getAnimation() !== null) {
            marker.setAnimation(null);
        } else {
            marker.setAnimation(google.maps.Animation.BOUNCE);
        }
    }

    var map = new google.maps.Map(document.getElementById("kk"), map);


//    $('#myModal_c').modal('show');}

}

function appp() {
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {

        if (xmlHttp.responseText == "Approved") {
            alert("Approved");
//            setTimeout("location.reload(true);", 500);
            location.reload();
        }
    }
}