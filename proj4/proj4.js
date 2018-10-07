setInterval("doPictureShow()", 1000);
function doPictureShow() {
    var index = 0;
    var pictures = new Array(3);
    pictures[0] = 'Lindobear.jpg';
    pictures[1] = 'COrange_tuffles.jpg';
    pictures[2] = 'white_tuffles.jpg';
    var picHandle = document.images[0].src;
    // see which picture is showing, and set the index to the next one.
    if(picHandle.indexOf("Lindobear") != -1)         
        index = 0;
    else if(picHandle.indexOf("COrange") != -1)
        index = 1;
    else
        index = 2;      
    index++;
    if(index == 3) index = 0;
    document.images[0].src = pictures[index];
    }