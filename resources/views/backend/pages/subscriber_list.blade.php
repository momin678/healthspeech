@extends('admin.layouts.master')
@section('content')

<!-- main content start -->
<div class="main-content">
    <div class="container-fluid content-top-gap">
        <section class="people">
            <div class="card card_border mb-5">
                <div class="cards__heading">
                    <h3>All Subscriber</h3>
                </div>
                <div class="card-body">
                    <div class="row px-2">
                        <table class="table">
                          <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Email</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              @foreach($all_subc as $key => $subcriber)
                                <td>{{$subcriber->id}}</td>
                                <td>{{$subcriber->subc_email}}</td>
                            @endforeach
                            </tr>
                          </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- //people cards style 2 -->
        </section>
    </div>
</div>

@endsection