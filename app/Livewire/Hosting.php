<?php

namespace App\Livewire;

use App\Models\Hosting as ModelsHosting;
use App\Models\Category;
use Exception;
use Livewire\Component;

class Hosting extends Component
{
    public  $hostingEdit, $hostings, $categories, $type = "hosting",
        $name, $slug, $category_id, $content, $description, $price = 0, $suffix = 'đ/Tháng',
        $_name, $_slug, $_category_id, $_content, $_description, $_price, $_suffix;
    /**
     * action listener
     */
    protected $listeners = ['edit' => 'edit', 'delete' => 'delete'];

    /**
     * List of add/edit form rules
     */
    protected $rules = [
        'name' => 'required'
    ];

    protected $messages = [
        'name.required' => 'Trường này không được bỏ trống',
        '_name.required' => 'Trường này không được bỏ trống',
    ];

    public function render()
    {
        $this->categories = Category::with('parent')->whereType('hosting')->get();
        $this->hostings = ModelsHosting::with('category')->get();
        return view('livewire.hosting')->extends('adminlte::page')->section('content');
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
            $this->hostingEdit = ModelsHosting::findOrFail($id);
            $this->_name = $this->hostingEdit->name;
            $this->_slug = $this->hostingEdit->slug;
            $this->_price = $this->hostingEdit->price;
            $this->_suffix = $this->hostingEdit->suffix;
            $this->_category_id = $this->hostingEdit->category_id;
            $this->_content = $this->hostingEdit->content;
            $this->_description = $this->hostingEdit->description;
            $this->dispatch('setSummernoteContent',  ['name' => '#_content', 'content' => $this->hostingEdit->content]);
            $this->dispatch('openModal', modal: '#edit_hosting');
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
            ModelsHosting::updateOrCreate(['id' => $id], $data);
            $this->dispatch('swal', icon: 'success', text: $id ? 'Cập nhật hosting thành công' : 'Thêm hosting thành công');
        } catch (Exception $exception) {
            $this->dispatch('swal', icon: 'error', text: $exception->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            ModelsHosting::find($id)->delete();
            $this->dispatch('swal', icon: 'success', text: 'Xóa hosting thành công');
        } catch (Exception $exception) {
            $this->dispatch('swal', icon: 'error', text: $exception->getMessage());
        }
    }
}