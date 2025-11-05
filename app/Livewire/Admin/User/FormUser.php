<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Title;
use Livewire\Component;

class FormUser extends Component
{

    #[Title('Formulir')]
    public $user;
    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public function mount($user=null)
    {
        if($user){
            $user=User::findOrfail($user);
            $this->user = $user;
            $this->name = $user->name;
            $this->email = $user->email;
        }

    }
    public function render()
    {
        $breads=[
            ['url'=>route('user'),'label'=>'User'],
            ['url'=>url()->current(),'label'=>'Formulir'],
        ];
        return view('livewire.admin.user.form-user')->layoutData(['breads'=>$breads]);
    }

    public function save(){
       $rules['name'] = 'required';
       if($this->user){
           $rules['email'] = 'required|unique:users,email,'.$this->user->id.',id';
       }else{
           $rules['email'] = 'required|unique:users,email';
       }
       if(!$this->user){
           $rules['password'] = 'required|min:8|confirmed';
       }
       $this->validate($rules);
       if($this->user){
           $this->user->update([
               'name' => $this->name,
               'email' => $this->email,
           ]);
       }else{
           User::create([
               'name' => $this->name,
               'email' => $this->email,
               'password' => Hash::make($this->password),
           ]);
       }
       session()->flash('saved', 'Data berhasil disimpan');
       $this->redirect(route('user'),true);
    }
}
