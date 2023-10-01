<div>
    <div class="row">
        <div class="col-lg-4">
            <div class="card card-light">
                <div class="card-header">
                    <h3 class="card-title">Thêm hosting</h3>
                </div>
                <div class="card-body">
                    <form id="form_create_hosting" wire:submit.prevent="save">
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
                    <x-adminlte-button form="form_create_hosting" class="btn-flat float-right" type="submit"
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
                @foreach ($hostings as $key => $hosting)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $hosting->name }}</td>
                        <td>{{ $hosting->slug }}</td>
                        <td>{{ $hosting->category ? $hosting->category->name : '-' }}</td>
                        <td class="d-flex">
                            <button onclick="Livewire.dispatch('edit', {id: {{ $hosting->id }} })"
                                class="btn btn-xs btn-default text-primary mx-1 shadow" title="Sửa">
                                <i class="fa fa-lg fa-fw fa-pen"></i>
                            </button>
                            <button onclick="Livewire.dispatch('delete', {id: {{ $hosting->id }} })"
                                class="btn btn-xs btn-default text-danger mx-1 shadow" title="Xóa">
                                <i class="fa fa-lg fa-fw fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </x-adminlte-datatable>
        </div>
        <x-adminlte-modal wire:ignore.self id="edit_hosting" title="Chỉnh sửa" theme="light" icon="fas fa-bolt"
            size='lg'>
            <form wire:submit.prevent="save({{ $hostingEdit ? $hostingEdit->id : '' }})">
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
                            {{ $hostingEdit?->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}</option>
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
