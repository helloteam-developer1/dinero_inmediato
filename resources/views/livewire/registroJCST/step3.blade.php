<div class="row setup-content {{ $currentStep != 3 ? 'displayNone' : '' }}" id="step-3">
    <div class="col-1"></div>
    
    {{--Inicio del formulario 3--}}
   <div class="col-10">
    <p class="titulo-naranja">Documentos</p>
    <p class="texto">Para hacer uso de su crédito es importante adjuntar la siguiente documentación:</p>
    <p class="texto-rojo-s">"Recuerda subir tus documentos de la forma más legible posible"</p>
    <p class="texto-negro-s">"Los archivos no deben de pesar más de 2 MB."</p>
    {{--Campos para subir datos--}}
    
    
        <div class="row">
            <div class="col-2"></div>
            <div class="col-5"><p class="texto">INE (frente)</p></div>
            <div class="col-5">
                <button class="btn btn-gris" onclick="document.getElementById('getFile').click()">Adjuntar archivo</button>
                <input type='file' id="getFile" style="display: none">
            </div>
            <div class="col-2"></div>
        </div>
        <div class="row">
            <div class="col-2"></div>
            <div class="col-5"><p class="texto">INE (reverso)</p></div>
            <div class="col-5">
                <button class="btn btn-gris" onclick="document.getElementById('getFile').click()">Adjuntar archivo</button>
                <input type='file' id="getFile" style="display:none">
            </div>
            <div class="col-2"></div>
        </div>
        <div class="row">
            <div class="col-2"></div>
            <div class="col-5"><p class="texto">Comprobante de comicilio<p></div>
            <div class="col-5">
                <button class="btn btn-gris" onclick="document.getElementById('getFile').click()">Adjuntar archivo</button>
                <input type='file' id="getFile" style="display:none">
            </div>
            <div class="col-2"></div>
        </div>
        <div class="row">
            <div class="col-2"></div>
            <div class="col-5"><p class="texto">Tomate una foto con tu INE </p></div>
            <div class="col-5">
                <button class="btn btn-gris" onclick="document.getElementById('getFile').click()">Adjuntar archivo</button>
                <input type='file' id="getFile" style="display:none">
            </div>
            <div class="col-2"></div>
        </div>
    
        <div class="row">
            <div class="col-3"></div>
            <div class="col-7">
                <img src="img/perfil.png" class="img">
                
                <p class="texto-verde">La fotografía no debe de ser tomada con: (gorra, lentes o algún objeto
                    viendo a la cámara a qué altura la INE)
                </p>
            </div>
            <div class="col-1"></div>
        </div>

        <div class="row">
            <div class="col-2"></div>
            <div class="col-7">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label informacion" for="flexCheckDefault">
                      Acepto que mi información sea investigada en buro de crédito.
                    </label>
                  </div>
            </div>
            <div class="3"></div>
        </div>

        <div class="row">
            <div class="col-1"></div>
            <div class="col-7">            
                    <p class="form-check-label informacion" for="flexCheckDefault">
                      Al hacer clic en "Continuar", estarás aceptando el
                    </p>
                    <a href="" data-toggle="modal" data-target="#aviso" class="subrayado">
                        AVISO DE PRIVACIDAD y TÉRMINOS Y CONDICIONES
                      </a>
            <div class="3"></div>
        </div>
        </div>
        
        
        <br />
    {{--Botones formulario 3--}}
    <div class="row ">
        <div class="col-2">
            <button class="btn btn-verde nextBtn btn-lg pull-right" type="button" wire:click="back(2)">Regresar</button>
        </div>
        <div class="col-8">
        </div>
        <div class="col-2">
            <button class="btn btn-naranja nextBtn btn-lg pull-right" type="button" wire:click="secondStepSubmit">Contiuar</button>
        </div>
    </div>
    <br />
    <div class="row">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cancelar">
            Cancelar
          </button>
    </div>

   </div>
   <div class="col-1"></div>
   
</div>

{{--Ventana modal--}}
@include('livewire/registroJCST/modales/_modal')