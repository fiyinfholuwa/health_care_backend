

@extends('admin.app')
@section('title','Manage Testimonials')
@section('page', 'Manage Testimonials')

@section('content')

  <main id="main" class="main">

  <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
{{--              <h5 class="card-title"></h5>--}}


              <!-- Table with stripped rows -->
              <table id="my-table" class="table datatable">
                <thead>
                  <tr>
                    <th>
                      Full Name
                    </th>
                    <th>Image</th>
                    <th>Link</th>
                    <th>Content</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($testimonials as $testimonial)
                  <tr>
                    <td>{{$testimonial->full_name}}</td>
                    <td><img height="40px" width="40px" src="{{asset($testimonial->image)}}"></td>
                    <td>
                        @if($testimonial->link !== NULL)
                            <a class="badge bg-primary" href="{{$testimonial->link}}">view link</a>
                        @else
                            <span class="badge bg-danger"> not stated</span>
                        @endif

                    </td>
                    <td>{{$testimonial->body}}</td>

                   <td>
                    <a href="{{route('admin.testimonial.edit', $testimonial->id)}}">
                    <i  class="fa fa-edit text-primary"></i>
                    </a>
                    <a type="button" class="" data-bs-toggle="modal" data-bs-target="#testimonial_delete_{{$testimonial->id}}">
                    <i  class="fa fa-trash text-danger"></i>
                    </a>
                    </td>
                    @include('admin.modals.testimonial')
                  </tr>
                    @endforeach
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>



  </main><!-- End #main -->
@endsection
