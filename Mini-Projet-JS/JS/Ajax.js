//verification de la compatibilité du navigateur.
function getXMLHttpRequest() {
    var xhr = null;

    if (window.XMLHttpRequest || window.ActiveXObject) {
        if (window.ActiveXObject) {
            try {
                xhr = new ActiveXObject("Msxml2.XMLHTTP");
            } catch (e) {
                xhr = new ActiveXObject("Microsoft.XMLHTTP");
            }
        } else {
            xhr = new XMLHttpRequest
        }
    } else {
        alert("navigateur non supporter");
        return;
    }
    return xhr;
};

//request javascript.
function request(callback) {
    var xhr = null;

    if (xhr && xhr.readyState != 0) {
        xhr.abort() // annulation de la requête si deja en cours.
        console.log("abort");
    }
    //    envoie de la requête si elle et pas en cours. 
    xhr = getXMLHttpRequest();
    let url = 'http://localhost:81/jah1000/Mini-Projet-JS/Api_Rest/api.php/'; //adresse url a renseigné 

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
            callback(xhr.responseText);
        } else if (xhr.readyState < 4) {
            //en cours de chargement.
        }
        xhr.open("GET", url, true);
        xhr.send(null);
    };
};

//readData javascript (callback de la request).
function readData(sData) {
    if (sData.length > 0) {
        let traitement = JSON.parse(sData);
        //a coder la mise en forme de ma reception.
    } else {
        console.log("Is bad");
    }
};