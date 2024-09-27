<div>
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">
            <div class="content d-flex justify-content-center align-items-center">

                <!-- Password recovery form -->
                <form wire:submit.prevent="changePassword" class="login-form">
                    <div class="card mb-0">
                        <div class="card-body">
                            <div class="text-center mb-3">
                                <i
                                    class="icon-lock2 icon-1x text-warning border-warning border-3 rounded-round p-3 mb-3 mt-1"></i>
                                <h5 class="mb-0">Ubah Password</h5>
                                <span class="d-block text-muted"></span>
                            </div>

                            <!-- Input untuk password baru -->
                            <div class="form-group form-group-feedback form-group-feedback-right">
                                <input type="password" wire:model="new_password" class="form-control"
                                    placeholder="Password Baru">
                                <div class="form-control-feedback">
                                    <i class="icon-key"></i>
                                </div>
                                @error('new_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Input untuk konfirmasi password -->
                            <div class="form-group form-group-feedback form-group-feedback-right">
                                <input type="password" wire:model="new_password_confirmation" class="form-control"
                                    placeholder="Konfirmasi Password Baru">
                                <div class="form-control-feedback">
                                    <i class="icon-key"></i>
                                </div>
                                @error('new_password_confirmation')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Tombol Ubah Password -->
                            <button type="submit" class="btn bg-blue btn-block">
                                <i class="icon-spinner11 mr-2"></i> Ubah password
                            </button>
                        </div>
                    </div>
                </form>
                <!-- /password recovery form -->

            </div>
        </div>
        <!-- /main content -->

    </div>
</div>
