
async function zoekBoek () {
    let params = document.getElementById("bookInput").value;
    let getUrl = "https://www.googleapis.com/books/v1/volumes?q=";
    if(params.length != 0) getUrl+="isbn:"+params;
    params = document.getElementById("authorInput").value;
    if(params.length != 0) {
        if(getUrl.endsWith("q=")) getUrl+="inauthor:"+params;
        else getUrl+="+inauthor:"+params;
    }
    params = document.getElementById("titleInput").value;
    if(params.length != 0) {
        if(getUrl.endsWith("q=")) getUrl+="intitle:"+params;
        else getUrl+="+intitle:"+params;
    }
    let xhttps = new XMLHttpRequest();
    xhttps.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            let response = JSON.parse(this.responseText);
            console.log(response);
            handleResponse(response);
        }
    }
    xhttps.open("GET", getUrl, true);
    xhttps.send();
}
 
function handleResponse(response) {
    document.getElementById("content").innerHTML = "";
    for (var i = 0; i < response.items.length; i++) {
        var item = response.items[i];
        // in production code, item.text should have the HTML entities escaped.
        document.getElementById("content").innerHTML += "<br>" + item.volumeInfo.title + " by " + item.volumeInfo.authors + "<br>";
    }
}