function hide_sibls(elem) {
	
	if (elem.getAttribute("class") == "pin expand") {
		elem.setAttribute("class","pin collapse");		
		elem.nextElementSibling.setAttribute("class","expanded");
		//elem.nextElementSibling.style.display = 'block';

	} else {
		elem.setAttribute("class","pin expand");
		elem.nextElementSibling.setAttribute("class","collapsed");
		//elem.nextElementSibling.style.display = 'none';
	}
}

function show_descr(el){
    // Create our XMLHttpRequest object
    var hr = new XMLHttpRequest();
    // Create some variables we need to send to our PHP file
    var url = "php/descr_parse.php";

    //alert(el.getAttribute('id'));
    var id = el.getAttribute('id');

    var vars = "id="+id;
    hr.open("POST", url, true);
    // Set content type header information for sending url encoded variables in the request
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // Access the onreadystatechange event for the XMLHttpRequest object
    hr.onreadystatechange = function() {
	    if(hr.readyState == 4 && hr.status == 200) {
		    var return_data = hr.responseText;
			document.getElementById("output_d").innerHTML = return_data;
	    }
    }
    // Send the data to PHP now... and wait for response to update the status div
    hr.send(vars); // Actually execute the request
    document.getElementById("output_d").innerHTML = "processing...";
}

function list_objects(){

    // Create our XMLHttpRequest object
    var hr = new XMLHttpRequest();
    // Create some variables we need to send to our PHP file
    var url = "php/list_objects.php";

    //alert(el.getAttribute('id'));
   
    hr.open("POST", url, true);
    // Set content type header information for sending url encoded variables in the request
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // Access the onreadystatechange event for the XMLHttpRequest object
    hr.onreadystatechange = function() {
	    if(hr.readyState == 4 && hr.status == 200) {
		    var return_data = hr.responseText;
			document.getElementById("output_o").innerHTML = return_data;
	    }
    }
    // Send the data to PHP now... and wait for response to update the status div
    hr.send(); // Actually execute the request
    document.getElementById("output_o").innerHTML = "processing...";
}

function edit_object(el){
    // Create our XMLHttpRequest object
    var hr = new XMLHttpRequest();
    // Create some variables we need to send to our PHP file
    var url = "php/edit_parse.php";

    //alert(el.getAttribute('id'));
    var id = el.getAttribute('id');

    var vars = "id="+id;
    hr.open("POST", url, true);
    // Set content type header information for sending url encoded variables in the request
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // Access the onreadystatechange event for the XMLHttpRequest object
    hr.onreadystatechange = function() {
        if(hr.readyState == 4 && hr.status == 200) {
            var dataArray = hr.responseText.split("|");

            document.getElementById("oid").value = dataArray[0];
            document.getElementById("name").value = dataArray[1];
            document.getElementById("pid").value = dataArray[3];
            document.getElementById("output_d").value = dataArray[2];

        }
    }
    // Send the data to PHP now... and wait for response to update the status div
    document.getElementById("output_d").value = "processing...";
    hr.send(vars); // Actually execute the request
}


function add_save(root) {
     // Create our XMLHttpRequest object
    var hr2 = new XMLHttpRequest();
    // Create some variables we need to send to our PHP file
    var url = "php/addsave.php";

    var id = document.getElementById("oid").value;
    var name = document.getElementById("name").value;
    var p_id = document.getElementById("pid").value;
    var descr = document.getElementById("output_d").value;
    
    var is_root = root; 

    var vars = "id="+id+"&name="+name+"&p_id="+p_id+"&descr="+descr+"&is_root="+is_root;
    
    hr2.open("POST", url, true);
    // Set content type header information for sending url encoded variables in the request
    hr2.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    
    // Send the data to PHP now... and wait for response to update the status div
    hr2.send(vars); // Actually execute the request

    list_objects();
}

function ajax_delete() {
     // Create our XMLHttpRequest object
    var hr2 = new XMLHttpRequest();
    // Create some variables we need to send to our PHP file
    var url = "php/delete.php";

    var id = document.getElementById("oid").value;
    var name = document.getElementById("name").value;
    var p_id = document.getElementById("pid").value;
    var descr = document.getElementById("output_d").value;
    
    var vars = "id="+id+"&name="+name+"&p_id="+p_id+"&descr="+descr;
    
    hr2.open("POST", url, true);
    // Set content type header information for sending url encoded variables in the request
    hr2.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    
    // Send the data to PHP now... and wait for response to update the status div
    hr2.send(vars); // Actually execute the request

    list_objects();
}

list_objects();

