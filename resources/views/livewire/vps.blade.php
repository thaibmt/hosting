<div>
    <div class="row">
        <div class="col-lg-4">
            <div class="card card-light">
                <div class="card-header">
                    <h3 class="card-title">Thêm vps</h3>
                </div>
                <div class="card-body">
                    <form id="form_create_vps" wire:submit.prevent="save">
                        <x-adminlte-input wire:model="name" name="name" label="Tên" placeholder="Tên"
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
                        <x-adminlte-input wire:model="price" name="price" label="Giá" placeholder="Giá"
                            label-class="text-lightblue required">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fas fa-user text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                        <x-adminlte-input wire:model="suffix" name="suffix" label="Suffix" placeholder="Suffix"
                            label-class="text-lightblue">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fas fa-user text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                        <x-adminlte-select wire:model="category_id" name="category_id" label="Danh mục cha"
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
                        <x-adminlte-input-file wire:model="image" name="image" label="Hình ảnh"
                            label-class="text-lightblue" placeholder="Chọn hình ảnh...">
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-lightblue">
                                    <i class="fas fa-upload"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input-file>
                        <x-adminlte-textarea wire:model="description" name="description" label="Mô tả" rows=3
                            label-class="text-lightblue" igroup-size="sm" placeholder="Nhập mô tả...">
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-light">
                                    <i class="fas fa-lg fa-file-alt text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-textarea>
                        <div wire:ignore>
                            <x-adminlte-text-editor wire:ignore name="content" label="Nội dung"
                                label-class="text-success" igroup-size="sm" placeholder="Nhập nội dung..." />
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <x-adminlte-button form="form_create_vps" class="btn-flat float-right" type="submit" label="Tạo"
                        theme="success" icon="fas fa-lg fa-save" />
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            @php
                $heads = ['STT', 'Chuyên mục', 'Đường dẫn', 'Cha', ['label' => '-', 'no-export' => true, 'width' => 5]];
            @endphp

            {{-- Minimal example / fill data using the component slot --}}
            <x-adminlte-datatable id="table1" :heads="$heads" head-theme="light">
                @foreach ($vpss as $key => $vps)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td><img width="50" height="50"
                                src="{{ asset('storage/' . $vps->image) }}">{{ $vps->name }}
                        </td>
                        <td>{{ $vps->slug }}</td>
                        <td>{{ $vps->category ? $vps->category->name : '-' }}</td>
                        <td class="d-flex">
                            <button onclick="Livewire.dispatch('edit', {id: {{ $vps->id }} })"
                                class="btn btn-xs btn-default text-primary mx-1 shadow" title="Sửa">
                                <i class="fa fa-lg fa-fw fa-pen"></i>
                            </button>
                            <button onclick="Livewire.dispatch('delete', {id: {{ $vps->id }} })"
                                class="btn btn-xs btn-default text-danger mx-1 shadow" title="Xóa">
                                <i class="fa fa-lg fa-fw fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </x-adminlte-datatable>
        </div>
        <x-adminlte-modal wire:ignore.self id="edit_vps" title="Chỉnh sửa" theme="light" icon="fas fa-bolt"
            size='lg'>
            <form wire:submit.prevent="save({{ $vpsEdit ? $vpsEdit->id : '' }})">
                <img width="100" height="100" src="{{ asset('storage/' . $_image) }}">
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
                <x-adminlte-input wire:model="_price" name="_price" label="Giá" placeholder="Giá"
                    label-class="text-lightblue required">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-user text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-input wire:model="_suffix" name="_suffix" label="Suffix" placeholder="Suffix"
                    label-class="text-lightblue">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-user text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-select wire:model="_category_id" name="_category_id" label="Danh mục"
                    label-class="text-lightblue">
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-light">
                            <i class="fas fa-car-side"></i>
                        </div>
                    </x-slot>
                    <option selected>Chọn danh mục</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ $vpsEdit?->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}</option>
                    @endforeach
                </x-adminlte-select>
                <x-adminlte-input-file wire:model="_image" name="image" label="Hình ảnh"
                    label-class="text-lightblue" placeholder="Chọn hình ảnh...">
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-lightblue">
                            <i class="fas fa-upload"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input-file>
                <x-adminlte-textarea wire:model="_description" name="_description" label="Mô tả" rows=3
                    label-class="text-lightblue" igroup-size="sm" placeholder="Nhập mô tả...">
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-light">
                            <i class="fas fa-lg fa-file-alt text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-textarea>
                <div wire:ignore>
                    <x-adminlte-text-editor name="_content" label="Nội dung" label-class="text-success"
                        igroup-size="sm" placeholder="Nhập nội dung..." />
                </div>
                <!-- Submit button -->
                <x-adminlte-button class="btn-flat float-right" type="submit" label="Lưu" theme="success"
                    icon="fas fa-lg fa-save" />
            </form>
        </x-adminlte-modal>
    </div>
</div>
