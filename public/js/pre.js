function Pre(){var e=document.getElementsByClassName("photo");for(var o=0;o<e.length;o++){var n=e[o];n.style.display="none";var t=n.getElementsByTagName("img")}var a=this;var r=0;var l=document.getElementsByTagName("img");for(var g=0;g<l.length;g++){var t=l[g];t.onload=function(){r++;console.log(r,l.length);if(r===l.length){a.onloadok()}};var s=t.parentNode;s.style.display="none"}}Pre.prototype.constructor=Pre;Pre.prototype.onloadok=function(){};new Pre;