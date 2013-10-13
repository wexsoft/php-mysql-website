//ajax.js
//js functions for calling php functions
//
//

// Global Variables------------------------------------
var loader 		= $('.loader');

//Database CRUD functions------------------------------
//-----------------------------------------------------

//INSERT function
function insertEntry(htmlForm){
	var loader 		= $('.loader');
	var self 		= this;
	var form		= $(htmlForm);
	var inputs 		= form.find('input');
	var inputValues	= [];
	var reqString 	= '';

	loader.show();
	
	// build request string
	for(var i=0; i<inputs.length; i++){
		reqString += "name"+i +"="+inputs[i].name+"&"+
					 "val" +i +"="+inputs[i].value+"&";
	}
	reqString = reqString.slice(0, reqString.length-1);
	
	xmlhttp=new XMLHttpRequest();
	xmlhttp.onreadystatechange=function(){
		if (xmlhttp.readyState==4 && xmlhttp.status==200){
			document.getElementById("insertMessage").innerHTML=xmlhttp.responseText;
			loader.hide();
		}
	}
  console.log('REQ', reqString);
	xmlhttp.open("POST","insert.php",true);
	xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
	xmlhttp.send(reqString);
}

//LIST function
function listEntries(){
	var loader 		= $('.loader');
	loader.show();
	
	xmlhttp=new XMLHttpRequest();
	xmlhttp.onreadystatechange=function(){
		if (xmlhttp.readyState==4 && xmlhttp.status==200){
      var listText = parseList(xmlhttp.responseText);
			document.getElementById("listMessage").innerHTML=listText;
			loader.hide();
      bindEvents();
		}
	}

	xmlhttp.open("GET","php/list.php",true);
	xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
	xmlhttp.send();
}

function parseList(text){
  text = JSON.parse(text);
  text.pop();
  
  var returnStr ='';
  for(var i=0;i<text.length;i++){
    var item = text[i];
    returnStr += "<div class='row' data-id='"+item.recId+"'><span id='Name'>"+item.Name+"</span><span id='SortOrder'>"+item.SortOrder+"</span><span id='Active'>"+item.Active+"</span></div>";
  }
  console.log(text);
  return returnStr;
}
  