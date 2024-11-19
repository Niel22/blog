<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-md-12">
            @include('livewire.admin.settings.navbar')
            <!-- Change Password -->
            <div class="card mb-6">
                <h5 class="card-header">Change Password</h5>
                <div class="card-body pt-1">
                    <form wire:submit="update"
                        class="fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate">
                        <div class="row">
                            <div class="mb-6 col-md-6 form-password-toggle fv-plugins-icon-container">
                                <label class="form-label" for="currentPassword">Current Password</label>
                                <div class="input-group input-group-merge has-validation">
                                    <input class="form-control" wire:model="current_password" type="password" name="currentPassword"
                                        id="currentPassword" placeholder="············">
                                    <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                                </div>
                                @error('current_password')
                                    <span class="text-sm text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-6 col-md-6 form-password-toggle fv-plugins-icon-container">
                                <label class="form-label" for="newPassword">New Password</label>
                                <div class="input-group input-group-merge has-validation">
                                    <input class="form-control" wire:model="password" type="password" placeholder="············">
                                    <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                                </div>
                                @error('password')
                                    <span class="text-sm text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-6 col-md-6 form-password-toggle fv-plugins-icon-container">
                                <label class="form-label" for="confirmPassword">Confirm New Password</label>
                                <div class="input-group input-group-merge has-validation">
                                    <input class="form-control" wire:model="password_confirmation" type="password" placeholder="············">
                                    <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                                </div>
                                <div
                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                </div>
                            </div>
                        </div>
                        <h6 class="text-body">Password Requirements:</h6>
                        <ul class="ps-4 mb-0">
                            <li class="mb-4">Minimum 8 characters long - the more, the better</li>
                            <li class="mb-4">At least one lowercase character</li>
                            <li>At least one number, symbol, or whitespace character</li>
                        </ul>
                        <div class="mt-6">
                            <button type="submit" class="btn btn-primary me-3 waves-effect waves-light">Save
                                changes</button>
                            <button type="reset" class="btn btn-label-secondary waves-effect">Reset</button>
                        </div>
                        <input type="hidden">
                    </form>
                </div>
            </div>
            <!--/ Change Password -->

            <!-- Recent Devices -->
            <div class="card mb-6">
                <h5 class="card-header">Recent Devices</h5>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-truncate">Browser</th>
                                <th class="text-truncate">Device</th>
                                <th class="text-truncate">Last Login</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (Auth::user()->user_login_details as $activity)
                                <tr>
                                    @php
                                        $browserParts = explode(' ', strtolower($activity->browser), 3); // Limit to 3 parts
                                        // dd($browserParts);
                                    @endphp
                                    <td class="text-truncate text-heading fw-medium">
                                      @if($browserParts[2] == 'windows')
                                      <i class="ti ti-brand-windows ti-md align-top text-danger me-2"></i>
                                      @elseif($browserParts[2] == 'ios')
                                      <i class="ti ti-device-mobile  ti-md align-top text-danger text-success me-2"></i>
                                      @elseif($browserParts[2] == 'androidos')
                                      <i class="ti ti-brand-android ti-md align-top text-success me-2"></i>
                                      @endif
                                      {{ $activity->browser }}
                                    </td>
                                    <td class="text-truncate">{{ strtolower($activity->device) == 'webkit' ? ucwords($browserParts[2]) : $activity->device }}</td>
                                    <td class="text-truncate">
                                        {{ \Carbon\Carbon::parse($activity->last_login)->format('D M d, Y h:i A') }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!--/ Recent Devices -->

        </div>
    </div>


</div>
