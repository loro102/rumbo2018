@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('partials.programa.messages')
            @include('partials.programa.errors')
        </div>
        <br/>
        <div class="row">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#nuevocliente"
                    data-whatever="@nuevocliente">Nuevo cliente
            </button>
            <div class="modal fade" id="nuevocliente" tabindex="-1" role="dialog" aria-labelledby="nuevoclienteLabel"
                 aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="nuevoclienteLabel">Nuevo Cliente</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @include('partials.programa.errors')
                            <form method="post" action="/clientes">
                                {{csrf_field()}}
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="nombre">{{__('Nombre')}}</label>
                                            <input id="nombre" class="form-control" name="nombre"
                                                   value="{{old('nombr6')}}">
                                        </div>
                                        <div class="form-group col-5">
                                            <label for="apellidos">{{__('Apellidos')}}</label>
                                            <input id="apellidos" class="form-control" name="apellidos"
                                                   value="{{old('apellidos')}}">
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="nif">{{__('Nif')}}</label>
                                            <input id="nif" class="form-control" name="nif" value="{{old('nif')}}">
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="fechanacimiento">{{__('Fecha de nacimiento')}}</label>
                                            {!! Form::date('fechanacimiento', old('fechanacimiento') ,['class'=>'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label for="direccion">{{__('Direccion')}}</label>
                                            <input id="direccion" class="form-control" name="direccion"
                                                   value="{{old('direccion')}}">
                                        </div>
                                        <div class="form-group col-4">
                                            <label for="codigopostal">{{__('Codigo Postal')}}</label>
                                            <input id="codigopostal" class="form-control" name="codigopostal"
                                                   value="{{old('codigopostal')}}">
                                        </div>
                                        <div class="form-group col-4">
                                            <label for="localidad">{{__('Localidad')}}</label>
                                            <input id="localidad" class="form-control" name="localidad"
                                                   value="{{old('localidad')}}">
                                        </div>
                                        <div class="form-group col-4">
                                            <label for="provincia">{{__('Provincia')}}</label>
                                            <input id="provincia" class="form-control" name="provincia"
                                                   value="{{old('provincia')}}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-4">
                                            <label for="telefono1">{{__('Telefono 1')}}</label>
                                            <input id="telefono1" class="form-control" name="telefono1"
                                                   value="{{old('telefono1')}}">
                                        </div>
                                        <div class="form-group col-4">
                                            <label for="telefono2">{{__('Telefono 2')}}</label>
                                            <input id="telefono2" class="form-control" name="telefono2"
                                                   value="{{old('telefono2')}}">
                                        </div>
                                        <div class="form-group col-4">
                                            <label for="movil">{{__('Movil')}}</label>
                                            <input id="movil" class="form-control" name="movil"
                                                   value="{{old('movil')}}">
                                        </div>
                                        <div class="form-group col-4">
                                            <label for="email">{{__('Correo electrónico')}}</label>
                                            <input id="email" class="form-control" name="email"
                                                   value="{{old('email')}}">
                                        </div>
                                        <div class="form-group col-4">
                                            <label for="iban">{{__('IBAN')}}</label>
                                            <input id="iban" class="form-control" name="iban" value="{{old('iban')}}">
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="form-group col-12">
                                            <label for="nota">{{__('nota')}}</label>
                                            <textarea id="nota" class="form-control"
                                                      name="nota">{{old('nota')}}</textarea>
                                        </div>

                                    </div>

                                    <button type="submit" name="addForum"
                                            class="btn btn-default">{{__('Añadir Cliente Nuevo')}}</button>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Send message</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <br/>

        <div class="row">
            <table class="table table-striped table-dark">

                <thead class="thead-dark">
                <tr>
                    <th>
                        {{__('Cliente')}}
                    </th>
                    <th>
                        {{__('NIF')}}
                    </th>
                </tr>
                </thead>
                @forelse($clientes as $cliente)
                    <tr>
                        <td>
                            <a href="/clientes/{{$cliente->id}}">
                                {{$cliente->FullName}}
                            </a>
                        </td>
                        <td>
                            {{$cliente->nif}}
                        </td>
                    </tr>
                @empty
                    <div class="alert alert-danger">
                        {{__('No existen clientes en este momento')}}
                    </div>
                @endforelse
            </table>
            @if($clientes->Count())
                {{$clientes->links()}}
            @endif
        </div>


    </div>
@endsection