/**
 * Created by Юра on 21.11.2017.
 */
/*var request = new XMLHttpRequest();
request.open('GET','data.txt',false);
request.send();
//console.log(request);
if(request.status===200){
    console.log(request);
    document.writeln("1: "+request.responseText+"<br>");
}*/
/*
for(var i=0;i<100;i++){
    var request = new XMLHttpRequest();
    request.open('GET','data.txt',false);
    request.send();
//console.log(request);
    if(request.status===200){
        console.log(request);
        document.writeln(request.responseText);
    }
}*/
var request = new XMLHttpRequest();
request.open('GET','data.txt',false);

request.onreadystatechange=function () {
    if(request.readyState===4 && request.status===200){
        console.log(request);
        document.writeln(request.responseText);
}

}
request.send();