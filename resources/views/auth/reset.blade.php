@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body" id="step1">
                    <!-- <form method="POST" action="{{ route('password.update') }}"> -->
                        <!-- @csrf -->

                        <div class="row mb-3">
                            <label for="number" class="col-md-4 col-form-label text-md-end">Télefono</label>

                            <div class="col-md-6">
                                <input id="number" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" type="number" class="form-control @error('number') is-invalid @enderror" name="number" value="{{ $number ?? old('number') }}" required autocomplete="number" autofocus>

                                @error('number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                      
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" id="send_sms">
                                    Enviar Código
                                </button>
                            </div>
                        </div>
                    <!-- </form> -->
                </div>

                <div class="card-body" id="step2" style="display:none;">
                    <h2>Ingresa código</h2>
                    <p>Se te ha enviado un SMS a tu número telefonico, ingresa el código.</p>
                    <input id="code" maxLength="6" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" type="code" class="form-control @error('number') is-invalid @enderror" name="code" required autofocus>
                    <button class="btn btn-primary mt-2">Enviar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>
$(function(){
    $("#send_sms").click(()=>{     
        $("#step2").css("display", "block")
        $("#step1").css("display", "none")
    }) 
});
</script>
@endsection
