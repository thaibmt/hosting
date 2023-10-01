<?php

namespace App\Livewire;

use App\Models\Domain as ModelsDomain;
use App\Models\Category;
use Exception;
use Livewire\Component;

class Domain extends Component
{
    public  $domainEdit, $domains, $categories, $type = "domain", $domain_check,
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
        'domain_check.required' => 'Trường này không được bỏ trống',
    ];

    public function render()
    {
        $this->categories = Category::with('parent')->whereType('domain')->get();
        // $this->domains = ModelsDomain::with('category')->get();
        return view('livewire.domain')->extends('adminlte::page')->section('content');
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

    public function check()
    {
        $this->validate([
            'domain_check' => 'required',
        ]);
        $check = file_get_contents("http://www.whois.net.vn/whois.php?domain=" . $this->domain_check);
        $this->dispatch('swal', icon: $check ? 'success' : 'warning', text: 'Tên miền ' . htmlentities(strtolower($this->domain_check)) . ($check ? 'chưa ' : 'đã') . ' có người đăng ký');
    }

    public function edit($id = null)
    {
        try {
            $this->domainEdit = ModelsDomain::findOrFail($id);
            $this->_name = $this->domainEdit->name;
            $this->_slug = $this->domainEdit->slug;
            $this->_price = $this->domainEdit->price;
            $this->_suffix = $this->domainEdit->suffix;
            $this->_category_id = $this->domainEdit->category_id;
            $this->_content = $this->domainEdit->content;
            $this->_description = $this->domainEdit->description;
            $this->dispatch('setSummernoteContent',  ['name' => '#_content', 'content' => $this->domainEdit->content]);
            $this->dispatch('openModal', modal: '#edit_domain');
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
            ModelsDomain::updateOrCreate(['id' => $id], $data);
            $this->dispatch('swal', icon: 'success', text: $id ? 'Cập nhật domain thành công' : 'Thêm domain thành công');
        } catch (Exception $exception) {
            $this->dispatch('swal', icon: 'error', text: $exception->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            ModelsDomain::find($id)->delete();
            $this->dispatch('swal', icon: 'success', text: 'Xóa domain thành công');
        } catch (Exception $exception) {
            $this->dispatch('swal', icon: 'error', text: $exception->getMessage());
        }
    }
}