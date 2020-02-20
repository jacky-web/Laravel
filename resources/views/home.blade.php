@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    
                     <table class="table">

                        <thead>

                          <tr>
                            <th>id</th>
                            <th>NRIC_NO</th>
                            <th>CONTACT_NO</th>
                            <th>HAS_MAINLAND_CHINA</th>
                            <th>HAS_CONFORMED_PATIENT</th>
                            <th>ILLNESS</th>
                            <th>CURRENT_TEMP</th>
                          </tr>

                        </thead>

                        <tbody>

                             @foreach($users as $user)

                          <tr>

                            <td class="cen">{{ $user->id }}</td>
                            <td class="cen">{{ $user->nric_no}}</td>
                            <td class="cen">{{ $user->contact_no }}</td>
                            <td class="cen">{{ $user->has_mainland_china }}</td>
                            <td class="cen">{{ $user->has_conformed_patient }}</td>
                            <td class="cen">{{ $user->illness }}</td>
                            <td class="cen">{{ $user->current_temp }}</td>

                           </tr>

                            @endforeach
                    </tbody>
                </table>

                <span class="pagination" style="float: right;">{{ $users->links()}}</span>


                </div>
            </div>
        </div>
    </div>
</div>


@endsection
