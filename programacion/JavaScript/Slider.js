




$(function() {
var SliderModule= (function()
{
var pb={}; //arreglo
pb.elemento=$('#slider');
pb.items=
{
panel:pb.elemento.find('li')
}
var SliderInterval,
currentSlider=0,
nextSlider=1,
lengthSlider=pb.items.panel.length;
//inicializar
pb.init=function(settings){
//activar el slider
sliderSliderInit();
}
var SliderInit=function()
{
SliderInterval=setInterval(pb.startSlider,3000);
}

pb.startSlider=function(){
var panels=pb.items.panel;
if(nextSlider>= lengthSlider)
{
nextSlider=0;
currentSlider=lengthSlider-1;
}
panels.eq(currentSlider).fadeOut('slow');
panels.eq(nextSlider).fadeIn('slow');
currentSlider=nextSlider;
nextSlider +=1;


}
return pb;
}());
SliderModule.init();
});