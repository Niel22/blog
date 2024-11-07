<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner py-6">

            <!-- Register Card -->
            <div class="card">
                <div class="card-body">
                    <!-- Logo -->
                    <div class="app-brand justify-content-center mb-6">
                        <a href="index.html" class="app-brand-link">
                            <span class="app-brand-logo demo">
                                <svg width="32" height="22" viewBox="0 0 32 22" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z"
                                        fill="#7367F0" />
                                    <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd"
                                        d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z"
                                        fill="#161616" />
                                    <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd"
                                        d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z"
                                        fill="#161616" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z"
                                        fill="#7367F0" />
                                </svg>
                            </span>
                            <span class="app-brand-text demo text-heading fw-bold">Blog</span>
                        </a>
                    </div>

                    <form id="formAuthentication" class="mb-6" wire:submit="register">
                        <div class="mb-6">
                            <label for="username" class="form-label">Name</label>
                            <input wire:model="name" type="text" class="form-control"
                                placeholder="Enter your name" autofocus>
                                @error('name')
                                    <span class="text-sm text-danger">{{$message}}</span>
                                @enderror
                        </div>
                        <div class="mb-6">
                            <label for="email" class="form-label">Email</label>
                            <input wire:model="email" type="text" class="form-control" id="email" name="email"
                                placeholder="Enter your email">
                                @error('email')
                                    <span class="text-sm text-danger">{{$message}}</span>
                                @enderror
                        </div>
                        <div class="mb-6 form-password-toggle">
                            <label class="form-label" for="password">Password</label>
                            <div class="input-group input-group-merge">
                                <input wire:model="password" type="password" id="password" class="form-control"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    aria-describedby="password" />
                                <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                            </div>
                            @error('password')
                                <span class="text-sm text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="my-8">
                            <div class="form-check mb-0 ms-2">
                                <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms">
                                <label class="form-check-label" for="terms-conditions">
                                    I agree to
                                    <a href="javascript:void(0);">privacy policy & terms</a>
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary d-grid w-100">
                            <span wire:loading.remove wire:target="register">Sign up</span>
                            <x-spinner target="register" />
                        </button>
                    </form>

                    <p class="text-center">
                        <span>Already have an account?</span>
                        <a href="{{ route('admin.login') }}">
                            <span>Sign in instead</span>
                        </a>
                    </p>

                </div>
            </div>
            <!-- Register Card -->
        </div>
    </div>
</div>
