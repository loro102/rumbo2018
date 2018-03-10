@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">

            <div class='col-12'>

                @include('partials.programa.messages')
                @include('partials.programa.errors')

                <a type="button" class="btn btn-outline-info float-left" href="/clientes">
                    {{__('Volver al listado de clientes')}}
                </a>


                <button class="btn btn-primary float-right" data-toggle="modal" data-target="#nuevocliente"
                        data-whatever="@nuevocliente">
                    Editar este cliente
                </button>

                <div class="modal fade" id="nuevocliente" tabindex="-1" role="dialog"
                     aria-labelledby="nuevoclienteLabel"
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
                                <form id="cliente"  method="POST" action="/clientes/{{$cliente->id}}">
                                    {{ method_field('PUT') }}
                                    {{csrf_field()}}
                                    {!! Form::hidden('id',$cliente->id) !!}
                                    <div class="container-fluid">
                                        @if($errors->count()>0)
                                            <div class="row">
                                                <div class="form-group col-6">
                                                    <label for="nombre">{{__('Nombre')}}</label>
                                                    <input id="nombre" class="form-control" name="nombre"
                                                           value="{{old('nombre')}}">
                                                </div>
                                                <div class="form-group col-6">
                                                    <label for="apellidos">{{__('Apellidos')}}</label>
                                                    <input id="apellidos" class="form-control" name="apellidos"
                                                           value="{{old('apellidos')}}">
                                                </div>
                                                <div class="form-group col-6">

                                                    <label for="nif">{{__('Nif')}}</label>
                                                    <input id="nif" class="form-control" name="nif" value="{{old('nif')}}" data-toggle="tooltip" data-placement="right" data-html="true" title="Solo numeros y letras con el siguiente formato: <br/> NIF: 97350797P <br/>NIE:Z1537528Y <br/>CIF:G69244820 o Q9591614D">
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
                                                    <label for="telefono1">{{__('Telefono')}}</label>
                                                    <input id="telefono1" class="form-control" name="telefono1"
                                                           value="{{old('telefono1')}}" data-mask="000 000 000">
                                                </div>
                                                <div class="form-group col-4">
                                                    <label for="telefono2">{{__('Telefono alternativo')}}</label>
                                                    <input id="telefono2" class="form-control" name="telefono2"
                                                           value="{{old('telefono2')}}" data-mask="000 000 000">
                                                </div>
                                                <div class="form-group col-4">
                                                    <label for="movil">{{__('Movil')}}</label>
                                                    <input id="movil" class="form-control" name="movil"
                                                           value="{{old('movil')}}" data-mask="000 000 000">
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

                                            @else

                                        <div class="row">
                                            <div class="form-group col-6">
                                                <label for="nombre">{{__('Nombre')}}</label>
                                                <input id="nombre" class="form-control" name="nombre"
                                                       value="{{$cliente->nombre}}">
                                            </div>
                                            <div class="form-group col-6">
                                                <label for="apellidos">{{__('Apellidos')}}</label>
                                                <input id="apellidos" class="form-control" name="apellidos"
                                                       value="{{$cliente->apellidos}}">
                                            </div>
                                            <div class="form-group col-6">
                                                <label for="nif">{{__('Nif')}}</label>
                                                <input id="nif" class="form-control" name="nif"
                                                       value="{{$cliente->nif}}"  data-toggle="tooltip" data-placement="right" data-html="true" title="Solo numeros y letras con el siguiente formato: <br/> NIF: 97350797P <br/>NIE:Z1537528Y <br/>CIF:G69244820 o Q9591614D">
                                            </div>
                                            <div class="form-group col-6">
                                                <label for="fechanacimiento">{{__('Fecha de nacimiento')}}</label>
                                                {!! Form::date('fechanacimiento',$cliente->fechanacimiento,['class'=>'form-control']) !!}

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-12">
                                                <label for="direccion">{{__('Direccion')}}</label>
                                                <input id="direccion" class="form-control" name="direccion"
                                                       value="{{$cliente->direccion}}">
                                            </div>
                                            <div class="form-group col-4">
                                                <label for="codigopostal">{{__('Codigo Postal')}}</label>
                                                <input id="codigopostal" class="form-control" name="codigopostal"
                                                       value="{{$cliente->codigopostal}}">
                                            </div>
                                            <div class="form-group col-4">
                                                <label for="localidad">{{__('Localidad')}}</label>
                                                <input id="localidad" class="form-control" name="localidad"
                                                       value="{{$cliente->localidad}}">
                                            </div>
                                            <div class="form-group col-4">
                                                <label for="provincia">{{__('Provincia')}}</label>
                                                <input id="provincia" class="form-control" name="provincia"
                                                       value="{{$cliente->provincia}}">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-4">
                                                <label for="telefono1">{{__('Telefono')}}</label>
                                                <input id="telefono1" class="form-control" name="telefono1"
                                                       value="{{$cliente->telefono1}}" data-mask="000 000 000">
                                            </div>
                                            <div class="form-group col-4">
                                                <label for="telefono2">{{__('Telefono alternativo')}}</label>
                                                <input id="telefono2" class="form-control" name="telefono2"
                                                       value="{{$cliente->telefono2}}" data-mask="000 000 000">
                                            </div>
                                            <div class="form-group col-4">
                                                <label for="movil">{{__('Movil')}}</label>
                                                <input id="movil" class="form-control" name="movil"
                                                       value="{{$cliente->movil}}" data-mask="000 000 000">
                                            </div>
                                            <div class="form-group col-6">
                                                <label for="email">{{__('Correo electrónico')}}</label>
                                                <input id="email" class="form-control" name="email"
                                                       value="{{$cliente->email}}">
                                            </div>
                                            <div class="form-group col-6">
                                                <label for="iban">{{__('IBAN')}}</label>
                                                <input id="iban" class="form-control" name="iban"
                                                       value="{{$cliente->iban}}" >
                                            </div>
                                        </div>
                                        <div class="row">

                                            <div class="form-group col-12">
                                                <label for="nota">{{__('nota')}}</label>
                                                <textarea id="nota" class="form-control"
                                                          name="nota">{{$cliente->nota}}</textarea>
                                            </div>

                                        </div>
                                        @endif

                                        <button type="submit" name="editclient"
                                                class="btn btn-default">{{__('Editar Cliente')}}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-primary ">
                        <h5 class="card-title float-left">{{$cliente->FullName}}</h5>
                        <h5 class="card-title float-right">Nif: {{$cliente->nif}}</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <address class="card-text">Direccion: {{$cliente->direccion}}
                                                           ,{{$cliente->codigopostal}} {{$cliente->localidad}}
                                                           ({{$cliente->provincia}})

                                </address>
                            </div>
                            <div class="col-3">
                                <p class="card-text">Fecha de
                                                     nacimiento: {{$cliente->fechanacimiento->format('d/m/Y')}}</p>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-3" >
                                <p class="card-text">Teléfono principal: <span data-mask="000-000-000">{{$cliente->telefono1}}</span> </p>
                            </div>
                            <div class="col-3">
                                <p class="card-text">Teléfono alternativo: <span data-mask="000-000-000">{{$cliente->telefono2}}</span></p></div>
                            <div class="col-3">
                                <p class="card-text">Móvil: <span data-mask="000-000-000">{{$cliente->movil}}</span></p>
                            </div>
                            <div class="col-3">
                                <p class="card-text">E-Mail: {{$cliente->email}}</p>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-12">
                                <p class="card-text">Cuenta Bancaria: {{$cliente->iban}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <p class="card-text">Nota: {{$cliente->nota}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <table class="table table-bordered table-responsive table-striped">
                            <thead>
                            <tr>
                                <th class="col-2">Fecha expediente</th>
                                <th class="col-2">Fecha Siniestro</th>
                                <th class="col-4">Descripcion</th>
                                <th class="col-2">Fase</th>
                                <th class="col-2">Fecha archivo</th>
                                <th class="col-1">Puntos</th>
                            </tr>

                            </thead>
                            <tbody>
                            <tr>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        <table class="table table-bordered table-responsive table-striped">
                            <thead>
                            <tr>
                                <th class="col-2">Fecha expediente</th>
                                <th class="col-2">Fecha Siniestro</th>
                                <th class="col-4">Descripcion</th>
                                <th class="col-2">Fase</th>
                                <th class="col-2">Fecha archivo</th>
                                <th class="col-1">Puntos</th>
                            </tr>

                            </thead>
                            <tbody>
                            <tr>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>


    </div>
@endsection