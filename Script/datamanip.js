/*
var users = [];
// create object user
var user = function(first_name, last_name , email, password) {
      this.first_name = intitial_x;
      this.last_name = intitial_y;
      this.email = rect_width;
      this.password = rect_height;
      this.courses = [];
};

var course = {course_name, week_day, time_from, time_to};

user.prototype.addcourses(course_name, week_day, time_from, time_to) {
    this.courses.push(new course(course_name, week_day, time_from, time_to));
}

function adduser(first_name, last_name , email, password, confirm_password) {

}
*/
var users = [];
function user(first_name, last_name , u_email, u_password, u_bday) {
      this.first_name = first_name;
      this.last_name = last_name;
      this.u_email = u_email;
      this.u_password = u_password;
      this.u_bday = u_bday;
}
var tasks = [];
function course(name, dow, from, to){
    this.name = name;
    this.dow = dow;
    this.from = from;
    this.to = to;
}
function busy(name, day, from, to){
    this.name = name;
    this.day = day;
    this.from = from;
    this.to = to;
}
function get_sign_up_info() {
    var fname = document.getElementById("first_name").value;
    var fname = localStorage.setItem("fname", fname);
    var lname = document.getElementById("last_name").value;
    var lname = localStorage.setItem("lname", lname);
    var email = document.getElementById("email_aub_id").value;
    var email = localStorage.setItem("email", email);
    var password = document.getElementById("password_sign_up").value;
    var password = localStorage.setItem("password", password);
    var pconfirm = document.getElementById("password_sign_up_confirm").value;
    var pconfirm = localStorage.setItem("pconfirm", pconfirm);
    var bday = document.getElementById("bday_id").value;
    var bday = localStorage.setItem("bday", bday);
    if (localStorage.fname != '' && localStorage.lname != "" && localStorage.email != "" && localStorage.password != ""
                 && localStorage.password == localStorage.pconfirm && localStorage.bday != "") {
        users.push(new user(localStorage.fname, localStorage.lname, localStorage.email, localStorage.password, localStorage.bday));
        window.open("profile.html");
    } else {
        window.alert("You must enter all the fields!");
    }
}
function load_user() {
    document.getElementById("pro_fname").innerHTML = localStorage.fname;
    document.getElementById("pro_lname").innerHTML = localStorage.lname;
    document.getElementById("pro_email").innerHTML = localStorage.email;
    document.getElementById("pro_bday").innerHTML = localStorage.bday;
}
function save_form(){
    count++;
    var saved_form = document.getElementById('schedule').cloneNode(true);
	saved_form.id = '';
	saved_form.style.display = 'block';
	var a_saved_form = saved_form.childNodes;
	for (var i=0;i<a_saved_form.length;i++) {
		var theName = a_saved_form[i].name
		if (theName)
			a_saved_form[i].name = theName + count;
	}
    localStorage.setItem("a_saved_form", a_saved_form);
}
function search_req(){
    document.getElementById("sort").style.display = "initial";
}
