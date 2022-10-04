export function callAjaxPost(url, data, callback) {
    data['_token'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    let xmlHttp = new XMLHttpRequest();
    xmlHttp.responseType = 'json';
    xmlHttp.onreadystatechange = function () {
        if (xmlHttp.readyState === XMLHttpRequest.DONE) {
            if (xmlHttp.status === 200) {
                callback(xmlHttp.response);
            } else if (xmlHttp.status === 400) {
                alert('There was an error 400');
            } else {
                alert('Something else other than 200 was returned');
            }
        }
    };

    xmlHttp.open("POST", url, true);
    xmlHttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
    xmlHttp.send(JSON.stringify(data));
}
