<?php

namespace App\Livewire;

use App\Models\Category as ModelsCategory;
use Exception;
use Livewire\Component;

class Category extends Component
{
    public  $categoryEdit, $categories, $type,
        $name, $slug, $parent_id, $content, $description,
        $_name, $_slug, $_parent_id, $_content, $_description;
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

    public function mount($type)
    {
        $this->type = $type;
    }

    public function render()
    {
        $this->categories = ModelsCategory::with('parent')->whereType($this->type)->get();
        return view('livewire.category')->extends('adminlte::page')->section('content');
    }

    public function edit($id = null)
    {
        try {
            $categoryEdit = ModelsCategory::findOrFail($id);
            $this->_name = $categoryEdit->name;
            $this->_slug = $categoryEdit->slug;
            $this->_parent_id = $categoryEdit->parent_id;
            $this->_content = $categoryEdit->content;
            $this->_description = $categoryEdit->description;
            $this->categoryEdit = $categoryEdit;
            $this->dispatch('openModal', modal: '#edit_category');
        } catch (Exception $exception) {
            $this->dispatch('swal', icon: 'error', text: $exception->getMessage());
        }
    }

    public function save($id = null)
    {
        if ($id) {
            $this->validate([
                '_name' => 'required',
            ]);
        } else {
            $this->validate();
        }
        try {
            $data = [
                'name' => $id ? $this->_name : $this->name,
                'slug' => $id ? $this->_slug : $this->slug,
                'parent_id' => $id ? $this->_parent_id : $this->parent_id,
                'description' => $id ? $this->_description : $this->description,
            ];
            if ($id) {
                ModelsCategory::find($id)->update($data);
            } else {
                $data = [...$data, 'type' => $this->type, 'sort' => ModelsCategory::getNextSortRoot($this->type), 'depth' => ModelsCategory::getNextDepthRoot($this->type)];
                ModelsCategory::create($data);
            }
            $this->dispatch('swal', icon: 'success', text: $id ? 'Cập nhật danh mục thành công' : 'Thêm danh mục thành công');
        } catch (Exception $exception) {
            $this->dispatch('swal', icon: 'error', text: $exception->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            ModelsCategory::find($id)->delete();
            $this->dispatch('swal', icon: 'success', text: 'Xóa danh mục thành công');
        } catch (Exception $exception) {
            $this->dispatch('swal', icon: 'error', text: $exception->getMessage());
        }
    }
}