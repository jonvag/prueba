<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['class'=>'form-control', 'placeholder' => 'Ingrese nombre de la etiqueta']) !!}

    @error('name')
    <span class="text-danger">{{$message}}</span> {{-- esto viene de las validaciones que se hicieron en el controlador --}}
        
    @enderror
</div>
<div class="form-group">
    {!! Form::label('slug', 'Slug') !!}
    {!! Form::text('slug', null, ['class'=>'form-control', 'placeholder' => 'Ingrese slug de la etiqueta', 'readonly']) !!}
    @error('slug')
    <span class="text-danger">{{$message}}</span> {{-- esto viene de las validaciones que se hicieron en el controlador --}}
        
    @enderror
</div>
<div class="form-group">
    {!! Form::label('color', 'Color') !!}
    {!! Form::select('color', $colors, null, ['class'=>'form-control']) !!}
    @error('slug')
    <span class="text-danger">{{$message}}</span> {{-- esto viene de las validaciones que se hicieron en el controlador --}}
        
    @enderror
</div>