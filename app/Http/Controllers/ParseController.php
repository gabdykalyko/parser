<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\DomCrawler\Crawler;

class ParseController extends Controller
{
    public function parse1688(Request $request)
    {
        $htmlFile = public_path('./example.html');

        $html = file_get_contents($htmlFile);

        $crawler = new Crawler($html);

        $title = $crawler->filter('.title-text')->text(); // название

        $price = []; // вилка цен
        $crawler->filter('.step-price-item')->each(function (Crawler $node) use (&$price) {
            $text = $node->text();
            $price[] = $text;
        });

        $img = $crawler->filter('.detail-gallery-img')->first()->attr('src'); // изображение

        $colors = []; // цвета

        $crawler->filter('.prop-name')->each(function (Crawler $node) use (&$colors) {
            $text = $node->text();
            $colors[] = $text;
        });

        $size = []; // размеры

        $crawler->filter('.sku-item-wrapper')->each(function (Crawler $node) use (&$size) {
            $text = $node->text();
            $size[] = $text;
        });

        $data = [
            'title' => $title,
            'img' => $img,
            'price' => $price,
            'colors' => $colors,
            'size' => $size,
        ];

        return response()->json($data, JSON_UNESCAPED_UNICODE);
    }
}
