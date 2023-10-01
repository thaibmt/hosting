<div>
    <div class="row">
        <div class="col-lg-4">
            <div class="card card-light">
                <div class="card-header">
                    <h3 class="card-title">Thêm hosting</h3>
                </div>
                <div class="card-body">
                    <form id="form_create_check_domain" wire:submit.prevent="check">
                        <x-adminlte-input wire:model="domain_check" name="domain_check" label="Tên miền cần kiểm tra"
                            placeholder="Tên miền cần kiểm tra" label-class="text-lightblue required">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fas fa-user text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>

                    </form>
                </div>
                <div class="card-footer">
                    <x-adminlte-button form="form_create_check_domain" class="btn-flat float-right" type="submit"
                        label="Tạo" theme="success" icon="fas fa-lg fa-save" />
                </div>
            </div>
        </div>
        <div class="col-lg-8">

        </div>
    </div>
</div>
