<?php

/*
 * This file is part of the Zyan\DouyinMusic.
 *
 * (c) 读心印 <aa24615@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Zyan\DouyinMusic;

use Zyan\DouyinMusic\HttpClient\DouyinHttpClient;

/**
 * Class DouyinMusic.
 *
 * @package Zyan\DouyinMusic
 *
 * @author 读心印 <aa24615@qq.com>
 */
class DouyinMusic
{
    public $html = null;
    public $data = null;

    protected function __construct($url)
    {
        $this->html = DouyinHttpClient::get($url);
    }

    public static function get(string $url)
    {
        return new static($url);
    }

    private function getVideoId()
    {
        preg_match('/href="(.*?)">Found/', $this->html, $matches);
        $url_share = $matches[1];
        preg_match('/video\/(.*?)\//', $url_share, $matches);

        return $matches[1];
    }

    private function getDouyin()
    {
        if (is_null($this->data)) {
            $videoId = $this->getVideoId();
            $json = DouyinHttpClient::get("https://www.iesdouyin.com/web/api/v2/aweme/iteminfo/?item_ids=".$videoId);
            $this->data = json_decode($json, true);
        }

        return $this->data;
    }

    public function getData()
    {
        return [
            'music' => $this->getMusic(),
            'img' => $this->getImg(),
            'thumb' => $this->getThumb(),
            'title' => $this->getTitle(),
            'author' => $this->getAuthor(),
        ];
    }

    public function getMusic()
    {
        $this->getDouyin();
        return $this->data['item_list'][0]['music']['play_url']['uri'];
    }

    public function getImg()
    {
        $this->getDouyin();
        return $this->data['item_list'][0]['music']['cover_hd']['url_list'][0];
    }

    public function getThumb(){
        $this->getDouyin();
        return $this->data['item_list'][0]['music']['cover_thumb']['url_list'][0];
    }

    public function getTitle()
    {
        $this->getDouyin();
        return $this->data['item_list'][0]['music']['title'];
    }

    public function getAuthor()
    {
        $this->getDouyin();
        return $this->data['item_list'][0]['music']['author'];
    }
}
