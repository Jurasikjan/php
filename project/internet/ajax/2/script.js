/**
 * Created by Юра on 21.11.2017.
 */
var request;
if(window.XMLHttpRequest){//для старых браузеров
    request =new XMLHttpRequest();
}else {
    request=new ActiveXObject("Microsoft.XMLHTTP");
}
request.open('GET','data.txt',false);//посылаем запрос на сервер
request.onreadystatechange = function () {
    if (request.readyState === 4 && request.status === 200) {
       var modify= document.getElementById('update');//берем элемент по id
        modify.innerHTML = "DIV:"+request.responseText;//заносим данные из ответа от сервера
        var mod=document.getElementsByTagName("li");
        mod[2].innerHTML = "Vse Li massiv 2 :"+request.responseText;
        mod[8].innerHTML = "Vse Li massiv 9 :"+request.responseText;

        mod=document.getElementsByTagName('ul')[1].getElementsByTagName('li');
        mod[2].innerHTML = "Vse ul[1]Li[2] massiv 2 :"+request.responseText;

        mod=document.getElementsByTagName('ul');

        for (var i=0;i<mod.length;i++){
            for (var j=0;j<mod[i].length;j++)
            {
                document.write(mod[i][j])
            }
        }
        //mod[0][0].innerHTML = "Vse Li massiv [0][0] :"+request.responseText;
    }

}
request.send();

