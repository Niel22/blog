<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-xl mb-6">
          <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
              <h5 class="mb-0">Create New Category</h5>
            </div>
            <div class="card-body">
              <form class="row" wire:submit="update">
                <div class="mb-6 col-md-6">
                  <label class="form-label" for="basic-default-fullname">Name</label>
                  <input wire:model="name" type="text" class="form-control" placeholder="e.g technology">
                </div>
                <div class="mb-6 col-md-6">
                  <label class="form-label" for="basic-default-company">Color</label>
                  <input wire:model="color" type="color" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary waves-effect waves-light">
                    <span wire:loading.remove wire:target="update">Create</span>
                    <x-spinner target="update" />
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
</div>