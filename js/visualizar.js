window.onload=function(){
    var ul=document.getElementById("lista");
    var listaenlaces=ul.getElementsByTagName("a");
    var nodoEnlaces;
    for(var i=0;i<listaenlaces.length;i++){
        nodoEnlaces=listaenlaces[i];
        nodoEnlaces.onclick=visualizar;
    }
    
}
function visualizar(evento){
    evento.preventDefault();
    var imagenclick=this;
    var imagenver=document.getElementById("image");
    var hrefimagen=imagenclick.getAttribute("href");
    var src=imagenver.setAttribute("src",hrefimagen);
}