var counter = 0;
var count = 0;
function init_busy() {
	moreFields_busy();
}
function init_course() {
	moreFields_course();
}

function moreFields_course() {
	counter++;
	var newFields = document.getElementById('readroot_course').cloneNode(true);
	newFields.id = '';
	newFields.style.display = 'block';
	var newField = newFields.childNodes;
	for (var i=0;i<newField.length;i++) {
		var theName = newField[i].name
		if (theName)
			newField[i].name = theName + counter;
	}
    var insertHere = document.getElementById('writeroot');
	insertHere.parentNode.insertBefore(newFields,insertHere);
}

function moreFields_busy() {
counter++;
var newFields = document.getElementById('readroot_busy').cloneNode(true);
newFields.id = '';
newFields.style.display = 'block';
var newField = newFields.childNodes;
for (var i=0;i<newField.length;i++) {
    var theName = newField[i].name
    if (theName)
        newField[i].name = theName + counter;
    }
    var insertHere = document.getElementById('writeroot');
	insertHere.parentNode.insertBefore(newFields,insertHere);
}
