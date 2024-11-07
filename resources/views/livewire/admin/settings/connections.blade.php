<div class="container-xxl flex-grow-1 container-p-y">  
    <div class="row">
      <div class="col-md-12">
        @include('livewire.admin.settings.navbar')
        <div class="card">
          <div class="row">
            <div class="col-md-12 col-12">
              <div class="card-header">
                <h5 class="mb-0">Social Accounts</h5>
              </div>
              <div class="card-body">
                <!-- Social Accounts -->
                <div class="d-flex mb-4 align-items-center">
                  <div class="flex-shrink-0">
                    <img src="{{ asset('assets/img/icons/brands/facebook.png') }}" alt="facebook" class="me-4" height="32">
                  </div>
                  <div class="flex-grow-1 row">
                    <div class="col-7">
                      <h6 class="mb-0">Facebook</h6>
                      <small>Not Connected</small>
                    </div>
                    <div class="col-5 text-end mt-sm-0 mt-2">
                      <button class="btn btn-icon btn-label-secondary waves-effect"><i class="ti ti-link ti-md"></i></button> </div>
                  </div>
                </div>
                <div class="d-flex mb-4 align-items-center">
                  <div class="flex-shrink-0">
                    <img src="{{ asset('assets/img/icons/brands/twitter.png') }}" alt="twitter" class="me-4" height="32">
                  </div>
                  <div class="flex-grow-1 row">
                    <div class="col-7">
                      <h6 class="mb-0">Twitter</h6>
                      <a href="https://twitter.com/pixinvents" target="_blank" class="small">@Pixinvent</a>
                    </div>
                    <div class="col-5 text-end mt-sm-0 mt-2">
                      <button class="btn btn-icon btn-label-danger waves-effect"><i class="ti ti-trash ti-md"></i></button> </div>
                  </div>
                </div>
                <div class="d-flex mb-4 align-items-center">
                  <div class="flex-shrink-0">
                    <img src="{{ asset('assets/img/icons/brands/instagram.png') }}" alt="instagram" class="me-4" height="32">
                  </div>
                  <div class="flex-grow-1 row">
                    <div class="col-7">
                      <h6 class="mb-0">instagram</h6>
                      <a href="https://www.instagram.com/pixinvents/" target="_blank" class="small">@Pixinvent</a>
                    </div>
                    <div class="col-5 text-end mt-sm-0 mt-2">
                      <button class="btn btn-icon btn-label-danger waves-effect"><i class="ti ti-trash ti-md"></i></button> </div>
                  </div>
                </div>
                
                <!-- /Social Accounts -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    
              </div>