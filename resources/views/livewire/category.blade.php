<div>
    <div class="row">
        <div class="col-lg-4">
            <div class="card card-light">
                <div class="card-header">
                    <h3 class="card-title">Thêm chuyên mục</h3>
                </div>
                <div class="card-body">
                    <form id="form_create_category" wire:submit.prevent="save">
                        <x-adminlte-input wire:model="name" name="name" label="Chuyên mục" placeholder="Chuyên mục"
                            label-class="text-lightblue required">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fas fa-user text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                        <x-adminlte-input wire:model="slug" name="slug" label="Đường dẫn" placeholder="Đường dẫn"
                            label-class="text-lightblue">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fas fa-user text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                        <x-adminlte-select wire:model="parent_id" name="parent_id" label="Danh mục cha"
                            label-class="text-lightblue">
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-light">
                                    <i class="fas fa-car-side"></i>
                                </div>
                            </x-slot>
                            <option selected>Chọn danh mục cha</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </x-adminlte-select>
                        <x-adminlte-textarea wire:model="description" name="description" label="Mô tả" rows=3
                            label-class="text-lightblue" igroup-size="sm" placeholder="Nhập mô tả...">
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-light">
                                    <i class="fas fa-lg fa-file-alt text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-textarea>
                    </form>
                </div>
                <div class="card-footer">
                    <x-adminlte-button form="form_create_category" class="btn-flat float-right" type="submit"
                        label="Tạo" theme="success" icon="fas fa-lg fa-save" />
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            @php
                $heads = ['STT', 'Chuyên mục', 'Đường dẫn', 'Cha', ['label' => '-', 'no-export' => true, 'width' => 5]];
            @endphp

            {{-- Minimal example / fill data using the component slot --}}
            <x-adminlte-datatable id="table1" :heads="$heads" head-theme="light">
                @foreach ($categories as $key => $category)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->slug }}</td>
                        <td>{{ $category->parent ? $category->parent->name : '-' }}</td>
                        <td class="d-flex">
                            <button onclick="Livewire.dispatch('edit', {id: {{ $category->id }} })"
                                class="btn btn-xs btn-default text-primary mx-1 shadow" title="Sửa">
                                <i class="fa fa-lg fa-fw fa-pen"></i>
                            </button>
                            <button onclick="Livewire.dispatch('delete', {id: {{ $category->id }} })"
                                class="btn btn-xs btn-default text-danger mx-1 shadow" title="Xóa">
                                <i class="fa fa-lg fa-fw fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </x-adminlte-datatable>
        </div>
        <x-adminlte-modal wire:ignore.self id="edit_category" title="Chỉnh sửa danh mục" theme="light"
            icon="fas fa-bolt" size='lg' disable-animations>
            <form wire:submit.prevent="save({{ $categoryEdit ? $categoryEdit->id : '' }})">
                <x-adminlte-input wire:model="_name" name="_name" label="Chuyên mục" placeholder="Chuyên mục"
                    label-class="text-lightblue required">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-user text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-input wire:model="_slug" name="_slug" label="Đường dẫn" placeholder="Đường dẫn"
                    label-class="text-lightblue">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-user text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-select wire:model="_parent_id" name="_parent_id" label="Danh mục cha"
                    label-class="text-lightblue">
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-light">
                            <i class="fas fa-car-side"></i>
                        </div>
                    </x-slot>
                    <option selected>Chọn danh mục cha</option>
                    @foreach ($categories as $category)
                        @if ($category->id != ($categoryEdit ? $categoryEdit->id : 0))
                            <option value="{{ $category->id }}">
                                {{ $category->name }}</option>
                        @endif
                    @endforeach
                </x-adminlte-select>
                <x-adminlte-textarea wire:model="_description" name="_description" label="Mô tả" rows=3
                    label-class="text-lightblue" igroup-size="sm" placeholder="Nhập mô tả...">
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-light">
                            <i class="fas fa-lg fa-file-alt text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-textarea>
                <div class="card-footer">
                    <x-adminlte-button class="btn-flat float-right" type="submit" label="Lưu" theme="success"
                        icon="fas fa-lg fa-save" />
                </div>
            </form>
        </x-adminlte-modal>
    </div>
</div>
