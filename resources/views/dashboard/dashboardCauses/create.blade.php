@extends('dashboard.layouts.main')
@section('dashboardcontent')
<!-- ================================ links Causes Content Start ========================================================================= -->
<div class="main-content-container container-fluid px-4" id="editor">
  <!-- Page Header -->
  <div class="page-header row no-gutters py-4">
    <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
      <span class="text-uppercase page-sub title">Causes</span>
      <h3 class="page-title"><i class=" icon-material-outline-assignment"></i> Add Cause</h3>
    </div>
  </div>
  <!-- ================================ links Causes Content Start ========================================================================= -->
  <!-- End Page Header -->
  <div class="row">
    <div class="col-lg-9 col-md-12">
      <!-- Add New Post Form -->
      <div class="card card-small mb-3">
        <div id="form-container" class="card-body">
            @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{Session::get('success')}}
                </div>
            @endif
          <!-- ================================ dashboard Causes store ========================================================================= -->
          <form action="{{route('cause.store')}}" method="POST"  role="form" enctype="multipart/form-data" class="add-new-post">
            @csrf
            <!-- ================================ dashboard Causes store ========================================================================= -->
              <label class="required-label" for="title">Title: <span class="required-star">*</span></label>
            <input class="form-control form-control-lg mb-3" type="text" required = "required" placeholder="Your Title" id="slug" onkeyup="ChangeToSlug();" name="title">
              <label class="required-label" for="title">Slug: <span class="required-star">*</span></label>
              <input class="form-control form-control-lg mb-3" type="text" placeholder="Your Slug" readonly id="convert_slug" name="slug">
              <div class="form-control form-control-lg mb-3">
                  <label class="required-label" for="title">Status: <span class="required-star">*</span></label>
                  <select style="font-size: 15px;" class="custom-select" name="status">

                      <option value="active" class="rounded" style="color:#09E326; " >Active</option>
                      <option value="blocked" class="rounded" style="color:red">Blocked</option>
                      <option value="finished" class="rounded" style="color: #869187">Finished</option>
                  </select>
              </div>
              <label class="required-label" for="title">Short_Description: <span class="required-star">*</span></label>
            <input class="form-control form-control-lg mb-3" type="text" placeholder="Your Donors" name="short_description">
            <!-- ================================ dashboard Causes store ========================================================================= -->
            <div class="form-control form-control-lg mb-3">
                <label class="required-label" for="title">Category Causes: <span class="required-star">*</span></label>
              <select style="font-size: 15px;" class="custom-select" name="category_id">
                <option value="1" selected="">Category Causes</option>
                @foreach($Categores as $Category)
                <option value="{{ $Category->id }}">{{ $Category->title }}</option>
                @endforeach
              </select>
            </div>
            <!-- ================================ dashboard Causes store ========================================================================= -->
              <label class="required-label" for="title">More description: <span class="required-star">*</span></label>
              <textarea id="task_area" class="form-control form-control-lg mb-3" type="text" name="description" ></textarea>
            <div class="row mt-3">
              <div class="col-2">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
{{--                    có 2 phần trống--}}
                  </div>
                </div>
                <!-- ================================ dashboard Causes store ========================================================================= -->
                <div class="col-10">
                  <div class="tab-content" id="v-pills-tabContent">
{{--                có 10 phần trống có thể điền--}}
                  <!-- ================================ dashboard Causes store ========================================================================= -->
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- / Add New Post Form -->
      </div>
      <!-- ================================ dashboard Causes store ========================================================================= -->
      <div class="col-lg-3 col-md-12">
        <!-- Post Overview -->
        <div class='card card-small mb-3'>
          <div class="card-header border-bottom">
            <h6 class="m-0">Actions</h6>
          </div>
          <div class='card-body p-0'>
            <ul class="list-group list-group-flush">
              <li class="list-group-item p-3">
                <span class="d-flex mb-2">
                  <i class="icon-line-awesome-flag mr-1"></i>
                  <strong class="mr-1">Status:</strong> Draft

                </span>
                <span class="d-flex mb-2">
                  <i class="icon-material-outline-visibility mr-1"></i>
                  <strong class="mr-1">Visibility:</strong>
                  <strong class="text-success">Public</strong>

                </span>
                <span class="d-flex mb-2">
                  <i class="icon-line-awesome-calendar mr-1"></i>
                  <strong class="mr-1">Schedule:</strong> Now

                </span>
                <span class="d-flex">
                  <i class="icon-line-awesome-bullseye mr-1"></i>
                  <strong class="mr-1">Readability:</strong>
                  <strong class="text-warning">Ok</strong>
                </span>
              </li>
              <li class="list-group-item d-flex px-3">
                  <a id="image_upload_form" class="btn btn-sm btn-outline-accent" href="{{route('cause.index')}}"><i class="icon-material-outline-description"></i> Causes</a>
                  <button class="btn btn-sm btn-accent ml-auto submit" type="submit">
                    <i  class="icon-feather-file-plus"></i> Publish</button>
                  </li>
                </ul>
          </div>
        </div>


            <!-- / Post Overview -->
            <!-- ================================ dashboard Causes store ========================================================================= -->
            <div class='card card-small mb-3'>
              <div class="card-header border-bottom">
                <h6 class="m-0"><i class="icon-line-awesome-image"></i> Causes Image</h6>
              </div>
              <div class='card-body p-0'>
                <ul class="list-group list-group-flush">
                  <div class="edit-post-details__avatar m-auto">
                    <img class="image_preview" src="{{ asset('dashboardassets/images/content-management/cover.png') }}"  alt="User Avatar">
                    <label class="edit-post-details__avatar__change">
                      <i class="material-icons   icon-material-outline-add-a-photo mr-1"></i>
                      <input type="file" name="image" id="image" hidden="">
                    </label>
                  </div>
                </ul>
              </div>
            </div>

            <!-- ================================ dashboard Causes store ========================================================================= -->
          </div>
      </form>
          <!-- / Post Overview -->
        </div>
      </div>
    </div>

<!-- ================================ links Causes Content Start ========================================================================= -->
@endsection

@section('script')
    <script src="https://cdn.ckeditor.com/ckeditor5/37.1.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#task_area' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection
@include('dashboard.dashboardCauses.image_script')
