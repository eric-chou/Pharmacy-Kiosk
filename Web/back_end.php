<!DOCTYPE html>
<html>
<head>
<title>Select Your Favorite Queue</title>
<script type="text/javascript">
	function updateRows(httpRequest) {
		if (httpRequest.readyState == 4) {
			if (httpRequest.status == 200) {
				var data = httpRequest.responseText;
				var newData = JSON.parse(data);
				var rettype = newData.Type;
				
				if (rettype == "Update") {
					var newRows = newData.Contents;
					for (var i = 0; i < newRows.length; i++) {
						var theRow = newRows[i];
						addRowToList(theRow.type, theRow.first_name, theRow.last_name, theRow.date_of_birth, theRow.relation, theRow.returning_customer, theRow.insurance_card_number);
					}
					showQueueTable();
					window.status="Table updated at " + (new Date()).toString();
				}
				else {
					window.status="";
				}
			}
			else {
				alert('Problem with request');
			}
		}
	}

	function Queue(type, first_name, last_name, date_of_birth, relation, returning_customer, insurance_card_number) {
		this.type = type;
		this.first_name = first_name;
		this.last_name = last_name;
		this.date_of_birth = date_of_birth;
		this.relation = relation;
		this.returning_customer = returning_customer;
		this.insurance_card_number = insurance_card_number;
	}

	function addRowToList(type, first_name, last_name, date_of_birth, relation, returning_customer, insurance_card_number) {
		var currItem = new Queue(type, first_name, last_name, date_of_birth, relation, returning_customer, insurance_card_number);
		theQueue[queueCount] = currItem;
		queueCount++;
	}

	function showQueueTable() {
		//theQueue.sort(by_name);
		var T = document.getElementById("theTable");
		var tParent = T.parentNode;

		var newT = document.createElement('table');
		newT.setAttribute('id', 'theTable');
		newT.border = 1;
		newT.className = 'thetable';
		var hrow = newT.insertRow(0);
		hrow.align = 'left';

		var currCell = hrow.insertCell(0);
		var contents = document.createTextNode('Type');
		currCell.appendChild(contents);

		var currCell = hrow.insertCell(1);
		contents = document.createTextNode('First Name');
		currCell.appendChild(contents);

		var currCell = hrow.insertCell(2);
		contents = document.createTextNode('Last Name');
		currCell.appendChild(contents);

		var currCell = hrow.insertCell(3);
		contents = document.createTextNode('Date of Birth');
		currCell.appendChild(contents);

		var currCell = hrow.insertCell(4);
		contents = document.createTextNode('Relation');
		currCell.appendChild(contents);

		var currCell = hrow.insertCell(5);
		contents = document.createTextNode('Returning Customer');
		currCell.appendChild(contents);

		var currCell = hrow.insertCell(6);
		contents = document.createTextNode('Insurance Card Number');
		currCell.appendChild(contents);

		tParent.replaceChild(newT, T);

		for (var i = 0; i < queueCount; i++) {
			addRow(theQueue[i].type, theQueue[i].first_name, theQueue[i].last_name, theQueue[i].date_of_birth, theQueue[i].relation, theQueue[i].returning_customer, theQueue[i].insurance_card_number);
		}
	}

	function addRow(type, first_name, last_name, date_of_birth, relation, returning_customer, insurance_card_number) {
		var T = document.getElementById("theTable");
		var len = T.rows.length;
		var R = T.insertRow(len); 
		R.align = 'center';       
		R.className = 'regular';

		var C = R.insertCell(0);  
		var txt = document.createTextNode(type);
		C.appendChild(txt);
		
		C = R.insertCell(1);
		txt = document.createTextNode(first_name);
		C.appendChild(txt);
		
		C = R.insertCell(2);
		txt = document.createTextNode(last_name);
		C.appendChild(txt);

		C = R.insertCell(3);
		txt = document.createTextNode(date_of_birth);
		C.appendChild(txt);
		
		C = R.insertCell(4);
		txt = document.createTextNode(relation);
		C.appendChild(txt);
		
		C = R.insertCell(5);
		txt = document.createTextNode(returning_customer);
		C.appendChild(txt);
		
		C = R.insertCell(6);
		txt = document.createTextNode(insurance_card_number);
		C.appendChild(txt);
	}

    function refreshPage() {
        var httpRequest;
 
        if (window.XMLHttpRequest) { // Mozilla, Safari, ...
            httpRequest = new XMLHttpRequest();
            if (httpRequest.overrideMimeType) {
                httpRequest.overrideMimeType('text/xml');
            }
        }
        else if (window.ActiveXObject) { // IE
            try {
                httpRequest = new ActiveXObject("Msxml2.XMLHTTP");
                }
            catch (e) {
                try {
                    httpRequest = new ActiveXObject("Microsoft.XMLHTTP");
                }
                catch (e) {}
            }
        }
        if (!httpRequest) {
            alert('Cannot create an XMLHTTP instance');
            return false;
        }
 
        var type = 3; 
        var rows = document.getElementById("theTable").rows.length-1;;

        if (rows == -1) {
			rows = 0;
		}
        var data = 'rows=' + rows;

        httpRequest.open('POST', 'back_end_php.php', true);
        httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        httpRequest.onreadystatechange = function() { updateRows(httpRequest); } ;
        httpRequest.send(data);
        t = setTimeout("refreshPage()", 5000);
    }
</script>
</head>
<body onload = "refreshPage()">
<center>

<table id = "theTable" border = "1" class="thetable">
</table>

<script type="text/javascript">
	var theQueue = new Array(), queueCount = 0, t;
</script>
</body>
</html>
