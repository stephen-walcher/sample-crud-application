@extends('master')

@section('main')
    <div class="row">
        <a href="/country/add" class="add-country btn btn-default pull-right"><span class="glyphicon glyphicon-plus"></span> Create New</a>
    </div>
    
    <div class="row top-buffer">
        <table id="countries_table" class="table table-striped">
            <thead>
                <th>Country</th>
                <th>Continent</th>
                <th>Population</th>
                <th>Head of State</th>
                <th width="10%"></th>
            </thead>
            <tbody>
            @if (isset($countries) && count($countries) > 0)
            @foreach ($countries as $c)
                <tr>
                    <td>{{ $c->name }} ({{ $c->code }})</td>
                    <td>{{ $c->continent }}</td>
                    <td>{{ number_format($c->population) }}</td>
                    <td>{{ !empty($c->head_of_state) ? $c->head_of_state : 'None' }}</td>
                    <td>
                        <a href="country/edit/{{ $c->id }}" class="link-edit btn btn-icon btn-sm btn-success" title="Edit"><span class="glyphicon glyphicon-pencil"></span></a>
                        <a href="country/delete/{{ $c->id }}" class="link-delete btn btn-icon btn-sm btn-danger" title="Delete"><span class="glyphicon glyphicon-remove"></span></a>
                    </td>
                </tr>
            @endforeach
            @else
                <tr>
                    <td colspan="2">No countries found. Click "Add Country" to add your first country!</td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
@stop

@section('header-css')
    {{ HTML::style('/vendor/datatables/media/css/jquery.dataTables.min.css') }}
    {{ HTML::style('/css/countries/list.css') }}
@stop

@section('footer-js')
    {{ HTML::script('/vendor/datatables/media/js/jquery.dataTables.min.js') }}
    {{ HTML::script('/js/countries/list.min.js') }}
@stop