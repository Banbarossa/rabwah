<?php

namespace App\Livewire\Admin\Fundraising;

use App\Models\Donor;
use Livewire\Attributes\Title;
use Livewire\Component;

class FormDonatur extends Component
{
    #[Title('Form Donatur')]
    public $donor;
    public $name;
    public $email;
    public $phone;
    public $address;
    public function mount($donor=null)
    {
        if ($donor) {
           $donor= Donor::find($donor);
           $this->donor=$donor;
           $this->name=$donor->name;
           $this->email=$donor->email;
           $this->phone=$donor->phone;
           $this->address=$donor->address;
        }

    }
    public function render()
    {
        $breads=[
            ['url'=>route('fundraising.donatur'),'label'=>'Donatur'],
            ['url'=>url()->current(),'label'=>'Formulir'],
        ];
        return view('livewire.admin.fundraising.form-donatur')->layoutData(['breads'=>$breads]);
    }
    public function save(){
        $validated =$this->validate([
            'name' => 'required',
            'email' => 'nullable',
            'phone' => 'required',
            'address' => 'nullable',
        ]);
        if($this->donor){
            $this->donor->update($validated);
        }else{
            Donor::updateOrCreate(['phone'=>$this->phone],[
                'name'=>$this->name,
                'email'=>$this->email,
                'address'=>$this->address,
            ]);
        }
        session()->flash('saved', 'Donor successfully updated.');
        $this->redirect(route('fundraising.donatur'),true);
    }
}
