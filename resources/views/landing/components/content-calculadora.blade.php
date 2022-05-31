<div class="row-span-1 col-span-1 text-center calculadoraItems">
    <span class="texto-solicita-negro">¿Cu&aacute;nto <strong class="text-green">dinero</strong> necesitas?</span>
</div>

<div class="row-span-1 col-span-1 self-center calculadoraItems">
    <h3 style="font-size: 28px;"><strong class="texto-gris">Pr&eacute;stamo</strong></h3>
</div>

<div class="crow-span-1 ol-span-1 calculadoraItems">
    <livewire:landing.slider-prestamo/>
</div>

<div class="row-span-1 col-span-1 self-center calculadoraItems">
    <h3 style="font-size: 28px;"><strong class="texto-gris">Tiempo de pr&eacute;stamo</strong></h3>
</div>

<div class="row-span-1 col-span-1 calculadoraItems">
    <livewire:landing.slider-tiempo/>
</div>

<div class="row-span-1 col-span-1 text-center  calculadoraItems">
        <button class="btn btn-verde px-5 mt-4" id="btnSig" style="font-size: 32px"><strong>Siguiente</strong></button>
</div>

<script>
    window.onload = function () {
sliders();
}

function sliders() {

var tracks = [
 '-webkit-slider-runnable-track',
];

var thumbs = [
 '-webkit-slider-thumb',
];

initSliders();
var sliderGroups = document.querySelectorAll('section[data-type=slider-group]');
for (var i=0;i<sliderGroups.length;i+=1) {
 initSliderGroup(sliderGroups[i]);
}

function initSliders() {
 var sliders = document.querySelectorAll('input[type=range]');
 var testAndWK = window.getComputedStyle(sliders[0],'::-webkit-slider-thumb').background;
 for (var i=0;i<sliders.length;i+=1) {
     if (!testAndWK) {
         sliders[i].style.WebkitAppearance = 'slider-horizontal';
     }

     // prepare a <style> tag that will be used by handleSlider()

     var st = document.createElement('style');
     st.id = 's' + sliders[i].id;
     document.head.appendChild(st);


     sliders[i].addEventListener('input',function () {handleSlider(this)},false);
     sliders[i].addEventListener('change',function () {handleSlider(this)},false);

     sliders[i].output = sliders[i].parentNode.querySelector('output');
     var dataSpan = sliders[i].parentNode.querySelector('span');
     if (dataSpan && dataSpan.getAttribute('data-labels')) {
         sliders[i].values = [];
         var values = dataSpan.getAttribute('data-labels').split(';');
         for (var j=0;j<values.length;j+=1) {
             sliders[i].values.push(values[j]);
         }
     }


     if (sliders[i].value*1) {
         handleSlider(sliders[i]);
     }
 }
}

function handleSlider(slider) {

 // this sets the gradient for one slider to the correct color stops
 // needs a prepared <style> tag created by initSliders()

 var gradValue = Math.round((slider.value/slider.getAttribute('max')*1)*100);
 var grad = 'linear-gradient(90deg,orange ' + gradValue + '%,#cccccc ' + (gradValue+1) + '%)';
 var rangeSelector = 'input[id='+slider.id+']::';
 var styleString = '';
 var printedValue = (slider.values) ? slider.values[slider.value] : slider.value;
 slider.output.innerHTML = printedValue;
 for (var j=0;j<tracks.length;j+=1) {
     styleString += rangeSelector + tracks[j] + '{background: ' + grad + ';} ';
 }
 document.getElementById('s'+slider.id).textContent = styleString;
}

function initSliderGroup(parent) {
 var sliders = parent.querySelectorAll('input[type=range]');
 var max = parent.querySelector('div').getAttribute('data-total')*1;
 var groupRoster = [];
 var timeout;
 for (var i=0;i<sliders.length;i+=1) {
     groupRoster.push(sliders[i]);
     sliders[i].others = [];
     sliders[i].addEventListener('input',trackChange,false);
     sliders[i].addEventListener('change',trackChange,false);
 }
 for (var i=0;i<sliders.length;i+=1) {
     for (var j=0;j<groupRoster.length;j+=1) {
         if (groupRoster[j] !== sliders[i]) {
             sliders[i].others.push(groupRoster[j]);
         }
     }
 }

 function trackChange () {
     var that = this;
     clearTimeout(timeout);
     timeout = setTimeout(function () {
         setOtherSliders(that);
     },100);
 }

 function setOtherSliders(slider) {
     var currentTotal = calculateTotal();
     if (currentTotal > max) {
         var excess = currentTotal - max;
         var totalFromOthers = currentTotal - (slider.value*1);
         for (var j=0;j<slider.others.length;j+=1) {
             var newValue = Math.round(slider.others[j].value - ((slider.others[j].value/totalFromOthers)*excess));
             slider.others[j].value = newValue;
             handleSlider(slider.others[j]);
         }
     }
 }


 function calculateTotal () {
     var total = 0;
     for (var i=0;i<groupRoster.length;i+=1) {
         total += groupRoster[i].value*1;
     }
     return total;
 }

}
}

function $(id) {
return document.getElementById(id);
}
     </script>
