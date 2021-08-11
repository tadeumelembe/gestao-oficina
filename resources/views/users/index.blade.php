@extends('template.app')


@section('content')

<div class="page-content">
  <div class="container-fluid">

    <!-- start page title -->
    <div class="row">
      <div class="col-6">
        <div class="page-title-box d-flex align-items-center row">
          <div class="col-12">
            <h4 class="mb-0">Utilizadores</h4>
          </div>

          <div class="page-title-right col-12 pt-2">
            <ol class="breadcrumb m-0">
              <li class="breadcrumb-item"><a href="{{url('/home')}}">Início</a></li>
              <li class="breadcrumb-item active">utilizadores</li>
            </ol>
          </div>

        </div>
      </div>
      <div class="col-6">
        <div class="float-right pr-2 mb-2">
          <a href="javascript:void(0);" class="btn btn-success mb-2" data-toggle="modal" data-target=".create-modal"><i class="mdi mdi-plus mr-2"></i>Adicionar Utilizador</a>
        </div>
      </div>
    </div>
    <!-- end page title -->



    @if ($message = Session::get('success'))
    <div class="alert alert-success">
      <p>{{ $message }}</p>
    </div>
    @endif

    @include('users.create')

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title"></h4>
            <p class="card-title-desc">
            </p>

            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Roles</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              
                @foreach ($data as $key => $user)
                <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                  @if(!empty($user->getRoleNames()))
                  @foreach($user->getRoleNames() as $v)
                  <label class="badge badge-success">{{ $v }}</label>
                  @endforeach
                  @endif
                </td>
                <td>
                  <div class='dropdown mt-sm-0'>
                    <a href='' class='btn btn-secondary dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                      Acção<i class='mdi mdi-chevron-down'></i>
                    </a>

                    <div class='dropdown-menu' style=''>
                      <a class='dropdown-item' href="{{ route('users.show',$user->id) }}">Ver</a>
                      <a class='dropdown-item' href="{{ route('users.edit',$user->id) }}">Editar</a>
                      {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                      {!! Form::submit('Delete', ['class' => 'dropdown-item']) !!}
                      {!! Form::close() !!}
                    </div>
                  </div>
                </td>
                </tr>
                @endforeach

              </tbody>
            </table>
          </div>
        </div>
      </div> <!-- end col -->
    </div> <!-- end row -->
  </div>
</div>

{!! $data->render() !!}

@include('users.js')
@endsection