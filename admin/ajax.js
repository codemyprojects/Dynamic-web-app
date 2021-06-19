// JavaScript Document

function ajax(str) {
	//alert(str);
	if(window.XMLHttpRequest) {
		var xmlhttp = new window.XMLHttpRequest();
	}else {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	xmlhttp.onreadystatechange = function(){
		if(xmlhttp.readyState==4) {
			document.getElementById("status"+str).innerHTML = xmlhttp.responseText;
		}
	};
	
	xmlhttp.open("POST","show-inquiry-status.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send('id='+str);
}//end of function ajax

function ajaxupdate(str1,str2) {
	str = 'value='+str1+','+str2;
	if(window.XMLHttpRequest) {
		var xmlhttp = new window.XMLHttpRequest();
	}else {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	xmlhttp.onreadystatechange = function(){
		if(xmlhttp.readyState==4) {
			document.getElementById("status"+str1).innerHTML = xmlhttp.responseText;
		}
	};
	
	xmlhttp.open("POST","update-inquiry-status.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send(str);
}//end of function ajax