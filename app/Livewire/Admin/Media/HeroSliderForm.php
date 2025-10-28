<?php

namespace App\Livewire\Admin\Media;

use App\Models\MediaAsset;
use Livewire\Attributes\Title;
use Livewire\Component;

class HeroSliderForm extends Component
{
    #[Title('Hero slider')]
    public ?MediaAsset $mediaAsset = null;
    public $title;
    public $order;
    public $thumbnail;
    public function mount($media_asset=null)
    {
        if ($media_asset) {
            $media_asset=MediaAsset::find($media_asset);
            $this->mediaAsset = $media_asset;
            $this->thumbnail = $media_asset->thumbnail;
            $this->title = $media_asset->title;
            $this->order = $media_asset->order;

        }
    }
    public function render()
    {
        $breads=[
            ['url'=>route('pengaturan.hero-slider'),'label'=>'Slider'],
            ['url'=>url()->current(),'label'=>'Formulir'],
        ];
        return view('livewire.admin.media.hero-slider-form')->layoutData(['breads'=>$breads]);
    }

    public function submit(){
        $validated = $this->validate([
            'title' => 'required',
            'order' => 'required:numeric',
            'thumbnail' => 'required',
        ]);
        if ($this->mediaAsset) {
            $this->mediaAsset->update($validated);
        }else{
            $validated['type']='hero-slider';
            MediaAsset::create($validated);
        }
        session()->flash('saved', [
            'title' => 'success',
            'text' => 'Hero slider updated successfully',
        ]);
        $this->redirect(route('pengaturan.hero-slider'),true);
    }
}
