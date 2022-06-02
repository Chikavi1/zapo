@extends('layouts.app')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<div class="row">
    <div class="col-md-6 offset-md-3">
        <div class="card">
            <h2 class="text-center">Validar Código QR</h2>
            <p class="m-4">Para validar el Código necesitamos abrir tu camara.</p>
            <button type="button"  class="qrcode-reader btn btn-success" id="openreader-single" data-qrr-target="#single"
                  data-qrr-audio-feedback="false">Leer Código QR</button>
        </div>
    </div>
</div>



                 <style>
        #qrr-overlay{position:fixed;top:0;left:0;background:#000;opacity:.6;width:100%;height:100%;display:none;z-index:20000}#qrr-container{font-family:sans-serif;position:fixed;top:0;left:0;right:0;bottom:0;background:#fff;padding:10px;width:90%;height:90%;margin:auto;display:none;z-index:20001;border-radius:10px}#qrr-container h1{margin-top:0}#qrr-close{position:absolute;right:0;top:0;margin-right:10px;margin-top:-5px;font-size:3em;cursor:pointer;color:grey}#qrr-loading-message{text-align:center;padding:15px;background-color:#eee;width:90%;margin:30px auto 0}#qrr-canvas{display:block;height:65%;max-width:90%;overflow-x:scroll;cursor:pointer;margin:30px auto 10px}#qrr-canvas.hidden{display:none}#qrr-output{width:90%;max-height:15%;margin:20px auto 10px;background:#eee;padding:10px;overflow-y:auto}#qrr-ok{display:none;position:absolute;right:10px;bottom:10px;padding:10px 50px;cursor:pointer;font-weight:700;text-decoration:none;background-color:green;color:#fff;border-radius:10px}#qrr-output-data{display:none}
    </style>
    
        <script>
          (function($,window,document,undefined){"use strict";if(!window.requestAnimationFrame){window.requestAnimationFrame=function(){return window.webkitRequestAnimationFrame||window.mozRequestAnimationFrame||window.oRequestAnimationFrame||window.msRequestAnimationFrame||function(callback,element){window.setTimeout(callback,1e3/60)}}()}var qrr,QRCodeReader=function(){};$.qrCodeReader={jsQRpath:"../dist/js/jsQR/jsQR.min.js",beepPath:"../dist/audio/beep.mp3",instance:null,defaults:{multiple:false,qrcodeRegexp:/./,audioFeedback:true,repeatTimeout:1500,target:null,skipDuplicates:true,lineColor:"#FF3B58",callback:function(code){}}};QRCodeReader.prototype={constructor:QRCodeReader,init:function(){qrr.buildHTML();qrr.scriptLoaded=false;qrr.isOpen=false;$.getScript($.qrCodeReader.jsQRpath,function(data,textStatus,jqxhr){if(jqxhr.status==200){qrr.scriptLoaded=true}else{console.error("Error loading QRCode parser script")}})},buildHTML:function(){qrr.bgOverlay=$('<div id="qrr-overlay"></div>');qrr.container=$('<div id="qrr-container"></div>');qrr.closeBtn=$('<span id="qrr-close">&times;</span>');qrr.closeBtn.appendTo(qrr.container);qrr.okBtn=$('<a id="qrr-ok">OK</a>');qrr.loadingMessage=$('<div id="qrr-loading-message">🎥 No se puede acceder a la transmisión de video (asegúrese de tener una cámara web habilitada)</div>');qrr.canvas=$('<canvas id="qrr-canvas" class="hidden"></canvas>');qrr.audio=$('<audio hidden id="qrr-beep" src="'+$.qrCodeReader.beepPath+'" type="audio/mp3"></audio>');qrr.outputDiv=$('<div id="qrr-output"></div>');qrr.outputNoData=$('<div id="qrr-nodata">Código QR no detectado aún.</div>');qrr.outputData=$('<div id="qrr-output-data"></div>');qrr.outputNoData.appendTo(qrr.outputDiv);qrr.outputData.appendTo(qrr.outputDiv);qrr.loadingMessage.appendTo(qrr.container);qrr.canvas.appendTo(qrr.container);qrr.outputDiv.appendTo(qrr.container);qrr.audio.appendTo(qrr.container);qrr.okBtn.appendTo(qrr.container);qrr.bgOverlay.appendTo(document.body);qrr.bgOverlay.on("click",qrr.close);qrr.closeBtn.on("click",qrr.close);qrr.container.appendTo(document.body);qrr.video=document.createElement("video")},drawLine:function(begin,end,color){var canvas=qrr.canvas[0].getContext("2d");canvas.beginPath();canvas.moveTo(begin.x,begin.y);canvas.lineTo(end.x,end.y);canvas.lineWidth=4;canvas.strokeStyle=color;canvas.stroke()},drawBox:function(location,color){qrr.drawLine(location.topLeftCorner,location.topRightCorner,color);qrr.drawLine(location.topRightCorner,location.bottomRightCorner,color);qrr.drawLine(location.bottomRightCorner,location.bottomLeftCorner,color);qrr.drawLine(location.bottomLeftCorner,location.topLeftCorner,color)},setOptions:function(element,options){var dataOptions={multiple:$(element).data("qrr-multiple"),qrcodeRegexp:new RegExp($(element).data("qrr-qrcode-regexp")),audioFeedback:$(element).data("qrr-audio-feedback"),repeatTimeout:$(element).data("qrr-repeat-timeout"),target:$(element).data("qrr-target"),skipDuplicates:$(element).data("qrr-skip-duplicates"),lineColor:$(element).data("qrr-line-color"),callback:$(element).data("qrr-callback")};options=$.extend({},dataOptions,options);var settings=$.extend({},$.qrCodeReader.defaults,options);$(element).data("qrr",settings)},getOptions:function(element){qrr.settings=$(element).data("qrr")},open:function(){if(qrr.isOpen)return;qrr.getOptions(this);qrr.bgOverlay.show();qrr.container.slideDown();qrr.codes=[];qrr.outputNoData.show();qrr.outputData.empty();qrr.outputData.hide();if(qrr.settings.multiple){qrr.okBtn.show();qrr.okBtn.off("click").on("click",qrr.doneReading)}else{qrr.okBtn.hide()}$(document).on("keyup.qrCodeReader",function(e){if(e.keyCode===27){qrr.close()}if(qrr.settings.multiple&&e.keyCode===13){qrr.doneReading()}});qrr.isOpen=true;if(qrr.scriptLoaded){qrr.start()}},start:function(){navigator.mediaDevices.getUserMedia({video:{facingMode:"environment"}}).then(function(stream){qrr.video.srcObject=stream;qrr.video.setAttribute("playsinline",true);qrr.video.play();qrr.startReading()})},startReading:function(){qrr.requestID=window.requestAnimationFrame(qrr.read)},doneReading:function(){var value=qrr.codes[0];if(qrr.settings.target){if(qrr.settings.multiple){var value=qrr.codes.join("\n")}$(qrr.settings.target).val(value)}if(qrr.settings.callback){try{if(qrr.settings.multiple){qrr.settings.callback(qrr.codes)}else{qrr.settings.callback(value)}}catch(err){console.error(err)}}qrr.close()},read:function(){var codeRead=false;var canvas=qrr.canvas[0].getContext("2d");qrr.loadingMessage.text("⌛ Cargando video...");qrr.canvas.off("click.qrCodeReader",qrr.startReading);if(qrr.video.readyState===qrr.video.HAVE_ENOUGH_DATA){qrr.loadingMessage.hide();qrr.canvas.removeClass("hidden");qrr.canvas[0].height=qrr.video.videoHeight;qrr.canvas[0].width=qrr.video.videoWidth;canvas.drawImage(qrr.video,0,0,qrr.canvas[0].width,qrr.canvas[0].height);var imageData=canvas.getImageData(0,0,qrr.canvas[0].width,qrr.canvas[0].height);var code=jsQR(imageData.data,imageData.width,imageData.height,{inversionAttempts:"dontInvert"});if(code&&qrr.settings.qrcodeRegexp.test(code.data)){qrr.drawBox(code.location,qrr.settings.lineColor);codeRead=true;qrr.codes.push(code.data);sendApi(code.data);qrr.outputNoData.hide();qrr.outputData.show();if(qrr.settings.audioFeedback){qrr.audio[0].play()}if(qrr.settings.multiple){if(qrr.settings.skipDuplicates){qrr.codes=$.unique(qrr.codes)}$('<div class="qrr-input"></div>').text(code.data).appendTo(qrr.outputData);qrr.outputDiv[0].scrollTop=qrr.outputDiv[0].scrollHeight;qrr.canvas.on("click.qrCodeReader",qrr.startReading);if(qrr.settings.repeatTimeout>0){setTimeout(qrr.startReading,qrr.settings.repeatTimeout)}else{qrr.loadingMessage.text("Click on the image to read the next QRCode");qrr.loadingMessage.show()}}else{qrr.doneReading();}}}if(!codeRead){qrr.startReading()}},close:function(){if(qrr.requestID){window.cancelAnimationFrame(qrr.requestID)}$(document).off("keyup.qrCodeReader");if(qrr.video.srcObject){qrr.video.srcObject.getTracks()[0].stop()}qrr.canvas.addClass("hidden");qrr.loadingMessage.show();qrr.bgOverlay.hide();qrr.container.hide();qrr.isOpen=false}};$.fn.qrCodeReader=function(options){if(!$.qrCodeReader.instance){qrr=new QRCodeReader;qrr.init();$.qrCodeReader.instance=qrr}return this.each(function(){qrr.setOptions(this,options);$(this).off("click.qrCodeReader").on("click.qrCodeReader",qrr.open)})}})(jQuery,window,document);
    
          $(function(){

// overriding path of JS script and audio
$.qrCodeReader.jsQRpath = "{{ asset('dist/js/jsQR/jsQR.js') }}";
$.qrCodeReader.beepPath = "{{ asset('dist/audio/beep.mp3') }}";

// bind all elements of a given class
$(".qrcode-reader").qrCodeReader();

// bind elements by ID with specific options
$("#openreader-multi2").qrCodeReader({multiple: true, target: "#multiple2", skipDuplicates: false});
$("#openreader-multi3").qrCodeReader({multiple: true, target: "#multiple3"});

// read or follow qrcode depending on the content of the target input
$("#openreader-single2").qrCodeReader({callback: function(code) {
  if (code) {
    window.location.href = code;
  }
}}).off("click.qrCodeReader").on("click", function(){
  var qrcode = $("#single").val().trim();
  console.log(qrcode);
  if (qrcode) {
    window.location.href = qrcode;
  } else {
    $.qrCodeReader.instance.open.call(this);
  }
});


});

   function sendApi(text){
    alert(text)
        // //alert('texto desde funcion es: '+text);
        //   url= "{{ URL::to('checadores/datos_unidad_qr') }}" + '/' + text;

        //     $.get(url, function(res, sta){
        //         //console.log(res);
        //         if(res =='error'){
        //             alert('No Existe la Unidad');
        //             location.reload();
        //         }else{
        //             url_2= "{{ URL::to('checadores/checar') }}" + '/' + res;
        //             window.location.href = url_2;
        //         }

        //     });

    }

</script>
@endsection

