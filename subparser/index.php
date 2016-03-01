<html>
<head>
    <meta charset="utf-8">
<script src="http://gitcdn.org/libs/bitcoinate/0.2.1/index.min.js"></script>
 <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>

<body>
Вставьте текст, которые требуется разобрать:

<form>
<textarea id="text">

</textarea>

<input type="submit" value="Парсить" >   
<br />

</form>

<button id="butt">Перевести</button>
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>

<script>

$("#butt").click(function() { 

	var string_final = "";
	var sel = document.getElementById('newlist');
	var saved_obj1 = localStorage.getItem('saved_obj1') || { };
	//alert(typeof saved_obj1);
	if (typeof saved_obj1 != 'object') {  JSON.parse(saved_obj1);
}
//alert(typeof saved_obj1);
	for (var i=0, n=sel.options.length;i<n;i++) {
		saved_obj1[sel.options[i].text] = 0;
	  if (sel.options[i].selected) string_final = string_final + sel.options[i].text + '\n';
	}
	$("#foreign").val(string_final);

    localStorage.removeItem('saved_obj');
	localStorage.setItem('saved_obj', JSON.stringify(saved_obj1));	

	//alert("Успешно!")
	return false;
});

$(document).mousedown(function(e){

 	var el = e.target;
    if (el.tagName.toLowerCase() == 'option' && el.parentNode.hasAttribute('multiple')) {
    	
    	var scroll = $('select').scrollTop();
        e.preventDefault();

        // toggle selection
        if (el.hasAttribute('selected')) el.removeAttribute('selected');
        else el.setAttribute('selected', '');

        // hack to correct buggy behavior
        var select = el.parentNode.cloneNode(true);
        el.parentNode.parentNode.replaceChild(select, el.parentNode);

        $('select').scrollTop(scroll);
    }



  //  $(this).focus();



});

var obj = { };
$("input").click(function () {
	var sub = $("#text").val();
	var lines = sub.split('\n');
	for(var i = 0;i < lines.length;i++){
    	if (lines[i].indexOf("-->") > -1) {
     		continue;
    	}
    	if (!isNaN(+lines[i])) {
    		continue
    	}
    	var str = lines[i].split(" ");
    	for (var j in str) {
     		var word = str[j].toLowerCase();
     		word = word.replace(/[^\-\w\s]|_/g, "").replace(/\s+/g, " "); // put out punctuation
     		obj[word] = 0;
     		

     	}
	}
	
	var arrarr = Object.keys(obj).sort();
	
	var saved_obj = localStorage.getItem('saved_obj') || { };
	$('#info').html(arrarr.length);

	//alert(typeof saved_obj);
	while  (typeof saved_obj != 'object') saved_obj = $.parseJSON(saved_obj);

	//alert(typeof saved_obj);
	for (var key = 0; key < arrarr.length; key++) {
	
			if (arrarr[key] != "" && !(arrarr[key] in saved_obj)) {

     		$('#newlist').append($('<option>').attr("value",arrarr[key]).text(arrarr[key])); 
     		}
		}
   $('#newlist').selectmenu("refresh");
		//alert(key);
	return false;
}

	);

// use for clear localStorage
 //localStorage.clear();
</script>
<div data-role="fieldcontain">
<select id='newlist' size="15" data-native-menu="false" multiple name="hero[]" style=" width:300px; height:500px;">

</select>



</div>
<form action="save_words.php" method="POST">
    <input type="submit" value="Сохранить в БД">

<textarea id='foreign' name='foreign' style=" width:300px; height:500px;">
</textarea>
    </form>
</body>
</html>
