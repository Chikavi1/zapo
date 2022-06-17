@extends('layouts.app')
@section('content')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<div class="container">
    
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <h2>Crear Movimiento</h2>
            <div class="form-group">
                <label for="exampleInputEmail1">Número celular</label>
                <input type="tel" class="form-control" name="cellphone" id="cellphone" placeholder="Ingresa Número" onkeypress='validate(event)'>
                <button class="btn btn-primary m-2 float-end" onClick="checkUser()">Buscar</button>
            </div>

            <div id="user" style="display:none;" class="text-center" >
                <h4 style="margin-top:3em;" id="name_user"></h4>
                <small>¿Es la persona?</small>
            
            <form>  
              <div class="form-group mt-2">
                  <label for="exampleInputEmail1">Folio</label>
                  <input maxLength="15" id="folio"  class="form-control" name="folio" placeholder="Ingresa Folio">
              </div>
                <div class="form-group mt-4">
                    <label for="exampleInputEmail1">Monto</label>
                    <input min="100" id="amount" type="number" class="form-control" name="amount" placeholder="Ingresa Monto" onkeypress='validate(event)'>
                </div>
            </form>
            <div class="row my-4">
                <div class="col">
                    <button class="btn btn-success w-100" data-toggle="modal" data-target="#modalpass">Contraseña</button>
                </div>
                <div class="col">
                <button type="button" class="btn btn-primary w-100" data-toggle="modal" data-target="#qrmodal">
                Códigos QR
                </button>
                   
                </div>
            </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="qrmodal" tabindex="-1" role="dialog" aria-labelledby="qrmodalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Código QR</h5>
      </div>
      <div class="row">
          <div class="col-md-3 offset-md-3 " style="margin-left:3em;">
              {!! QrCode::size(280)->generate('12313131'); !!}
          </div>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Entendido</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalpass" tabindex="-1" role="dialog" aria-labelledby="modalpassLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Contraseña</h5>
      </div>
      <div class="row">
          <h2 class="text-center">Ingresa contraseña</h2>
        </div>
        <div class="modal-body">
        <div class="form-group mt-4">
          <input id="password"  type="password" placeholder="Ingresa Contraseña" class="form-control" name="password">

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="verify">Verificar</button>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<script>

function validate(evt) {
  var theEvent = evt || window.event;

  // Handle paste
  if (theEvent.type === 'paste') {
      key = event.clipboardData.getData('text/plain');
  } else {
  // Handle key press
      var key = theEvent.keyCode || theEvent.which;
      key = String.fromCharCode(key);
  }
  var regex = /[0-9]|\./;
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
}



    $('#exampleModal').on('shown.bs.modal', function () {
  $('#exampleModal').trigger('focus')
})


var userId;

var domain;
console.log(window.location.hostname);
if(window.location.hostname === "127.0.0.1"){
  domain = 'http://127.0.0.1:8000';
}else{
  domain = window.location.hostname;
}

$('#verify').click(()=>{
  var data = {
      '_token':'{!! csrf_token() !!}',
      'id': userId,
      'operador_id': "{{ Auth::user()->id }}",
      'password': $("#password").val(),
      'folio': $("#folio").val(),
      'amount': $("#amount").val()
  };
  url = domain+"/createTransaction";


  $.post(url,data,function(r){
     console.log(r)
     if(r.status === 200){
      Swal.fire(
          '¡Movimiento exitoso!',
          'Se ha generado el movimiento exitosamente!',
          'success'

        )
        setTimeout(() => {
          location.reload();
        }, 2600)


     }else{
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: '¡Contraseña incorrecta!',
      })

     }
  });
})

    function checkUser(){
        cellphone = $("#cellphone").val();
        $.ajax({
        type: 'GET', 
        url: domain+'/search_cellphone?cellphone='+cellphone,
        dataType: 'json',
        contentType: 'application/x-www-form-urlencoded', 
      
        success: function (data) {
            $("#user").show();
            userId = data[0].id;
            // console.log(data);
            name_user.html('');
            $.each(data, function(index, item) {
            name_user.html(''); //clears name_user for new data
            $.each(data, function(i, item) {
                  name_user.append('<div>'+item.name+'<br>'+hideemail(item.email)+'</div>');
          });
                name_user.append('<br>');
            });
        },error:function(err){ 
             console.log(err);
        }
    });
   

    function hideemail(target) {
        var email = target;
        var hiddenEmail = "";
        for (i = 0; i < email.length; i++) {
            if (i > 0 && i< email.indexOf("@") ) {
            hiddenEmail += "*";
            } else {
            hiddenEmail += email[i];
            }
        }
        return hiddenEmail;
    }

      $(document).ready(function(){
        name_user = $("#name_user");

   


});
    }
     
</script>
@endsection