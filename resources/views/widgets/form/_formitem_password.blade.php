<?php
    /**
     * Created by PhpStorm.
     * User: mammut
     * Date: 21.02.16
     * Time: 16:37
     */ ?>
<?php if (!isset($value)) $value = null ?>
<div class="{!! $errors->has($name) ? 'has-error' : null !!} top-margin">
    <label for="{!! $name !!}">{{ $title }}</label>
    {{--{!! Form::password($name, $value, ['class' => 'form-control text_form']) !!}--}}
    <input type="password" name="{{$name}}" value="{{$value}}" placeholder="" class="form-control text_form">
    {{--<input name="password" type="password" value="$value"  placeholder="$placeholder" class="form-control text_form">--}}
    <p class="help-block">{!! $errors->first($name) !!}</p>
</div>