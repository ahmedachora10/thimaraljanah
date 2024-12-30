@props(['name', 'title', 'value' => null, 'placeholder' => null])

<x-dashboard.label :for="$name">{{ $title }}</x-dashboard.label>

<textarea name="{{$name}}" id="{{$name}}" {{$attributes->merge(['class' => 'form-control'])}}>{{ $value ?? old($name) }}</textarea>

<x-dashboard.error :field="$name" />
