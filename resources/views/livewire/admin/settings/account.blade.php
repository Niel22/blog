<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row fv-plugins-icon-container">
        <div class="col-md-12">
            @include('livewire.admin.settings.navbar')

            <div class="card mb-6">
                <!-- Account -->
                <div class="card-body">
                    <div class="d-flex align-items-start align-items-sm-center gap-6">
                        <img src="{{ isset(Auth::user()->userDetails->image) ? asset('storage/'. Auth::user()->userDetails->image) : asset('assets/img/avatars/1.png') }}" alt="user-avatar"
                            class="d-block w-px-100 h-px-100 rounded" id="uploadedAvatar">
                        <div class="button-wrapper">
                            <label for="upload" class="btn btn-primary me-3 mb-4 waves-effect waves-light"
                                tabindex="0">
                                <span class="d-none d-sm-block">Upload new photo</span>
                                <i class="ti ti-upload d-block d-sm-none"></i>
                                <input wire:model.live="image" type="file" id="upload" class="account-file-input" hidden=""
                                    accept="image/png, image/jpeg">
                            </label>
                            <button type="button"
                                class="btn btn-label-secondary account-image-reset mb-4 waves-effect">
                                <i class="ti ti-refresh-dot d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Reset</span>
                            </button>
                            <br>
                            <div wire:loading wire:target="image">
                                <span class="text-info d-block">Uploading...</span>
                            </div>
                            <div>Allowed JPG, GIF or PNG. Max size of 800K</div>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-4">
                    <form wire:submit="updateDetails"
                        class="fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate">
                        <div class="row">
                            <div class="mb-4 col-md-12 fv-plugins-icon-container">
                                <label for="firstName" class="form-label">Name</label>
                                <input disabled class="form-control" type="text"
                                    value="{{ Auth::user()->name }}">
                            </div>
                            
                            <div class="mb-4 col-md-6">
                                <label for="email" class="form-label">E-mail</label>
                                <input disabled class="form-control" type="text"
                                    value="{{ Auth::user()->email }}">
                            </div>
                            
                            <div class="mb-4 col-md-6">
                                <label class="form-label" for="phoneNumber">Phone Number</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text">NGN (+234)</span>
                                    <input {{ isset(Auth::user()->userDetails->phone_no) ? 'disabled' : '' }} wire:model="phone_no" type="text" class="form-control"
                                        placeholder="202 555 0111" autofocus="">
                                    </div>
                                    @error('phone_no')
                                        <span class="text-sm text-danger">{{ $message }}</span>
                                    @enderror
                            </div>
                            <div class="mb-4 col-md-6">
                                <label class="form-label" for="country">Gender</label>
                                <div class="position-relative">
                                    <select {{ isset(Auth::user()->userDetails->gender) ? 'disabled' : '' }} wire:model="gender" class="form-select">
                                        <option value="">select your gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                                @error('country')
                                    <span class="text-sm text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4 col-md-6">
                                <label for="address" class="form-label">Address</label>
                                <input wire:model="address" type="text" class="form-control"
                                    placeholder="Address">
                                    @error('address')
                                        <span class="text-sm text-danger">{{ $message }}</span>
                                    @enderror
                            </div>
                            <div class="mb-4 col-md-6">
                                <label for="state" class="form-label">State</label>
                                <input wire:model="state" class="form-control" type="text" 
                                    placeholder="e.g abia">
                                    @error('state')
                                        <span class="text-sm text-danger">{{ $message }}</span>
                                    @enderror
                            </div>
                            
                            <div class="mb-4 col-md-6">
                                <label class="form-label" for="country">Country</label>
                                <div class="position-relative">
                                    <select wire:model="country" class="form-select">
                                        <option value="">select country</option>
                                        <option value="Nigeria">Nigeria</option>
                                    </select>
                                </div>
                                @error('country')
                                    <span class="text-sm text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary me-3 waves-effect waves-light">Save
                                changes</button>
                        </div>
                        <input type="hidden">
                    </form>
                </div>
                <!-- /Account -->
            </div>


            <div class="card">
                <h5 class="card-header">Delete Account</h5>
                <div class="card-body">
                    <div class="mb-6 col-12 mb-0">
                        <div class="alert alert-warning">
                            <h5 class="alert-heading mb-1">Are you sure you want to delete your account?</h5>
                            <p class="mb-0">Once you delete your account, there is no going back. Please be certain.
                            </p>
                        </div>
                    </div>
                    <form 
                        class="fv-plugins-bootstrap5 fv-plugins-framework" wire:submit="deleteAccount('{{ Auth::id() }}')">
                        <div class="form-check my-8">
                            <input class="form-check-input" type="checkbox" wire:click="toggleDeleteAccount">
                            <label class="form-check-label" for="accountActivation">I confirm my account
                                deactivation</label>
                            <div
                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-danger deactivate-account waves-effect waves-light"
                            {{ $delete ? '' : 'disabled' }}>Deactivate Account</button>
                        <input type="hidden">
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>
