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
                                    <img src="{{ asset('assets/img/icons/brands/facebook.png') }}" alt="facebook"
                                        class="me-4" height="32">
                                </div>
                                <div class="flex-grow-1 row">
                                    <div class="col-7">
                                        <h6 class="mb-0">Facebook</h6>
                                        @if ($editFacebook)
                                            <div class="d-flex">
                                                <input type="text" wire:model="facebookLink" class="form-control">
                                                <button wire:loading.remove wire:target="updateFacebookLink" wire:click="updateFacebookLink" class="btn btn-success btn-sm"><i class="ti ti-checkbox"></i></button>
                                                <x-spinner wire:loading wire:target="updateFacebookLink"></x-spinner>
                                            </div>
                                            @error('facebookLink')
                                              <span class="text-sm text-danger">{{ $message }}</span>
                                            @enderror
                                        @else
                                        @if(Auth::user()->userDetails->facebook != null)
                                        <a href="{{Auth::user()->userDetails->facebook}}" target="_blank"
                                            class="small">@facebook</a>
                                        @else
                                            <small>Not Connected</small>
                                            @endif
                                        @endif
                                    </div>

                                    <div class="col-5 text-end mt-sm-0 mt-2">
                                        @if(Auth::user()->userDetails->facebook === null)
                                        <button wire:click="editFacebookLink"
                                            class="btn btn-icon btn-label-secondary waves-effect">
                                            @if ($editFacebook)
                                                <i class="ti ti-x"></i>
                                            @else
                                                <i class="ti ti-link ti-md"></i>
                                            @endif
                                        </button>
                                        @else
                                        <button wire:click="removeFacebookLink" class="btn btn-icon btn-label-danger waves-effect"><i
                                            class="ti ti-trash ti-md"></i></button>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex mb-4 align-items-center">
                                <div class="flex-shrink-0">
                                    <img src="{{ asset('assets/img/icons/brands/twitter.png') }}" alt="twitter"
                                        class="me-4" height="32">
                                </div>
                                <div class="flex-grow-1 row">
                                    <div class="col-7">
                                        <h6 class="mb-0">Twitter</h6>
                                        @if ($editTwitter)
                                            <div class="d-flex">
                                                <input type="text" wire:model="twitterLink" class="form-control">
                                                <button wire:loading.remove wire:target="updateTwitterLink" wire:click="updateTwitterLink" class="btn btn-success btn-sm"><i class="ti ti-checkbox"></i></button>
                                                <x-spinner wire:loading wire:target="updateTwitterLink"></x-spinner>
                                            </div>
                                            @error('twitterLink')
                                              <span class="text-sm text-danger">{{ $message }}</span>
                                            @enderror
                                        @else
                                        @if(Auth::user()->userDetails->twitter != null)
                                        <a href="{{Auth::user()->userDetails->twitter}}" target="_blank"
                                            class="small">@twitter</a>
                                        @else
                                            <small>Not Connected</small>
                                            @endif
                                        @endif
                                    </div>
                                    <div class="col-5 text-end mt-sm-0 mt-2">
                                        @if(Auth::user()->userDetails->twitter === null)
                                        <button wire:click="editTwitterLink"
                                            class="btn btn-icon btn-label-secondary waves-effect">
                                            @if ($editTwitter)
                                                <i class="ti ti-x"></i>
                                            @else
                                                <i class="ti ti-link ti-md"></i>
                                            @endif
                                        </button>
                                        @else
                                        <button wire:click="removeTwitterLink" class="btn btn-icon btn-label-danger waves-effect"><i
                                            class="ti ti-trash ti-md"></i></button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex mb-4 align-items-center">
                                <div class="flex-shrink-0">
                                    <img src="{{ asset('assets/img/icons/brands/instagram.png') }}" alt="instagram"
                                        class="me-4" height="32">
                                </div>
                                <div class="flex-grow-1 row">
                                    <div class="col-7">
                                        <h6 class="mb-0">instagram</h6>
                                        @if ($editInstagram)
                                            <div class="d-flex">
                                                <input type="text" wire:model="instagramLink" class="form-control">
                                                <button wire:loading.remove wire:target="updateInstagramLink" wire:click="updateInstagramLink" class="btn btn-success btn-sm"><i class="ti ti-checkbox"></i></button>
                                                <x-spinner wire:loading wire:target="updateInstagramLink"></x-spinner>
                                            </div>
                                            @error('instagramLink')
                                              <span class="text-sm text-danger">{{ $message }}</span>
                                            @enderror
                                        @else
                                        @if(Auth::user()->userDetails->instagram != null)
                                        <a href="{{Auth::user()->userDetails->instagram}}" target="_blank"
                                            class="small">@instagram</a>
                                        @else
                                            <small>Not Connected</small>
                                            @endif
                                        @endif
                                    </div>
                                    <div class="col-5 text-end mt-sm-0 mt-2">
                                        @if(Auth::user()->userDetails->instagram === null)
                                        <button wire:click="editInstagramLink"
                                            class="btn btn-icon btn-label-secondary waves-effect">
                                            @if ($editInstagram)
                                                <i class="ti ti-x"></i>
                                            @else
                                                <i class="ti ti-link ti-md"></i>
                                            @endif
                                        </button>
                                        @else
                                        <button wire:click="removeInstagramLink" class="btn btn-icon btn-label-danger waves-effect"><i
                                            class="ti ti-trash ti-md"></i></button>
                                        @endif
                                    </div>
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
