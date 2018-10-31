<!doctype html>
<html  lang="en">
<head>
<meta charset="utf-8"> 
<title>Duality Factory</title>
<link href="data:image/x-icon;base64,AAABAAEAEBAQAAEABAAoAQAAFgAAACgAAAAQAAAAIAAAAAEABAAAAAAAgAAAAAAAAAAAAAAAEAAAAAAAAAAAAAAAAP//AP8AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAiIiIiIiIiIgERAAERAAERABEQABEQABEAAREAAREAASIiIiIiIiIiAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACIiIiIiIiIiAREAAREAAREAERAAERAAEQABEQABEQABIiIiIiIiIiL//wAAAAAAAAAAAAAAAAAAAAAAAAAAAAC++wAAnnkAAI44AACeeQAAvvsAAAAAAAAAAAAAAAAAAAAAAAAAAAAA" rel="icon" type="image/x-icon" />

<!-- 
PUBLIC DOMAIN, NO COPYRIGHTS, NO PATENTS.

note that "map" has a broader meaning than just geographic maps like google maps or yahoo or whatever, the wikipedia definition starts like this:

"A map is a symbolic depiction emphasizing relationships between elements of some space, such as objects, regions, or themes."

This is the goal of this project, to make a factory which creates maps in this generalized definition.  

_9_LAWS_OF_GEOMETRON_:

EVERYTHING IS PHYSICAL
EVERYTHING IS FRACTAL
EVERYTHING IS RECURSIVE

NO MONEY
NO PROPERTY
NO MINING

EGO DEATH:
    LOOK AT THE INSECTS
    LOOK AT THE FUNGI
    LANGUAGE IS HOW THE MIND PARSES REALITY
    
-->
<!--Stop Google:-->
<META NAME="robots" CONTENT="noindex,nofollow">

<!-- links to MathJax JavaScript library, un-comment to use math-->
<!--

<script src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.0/MathJax.js?config=TeX-AMS-MML_HTMLorMML"></script>
<script>
	MathJax.Hub.Config({
		tex2jax: {
		inlineMath: [['$','$'], ['\\(','\\)']],
		processEscapes: true,
		processClass: "mathjax",
        ignoreClass: "no-mathjax"
		}
	});//			MathJax.Hub.Typeset();//tell Mathjax to update the math
</script>
-->
</head>
<body>
<div id = "datadiv" style = "display:none"><?php

echo file_get_contents("aligner/json/currentmeme.txt");

?></div>
<div id = "navbar">
    <img src = "symbols/diamond.svg" id = "topdiamond"/>
    <table id = "linktable">
        <tr>
            <td>
                <a href = "symbol/">
                    <img src = "symbols/symbol.svg"/>
                </a>
            </td>
            <td>
                <a href = "curve/">
                    <img src = "symbols/curve.svg"/>
                </a>
            </td>
            <td>
                <a href = "scroll/">
                    <img src = "symbols/scroll.svg"/>
                </a>
            </td>
            <td>
                <a href = "editor.php">
                    <img src = "symbols/editor.svg"/>
                </a>
            </td>
            <td>
                <a href = "uploader/">
                    <img src = "symbols/upload.svg"/>
                </a>
            </td>
            <td>
                <a href = "combiner/">
                    <img src = "symbols/combiner2.svg"/>
                </a>
            </td>
            <td>
                <a href = "aligner/">
                    <img src = "symbols/aligner.svg"/>
                </a>
            </td>
            <td style = "display:none">
                <a href = "linkfeed/">
                <img src = "symbols/linkfeed.svg"/>
                </a>
            </td>
            <td style = "display:none">
                <a href = "linker/">
                <img src = "symbols/linker.svg"/>
                </a>
            </td>
            <td>
                <a href = "index.php">
                <img src = "symbols/map.svg"/>
                </a>
            </td>
            <td>
                <a href = "maps/">
                <img src = "symbols/replicator.svg"/>
                </a>
            </td>

        </tr>
    </table>
