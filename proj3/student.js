var OK;
var field_array;
function init(){
//check redID
document.student.redID.focus();

document.student.addEventListener('submit', function(){
var messageLine =document.getElementById("message_line");
var val = trim(document.student.redID.value);
	var OK = false;
	var number=/^[0-9]+$/;
if(val==""){
	document.student.redID.style.border="1px solid red";
	
	messageLine.innerHTML ="Please enter your RedID.";
	OK=false;
		
	}
else{
	if((val.length!=9)||(!(val.match(number)))){
		this.style.border="1px solid red";
		messageLine.innerHTML="Invalid RedID";
		OK=false;
	}
	else{
	validateRedID();
	OK=true;
	this.style.border="1px solid #DDDDDD";
	messageLine.innerHTML="";}
}
},false);
//check first name
document.student.fname.addEventListener('blur', function() { 
        if(!OK) return;      
        var messageLine = document.getElementById("message_line");        
        var val = trim(document.student.fname.value);
	var first=document.student.fname.value.indexOf("<");
        if(val == "") {
            this.style.border="1px solid red";
            
            messageLine.innerHTML = "Please enter your first name"; 
            OK = false;          
            }
        else {
		if(first==-1){
            this.style.border="1px solid red";
            
            messageLine.innerHTML = "Please enter your first name"; 
            OK = false;          
            }
	    else{
	
            OK = true;
            this.style.border="1px solid #DDDDDD";
            messageLine.innerHTML = "";            
            }}
        }, false);

//check last name
document.student.lname.addEventListener('blur', function() { 
        if(!OK) return;      
        var messageLine = document.getElementById("message_line");        
        var val = trim(document.student.lname.value);
        if(val == "") {
            this.style.border="1px solid red";
            
            messageLine.innerHTML = "Please enter your last name"; 
            OK = false;          
            }
        else {
            OK = true;
            this.style.border="1px solid #DDDDDD";
            messageLine.innerHTML = "";            
            }
        }, false);
		
	
//check area phone
document.student.areaphone.addEventListener('blur', function(){
	var messageLine = document.getElementById("message_line");
	var val = trim(document.student.areaphone.value);
		var area=/^[0-9]{3}$/;
		if(val.length!=0){
		if(!(val.match(area))){
			this.style.border="1px solid red";
			
			messageLine.innerHTML="Please enter your valid area phone.";
			OK=false;
			}
		else{
			OK=true;
			this.style.border="1px solid #DDDDDD";
			messageLine.innerHTML="";
			}
		}}, false);
// check prefix
document.student.prefixphone.addEventListener('blur', function(){
	var messageLine = document.getElementById("message_line");
	var val = trim(document.student.prefixphone.value);
		var prefix=/^[0-9]{3}$/;
		if(val.length!=0){
		if(!(val.match(area))){
			this.style.border="1px solid red";
			
			messageLine.innerHTML="Please enter your valid prefix phone.";
			OK=false;
			}
		else{
			OK=true;
			this.style.border="1px solid #DDDDDD";
			messageLine.innerHTML="";
			}
		}}, false);
//check phone
document.student.phone.addEventListener('blur', function(){
	var messageLine = document.getElementById("message_line");
	var val = trim(document.student.phone.value);
		var phonenumber=/^[0-9]{4}$/;
		if(val.length!=0){
		if(!(val.match(phonenumber))){
			this.style.border="1px solid red";
			
			messageLine.innerHTML="Please enter your valid phone.";
			OK=false;
			}
		else{
			OK=true;
			this.style.border="1px solid #DDDDDD";
			messageLine.innerHTML="";
			}
		}}, false);
//chech gpa
document.student.gpa.addEventListener('blur',function(){
	if(!OK) return;
	var messageLine = document.getElementById("message_line");
	var val = trim(document.student.gpa.value);
	
	if(val == "") {
            this.style.border="1px solid red";
            
            messageLine.innerHTML = "Please enter your gpa"; 
            OK = false;          
            }
	else{
		if(isNaN(val))
			{
			this.style.border="1px solid red";
			
			messageLine.innerHTML="Please enter valid GPA score";
			OK=false;
			}
		
		else
			{
			if(parseInt(val)<0||parseInt(val)>4)
			{
				this.style.border="1px solid red";
				
				messageLine.innerHTML="Please enter GPA>=0 or GPA<=4";
				OK=false;
			}
			else
			{OK=true;
			this.style.border="1px solid #DDDDDD";
			messageLine.innerHTML="";}
			}
		}},false);
			
//check year
document.student.graduate.addEventListener('blur',function(){
	if(!OK) return;
	var messageLine = document.getElementById("message_line");
	var val = trim(document.student.graduate.value);
	
	if(val == "") {
            this.style.border="1px solid red";
            
            messageLine.innerHTML = "Please enter your graduate year"; 
            OK = false;          
            }
	else{
		if(isNaN(val))
			{
			this.style.border="1px solid red";
			
			messageLine.innerHTML="Please enter valid graduate year";
			OK=false;
			}
		
		else
			{
			if(parseInt(val)<2020||parseInt(val)>1950)
			{
				this.style.border="1px solid red";
				
				messageLine.innerHTML="Please enter year>=1950 or year<=2020";
				OK=false;
			}
			else
			{OK=true;
			this.style.border="1px solid #DDDDDD";
			messageLine.innerHTML="";}
			}
		}},false);	
//check position sought
document.getElementById('positionsought').addEventListener('click', function(){
	if(!OK) return;
	var handle = document.student.elements["position[]"];
	var choice=""
	for(var i=0; i<handle.length;i++){
		if(handle[i].checked){
			choice++;
			
		}
	}
	if(choice<=0){
		messageLine.innerHTML="Please select your position";
			OK=false;
	}
	else
	{
		OK=true;
			
			messageLine.innerHTML="";
	}
	},false);
//check program
document.getElementById('program').addEventListener('click', function(){
	if(!OK) return;
	var handle = document.student.elements["language[]"];
	var choice=""
	for(var i=0; i<handle.length;i++){
		if(handle[i].checked){
			choice++;
			
		}
	}
	if(choice<=0){
		messageLine.innerHTML="Please select your program language";
			OK=false;
	}
	else
	{
		OK=true;
			
			messageLine.innerHTML="";
	}
	},false);
//check operating system
document.getElementById('os').addEventListener('click', function(){
if(!OK) return;
	var handle = document.student.elements["osystem[]"];
	var choice=""
	for(var i=0; i<handle.length;i++){
		if(handle[i].checked){
			choice++;
			
		}
	}
	if(choice<=0){
		messageLine.innerHTML="Please select your operating system";
			OK=false;
	}
	else
	{
		OK=true;
			
			messageLine.innerHTML="";
	}
	},false);
//check job
document.getElementById('jobtype').addEventListener('click', function(){
	if(!OK) return;
	var handle = document.student.elements["job[]"];
	var choice=""
	for(var i=0; i<handle.length;i++){
		if(handle[i].checked){
			choice++;
			
		}
	}
	if(choice<=0){
		messageLine.innerHTML="Please select your type of position";
			OK=false;
	}
	else
	{
		OK=true;
			
			messageLine.innerHTML="";
	}
	},false);

//stop submitting
document.personal_info.addEventListener('submit', function(event) {
        if(trim(document.forms[0].redID.value) == "" ||
           trim(document.forms[0].fname.value) == "" ||
           trim(document.forms[0].lname.value) == "") {
            event.preventDefault();   // stop the form from being submitted  
            var messageLine = document.getElementById("message_line");
            if(trim(document.forms[0].redID.value) == "") {
                messageLine.innerHTML="Please enter your Red ID";
                document.forms[0].redID.style.border = "1px solid red"; 
                document.forms[0].redID.focus();
                }
            else if(trim(document.forms[0].fname.value) == "") {
                messageLine.innerHTML="Please enter your first name";
                document.forms[0].fname.style.border = "1px solid red"; 
                document.forms[0].fname.focus();
                }   
            else if(trim(document.forms[0].lname.value) == "") {
                messageLine.innerHTML="Please enter your last name";
                document.forms[0].lname.style.border = "1px solid red"; 
                document.forms[0].lname.focus();
                }                             
            return false;
            }
        return true;
        }, false);
}
// trim function copied from http://doc.infosnel.nl/javascript_trim.html
function trim(s) {
    var l=0; var r=s.length -1;
    while(l < s.length && s[l] == ' ') {
        l++; 
        }
    while(r > l && s[r] == ' ') {
        r-=1;   
        }
    return s.substring(l, r+1);
    }    
    
function validateRedID() {
    var id = document.forms[0].redID.value;
    var url = "http://trieste.sdsu.edu/~trst000/ajax/check_id.php" +
        "?red_id="+id;
    var req = new HttpRequest(url, handleID);
    req.send();
    }
  
function handleID(res) {
    var messageLine = document.getElementById("message_line");   

    if(res == "OK") 
        return;
    if(res == "DUPLICATE") 
        messageLine.innerHTML = "ERROR, that Red ID is already in the database";        
    else {
        messageLine.innerHTML = "Sorry, cannot validate Red ID.";
     //   var tmp = "";
     //   for(var i=0; i < res.length; i++)
     //       tmp += " " +res.charCodeAt(i);
      //  alert("String length is " + res.length + " and contents are " + tmp 
      //      + "\n==" + res + "==");
        }
    }

