@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="page-content">

    <div class="row">
      <div class="col-12 grid-margin">
        <div class="card">
                    
        </div>
      </div>
    </div>
    <div class="row profile-body">
      <!-- left wrapper start -->
      <div class="d-none d-md-block col-md-4 col-xl-3 left-wrapper">
        <div class="card rounded">
          <div class="card-body">
            <div class="d-flex align-items-center justify-content-between mb-2">
                <div>
                    <img class="wd-100 rounded-circle" src="{{ (!empty($profileData->photo)) ? url('images/admin_images/'.$profileData->photo) : url('images/no_image.jpg') }}" alt="profile"/>
                    <span class="h4 ms-3">{{ $profileData->username }}</span>
                </div>
            </div>
            
            <div class="mt-3">
              <label class="tx-11 fw-bolder mb-0 text-uppercase">Name:</label>
              <p class="text-muted">{{ $profileData->name }}</p>
            </div>
            <div class="mt-3">
              <label class="tx-11 fw-bolder mb-0 text-uppercase">Address:</label>
              <p class="text-muted">{{ $profileData->address }}</p>
            </div>
            <div class="mt-3">
              <label class="tx-11 fw-bolder mb-0 text-uppercase">Email:</label>
              <p class="text-muted">{{ $profileData->email }}</p>
            </div>
            <div class="mt-3">
              <label class="tx-11 fw-bolder mb-0 text-uppercase">Phone/Mobile:</label>
              <p class="text-muted">{{ $profileData->phone }}</p>
            </div>
            <div class="mt-3 d-flex social-links">
              <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                <i data-feather="github"></i>
              </a>
              <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                <i data-feather="twitter"></i>
              </a>
              <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                <i data-feather="instagram"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
      <!-- left wrapper end -->
      <!-- middle wrapper start -->
      <div class="col-md-8 col-xl-6 middle-wrapper">
        <div class="row">
          <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
  
                    <h6 class="card-title">Update Admin Profile</h6>

                    <form class="forms-sample" method="POST" action="{{ route('admin.profile.store') }}" enctype="multipart/form-data">
                      @csrf
                        
                        <div class="mb-3">
                          <label class="form-label">Name</label>
                          <input type="text" class="form-control" id="name" autocomplete="off" placeholder="Username" value="{{ $profileData->name }}" name="name">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" autocomplete="off" placeholder="Username" value="{{ $profileData->username }}" name="username">
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" placeholder="Email" value="{{ $profileData->email }}" name="email">
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Your Address</label>
                          <input type="text" class="form-control" id="address" placeholder="Address" value="{{ $profileData->address }}" name="address">
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Phone/Mobile Number</label>
                          <input type="number" class="form-control" id="phone" placeholder="Phone/Mobile" value="{{ $profileData->phone }}" name="phone">
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Profile Image</label>
                          <input type="file" class="form-control" id="image" name="photo">                                        
                        </div>

                        <div class="mb-3">
                          <img id="showImage" class="wd-100 rounded-circle" src="{{ (!empty($profileData->photo)) ? url('images/admin_images/'.$profileData->photo) : url('images/no_image.jpg') }}" alt="profile"/>
                        </div>

                        <button type="submit" class="btn btn-primary mb-2">Save Changes</button>
                        
                                                  
                    </form>
  
                </div>
              </div>
          </div>
        </div>
      </div>
      <!-- middle wrapper end -->
      <!-- right wrapper start -->
      
      <!-- right wrapper end -->
    </div>

        </div>


  <script type="text/javascript">
    $(document).ready(function(){
      $('#image').change(function(e){
        var reader = new FileReader();
        reader.onload = function(e){
          $('#showImage').attr('src', e.target.result);
        }
        reader.readAsDataURL(e.target.files['0']);
      });
    });
  </script>


@endsection