</div>

<div id = "centerbox">
 <div id = "memebox">
  <img id = "bottomimage"/>
 </div>
</div>
<script>
meme= JSON.parse(document.getElementById("datadiv").innerHTML);

document.getElementById("bottomimage").width = innerWidth;
document.getElementById("bottomimage").src = meme.imgurl;
document.getElementById("bottomimage").onload = function(){
    aspectRatio = this.width/this.height;
    if(this.height > (innerHeight - 110)){
        this.style.height = (innerHeight - 110).toString() + "px";
        this.style.width = (aspectRatio*(innerHeight - 110)).toString() + "px";
        imageWidth = aspectRatio*(innerHeight - 110);
    }
    else{
        imageWidth = innerWidth;
    }
    init();
}
function init(){
    for(var index = 0;index < meme.topimages.length;index++){
        var newa = document.createElement("A");
        var newimg = document.createElement("IMG");
        document.getElementById("memebox").appendChild(newa);
        newa.href = meme.topimages[index].href;
        newa.appendChild(newimg);
        newa.className = "boxlink";
        newimg.className = "topimage";
        newimg.src = meme.topimages[index].url;
        newa.style.width = (meme.topimages[index].woverw*imageWidth).toString() + "px";
        newa.style.left = (meme.topimages[index].xoverw*imageWidth).toString() + "px";
        newa.style.top = (meme.topimages[index].yoverw*imageWidth).toString() + "px";
        newa.style.transform = "rotate(" + (meme.topimages[index].angle).toString() + "deg)";
        newimg.onload = function(){
             this.parentElement.style.height = (this.height).toString() + "px";
        }
        
    }
}
</script>

<style>
body{
    font-family:Helvetica;
}
#navbar{
    position:absolute;
    left:0px;
    right:0px;
    top:0px;
    height:100px;
    border-bottom:solid;
    border-width:10px;
    border-color:blue;
    overflow:hidden;
}
#linktable{
    border:solid;
    margin:auto;
    border-radius:10px;
    margin-top:22px;
}
#linktable img{
    height:50px;
}
#centerbox{
    position:absolute;
    left:0px;
    right:0px;
    top:110px;
    bottom:0px;
}
#memebox{
    position:absolute;
    left:0px;
    top:0px;
    right:0px;
    bottom:0px;
}
.topimage{
    position:absolute;
    z-index:1;
    left:0px;
    top:0px;
    width:100%;
    opacity:0.5;
}
.boxlink{
    position:absolute;
    z-index:1;
}
#bottomimage{
    position:absolute;
    left:0px;
    top:0px;
    border-right:solid;
    border-bottom:solid;
    opacity:0.5;
}

#actionbar{
    position:absolute;
    left:0px;
    right:0px;
    bottom:0px;
    height:100px;
    text-align:center;
    border-top:solid;
    border-color:blue;
    border-width:10px;
    background-color:white;
    z-index:99999999;
}

#deletebutton{
    position:absolute;
    right:0px;
    bottom:0px;
    width:60px;
    height:60px;
    display:none;
}
#publishbutton{
    position:absolute;
    left:0px;
    bottom:0px;
    width:60px;
    height:60px;
    display:none;
}
#uploadform{
    display:none;
}
#mapinput{
    display:none;
}
#imagelinktable{
    display:none;
}
#inputtable{
    display:none;
}
.button{
    cursor:pointer;
    border-radius:5px;
    text-align:center;
}
.button:active{
    background-color:yellow;
}
#topdiamond{
    position:absolute;
    top:0px;
    left:0px;
    overflow:hidden;
    height:20px;
    width:100%;
    z-index:-2;
}
#bottomsign{
    position:absolute;
    bottom:20px;
    left:0px;
    overflow:hidden;
    height:20px;
    width:100%;
    z-index:-4;
    opacity:0.3;    
}
</style>



</body>
</html>