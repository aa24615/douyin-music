<?php

namespace Zyan\Tests;

use PHPUnit\Framework\TestCase;
use Zyan\DouyinMusic\DouyinMusic;

class DouyinMusicTest extends TestCase
{
    public function test_get(){
        $m = DouyinMusic::get('https://v.douyin.com/RJAGV9g/');
        $data = $m->getData();

        $this->assertTrue(!empty($data['img']));
        $this->assertTrue(!empty($data['music']));
        $this->assertTrue(!empty($data['title']));
        $this->assertTrue(!empty($data['thumb']));
        $this->assertTrue(!empty($data['author']));

        $this->assertTrue(!empty($m->getTitle()));
        $this->assertTrue(!empty($m->getImg()));
        $this->assertTrue(!empty($m->getThumb()));
        $this->assertTrue(!empty($m->getAuthor()));
        $this->assertTrue(!empty($m->getMusic()));
    }
}
