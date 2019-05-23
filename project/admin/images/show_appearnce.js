<!--
function high(which2){
theobject=which2
highlighting=setInterval("highlightit(theobject)",50)
}
function low(which2){
theobject=which2
lowlighting=setInterval("lowlightit(theobject)",100)
}
function highlightit(cur2){
if (cur2.filters.alpha.opacity<100)
cur2.filters.alpha.opacity+=10
else if (window.highlighting)
clearInterval(highlighting)
}
function lowlightit(cur2){
if (cur2.filters.alpha.opacity>40)
cur2.filters.alpha.opacity-=10
else if (window.lowlighting)
clearInterval(lowlighting)
}
//-->