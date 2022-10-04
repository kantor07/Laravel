<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ParserContract;
use Orchestra\Parser\Xml\Facade as XmlParser;
use Illuminate\Support\Facades\Storage;
use App\Models\Article;
use App\Models\Category;
use App\Models\Source;


class ParserService implements ParserContract
{
    private string $link;
    
    public function setLink(string $link): self
    {
        $this->link = $link;
        return $this;
    }

    public function saveParseData(): void
    {
        $xml = XmlParser::load($this->link);
        $data = $xml->parse([
                    'title' => [
                        'uses' => 'channel.title'
                    ],
                    'link' => [
                        'uses' => 'channel.link'
                    ],
                    'description' => [
                        'uses' => 'channel.description'
                    ],
                    'image' => [
                        'uses' => 'channel.image.url'
                    ],
                    'news' => [
                        'uses' => 'channel.item[title,link,author,category,description,pubDate]'
                    ]
                ]);

        $imageUrl = 'https://news.rambler.ru/';
        $data['image'] =  $imageUrl . $data['image'];
        // $e = explode("/", $this->link);
        // $fileName = end($e);
        
        $sources = Source::select('url', 'id')->get();
            foreach($sources as $source) {
                if($source->url === $this->link) {
                    $data['source_id'] = $source->id;
                }
            }

        foreach($data['news'] as $item) {
           // dd($item['category']);
            
            //если будет не совпадать то не создаст новую новость
            //прописать создание новой категории немогу так как FK для новостей

            $categories = Category::select('title', 'id')->get();
            foreach($categories as $category) {
                if($category->title === $item['category']) {
                 //   $data['category_id'] = $category->id;
                // }else{
                //     Category::create{[
                //         'title' => $item['category'],
                //         'description' => $item['category'],
                //     ]};
                //     $data['category_id'] = $category->id;
               // }   
                    
                    
                    
                    Article::create([
                        'category_id'   => $category->id,
                        'source_id'     => $data['source_id'],
                        'title'         => $item['title'],
                        'author'        => $item['author'],
                        'image'         => $data['image'],
                        'description'   => $item['description'],
                    ]); 
                }
                // return "Parsing complited";
                
                //   $jsonEncode = json_encode($data);
                
                //    Storage::append("news/". $fileName, $jsonEncode);
    
            }
        }
    }
}