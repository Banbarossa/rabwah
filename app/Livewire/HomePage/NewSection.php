<?php

namespace App\Livewire\HomePage;

use App\Models\Post;
use Carbon\Carbon;
use Livewire\Attributes\Computed;
use Livewire\Component;

class NewSection extends Component
{
    public function render()
    {
        return view('livewire.home-page.new-section');
    }

    #[Computed]
    public function news()
    {

        $post = Post::with('author','category')->limit(3)
            ->latest()
            ->get()
            ->map(function ($post) {
                return [
                    'slug' => $post->slug,
                    'title' => $post->title,
                    'excerpt' => $post->excerpt,
                    'category' => $post->category?->name,
                    'date' => Carbon::parse($post->published_at)->locale('id')->format('d M Y'),
                    'author' => $post->author?->name,
                    'image' => $post->thumbnail,
                ];
            });
        return $post;
//        return [
//            [
//                'title' => "Menjadi Harapan Bagi Mereka",
//                'excerpt' => "Pesantren Ar-Rabwah mewujudkan harapan bagi generasi muda. Setiap santri dibimbing untuk berprestasi dan berakhlak mulia.",
//                'category' => "Berita",
//                'date' => "15 Februari 2026",
//                'author' => "Admin",
//                'image' => "islamic students studying",
//            ],
//            [
//                'title' => "Orang Tua Awal Santri",
//                'excerpt' => "Peran orang tua sangat penting dalam perjalanan santri di pesantren. Kolaborasi yang baik akan menghasilkan pendidikan optimal.",
//                'category' => "Artikel",
//                'date' => "10 Februari 2026",
//                'author' => "Ustadz Ahmad",
//                'image' => "islamic family education",
//            ],
//            [
//                'title' => "Peran Operasional Pesantren",
//                'excerpt' => "Manajemen dan operasional pesantren yang terorganisir menjadi kunci kesuksesan dalam memberikan pendidikan berkualitas.",
//                'category' => "Info",
//                'date' => "5 Februari 2026",
//                'author' => "Admin",
//                'image' => "islamic school management",
//            ],
//        ];
    }
}
