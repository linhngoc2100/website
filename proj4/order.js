	$(function() {
    var proj4_data;        
    proj4_data = new Array();
    var req = new HttpRequest('http://trieste.sdsu.edu/cgi-bin/trst000/get_products.cgi', storeData);
    req.send();        
    
    
    $( "#dialog-modal" ).dialog({
            height: 350,
            width: 500,
            modal: true,
            autoOpen: false
    });
    
    $('#order_button').bind('click', function($e) {       
            $("#dialog-modal").dialog('open');
            });  
			
    $('#order').bind('click', function() {
        tmpString = "";
        for(var i=0; i < proj4_data.length; i++) {
             
                tmpString += "<img src=\"http://trieste.sdsu.edu/~trst000/PROJ4_IMAGES/"+proj4_data[i][0]+".jpg\" />";             
                for(var j=0; j < proj4_data[i].length; j++)
                    tmpString += proj4_data[i][j] + "<br />";
            tmpString += "<div class=\"clear\"></div><br /><hr /><br />";                
                
            }
        var handle = document.getElementById('content');
        handle.innerHTML = tmpString;
        }) 
	
    $('#milk').bind('click', function() {
        tmpString = "";
        for(var i=0; i < proj4_data.length; i++) {
            if(proj4_data[i][1] == "Milk chocolate") {
                tmpString += "<img src=\"http://trieste.sdsu.edu/~trst000/PROJ4_IMAGES/"+proj4_data[i][0]+".jpg\" />";             
                for(var j=0; j < proj4_data[i].length; j++)
                    tmpString += proj4_data[i][j] + "<br />";
            tmpString += "<div class=\"clear\"></div><br /><hr /><br />";                
                }
            }
        var handle = document.getElementById('content');
        handle.innerHTML = tmpString;
        })                           
    
    $('#dark').bind('click', function() {
        tmpString = "";
        for(var i=0; i < proj4_data.length; i++) {
            if(proj4_data[i][1] == "Dark chocolate") {
                tmpString += "<img src=\"http://trieste.sdsu.edu/~trst000/PROJ4_IMAGES/"+proj4_data[i][0]+".jpg\" />"; 
                for(var j=0; j < proj4_data[i].length; j++)
                    tmpString += proj4_data[i][j] + "<br />";
            tmpString += "<div class=\"clear\"></div><br /><hr /><br />";                 
                }
            }
        var handle = document.getElementById('content');
        handle.innerHTML = tmpString;
        })
        
    $('#nuts').bind('click', function() {
        tmpString = "";
        for(var i=0; i < proj4_data.length; i++) {
            if(proj4_data[i][1] == "Nuts and chews") {
                tmpString += "<img src=\"http://trieste.sdsu.edu/~trst000/PROJ4_IMAGES/"+proj4_data[i][0]+".jpg\" />";                
                for(var j=0; j < proj4_data[i].length; j++)
                    tmpString += proj4_data[i][j] + "<br />";
            tmpString += "<div class=\"clear\"></div><br /><hr /><br />";                
                }
            }
        var handle = document.getElementById('content');
        handle.innerHTML = tmpString;
        }) 
        
    $('#brittle').bind('click', function() {
        tmpString = "";
        for(var i=0; i < proj4_data.length; i++) {
            if(proj4_data[i][1] == "Brittles and toffies") {
                tmpString += "<img src=\"http://trieste.sdsu.edu/~trst000/PROJ4_IMAGES/"+proj4_data[i][0]+".jpg\" />"; 
                for(var j=0; j < proj4_data[i].length; j++)
                    tmpString += proj4_data[i][j] + "<br />";
            tmpString += "<div class=\"clear\"></div><br /><hr /><br />";                
                }
            }
        var handle = document.getElementById('content');
        handle.innerHTML = tmpString;
        })                
        

    
function storeData(response) {
    var tmpArray = explodeArray(response,';');
    for(var i=0; i < tmpArray.length; i++) {
        innerArray = explodeArray(tmpArray[i],'|');
        proj4_data[i] = innerArray;
        }
    }
           
    
    
// from http://www.webmasterworld.com/forum91/3262.htm            
function explodeArray(item,delimiter) {
tempArray=new Array(1);
var Count=0;
var tempString=new String(item);

while (tempString.indexOf(delimiter)>0) {
tempArray[Count]=tempString.substr(0,tempString.indexOf(delimiter));
tempString=tempString.substr(tempString.indexOf(delimiter)+1,tempString.length-tempString.indexOf(delimiter)+1);
Count=Count+1
}

tempArray[Count]=tempString;
return tempArray;
}     


        

var proj4_data;

function initVars() {
 
    }       

	});

