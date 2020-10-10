var xmlhttp;
var token=document.getElementsByTagName('meta')["csrf-token"].content;

function handleResponse(response){
response.then(function(response){
 if(typeof response.updatetoken != 'undefined'){
   document.getElementsByTagName('meta')["csrf-token"].content = response.updatetoken;
 }
});
return response;
}
function sendData(url = ``, data = '', method = 'POST',token = true) {
if(token){
 data = data+'&_token='+document.getElementsByName('csrf-token')[0].getAttribute('content');
}
 if(method == 'POST'){
 return fetch(url, {
     method: method, // *GET, POST, PUT, DELETE, etc.
     mode: "cors", // no-cors, cors, *same-origin
     cache: "no-cache", // *default, no-cache, reload, force-cache, only-if-cached
     credentials: "same-origin", // include, same-origin, *omit
     headers: {
         "Content-Type": "application/x-www-form-urlencoded"
     },
     redirect: "follow", // manual, *follow, error
     body: data // body data type must match "Content-Type" header
 })
 .then(response => handleResponse(response.json())); // parses response to JSON
 } else if(method == 'GET'){

     return fetch(ajax_location + url + '?' + data).then(response => handleResponse(response.json()));
 }

}
if (window.XMLHttpRequest) {
 xmlhttp = new XMLHttpRequest();
} else {
xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
}
