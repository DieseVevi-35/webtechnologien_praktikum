
/// Performs a GET request on the server using a give url path
///
/// Parameters:
/// - String: urlPath
///
/// Returns:
/// - Promise(String): responseJson
function get(urlPath) {
    return new Promise(function (resolve, reject) {
        const xmlHttp = new XMLHttpRequest();

        xmlHttp.onload = function () {
            if (xmlHttp.status == 200 || xmlHttp.status == 304) {
                const responseJson = JSON.parse(xmlHttp.responseText);
                resolve(responseJson);
            }
        }

        xmlHttp.open("GET", serverUrl + urlPath);
        xmlHttp.setRequestHeader('Authorization', `Bearer ${accessToken}`);
        xmlHttp.send();
    });
}


function post(urlPath, requestBodyString) {
    return new Promise(function (resolve, reject) {
        const xmlHttp = new XMLHttpRequest();

        xmlHttp.onload = function () {
            if (xmlHttp.status == 200 || xmlHttp.status == 304) {
                const responseJson = JSON.parse(xmlHttp.responseText);
                resolve(responseJson);
            }
        }

        xmlHttp.open("POST", serverUrl + urlPath);
        xmlHttp.setRequestHeader('Authorization', `Bearer ${accessToken}`);
        xmlHttp.setRequestHeader('Content-type', 'application/json');
        xmlHttp.send(requestBodyString);
    });
}