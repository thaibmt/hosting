<?php

namespace App\Livewire;

use App\Models\Option as ModelsOption;
use App\Models\Category;
use Exception;
use Livewire\Component;
use Livewire\WithFileUploads;

class Option extends Component
{
    use WithFileUploads;
    public $image, $_image;
    public  $optionEdit, $options, $categories, $type = "option",
        $name,  $slug, $category_id, $content, $description, $price = 0, $suffix = 'đ/Tháng',
        $_name, $_slug, $_category_id, $_content, $_description, $_price, $_suffix;
    /**
     * action listener
     */
    protected $listeners = ['edit' => 'edit', 'delete' => 'delete'];

    /**
     * List of add/edit form rules
     */
    protected $rules = [
        'name' => 'required',
        'image' => 'nullable|image'
    ];

    protected $messages = [
        'name.required' => 'Trường này không được bỏ trống',
        '_name.required' => 'Trường này không được bỏ trống',
        'image' => 'Vui lòng chọn đúng định dạng hình ảnh',
        '_image' => 'Vui lòng chọn đúng định dạng hình ảnh',
    ];

    public function render()
    {
        $this->categories = Category::with('parent')->whereType('option')->get();
        $this->options = ModelsOption::with('category')->get();
        return view('livewire.option')->extends('adminlte::page')->section('content');
    }

    public function runValidate($id = null)
    {
        if ($id) {
            $this->validate([
                '_name' => 'required',
            ]);
        } else {
            $this->validate();
        }
    }

    public function edit($id = null)
    {
        try {
            $this->optionEdit = ModelsOption::findOrFail($id);
            $this->_name = $this->optionEdit->name;
            $this->_slug = $this->optionEdit->slug;
            $this->_price = $this->optionEdit->price;
            $this->_suffix = $this->optionEdit->suffix;
            $this->_category_id = $this->optionEdit->category_id;
            $this->_image = $this->optionEdit->image;
            $this->_content = $this->optionEdit->content;
            $this->_description = $this->optionEdit->description;
            $this->dispatch('setSummernoteContent',  ['name' => '#_content', 'content' => $this->optionEdit->content]);
            $this->dispatch('openModal', modal: '#edit_option');
            $this->runValidate($id);
        } catch (Exception $exception) {
            $this->dispatch('swal', icon: 'error', text: $exception->getMessage());
        }
    }

    public function save($id = null)
    {
        $this->runValidate($id);
        try {
            $data = [
                'name' => $id ? $this->_name : $this->name,
                'slug' => $id ? $this->_slug : $this->slug,
                'price' => $id ? $this->_price : $this->price,
                'suffix' => $id ? $this->_suffix : $this->suffix,
                'category_id' => $id ? $this->_category_id : $this->category_id,
                'description' => $id ? $this->_description : $this->description,
                'content' => $id ? $this->_content : $this->content,
            ];

            $record = ModelsOption::updateOrCreate(['id' => $id], $data);
            if ($this->_image || $this->image) {
                $id ? $record->image = $this->_image->storeAs('options', $record->slug . "." . $this->_image->getClientOriginalExtension(), 'public') :  $record->image = $this->image->storeAs('options', $record->slug . "." . $this->image->getClientOriginalExtension(), 'public');
                $record->save();
            }
            $this->dispatch('swal', icon: 'success', text: $id ? 'Cập nhật option thành công' : 'Thêm option thành công');
        } catch (Exception $exception) {
            $this->dispatch('swal', icon: 'error', text: $exception->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            ModelsOption::find($id)->delete();
            $this->dispatch('swal', icon: 'success', text: 'Xóa option thành công');
        } catch (Exception $exception) {
            $this->dispatch('swal', icon: 'error', text: $exception->getMessage());
        }
    }
}