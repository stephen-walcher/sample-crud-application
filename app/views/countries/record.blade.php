@extends('master')

@section('main')
    <h2>{{ isset($country) ? "Edit {$country->name}" : 'Add New Country' }}</h2>
    
    {{ Former::horizontal_open()->id('MyForm')->method('POST') }}
    <div class="form-group">
        {{ Former::text('name') }}
    </div>
    
    <div class="form-group">
        {{ Former::text('code') }}
    </div>
    
    <div class="form-group">
        {{ Former::select('continent')->fromQuery(Country::groupBy('continent')->orderBy('continent')->get(), 'continent', 'continent') }}
    </div>
    
    <div class="form-group">
        {{ Former::text('population') }}
    </div>
    
    <div class="form-group">
        {{ Former::text('head_of_state')->label('Head of State') }}
    </div>
    
    <div class="form-group">
        {{ Former::actions()->large_success_submit(isset($country) ? 'Save' : 'Create') }}
    </div>
    {{ Former::close() }}
@stop

@section('header-css')
    {{ HTML::style('/css/countries/record.css') }}
@stop